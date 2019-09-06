//---------------------------------------
//TODOLIST.PHP
//---------------------------------------
//GENERATE TODOLIST ON DOCUMENT LOAD
$(document).ready(function(){
  $.ajax({
    url:"../php/todolist-function.php",
    type:"POST",
    data:{userID:userID,getTodolist:true},
    success:function(result){
      var todolist = JSON.parse(result);
      for(var data in todolist){
        if(todolist[data].checked == 0){
          $('#non-completed-todolist').append('<li class="list-group-item d-flex justify-content-between align-items-center rounded-0">'+todolist[data].todoitem+'<span class="badge badge-pill"><button type="button" id="'+todolist[data].todoid+'" class="btn btn-sm btn-info non-checked-button"><i class="fas fa-check"></i></button>&nbsp;<button type="button" id="'+todolist[data].todoid+'" class="btn btn-sm btn-danger delete-button" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></button></span></li>');
        }else{
          $('#completed-todolist').append('<li class="list-group-item d-flex justify-content-between align-items-center rounded-0">'+todolist[data].todoitem+'<span class="badge badge-pill"><button type="button" id="'+todolist[data].todoid+'" class="btn btn-sm btn-info checked-button"><i class="fas fa-times"></i></button>&nbsp;<button type="button" id="'+todolist[data].todoid+'" class="btn btn-sm btn-danger delete-button"  data-toggle="modal" data-target="#deleteModal" ><i class="fas fa-trash"></i></button></span></li>');
        }
      }
    }
  })
});
//MOVE COMPLETED TODOLIST TO THE COMPLETED SECTION
$(document).on('click','.non-checked-button',function(){
  var todotitle = $(this).closest('.list-group-item').text();
  var todoid = $(this).attr('id');
  $(this).closest('.list-group-item').remove();
  $('#completed-todolist').append('<li class="list-group-item d-flex justify-content-between align-items-center rounded-0">'+todotitle+'<span class="badge badge-pill"><button type="button" id="'+todoid+'" class="btn btn-sm btn-info checked-button"><i class="fas fa-times"></i></button>&nbsp;<button type="button" id="'+todoid+'" class="btn btn-sm btn-danger delete-button" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></button></span></li>');
  $.ajax({
    url:"../php/todolist-function.php",
    type:"POST",
    data:{todoID:todoid,checked:true}
  })
});
//MOVE NON COMPLETED TODOLIST TO THE NON COMPLETED SECTION
$(document).on('click','.checked-button',function(){
  var todotitle = $(this).closest('.list-group-item').text();
  console.log(todotitle);
  var todoid = $(this).attr('id');
  console.log(todoid);
  $(this).closest('.list-group-item').remove();
  $('#non-completed-todolist').append('<li class="list-group-item d-flex justify-content-between align-items-center rounded-0">'+todotitle+'<span class="badge badge-pill"><button type="button" id="'+todoid+'" class="btn btn-sm btn-info non-checked-button"><i class="fas fa-check"></i></button>&nbsp;<button type="button" id="'+todoid+'" class="btn btn-sm btn-danger delete-button" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></button></span></li>');
  $.ajax({
    url:"../php/todolist-function.php",
    type:"POST",
    data:{todoID:todoid,nonchecked:true}
  })
});
//GET TODOID APPEND VALUE TO DELETE MODAL
$(document).on('click','.delete-button',function(){
  var todoid = $(this).attr('id');
  $("#todoid").val(todoid);
});
//DELETE TODOLIST WHICH USER HAVE CHOSE
$(document).on('click','#delete-modal-button',function(){
  var todoid = $('#todoid').val();
  $.ajax({
    url:"../php/todolist-function.php",
    type:"POST",
    data:{todoID:todoid,deleted:true},
    success:function(result){
      var id = "#"+todoid;
      $(id).closest('.list-group-item').remove();
      $('#deleteModal').modal('hide');
    }
  })
});
//ADD TODOLIST TO NON COMPLETED SECTION
$(document).on('click','#addtodolist',function(){
  var todoitem = $('#todolistinput').val();
  if(todoitem == null || todoitem == ""){
    $('#empty-item-error').append('<div class="alert alert-danger alert-dismissible fade show" id="empty-item-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Todolist Item Cant Be Empty</div>');
  }else{
    $.ajax({
      url:"../php/todolist-function.php",
      type:"POST",
      data:{todolistinput:todoitem,addNewTodolist:true},
      success:function(result){
        var todoid = result;
        $('#non-completed-todolist').append('<li class="list-group-item d-flex justify-content-between align-items-center rounded-0">'+todoitem+'<span class="badge badge-pill"><button type="button" id="'+todoid+'" class="btn btn-sm btn-info non-checked-button"><i class="fas fa-check"></i></button>&nbsp;<button type="button" id="'+todoid+'" class="btn btn-sm btn-danger delete-button" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></button></span></li>');
      }
    })
  }
});
//INPUT ENTER TRIGGER ADDTODOLIST BUTTON
$('#todolistinput').keyup(function(e){
  e.preventDefault();
  if(e.keyCode === 13){
    $('#addtodolist').click();
  }
});
