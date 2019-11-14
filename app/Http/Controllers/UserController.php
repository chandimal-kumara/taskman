<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use DB;
use Validator;
use App\Http\Controllers\Auth;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function users()
    {
        $data['users'] = User::get();
        return view('users/users', $data);
    }

    public function add_user()
    {
        return view('users/add_user');
    }

    public function edit_user($id)
    {
        $data['users'] = User::find($id);
        return view('users/edit_user', $data);
    }

    public function edit_pass($id)
    {
        $data['users'] = User::find($id);
        return view('users/edit_pass', $data);
    }

    public function save_user( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'name'              => 'required|string',
            'type'              => 'required|not_in:Choose...',
            'email'             => 'required|email',
            'status'            => 'required',
            'password'          => 'min:8|required_with:confirm_password|same:confirm_password', 
            'confirm_password'  => 'required|min:8',
        ]);
        
        if($validator->fails())
        {
           // dd($validator);
            return redirect::to('/users/add_user')->withErrors($validator)->withInput()->with('error', 'Please Check Validation Requirments');
        }

        DB::beginTransaction(); 
        
        try
        {
            $user = new User();
            $user->name          = $request->get('name');
            $user->type          = $request->get('type');
            $user->email         = $request->get('email');
            $user->status        = $request->get('status');
            $user->password      = Hash::make($request->get('password'));
            $user->save();

            DB::commit();
 
            return redirect('/users')->with('success', 'User is Successfully Saved');
        }
        catch(\Exception $e)
        {
            //dd($e->getMessage());
            DB::rollback();
            return redirect('/users/add_user')->withInput()->with('error','Something Went Wrong!');
        }
    }

    public function update_user( Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

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
        }  
    } 

    public function destroy_user($id)
    {
        $user = User::findOrFail($id);
        $user ->delete();

        return redirect::to('/users')->with('success', 'User is successfully deleted');
    } 

    public function update_pass(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'old_password'      => 'required',
            'new_password'      => 'min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password'  => 'required|min:8',
        ]);
        
        if($validator->fails())
        {
           //dd($validator);
           // return redirect::to('/users/edit_pass')->withErrors($validator)->with('error', 'Please Check Validation Requirments');
        }

        DB::beginTransaction(); 
        
        try
        {
            $user = User::find($id);

           /*  if($user->password != Hash::make($request->get('password')))
            {
                return redirect::to('/users/edit_pass')->withErrors($validator)->withInput()->with('error', 'Entered old password wrong');
            }

            elseif($request->get('old_password') == $request->get('new_password'))
            {
                return redirect::to('/users/edit_pass')->withErrors($validator)->withInput()->with('error', 'You Entered old password');
            }
            else 
            { */
                $user->password    = Hash::make($request->get('new_password'));
                $user->save();

                DB::commit();
 
                return redirect('/users')->with('success', 'Password is Successfully Updated');
            // }
        }
        catch(\Exception $e)
        {
            //dd($e->getMessage());
            DB::rollback();
            return redirect('users/edit_pass')->withInput()->with('error','Something Went Wrong!');
        }
    }
}
