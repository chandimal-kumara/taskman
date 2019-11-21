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
                'type'             =>   'WEB',
                'priority'         =>   'LW',
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
                'created'          =>  1,
                'assign'           =>  null,
                'task_status'      =>  'created',
            ],

            [
                'task_code'        =>   'NET00002',
                'title'            =>   'Why do we use it?',
                'type'             =>   'NET',
                'priority'         =>   'MD',
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
                'created'          =>  2,
                'assign'           =>  null,
                'task_status'      =>  'created',
            ],

            [
                'task_code'        =>   'SFT00003',
                'title'            =>   'What is Lorem Ipsum?',
                'type'             =>   'SFT',
                'priority'         =>   'HG',
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
                'created'          =>  3,
                'assign'           =>  1,
                'task_status'      =>  'pending',
            ],

            [
                'task_code'        =>   'HRD00004',
                'title'            =>   'Where can I get some?',
                'type'             =>   'HRD',
                'priority'         =>   'MD',
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
                'created'          =>  1,
                'assign'           =>  2,
                'task_status'      =>  'pending',
            ],

            [
                'task_code'        =>   'NET00005',
                'title'            =>   'Why do we use it?',
                'type'             =>   'NET',
                'priority'         =>   'LW',
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
                'created'          =>  2,
                'assign'           =>  1,
                'task_status'      =>  'active',
            ],

            [
                'task_code'        =>   'WEB00006',
                'title'            =>   'Where does it come from?',
                'type'             =>   'WEB',
                'priority'         =>   'LW',
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
                'created'          =>  3,
                'assign'           =>  2,
                'task_status'      =>  'active',
            ],

            [
                'task_code'        =>   'SFT00007',
                'title'            =>   'What is Lorem Ipsum?',
                'type'             =>   'SFT',
                'priority'         =>   'MD',
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
                'estimated_hours'  =>  135,
                'created'          =>  2,
                'assign'           =>  3,
                'task_status'      =>  'onhold',
            ],

            [
                'task_code'        =>   'SFT00008',
                'title'            =>   'What is Lorem Ipsum?',
                'type'             =>   'NET',
                'priority'         =>   'HG',
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
                'created'          =>  1,
                'assign'           =>  2,
                'task_status'      =>  'onhold',
            ],

            [
                'task_code'        =>   'SFT00009',
                'title'            =>   'What is Lorem Ipsum?',
                'type'             =>   'WEB',
                'priority'         =>   'MD',
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
                'estimated_hours'  =>  135,
                'created'          =>  2,
                'assign'           =>  6,
                'task_status'      =>  'rejected',
            ],

            [
                'task_code'        =>   'SFT00010',
                'title'            =>   'What is Lorem Ipsum?',
                'type'             =>   'NET',
                'priority'         =>   'HG',
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
                'created'          =>  4,
                'assign'           =>  5,
                'task_status'      =>  'rejected',
            ],

            [
                'task_code'        =>   'SFT00011',
                'title'            =>   'What is Lorem Ipsum?',
                'type'             =>   'SFT',
                'priority'         =>   'LW',
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
                'created'          =>  1,
                'assign'           =>  3,
                'task_status'      =>  'completed',
            ],

            [
                'task_code'        =>   'HRD00012',
                'title'            =>   'Where does it come from?',
                'type'             =>   'HRD',
                'priority'         =>   'MD',
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
                'created'          =>  2,
                'assign'           =>  3,
                'task_status'      =>  'completed',
            ],
        ];
            
        Task::insert($task);
    }
}
