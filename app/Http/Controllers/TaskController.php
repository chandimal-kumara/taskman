<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Task;
use App\User;
use App\TaskTypes;
use App\TaskComment;
use App\Http\Controllers\Auth;
use DB;
use Validator;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
        $data['tasks']      =   Task::get()->count();
        $data['new']        =   DB::table('tasks')->where('task_status', 'new')->get()->count();
        $data['assigned']   =   DB::table('tasks')->where('task_status', 'assigned')->get()->count();
        $data['active']     =   DB::table('tasks')->where('task_status', 'active')->get()->count();
        $data['onhold']     =   DB::table('tasks')->where('task_status', 'onhold')->get()->count();
        $data['cancelled']  =   DB::table('tasks')->where('task_status', 'cancelled')->get()->count();
        $data['completed']  =   DB::table('tasks')->where('task_status', 'completed')->get()->count();
        return view('index', $data);
    } 

    public function admin_view_tasks()
    {
        /*  $data['types']      = TaskTypes::get();
        $data['users']      = User::get();
        $data['new']        = DB::table('tasks')->where('task_status', 'new')->get();
        $data['assigned']   = DB::table('tasks')->where('task_status', 'assigned')->get();
        return view('tasks/admin_view_tasks', $data); */
 
        $data['types']          =   TaskTypes::all();
        $data['users']          =   User::all();        
        
        $data['new']            =   DB::table('tasks')->where('task_status', 'new')->latest()->paginate(5);    
        $data['assigned']       =   DB::table('tasks')->where('task_status', 'assigned')->latest()->paginate(5);    

        return view('tasks/admin_view_tasks', $data)
        ->with('i', (request()->input('page', 1) - 1) * 10);        
    }

    public function my_view_tasks()
    {
       /*  $data['types']      = TaskTypes::get();
        //$data['users']      = User::get();
        $data['assigned']   = DB::table('tasks')->where('task_status', 'assigned')->get();
        $data['active']     = DB::table('tasks')->where('task_status', 'active')->get();
        $data['onhold']     = DB::table('tasks')->where('task_status', 'onhold')->get();
        $data['cancelled']  = DB::table('tasks')->where('task_status', 'cancelled')->get();
        $data['completed']  = DB::table('tasks')->where('task_status', 'completed')->get(); 
        return view('tasks/my_view_tasks', $data); */

      
         
       // return view('tasks/my_view_tasks', $data);

        $data['types']          =   TaskTypes::all();
        $data['assigned']       =   DB::table('tasks')->where('task_status', 'assigned')->latest()->paginate(5);
        $data['active']         =   DB::table('tasks')->where('task_status', 'active')->latest()->paginate(5);
        $data['onhold']         =   DB::table('tasks')->where('task_status', 'onhold')->latest()->paginate(5);
        $data['cancelled']      =   DB::table('tasks')->where('task_status', 'cancelled')->latest()->paginate(5);
        $data['completed']      =   DB::table('tasks')->where('task_status', 'completed')->latest()->paginate(5);
        
        return view('tasks/my_view_tasks', $data)
        ->with('i', (request()->input('page', 1) - 1) * 10); 
    }

    public function all_tasks(Request $request)
    {           
        $data['types']         =    TaskTypes::all();
        $data['users']         =    User::all();        
        $task_search           =    $request->input('task_search');
        $data['task_search']   =    $task_search;

        $tasks = Task::select('*');

        if (isset($task_search) && $task_search != "")

            $tasks->orWhere(DB::raw("LOWER(task_code)"), 'LIKE', '%'.strtolower($task_search).'%')            
            ->orWhere(DB::raw("LOWER(title)"), 'LIKE', '%'.strtolower($task_search).'%'); 

            $tasks = $tasks->latest()->paginate(5)->appends(['task_search' => $task_search]);    

        return view('tasks/all_tasks', compact('tasks'), $data)
        ->with('i', (request()->input('page', 1) - 1) * 10);
    } 

    public function destroy_task($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect::to('/tasks/admin_view_tasks')->with('success_new', 'Task is successfully deleted');
    }

    public function assign_task( Request $request, $id)
    {
        DB::beginTransaction(); 
        
        try
        {
            $task              = Task::find($id);
            $task->assign      = $request->get('user');
            $task->task_status = 'assigned';

            $task->save();

            DB::commit();
 
            return redirect('/tasks/admin_view_tasks')->with('success_new', 'Task is Successfully Assigned');
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks/admin_view_tasks')->withInput()->with('error','Something Went Wrong!');
        }  
    }

    public function view_task($id)
    {
        $data['comments']   = DB::table('task_comments')
                            ->join('tasks', 'tasks.id', '=', 'task_comments.task_id')
                            ->join('users', 'users.id', '=', 'task_comments.user_id')
                            ->select('task_comments.comments', 'users.name','users.id', 'users.type', 'tasks.created', 'tasks.assign', 'task_comments.created_at')
                            ->where('task_comments.task_id', '=', $id)
                            ->orderBy('task_comments.created_at','desc')
                            ->get();
        $data['task']      = Task::find($id);
        $data['types']     = TaskTypes::get();
        $data['users']     = User::get();
        //dd($comment);
        return view('tasks/view_task', $data);   
    }

    public function action_task( Request $request, $id)
    {    
        DB::beginTransaction(); 
        
        try
        {
            $task  = Task::find($id);

            if (1 == $request->get('submit')) {

                $task->task_status = 'active';
                $task->save();
    
                DB::commit();
 
                return redirect('/tasks/my_view_tasks')->with('tabName', 'assigned')->with('success_assigned', 'Task is Successfully Accepted');
            }

            elseif (0 == $request->get('submit')) {

                $task->task_status = 'cancelled';
                $task->save();
    
                DB::commit();
 
                return redirect('/tasks/my_view_tasks')->with('tabName', 'assigned')->with('success_assigned', 'Task is Successfully Rejected');
            }            
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks/my_view_tasks')->with('tabName', 'assigned')->withInput()->with('error','Something Went Wrong!');
        }   
    }

    public function action2_task( Request $request, $id)
    {    
        DB::beginTransaction(); 
        
        try
        {
            $task = Task::find($id);

            if (1 == $request->get('submit')) {

                $task->task_status = 'completed';
                $task->save();

                DB::commit();
 
                return redirect('/tasks/my_view_tasks')->with('tabName', 'active')->with('success_active', 'Task is Successfully Completed');
            }

            elseif (0 == $request->get('submit')) {

                $task->task_status = 'onhold';
                $task->save();

                DB::commit();
 
                return redirect('/tasks/my_view_tasks')->with('tabName', 'active')->with('success_active', 'Task is Successfully Hold'); 
            }         
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks/my_view_tasks')->with('tabName', 'active')->withInput()->with('error','Something Went Wrong!');
        }   
    }

    public function unhold_task( Request $request, $id)
    {    
        DB::beginTransaction(); 
        
        try
        {
            $task              = Task::find($id);
            $task->task_status = 'active';
            $task->save();

            DB::commit();
 
            return redirect('/tasks/my_view_tasks')->with('tabName', 'onhold')->with('success_onhold', 'Task is Successfully Hold');          
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks/my_view_tasks')->with('tabName', 'onhold')->withInput()->with('error','Something Went Wrong!');
        }   
    }

    public function reassign_task( Request $request, $id)
    {    
        DB::beginTransaction(); 
        
        try
        {
            $task              = Task::find($id);
            $task->task_status = 'assigned';
            //$task->title       = $request->get('task_title').'(reassigned)';
            //dd($request);
            $task->save();

            DB::commit();
 
            return redirect('/tasks/my_view_tasks')->with('tabName', 'completed')->with('success_completed', 'Task is Successfully Reassigned');          
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks/my_view_tasks')->with('tabName', 'completed')->withInput()->with('success_completed','Something Went Wrong!');
        }   
    }

    public function add_task()
    {
        $data['types'] = TaskTypes::get();
        return view('tasks/add_task', $data);
    }

    public function edit_task($id)
    {
        $data['tasks'] = Task::find($id);
        $data['types'] = TaskTypes::get();
        return view('tasks/edit_task', $data);
    }

    public function save_task( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'title'             => 'required|string|min:10',
            'type'              => 'required|not_in:Choose...',
            'priority'          => 'required',
            'description'       => 'required|min:50', 
            'hours'             => 'required|numeric',
        ]);
        
        if($validator->fails())
        {
           // dd($validator);
            return redirect::to('/tasks/add_task')->withErrors($validator)->withInput()->with('error', 'Please Check Validation Requirments');
        }

        DB::beginTransaction(); 
        
        try
        {
            $task = new Task();
            $task->title            = $request->get('title');
            $task->type             = $request->get('type');
            $task->priority         = $request->get('priority');
            $task->description      = $request->get('description');
            $task->estimated_hours  = $request->get('hours');
            $task->created          = \Auth::user()->id;

            $task->save();

            $str = $request->type;
            $zero = "";
            $lenght= strlen($task->id);
          
            if ($lenght!=5) 
            {
                for ($i=0; $i < 5-$lenght; $i++) 
                { 		
                    $zero .= "0";
                }
            }
          
            $code = $str.$zero.$task->id;
            $task->task_code    = $code;

            $task->save(); 
              
            DB::commit();
 
            return redirect('/tasks/admin_view_tasks')->with('success_new', 'Task is Successfully Saved');
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks/add_task')->withInput()->with('error','Something Went Wrong!');
        }  
    }
    
    public function update_task( Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'             => 'required|string|min:10',
            'type'              => 'required|not_in:Choose...',
            'priority'          => 'required',
            'description'       => 'required|min:50', 
            'hours'             => 'required|numeric',
        ]);
        
        if($validator->fails())
        {
           // dd($validator);
            return redirect::to('/tasks/update')->withErrors($validator)->withInput()->with('error', 'Please Check Validation Requirments');
        }

        DB::beginTransaction(); 
        
        try
        {
            $task = Task::find($id);
            $task->title            = $request->get('title');
            $task->type             = $request->get('type');
            $task->priority         = $request->get('priority');
            $task->description      = $request->get('description');
            $task->estimated_hours  = $request->get('hours');
            $task->created          = \Auth::user()->id;

            $task->save();

            DB::commit();
 
            return redirect('/tasks/admin_view_tasks')->with('success_new', 'Task is Successfully Updated');
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('tasks/update')->withInput()->with('error','Something Went Wrong!');
        }  
    }
        /* 
                $search_value           =   $request->input('search_value');
                $data['search_value']   =   $search_value;
    
                $query = Cemetery::select('*');
    
                if (isset($search_value) && $search_value != "")
                    $query->orWhere(DB::raw("LOWER(code)"), 'LIKE', '%'.strtolower($search_value).'%')
                    ->orWhere(DB::raw("LOWER(name)"), 'LIKE', '%'.strtolower($search_value).'%')
                    ->orWhere(DB::raw("LOWER(phone)"), 'LIKE', '%'.strtolower($search_value).'%')
                    ->orWhere(DB::raw("LOWER(email)"), 'LIKE', '%'.strtolower($search_value).'%'); 
    
                $cemeteries = $query->latest()->paginate(10)->appends(['search_value' => $search_value]);    
    
                return view('cemetery.cemetery-search2',compact('cemeteries'), $data)
                    ->with('i', (request()->input('page', 1) - 1) * 10);
  */  
}
