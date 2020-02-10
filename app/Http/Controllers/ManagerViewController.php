<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\TaskTypes;
use DB;
use Auth;

class ManagerViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new_tasks()
    {
        $data['types']          =   TaskTypes::all();
        $data['users']          =   User::all();
        $data['tabName']        =   'new';                 
        $data['new_tasks']      =   Task::where([['task_status', '=', 'new'],['created', '=', Auth::user()->id],])->latest()->paginate(5); 

        return view('tasks/manager_view/new_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }

    public function dispatched_tasks()
    {
        $data['types']              =   TaskTypes::all();
        $data['users']              =   User::all();  
        $data['tabName']            =   'assigned';                                               
        //$data['dispatched_tasks']   =   Task::where('task_status', '=', 'assigned')->orWhere('task_status', '=', 'active')->orWhere('task_status', '=', 'cancelled')->orWhere('task_status', '=', 'onhold')->latest()->paginate(5);    
        $data['dispatched_tasks']   =   Task::where([['task_status', '=', 'assigned'], ['created', '=', Auth::user()->id]])
                                        ->orWhere([['task_status', '=', 'active'], ['created', '=', Auth::user()->id]])
                                        ->orWhere([['task_status', '=', 'cancelled'], ['created', '=', Auth::user()->id]])
                                        ->orWhere([['task_status', '=', 'onhold'], ['created', '=', Auth::user()->id]])
                                        ->latest()->paginate(5);    

        return view('tasks/manager_view/dispatched_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }
}
