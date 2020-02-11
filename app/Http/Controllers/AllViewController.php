<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\TaskCatagory;
use DB;

class AllViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all_tasks(Request $request)
    {           
        $data['catagories']    =   TaskCatagory::all();
        $data['users']         =    User::all();        
        $task_search           =    $request->input('task_search');
        $data['task_search']   =    $task_search;

        $tasks = Task::select('*');

        if (isset($task_search) && $task_search != "")

            $tasks->orWhere(DB::raw("LOWER(task_code)"), 'LIKE', '%'.strtolower($task_search).'%')            
            ->orWhere(DB::raw("LOWER(title)"), 'LIKE', '%'.strtolower($task_search).'%'); 

            $tasks = $tasks->latest()->paginate(5)->appends(['task_search' => $task_search]);    

        return view('tasks/all_view/all_tasks', compact('tasks'), $data)
        ->with('i', (request()->input('page', 1) - 1) * 10);
    } 
}
