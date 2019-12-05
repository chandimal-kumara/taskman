
<!-- / delete modal-->
<div class="modal fade stick-up" id="delete-task" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="post" id="deleteForm">
        <div class="modal-header clearfix ">              
          <h4 class="p-b-5"><span class="semi-bold">Delete</span> Confirmation</h4>
          <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
        </div>
        <div class="modal-body">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
          <p>Are you sure want to delete <span class="bold">Task ID : <span id="taskId"></span></span></p>                  
        </div>
        <div class="modal-footer">
            <!-- <input type="hidden" name="task_id" id="task_id" value=""> -->
            <button type="submit" class="btn btn-danger">Yes, Delete It</button>
            <button type="button" name="" class="btn btn-primary" data-dismiss="modal">No, Keep It</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!--assign Modal -->
<div class="modal fade slide-up disable-scroll" id="assign-task" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog ">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
          <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
          <h4>Please select User for <span class="semi-bold">Assign this Task</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div><br>
        <div class="modal-body">
          <form action="" method="post" id="assignForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group-attached">
              <div class="row">
                <div class="col-md-4">
                  <div class=" ">
                    <label><b>Task ID :</b></label>
                    <!-- <span id="taskId"></span> -->
                    <span id="assign_task_code"></span>  
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="">
                    <label><b>Task Name :</b></label>
                    <span id="assign_task_title"></span>                    
                  </div>
                </div>
              </div><br>
              <div class="row">
                <div class="col-md-9 m-b-10">          
                  <div class="form-group form-group-default form-group-default-select2">
                    <!-- <label style="color:black;font-weight:bold;">Assign Task</label> -->
                    <select id="mySelect2" class="full-width" name="user" data-init-plugin="select2" required>
                      <option value="">- Select User -</option>
                    @foreach($users as $user)
                      <option value="{{ $user->id }}"> {{ $user->user_id }} </option>
                    @endforeach
                    </select> 
                  </div>
                </div>
                <div class="col-md-3 m-b-10">
                  <div class="pull-right">
                    <button style="height:55px;" type="submit" name="submit" class="btn btn-success">Assign Now</button>
                  </div>
                </div>    
              </div>
            </div>           
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->

<!--accept Modal -->
<div class="modal fade slide-up disable-scroll" id="accept-task" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog ">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
        <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>        
          <h4>Do you want to <span class="semi-bold">Accept this Task</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div><br>
        <div class="modal-body">
          <form action="{{ route('task.accept_task', $task->id) }}" method="post" id="acceptForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group-attached">
              <div class="row">
                <div class="col-md-4">
                  <div class=" ">
                    <label><b>Task ID :</b></label>
                    <!-- <span id="taskId"></span> -->
                    <span id="accept_task_code"></span>                                
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="">
                    <label><b>Task Name :</b></label>
                    <span id="accept_task_title"></span>               
                  </div>
                </div>
              </div><br>              
              <div class="pull-right">
                <button type="submit" class="btn btn-success">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              </div>              
            </div>           
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->

<!--cancel Modal -->
<div class="modal fade slide-up disable-scroll" id="cancel-task" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog ">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
        <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>        
          <h4>Do you want to <span class="semi-bold">Cancel this Task</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div><br>
        <div class="modal-body">
          <form action="{{ route('task.cancel_task', $task->id) }}" method="post" id="cancelForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group-attached">
              <div class="row">
                <div class="col-md-4">
                  <div class=" ">
                    <label><b>Task ID :</b></label>
                    <!-- <span id="taskId"></span> -->
                    <span id="cancel_task_code"></span>                                
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="">
                    <label><b>Task Name :</b></label>
                    <span id="cancel_task_title"></span>               
                  </div>
                </div>
              </div><br>              
              <div class="pull-right">
                <button type="submit" class="btn btn-success">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              </div>              
            </div>           
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->

