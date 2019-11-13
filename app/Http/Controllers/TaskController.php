<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Task;
use App\User;
use App\TaskTypes;
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
        return view('index');
    }

    public function tasks()
    {
        $data['types'] = TaskTypes::get();
        $data['task1'] = DB::table('tasks')->where('task_status', 'created')->get();
        $data['task2'] = DB::table('tasks')->where('task_status', 'assigned')->get();
        $data['task3'] = DB::table('tasks')->where('task_status', 'completed')->get();
        return view('tasks/tasks', $data);
    }

    public function view_task($id)
    {
        $data['tasks'] = Task::find($id);
        $data['types'] = TaskTypes::get();
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
            'content'           => 'required|min:100',
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
            $task->content          = $request->get('content');
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
 
            return redirect('/tasks')->with('success', 'Task is Successfully Saved');
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
            'content'           => 'required|min:100',
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
            $task->content          = $request->get('content');
            $task->estimated_hours  = $request->get('hours');
            $task->created          = \Auth::user()->id;

            $task->save();

            DB::commit();
            //dd($task->task_status);
 
            return redirect('/tasks')->with('success', 'Task is Successfully Updated');
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('tasks/update')->withInput()->with('error','Something Went Wrong!');
        }  
    } 

    public function destroy_task($id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->delete();

        return redirect::to('/tasks')->with('success', 'Task is successfully deleted');
    }
}
