<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\TaskTypes;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;

class MyViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function assigned_tasks()
    {
        $data['types']          =   TaskTypes::all();
        $data['users']          =   User::all(); 
        $data['tabName']        =   'assigned';
        $data['assigned_tasks'] =   Task::where([['task_status', '=', 'assigned'],['assign', '=', Auth::user()->id],])->latest()->paginate(5);

        return view('tasks/my_view/assigned_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }

    public function active_tasks()
    {
        $data['types']          =   TaskTypes::all();
        $data['users']          =   User::all();        
        $data['tabName']        =   'active';        
        $data['active_tasks']   =   Task::where([['task_status', '=', 'active'],['assign', '=', Auth::user()->id],])->latest()->paginate(5); 

        return view('tasks/my_view/active_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }

    public function onhold_tasks()
    {
        $data['types']          =   TaskTypes::all();
        $data['users']          =   User::all();            
        $data['tabName']        =   'onhold';    
        $data['onhold_tasks']   =   Task::where([['task_status', '=', 'onhold'],['assign', '=', Auth::user()->id],])->latest()->paginate(5); 

        return view('tasks/my_view/onhold_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }

    public function cancelled_tasks()
    {
        $data['types']              =   TaskTypes::all();
        $data['users']              =   User::all();         
        $data['tabName']            =   'cancelled';       
        $data['cancelled_tasks']    =   Task::where([['task_status', '=', 'cancelled'],['assign', '=', Auth::user()->id],])->latest()->paginate(5); 

        return view('tasks/my_view/cancelled_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }

    public function completed_tasks()
    {
        $data['types']              =   TaskTypes::all();
        $data['users']              =   User::all();     
        $data['tabName']            =   'completed';           
        $data['completed_tasks']    =   Task::where([['task_status', '=', 'completed'],['created', '=', Auth::user()->id],])
                                        ->orWhere([['task_status', '=', 'completed'],['assign', '=', Auth::user()->id],])->latest()->paginate(5); 

        return view('tasks/my_view/completed_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }
}
