<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskComment;
use Validator;
use DB;

class TaskCommentController extends Controller
{
    public function save_comment( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'comment'             => 'required',
        ]);
        
        if($validator->fails())
        {
           // dd($validator);
           return back()->withErrors($validator)->withInput()->with('error', 'Please Check Validation Requirments');
        }

        DB::beginTransaction(); 
        
        try
        {
            $task_comment               = new TaskComment();
            $task_comment->comments     = $request->get('comment');
            $task_comment->task_id      = $request->get('task_id');
            $task_comment->user_id      = \Auth::user()->id;

            $task_comment->save(); 
              
            DB::commit();
 
            return back()->with('comment_added', 'Comment added Successfully');
        }
        catch(\Exception $e)
        {
            //dd($e->getMessage());
            DB::rollback();
            return back()->withInput()->with('error','Something Went Wrong!');
        }  
    }
}
