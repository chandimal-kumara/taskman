<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TaskCatagory;
use Validator;
use DB;
use Auth;

class TaskCatagoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function task_catagories()
    {
        $data['task_catagories'] = TaskCatagory::get();
        return view('task_catagory/task_catagory', $data); 
    }

    public function add_task_catagory()
    {
        return view('task_catagory/add_task_catagory');
    }

    public function save_task_catagory ( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'code'              => 'required|string|unique:task_catagories|size:3|regex:/^[A-Za-z\s-]+$/',
            'name'              => 'required|string|max:35',
            'description'       => 'required'
        ]);
        
        if($validator->fails())
        {
           // dd($validator);
            return redirect::to('/task_catagories/add_catagory')->withErrors($validator)->withInput()->with('error', 'Please Check Validation Requirments');
        } 

        DB::beginTransaction(); 
        
        try
        {
            $task_catagory                = new TaskCatagory();

            $task_catagory->code          = strtoupper($request->get('code'));
            $task_catagory->name          = $request->get('name');
            $task_catagory->description   = $request->get('description');

            $task_catagory->save();

            DB::commit();
 
            return redirect('/task_catagories')->with('success', 'Task Catagory is added Successfully');
        }
        catch(\Exception $e)
        {
            //dd($e->getMessage());
            DB::rollback();
            return redirect('/task_catagories/add_catagory')->withInput()->with('error','Something Went Wrong!');
        } 
    }

    public function edit_task_catagory($id)
    {
       /*  $data['users'] = User::find($id);
        return view('users/edit_user', $data); */
    }

    public function update_task_catagory( Request $request, $id)
    {
/*         $validator = Validator::make($request->all(), [

            'name'              => 'required|string',
            'type'              => 'required|not_in:Choose...',
            'email'             => 'required|email',
            'status'            => 'required',
        ]);
        
        if($validator->fails())
        {
           // dd($validator);
            return redirect::to('/users/edit_user')->withErrors($validator)->withInput()->with('error', 'Please Check Validation Requirments');
        }

        DB::beginTransaction(); 
        
        try
        {
            $user = User::find($id);
            $user->name            = $request->get('name');
            $user->type            = $request->get('type');
            $user->email           = $request->get('email');
            $user->status          = $request->get('status');

            $user->save();

            DB::commit();
 
            return redirect('/users')->with('success', 'Task is Successfully Updated');
        }
        catch(\Exception $e)
        {
           // dd($e->getMessage());
            DB::rollback();
            return redirect('users/edit_user')->withInput()->with('error','Something Went Wrong!');
        }   */
    } 

    public function destroy_task_catagory($id)
    {
       /*  $user = User::findOrFail($id);
        $user ->delete();

        return redirect::to('/users')->with('success', 'User is successfully deleted'); */
    } 
}
