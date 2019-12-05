<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Task;
use App\User;
use App\TaskTypes;
use App\TaskComment;
use App\Department;
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

    public function destroy_task($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect::to('/tasks/new_tasks')->with('success_new', 'Task is successfully deleted');
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
 
            return redirect('/tasks/new_tasks')->with('success_new', 'Task is Successfully Assigned');
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks/view_task')->withInput()->with('error','Something Went Wrong!');
        }  
    }

    public function view_task($id)
    {
        $data['comments']       = DB::table('task_comments')
                                ->join('tasks', 'tasks.id', '=', 'task_comments.task_id')
                                ->join('users', 'users.id', '=', 'task_comments.user_id')
                                ->select('task_comments.comments', 'users.name','users.id', 'users.type', 'tasks.created', 'tasks.assign', 'task_comments.created_at')
                                ->where('task_comments.task_id', '=', $id)
                                ->orderBy('task_comments.created_at','desc')
                                ->get();
        $data['task']           = Task::find($id);
        $data['types']          = TaskTypes::get();
        $data['departments']    = Department::get();
        $data['users']          = User::get();
        //dd($comment);
        return view('tasks/view_task', $data);   
    }

    public function accept_task($id)
    {    
        DB::beginTransaction(); 
        
        try
        {
            $task  = Task::find($id);
            $task->task_status = 'active';
            $task->save();

            DB::commit();

            return redirect('/tasks/assigned_tasks')->with('tabName', 'assigned')->with('success_assigned', 'Task is Successfully Accepted');
                     
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks/view_task')->with('tabName', 'assigned')->withInput()->with('error','Something Went Wrong!');
        }   
    }

    public function cancel_task($id)
    {    
        DB::beginTransaction(); 
        
        try
        {
            $task  = Task::find($id);
            $task->task_status = 'cancelled';
            $task->save();

            DB::commit();

            return redirect('/tasks/assigned_tasks')->with('tabName', 'assigned')->with('success_assigned', 'Task is Successfully Cancelled');                     
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks/view_task')->with('tabName', 'assigned')->withInput()->with('error','Something Went Wrong!');
        }   
    }

    public function complete_task($id)
    {    
        DB::beginTransaction(); 
        
        try
        {
            $task  = Task::find($id);
            $task->task_status = 'completed';
            $task->save();

            DB::commit();

            return redirect('/tasks/active_tasks')->with('tabName', 'active')->with('success_active', 'Task is Successfully Completed');                     
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks/view_task')->with('tabName', 'active')->withInput()->with('error','Something Went Wrong!');
        }   
    }

    public function onhold_task($id)
    {    
        DB::beginTransaction(); 
        
        try
        {
            $task  = Task::find($id);
            $task->task_status = 'onhold';
            $task->save();

            DB::commit();

            return redirect('/tasks/active_tasks')->with('tabName', 'active')->with('success_active', 'Task is Successfully Hold');                     
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks/view_task')->with('tabName', 'active')->withInput()->with('error','Something Went Wrong!');
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
 
            return redirect('/tasks/onhold_tasks')->with('tabName', 'onhold')->with('success_onhold', 'Task is Successfully Unhold');          
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks/view_task')->with('tabName', 'onhold')->withInput()->with('error','Something Went Wrong!');
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
 
            return redirect('/tasks/completed_tasks')->with('tabName', 'completed')->with('success_completed', 'Task is Successfully Reassigned');          
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('/tasks/view_task')->with('tabName', 'completed')->withInput()->with('success_completed','Something Went Wrong!');
        }   
    }

    public function add_task()
    {
        $data['types']          =   TaskTypes::get();
        $data['departments']    =   Department::get();
        return view('tasks/add_task', $data);
    }

    public function edit_task($id)
    {
        $data['tasks']          = Task::find($id);
        $data['types']          = TaskTypes::get();
        $data['departments']    = Department::get();
        return view('tasks/edit_task', $data);
    }

    public function save_task( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'title'             => 'required|string|min:10',
            'department'        => 'required|not_in:Choose...',
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
            $task->department       = $request->get('department');
            $task->type             = $request->get('type');
            $task->priority         = $request->get('priority');
            $task->description      = $request->get('description');
            $task->estimated_hours  = $request->get('hours');           
            $task->task_status      = 'new';
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
 
            return redirect('/tasks/new_tasks')->with('success_new', 'Task is Successfully Saved');
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
            'department'        => 'required|not_in:Choose...',
            'type'              => 'required|not_in:Choose...',
            'priority'          => 'required',
            'description'       => 'required|min:50', 
            'hours'             => 'required|numeric',
        ]);
        
        if($validator->fails())
        {
           //dd($validator);
            return redirect::to('/tasks/edit_task')->withErrors($validator)->withInput()->with('error', 'Please Check Validation Requirments');
        }

        DB::beginTransaction(); 
        
        try
        {
            $task = Task::find($id);
            $task->title            = $request->get('title');
            $task->department       = $request->get('department');
            $task->type             = $request->get('type');
            $task->priority         = $request->get('priority');
            $task->description      = $request->get('description');
            $task->estimated_hours  = $request->get('hours');
            $task->created          = \Auth::user()->id;

            $task->save();

            DB::commit();
 
            return redirect('/tasks/new_tasks')->with('success_new', 'Task is Successfully Updated');
        }
        catch(\Exception $e)
        {
            //dd($e->getMessage());
            DB::rollback();
            return redirect('tasks/edit_task')->withInput()->with('error','Something Went Wrong!');
        }  
    }
}
