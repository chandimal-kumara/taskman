<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\TaskTypes;
use DB;
use App\Http\Controllers\Auth;

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
        $data['new_tasks']      =   DB::table('tasks')->where('task_status', 'new')->latest()->paginate(5); 
        return view('tasks/manager_view/new_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }

    public function dispatched_tasks()
    {
        $data['types']              =   TaskTypes::all();
        $data['users']              =   User::all();  
        $data['tabName']            =   'assigned';                                               
        $data['dispatched_tasks']   =   DB::table('tasks')->where('task_status', '=', 'assigned')->orWhere('task_status', '=', 'completed')->orWhere('task_status', '=', 'cancelled')->latest()->paginate(5);    

        return view('tasks/manager_view/dispatched_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }
}
