<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\TaskTypes;
use DB;
use App\Http\Controllers\Auth;
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
        $data['assigned_tasks'] =   DB::table('tasks')->where('task_status', 'assigned')->latest()->paginate(5); 

        return view('tasks/my_view/assigned_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }

    public function active_tasks()
    {
        $data['types']          =   TaskTypes::all();
        $data['users']          =   User::all();        
        $data['tabName']        =   'active';        
        $data['active_tasks']   =   DB::table('tasks')->where('task_status', 'active')->latest()->paginate(5); 

        return view('tasks/my_view/active_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }

    public function onhold_tasks()
    {
        $data['types']          =   TaskTypes::all();
        $data['users']          =   User::all();            
        $data['tabName']        =   'onhold';    
        $data['onhold_tasks']   =   DB::table('tasks')->where('task_status', 'onhold')->latest()->paginate(5); 

        return view('tasks/my_view/onhold_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }

    public function cancelled_tasks()
    {
        $data['types']              =   TaskTypes::all();
        $data['users']              =   User::all();         
        $data['tabName']            =   'cancelled';       
        $data['cancelled_tasks']    =   DB::table('tasks')->where('task_status', 'cancelled')->latest()->paginate(5); 

        return view('tasks/my_view/cancelled_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }

    public function completed_tasks()
    {
        $data['types']              =   TaskTypes::all();
        $data['users']              =   User::all();     
        $data['tabName']            =   'completed';           
        $data['completed_tasks']    =   DB::table('tasks')->where('task_status', 'completed')->latest()->paginate(5); 

        return view('tasks/my_view/completed_tasks', $data)->with('i', (request()->input('page', 1) - 1) * 10);        
    }
}