<!--complete Modal -->
<div class="modal fade slide-up disable-scroll" id="complete-task" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
        <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>        
          <h4>Do you want to <span class="semi-bold">Complete this Task</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div><br>
        <div class="modal-body">
          <form action="{{ route('task.complete_task', $task->id) }}" method="post" id="completeForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group-attached">
              <div class="row">
                <div class="col-md-4">
                  <div class=" ">
                    <label><b>Task ID :</b></label>
                    <!-- <span id="taskId"></span> -->
                    <span id="complete_task_code"></span>                                
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="">
                    <label><b>Task Name :</b></label>
                    <span id="complete_task_title"></span>               
                  </div>
                </div>
              </div><br>              
              <div class="pull-right">
                <button type="submit" class="btn btn-success">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>               
              </div>              
            </div>           
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->

<!--onhold Modal -->
<div class="modal fade slide-up disable-scroll" id="onhold-task" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
        <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>        
          <h4>Do you want to <span class="semi-bold">Hold this Task</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div><br>
        <div class="modal-body">
          <form action="{{ route('task.onhold_task', $task->id) }}" method="post" id="onholdForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group-attached">
              <div class="row">
                <div class="col-md-4">
                  <div class=" ">
                    <label><b>Task ID :</b></label>
                    <!-- <span id="taskId"></span> -->
                    <span id="onhold_task_code"></span>                                
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="">
                    <label><b>Task Name :</b></label>
                    <span id="onhold_task_title"></span>               
                  </div>
                </div>
              </div><br>              
              <div class="pull-right">
                <button type="submit" class="btn btn-success">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>               
              </div>              
            </div>           
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->

<!--unhold Modal -->
<div class="modal fade slide-up disable-scroll" id="unhold-task" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog ">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
        <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>        
          <h4>Do you want to <span class="semi-bold">Unhold this Task</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div><br>
        <div class="modal-body">
          <form action="{{ route('task.unhold_task', $task->id) }}" method="post" id="unholdForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group-attached">
              <div class="row">
                <div class="col-md-4">
                  <div class=" ">
                    <label><b>Task ID :</b></label>
                    <!-- <span id="taskId"></span> -->
                    <span id="unhold_task_code"></span>                                
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="">
                    <label><b>Task Name :</b></label>
                    <span id="unhold_task_title"></span>               
                  </div>
                </div>
              </div><br>              
              <div class="pull-right">
                <button type="submit" class="btn btn-success">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>     
              </div>              
            </div>           
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->

<!--reassign Modal -->
<div class="modal fade slide-up disable-scroll" id="reassign-task" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog ">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
        <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
          <h4>Do you want to <span class="semi-bold">Reassign this Task</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div><br>
        <div class="modal-body">
          <form action="{{ route('task.reassign_task', $task->id) }}" method="post" id="reassignForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group-attached">
              <div class="row">
                <div class="col-md-4">
                  <div class=" ">
                    <label><b>Task ID :</b></label>
                    <!-- <span id="taskId"></span> -->
                    <span id="reassign_task_code"></span>  
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="">
                    <label><b>Task Name :</b></label>
                    <span id="reassign_task_title"></span>                    
                  </div>
                </div>
              </div><br>
              <div class="pull-right">
                <button type="submit" class="btn btn-success">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>   
              </div>
            </div>           
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->

<!--add comment Modal -->
<div class="modal fade slide-up disable-scroll" id="add-comment" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog ">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
          <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>        
          <h4 class="m-b-25">Add your <span class="semi-bold">comment</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div>
        <div class="modal-body">
          <form action="{{ route('taskComment.save_comment') }}" method="post" id="addComment">
          {{ csrf_field() }}
          {{ method_field('POST') }}
            <div class="form-group-attached"></div> 
              <div class="row m-b-20">
                <div class="col-md-12">
                  <label><b>Comment :</b></label>
                  <div class="form-group required @error('comment') has-error @enderror">
                    <textarea class="form-control" style="height:100px;" name="comment" id="comment" placeholder="Type your Comment...." required>{{ old('comment') }}</textarea>
                    @error('comment')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
                  </div>
                </div>
                <input type="hidden" id="add_comment_task_id" value="{{ $task->id }}" name="task_id">
              </div>              
              <div class="pull-right">
                <button type="submit" name="submit" class="btn btn-complete">Add Comment</button>            
              </div>              
            </div>           
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->