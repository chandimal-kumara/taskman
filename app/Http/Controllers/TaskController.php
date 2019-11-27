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
        $data['tasks']      = Task::get()->count();
        $data['created']    = DB::table('tasks')->where('task_status', 'created')->get()->count();
        $data['pending']    = DB::table('tasks')->where('task_status', 'pending')->get()->count();
        $data['active']     = DB::table('tasks')->where('task_status', 'active')->get()->count();
        $data['onhold']     = DB::table('tasks')->where('task_status', 'onhold')->get()->count();
        $data['rejected']   = DB::table('tasks')->where('task_status', 'rejected')->get()->count();
        $data['completed']  = DB::table('tasks')->where('task_status', 'completed')->get()->count();
        return view('index', $data);
    }

    public function tasks()
    {
        $data['types']      = TaskTypes::get();
        $data['users']      = User::get();
        $data['created']    = DB::table('tasks')->where('task_status', 'created')->get();
        $data['pending']    = DB::table('tasks')->where('task_status', 'pending')->get();
        $data['active']     = DB::table('tasks')->where('task_status', 'active')->get();
        $data['onhold']     = DB::table('tasks')->where('task_status', 'onhold')->get();
        $data['rejected']   = DB::table('tasks')->where('task_status', 'rejected')->get();
        $data['completed']  = DB::table('tasks')->where('task_status', 'completed')->get();
        return view('tasks/tasks', $data);
    }

    public function view_task($id)
    {
       // $data['comment']    = TaskComment::join('tasks', 'task_comments.task_id', '=', 'tasks.id')->get();

        $data['comments']   = DB::table('task_comments')
                            ->join('tasks', 'tasks.id', '=', 'task_comments.task_id')
                            ->join('users', 'users.id', '=', 'task_comments.user_id')
                            ->select('task_comments.comments', 'users.name', 'users.type', 'tasks.created', 'task_comments.created_at')
                            ->where('task_comments.task_id', '=', $id)
                            ->orderBy('task_comments.created_at','desc')
                            ->get();
        $data['tasks']      = Task::find($id);
        $data['types']      = TaskTypes::get();
        $data['users']      = User::get();
        //dd($comment);
        return view('tasks/view_task', $data);   
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
 
            return redirect('/tasks')->with('success_created', 'Task is Successfully Saved');
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
 
            return redirect('/tasks')->with('success_created', 'Task is Successfully Updated');
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('tasks/update')->withInput()->with('error','Something Went Wrong!');
        }  
    }
   
    public function assign_task( Request $request, $id)
    {
      

        DB::beginTransaction(); 
        
        try
        {
            $task              = Task::find($id);
            $task->assign      = $request->get('user');
            $task->task_status = 'pending';

            $task->save();

            DB::commit();
 
            return redirect('/tasks')->with('success_created', 'Task is Successfully Assigned');
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks')->withInput()->with('error','Something Went Wrong!');
        }  
    }

    public function action_task( Request $request, $id)
    {    
        DB::beginTransaction(); 
        
        try
        {
            $task              = Task::find($id);

            if (1 == $request->get('submit')) {

                $task->task_status = 'active';
                $task->save();

                DB::commit();
 
                return redirect('/tasks')->with('tabName', 'pending')->with('success_pending', 'Task is Successfully Accepted');
            }

            elseif (0 == $request->get('submit')) {

                $task->task_status = 'rejected';
                $task->save();

                DB::commit();
 
                return redirect('/tasks')->with('tabName', 'pending')->with('success_pending', 'Task is Successfully Rejected');
            }            
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks')->withInput()->with('error','Something Went Wrong!');
        }   
    }

    public function action2_task( Request $request, $id)
    {    
        DB::beginTransaction(); 
        
        try
        {
            $task              = Task::find($id);

            if (1 == $request->get('submit')) {

                $task->task_status = 'completed';
                $task->save();

                DB::commit();
 
                return redirect('/tasks')->with('tabName', 'active')->with('success_active', 'Task is Successfully Completed');
            }

            elseif (0 == $request->get('submit')) {

                $task->task_status = 'onhold';
                $task->save();

                DB::commit();
 
                return redirect('/tasks')->with('tabName', 'active')->with('success_active', 'Task is Successfully Hold'); 
            }         
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks')->withInput()->with('error','Something Went Wrong!');
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
 
            return redirect('/tasks')->with('tabName', 'onhold')->with('success_onhold', 'Task is Successfully Hold');          
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks')->withInput()->with('error','Something Went Wrong!');
        }   
    }

    public function reassign_task( Request $request, $id)
    {    
        DB::beginTransaction(); 
        
        try
        {
            $task              = Task::find($id);
            $task->task_status = 'pending';
            $task->save();

            DB::commit();
 
            return redirect('/tasks')->with('tabName', 'completed')->with('success_completed', 'Task is Successfully Reassigned');          
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks')->withInput()->with('error','Something Went Wrong!');
        }   
    }

    public function destroy_task($id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->delete();

        return redirect::to('/tasks')->with('success_created', 'Task is successfully deleted');
    }
}
