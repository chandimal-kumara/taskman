<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    public function run()
    {
        $task = 
        [
            [
                'task_code'        =>   'WEB00001',
                'title'            =>   'This is first seed?',
                'department'       =>   3,
                'type'             =>   'WEB',
                'priority'         =>   'LW',
                'description'      =>   'into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 
                'estimated_hours'  =>  50,
                'created'          =>  1,
                'assign'           =>  null,
                'task_status'      =>  'new', 
                'created_at'       =>  '2000-01-01 00:00:00',
                'updated_at'       =>  '2001-01-01 00:00:00',               
            ],

            [
                'task_code'        =>   'NET00002',
                'title'            =>   'Why do we use it?',
                'department'       =>   3,
                'type'             =>   'NET',
                'priority'         =>   'MD',
                'description'      =>   'into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 
                'estimated_hours'  =>  75,
                'created'          =>  2,
                'assign'           =>  null,
                'task_status'      =>  'new',
                'created_at'       =>  '2000-01-01 00:00:00',
                'updated_at'       =>  '2001-01-01 00:00:00',
            ],

            [
                'task_code'        =>   'SFT00003',
                'title'            =>   'What is Lorem Ipsum?',
                'department'       =>   3,
                'type'             =>   'SFT',
                'priority'         =>   'HG',
                'description'      =>   'into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 
                'estimated_hours'  =>  150,
                'created'          =>  3,
                'assign'           =>  1,
                'task_status'      =>  'assigned',
                'created_at'       =>  '2000-01-01 00:00:00',
                'updated_at'       =>  '2001-01-01 00:00:00',
            ],

            [
                'task_code'        =>   'HRD00004',
                'title'            =>   'Where can I get some?',
                'department'       =>   3,
                'type'             =>   'HRD',
                'priority'         =>   'MD',
                'description'      =>   'into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 
                'estimated_hours'  =>  100,
                'created'          =>  1,
                'assign'           =>  2,
                'task_status'      =>  'assigned',
                'created_at'       =>  '2000-01-01 00:00:00',
                'updated_at'       =>  '2001-01-01 00:00:00',
            ],

            [
                'task_code'        =>   'NET00005',
                'title'            =>   'Why do we use it?',
                'department'       =>   3,
                'type'             =>   'NET',
                'priority'         =>   'LW',
                'description'      =>   'into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 
                'estimated_hours'  =>  60,
                'created'          =>  5,
                'assign'           =>  4,
                'task_status'      =>  'active',
                'created_at'       =>  '2000-01-01 00:00:00',
                'updated_at'       =>  '2001-01-01 00:00:00',
            ],

            [
                'task_code'        =>   'WEB00006',
                'title'            =>   'Where does it come from?',
                'department'       =>   3,
                'type'             =>   'WEB',
                'priority'         =>   'LW',
                'description'      =>   'into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 
                'estimated_hours'  =>  80,
                'created'          =>  6,
                'assign'           =>  5,
                'task_status'      =>  'active',
                'created_at'       =>  '2000-01-01 00:00:00',
                'updated_at'       =>  '2001-01-01 00:00:00',
            ],

            [
                'task_code'        =>   'SFT00007',
                'title'            =>   'What is Lorem Ipsum?',
                'department'       =>   3,
                'type'             =>   'SFT',
                'priority'         =>   'MD',
                'description'      =>   'into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 
                'estimated_hours'  =>  135,
                'created'          =>  2,
                'assign'           =>  3,
                'task_status'      =>  'onhold',
                'created_at'       =>  '2000-01-01 00:00:00',
                'updated_at'       =>  '2001-01-01 00:00:00',
            ],

            [
                'task_code'        =>   'SFT00008',
                'title'            =>   'What is Lorem Ipsum?',
                'department'       =>   3,
                'type'             =>   'NET',
                'priority'         =>   'HG',
                'description'      =>   'into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 
                'estimated_hours'  =>  90,
                'created'          =>  1,
                'assign'           =>  2,
                'task_status'      =>  'onhold',
                'created_at'       =>  '2000-01-01 00:00:00',
                'updated_at'       =>  '2001-01-01 00:00:00',
            ],

            [
                'task_code'        =>   'SFT00009',
                'title'            =>   'What is Lorem Ipsum?',
                'department'       =>   3,
                'type'             =>   'WEB',
                'priority'         =>   'MD',
                'description'      =>   'into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 
                'estimated_hours'  =>  135,
                'created'          =>  2,
                'assign'           =>  6,
                'task_status'      =>  'cancelled',
                'created_at'       =>  '2000-01-01 00:00:00',
                'updated_at'       =>  '2001-01-01 00:00:00',
            ],

            [
                'task_code'        =>   'SFT00010',
                'title'            =>   'What is Lorem Ipsum?',
                'department'       =>   3,
                'type'             =>   'NET',
                'priority'         =>   'HG',
                'description'      =>   'into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 
                'estimated_hours'  =>  120,
                'created'          =>  4,
                'assign'           =>  5,
                'task_status'      =>  'cancelled',
                'created_at'       =>  '2000-01-01 00:00:00',
                'updated_at'       =>  '2001-01-01 00:00:00',
            ],

            [
                'task_code'        =>   'SFT00011',
                'title'            =>   'What is Lorem Ipsum?',
                'department'       =>   3,
                'type'             =>   'SFT',
                'priority'         =>   'LW',
                'description'      =>   'into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 
                'estimated_hours'  =>  120,
                'created'          =>  1,
                'assign'           =>  3,
                'task_status'      =>  'completed',
                'created_at'       =>  '2000-01-01 00:00:00',
                'updated_at'       =>  '2001-01-01 00:00:00',
            ],

            [
                'task_code'        =>   'HRD00012',
                'title'            =>   'Where does it come from?',
                'department'       =>   3,
                'type'             =>   'HRD',
                'priority'         =>   'MD',
                'description'      =>   'into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 
                'estimated_hours'  =>  90,
                'created'          =>  2,
                'assign'           =>  5,
                'task_status'      =>  'completed',
                'created_at'       =>  '2000-01-01 00:00:00',
                'updated_at'       =>  '2001-01-01 00:00:00',
            ],
        ];
            
        Task::insert($task);
    }
}
