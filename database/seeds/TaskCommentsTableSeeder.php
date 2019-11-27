<?php

use Illuminate\Database\Seeder;
use App\TaskComment;

class TaskCommentsTableSeeder extends Seeder
{
    public function run()
    {
        $task_comment = [
            [
                'task_id'      =>  '5',
                'user_id'      =>  '4',
                'comments'     =>  'comment 1 into electronic typesetting, remaining essentially unchanged. 
                It was popularised in the 1960s with the release of Letraset sheets 
                containing Lorem Ipsum passages, and more recently as opposed to using',
                'created_at'   =>   '2019-11-26 06:23:26',
            ],

            [
                'task_id'      =>  '5',
                'user_id'      =>  '5',
                'comments'     =>  'comment 2 into electronic typesetting, remaining essentially unchanged. 
                It was popularised in the 1960s with the release of Letraset sheets 
                containing Lorem Ipsum passages, and more recently as opposed to using',
                'created_at'   =>   '2019-11-26 06:25:26',
            ],

            [
                'task_id'      =>  '5',
                'user_id'      =>  '4',
                'comments'     =>  'comment 3 into electronic typesetting, remaining essentially unchanged. 
                It was popularised in the 1960s with the release of Letraset sheets 
                containing Lorem Ipsum passages, and more recently as opposed to using',
                'created_at'   =>   '2019-11-26 06:24:26',
            ],

            [
                'task_id'      =>  '6',
                'user_id'      =>  '5',
                'comments'     =>  'comment 1 into electronic typesetting, remaining essentially unchanged. 
                It was popularised in the 1960s with the release of Letraset sheets 
                containing Lorem Ipsum passages, and more recently as opposed to using',
                'created_at'   =>   '2019-11-26 06:55:26',
            ],

            [
                'task_id'      =>  '6',
                'user_id'      =>  '6',
                'comments'     =>  'comment 2 into electronic typesetting, remaining essentially unchanged. 
                It was popularised in the 1960s with the release of Letraset sheets 
                containing Lorem Ipsum passages, and more recently as opposed to using',
                'created_at'   =>   '2019-11-26 06:56:26',
            ],

            [
                'task_id'      =>  '6',
                'user_id'      =>  '5',
                'comments'     =>  'comment 3 into electronic typesetting, remaining essentially unchanged. 
                It was popularised in the 1960s with the release of Letraset sheets 
                containing Lorem Ipsum passages, and more recently as opposed to using',
                'created_at'   =>   '2019-11-26 06:54:26',
            ],
        ];
            
        TaskComment::insert($task_comment);
    }
}
