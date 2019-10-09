<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Task;
use App\User;
use DB;
use Validator;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* public function welcome()
    {
        return view('welcome');
    } */

    public function index()
    {
        return view('index');
        //return view('test');
    }

    public function tasks()
    {
        //$tasks = Task::where('task_status', 'created')->find();
        //$tasks = Task::all();
        $task1 = DB::table('tasks')->where('task_status', 'created')->get();
        $task2 = DB::table('tasks')->where('task_status', 'assigned')->get();
        $task3 = DB::table('tasks')->where('task_status', 'completed')->get();
        return view('tasks')->with('task1', $task1)->with('task2', $task2)->with('task3', $task3);
    }

    public function store( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|max:100',
            'description'   => 'required', 
            'content'       => 'required', 
        ]);
        
        if($validator->fails())
        {
            return redirect::to('/home')->withErrors($validator)->withInput()->with('error', 'Please Check Validation Requirments')->with('tabName', 'menu1');
        }

        DB::beginTransaction();

        try
        {
            $task = new Task();

            $task->title          = $request->get('title');
            $task->description    = $request->get('description');
            $task->content        = $request->get('content');
            $task->created        = \Auth::user()->id;
            $task->save();

            DB::commit();
            return redirect('/home')->with('success', 'Task Added Successfully')->with('tabName', 'home');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect::to('/home')->withInput()->with('error', 'Something Went Wrong')->with('tabName', 'menu1');
        }
    }

    public function destroy($id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->delete();

        return redirect::to('/tasks')->with('success', 'Task is successfully deleted');
    }
}
