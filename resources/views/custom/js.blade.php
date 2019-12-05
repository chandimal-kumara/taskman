<script type="text/javascript">

// fade out alert
window.setTimeout(function() {
      $(".message").fadeTo(1000, 0).slideUp(1000, function(){
          $(this).remove(); 
      });
  }, 3000);

// select2 modal dropdown issue fixed
$('#mySelect2').select2({
      dropdownParent: $('#assign-task')
  });

// delete modal script
$(document).on("click", ".deleteTask", function () {        
    var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    $("#deleteForm").attr('action', url);
    $('#taskId').text(task_code);
  });
  
// assign modal script
$(document).on("click", ".assignTask", function () {        
    var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(task_code);
    $("#assignForm").attr('action', url);
    $('#assign_task_code').text(task_code);
    $('#assign_task_title').text(title);
  });

// accept modal script
$(window).bind("load", function() {
  $(document).on("click", ".acceptTask", function () {        
      //var url = $(this).data('url');
      var task_code = $(this).data('task_code');
      var title = $(this).data('title');
      //alert(title);
      //$("#acceptForm").attr('action', url);
      $('#accept_task_code').text(task_code);
      $('#accept_task_title').text(title);
  });
});

// cancel modal script
$(window).bind("load", function() {
  $(document).on("click", ".cancelTask", function () {        
      //var url = $(this).data('url');
      var task_code = $(this).data('task_code');
      var title = $(this).data('title');
      //alert(title);
      //$("#acceptForm").attr('action', url);
      $('#cancel_task_code').text(task_code);
      $('#cancel_task_title').text(title);
  });
});

// complete modal script
$(window).bind("load", function() {
  $(document).on("click", ".completeTask", function () {        
    //var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(title);
    //$("#action2Form").attr('action', url);
    $('#complete_task_code').text(task_code);
    $('#complete_task_title').text(title);
  });
});

// onhold modal script
$(window).bind("load", function() {
  $(document).on("click", ".onholdTask", function () {        
    //var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(title);
    //$("#action2Form").attr('action', url);
    $('#onhold_task_code').text(task_code);
    $('#onhold_task_title').text(title);
  });
});

// unhold modal script
$(document).on("click", ".unholdTask", function () {        
    //var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(title);
    //$("#unholdForm").attr('action', url);
    $('#unhold_task_code').text(task_code);
    $('#unhold_task_title').text(title);
  });

// reassign modal script
$(document).on("click", ".reassignTask", function () {        
    //var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(title);
    //$("#reassignForm").attr('action', url);
    $('#reassign_task_code').text(task_code);
    $('#reassign_task_title').text(title);
  });

// add comment modal script
$(window).bind("load", function() {
  $(document).on("click", ".addComment", function () {        
    //var url = $(this).data('url');
    var task_id = $(this).data('task_id');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(title);
    //$("#addComment").attr('action', url);
    $('#add_comment_task_id').text(task_id);
    $('#add_comment_task_code').text(task_code);
    $('#add_comment_task_title').text(title);
  });
});

</script>