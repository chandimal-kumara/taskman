<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = 
        [
            [
            'task_code'        =>   'WEB00001',
            'title'            =>   'This is first seed?',
            'type'             =>   'web development',
            'priority'         =>   'low',
            'description'      =>   'into electronic typesetting, remaining essentially unchanged. 
                                    It was popularised in the 1960s with the release of Letraset sheets 
                                    containing Lorem Ipsum passages, and more recently as opposed to using, 
                                    making it look like readable English. Many desktop publishing packages 
                                    and web page editors now use Lorem Ipsum as their default model text, ', 
            'content'          =>   'All the Lorem Ipsum generators on the Internet tend to repeat predefined 
                                    chunks as necessary, making this the first true generator on the Internet. 
                                    It uses a dictionary of over 200 Latin words, combined with a handful of model 
                                    sentence structures, to generate Lorem Ipsum which looks reasonable. The generated 
                                    Lorem Ipsum is therefore always. It uses a dictionary of over 200 Latin words, 
                                    combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. 
                                    The generated Lorem Ipsum is therefore always free from repetition, 
                                    injected humour, or non-characteristic words etc.',
            'estimated_hours'  =>  50,
            'task_status'      =>  'created',
            ],

            [
            'task_code'        =>   'NET00002',
            'title'            =>   'Why do we use it?',
            'type'             =>   'networking',
            'priority'         =>   'medium',
            'description'      =>   'into electronic typesetting, remaining essentially unchanged. 
                                    It was popularised in the 1960s with the release of Letraset sheets 
                                    containing Lorem Ipsum passages, and more recently as opposed to using, 
                                    making it look like readable English. Many desktop publishing packages 
                                    and web page editors now use Lorem Ipsum as their default model text, ', 
            'content'          =>   'All the Lorem Ipsum generators on the Internet tend to repeat predefined 
                                    chunks as necessary, making this the first true generator on the Internet. 
                                    It uses a dictionary of over 200 Latin words, combined with a handful of model 
                                    sentence structures, to generate Lorem Ipsum which looks reasonable. The generated 
                                    Lorem Ipsum is therefore always. It uses a dictionary of over 200 Latin words, 
                                    combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. 
                                    The generated Lorem Ipsum is therefore always free from repetition, 
                                    injected humour, or non-characteristic words etc.',
            'estimated_hours'  =>  75,
            'task_status'      =>  'created',
            ],

            [
            'task_code'        =>   'SFT00003',
            'title'            =>   'What is Lorem Ipsum?',
            'type'             =>   'softwear development',
            'priority'         =>   'high',
            'description'      =>   'into electronic typesetting, remaining essentially unchanged. 
                                    It was popularised in the 1960s with the release of Letraset sheets 
                                    containing Lorem Ipsum passages, and more recently as opposed to using, 
                                    making it look like readable English. Many desktop publishing packages 
                                    and web page editors now use Lorem Ipsum as their default model text, ', 
            'content'          =>   'All the Lorem Ipsum generators on the Internet tend to repeat predefined 
                                    chunks as necessary, making this the first true generator on the Internet. 
                                    It uses a dictionary of over 200 Latin words, combined with a handful of model 
                                    sentence structures, to generate Lorem Ipsum which looks reasonable. The generated 
                                    Lorem Ipsum is therefore always. It uses a dictionary of over 200 Latin words, 
                                    combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. 
                                    The generated Lorem Ipsum is therefore always free from repetition, 
                                    injected humour, or non-characteristic words etc.',
            'estimated_hours'  =>  150,
            'task_status'      =>  'created',
            ],

            [
            'task_code'        =>   'HRD00004',
            'title'            =>   'Where can I get some?',
            'type'             =>   'hardware',
            'priority'         =>   'medium',
            'description'      =>   'into electronic typesetting, remaining essentially unchanged. 
                                    It was popularised in the 1960s with the release of Letraset sheets 
                                    containing Lorem Ipsum passages, and more recently as opposed to using, 
                                    making it look like readable English. Many desktop publishing packages 
                                    and web page editors now use Lorem Ipsum as their default model text, ', 
            'content'          =>   'All the Lorem Ipsum generators on the Internet tend to repeat predefined 
                                    chunks as necessary, making this the first true generator on the Internet. 
                                    It uses a dictionary of over 200 Latin words, combined with a handful of model 
                                    sentence structures, to generate Lorem Ipsum which looks reasonable. The generated 
                                    Lorem Ipsum is therefore always. It uses a dictionary of over 200 Latin words, 
                                    combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. 
                                    The generated Lorem Ipsum is therefore always free from repetition, 
                                    injected humour, or non-characteristic words etc.',
            'estimated_hours'  =>  100,
            'task_status'      =>  'assigned',
            ],

            [
            'task_code'        =>   'NET00005',
            'title'            =>   'Why do we use it?',
            'type'             =>   'networking',
            'priority'         =>   'low',
            'description'      =>   'into electronic typesetting, remaining essentially unchanged. 
                                    It was popularised in the 1960s with the release of Letraset sheets 
                                    containing Lorem Ipsum passages, and more recently as opposed to using, 
                                    making it look like readable English. Many desktop publishing packages 
                                    and web page editors now use Lorem Ipsum as their default model text, ', 
            'content'          =>   'All the Lorem Ipsum generators on the Internet tend to repeat predefined 
                                    chunks as necessary, making this the first true generator on the Internet. 
                                    It uses a dictionary of over 200 Latin words, combined with a handful of model 
                                    sentence structures, to generate Lorem Ipsum which looks reasonable. The generated 
                                    Lorem Ipsum is therefore always. It uses a dictionary of over 200 Latin words, 
                                    combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. 
                                    The generated Lorem Ipsum is therefore always free from repetition, 
                                    injected humour, or non-characteristic words etc.',
            'estimated_hours'  =>  60,
            'task_status'      =>  'assigned',
            ],

            [
            'task_code'        =>   'WEB00006',
            'title'            =>   'Where does it come from?',
            'type'             =>   'web development',
            'priority'         =>   'low',
            'description'      =>   'into electronic typesetting, remaining essentially unchanged. 
                                    It was popularised in the 1960s with the release of Letraset sheets 
                                    containing Lorem Ipsum passages, and more recently as opposed to using, 
                                    making it look like readable English. Many desktop publishing packages 
                                    and web page editors now use Lorem Ipsum as their default model text, ', 
            'content'          =>   'All the Lorem Ipsum generators on the Internet tend to repeat predefined 
                                    chunks as necessary, making this the first true generator on the Internet. 
                                    It uses a dictionary of over 200 Latin words, combined with a handful of model 
                                    sentence structures, to generate Lorem Ipsum which looks reasonable. The generated 
                                    Lorem Ipsum is therefore always. It uses a dictionary of over 200 Latin words, 
                                    combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. 
                                    The generated Lorem Ipsum is therefore always free from repetition, 
                                    injected humour, or non-characteristic words etc.',
            'estimated_hours'  =>  80,
            'task_status'      =>  'assigned',
            ],

            [
            'task_code'        =>   'SFT00007',
            'title'            =>   'What is Lorem Ipsum?',
            'type'             =>   'softwear development',
            'priority'         =>   'low',
            'description'      =>   'into electronic typesetting, remaining essentially unchanged. 
                                    It was popularised in the 1960s with the release of Letraset sheets 
                                    containing Lorem Ipsum passages, and more recently as opposed to using, 
                                    making it look like readable English. Many desktop publishing packages 
                                    and web page editors now use Lorem Ipsum as their default model text, ', 
            'content'          =>   'All the Lorem Ipsum generators on the Internet tend to repeat predefined 
                                    chunks as necessary, making this the first true generator on the Internet. 
                                    It uses a dictionary of over 200 Latin words, combined with a handful of model 
                                    sentence structures, to generate Lorem Ipsum which looks reasonable. The generated 
                                    Lorem Ipsum is therefore always. It uses a dictionary of over 200 Latin words, 
                                    combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. 
                                    The generated Lorem Ipsum is therefore always free from repetition, 
                                    injected humour, or non-characteristic words etc.',
            'estimated_hours'  =>  120,
            'task_status'      =>  'completed',
            ],

            [
            'task_code'        =>   'HRD00008',
            'title'            =>   'Where does it come from?',
            'type'             =>   'hardware',
            'priority'         =>   'medium',
            'description'      =>   'into electronic typesetting, remaining essentially unchanged. 
                                    It was popularised in the 1960s with the release of Letraset sheets 
                                    containing Lorem Ipsum passages, and more recently as opposed to using, 
                                    making it look like readable English. Many desktop publishing packages 
                                    and web page editors now use Lorem Ipsum as their default model text, ', 
            'content'          =>   'All the Lorem Ipsum generators on the Internet tend to repeat predefined 
                                    chunks as necessary, making this the first true generator on the Internet. 
                                    It uses a dictionary of over 200 Latin words, combined with a handful of model 
                                    sentence structures, to generate Lorem Ipsum which looks reasonable. The generated 
                                    Lorem Ipsum is therefore always. It uses a dictionary of over 200 Latin words, 
                                    combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. 
                                    The generated Lorem Ipsum is therefore always free from repetition, 
                                    injected humour, or non-characteristic words etc.',
            'estimated_hours'  =>  90,
            'task_status'      =>  'completed',
            ],
        ];
            
        Task::insert($task);
    }
}
