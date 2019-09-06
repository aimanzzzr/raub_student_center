//HIDE GROUP HEADER AND FORUM CONTAINER
$(document).ready(function(){
  $('#group-class').hide();
  $('#non-click-display').show();
});
//USER CLICK GROUP FORUM
$(document).on('click','.group-item',function(){
  var current = $('.header-group-name').attr("id");
  var forumid = $(this).attr("id");
  var forumpicsrc = "../images/sources/blank-user-icon.png";
  var forumname = "GROUP PROJECT GROUP";
  var error = false;
  $.ajax({
    url:"../php/forum-function.php",
    type:"POST",
    data:{forumid:forumid,getParticipant:true},
    success:function(result){
      var participant = JSON.parse(result);
      var participantlist = null;
      for(var data in participant){
        if(participant[data].name == null){
          error = true;
          break;
        }else{
          participantlist = participant[data].name;
        }
      }
      $.ajax({
        url:"../php/forum-function.php",
        type:"POST",
        data:{forumid:forumid,getForumInfo:true},
        success:function(result){
          var forum = JSON.parse(result);
          for(var data in forum){
            if(current!=forumid || current==null){
              $('#message-container').empty();
              $('#header-group-picture').attr('src',forum[data].forumpicsrc);
              $('.header-group-name').attr('id',forumid);
              $('.header-group-name').text(forum[data].forumname);
              if(error == false){
                $('#header-group-participant').text(participantlist);
              }
              getMessage(forumid);
              $('#hidden-forum-ID').val(forumid);
              $('#non-click-display').hide();
              $('.group-class').show();
              $('#group-class').show();
            }else{
              return 0;
            }
          }
        }
      })
    }
  })
});
//GET MESSAGE IN FORUM
function getMessage(forumid){
  var username = $('#username').val();
  $.ajax({
    url:"../php/forum-function.php",
    type:"POST",
    data:{forumid:forumid,getmessage:true},
    success:function(result){
      var message = JSON.parse(result);
      var date = "0000/00/00";
      for(var data in message){
        if(message[data].messageid == null){
          break;
        }else{
          if(message[data].date != date){
            $('#message-container').append('<div class="card mx-auto" style="width:80px;"><div class="card-body text-center padding-0"><small class="message-date">'+message[data].date+'</small></div></div>');
            date = message[data].date;
          }
          if(message[data].username == username){
            $('#message-container').append('<div class="message-from-user d-flex justify-content-end"><div class="card d-flex" style="max-width:70%;"><div class="card-body padding-0"><div class="row mx-auto"><div class="col-sm-12 d-flex justify-content-start message-input">'+message[data].messagedescription+'</div></div><div class="row mx-auto"><div class="col-sm-12 d-flex justify-content-end"><span class="badge badge-pill"><div class="d-flex flex-column"><small>'+message[data].time+'</small></div></span></div></div></div></div></div>');
          }else{
            $('#message-container').append('<div class="message-from-other d-flex justify-content-start"><div class="card d-flex" style="max-width:70%;"><div class="card-body padding-0"><div class="row mx-auto"><div class="col-sm-12 d-flex justify-content-start message-input">'+message[data].messagedescription+'</div></div><div class="row mx-auto"><div class="col-sm-12 d-flex justify-content-end"><span class="badge badge-pill"><div class="d-flex flex-column"><small>'+message[data].time+'</small></div></span></div></div></div></div></div>');
          }
        }
      }
      scrollBottom();
    }
  })
}
//GENERATE FORUM ON LOAD
$(document).ready(function(){
  $.ajax({
    url:"../php/forum-function.php",
    type:"POST",
    data:{getForum:true},
    success:function(result){
      var forum = JSON.parse(result);
      for(var data in forum){
        if(forum[data].forumid == null){
          break;
        }else{
          if(forum[data].message == null){
            $('#joined-group-list').append('<li class="list-group-item d-flex justify-content-between align-items-center rounded-0 group-item join-group" id="'+forum[data].forumid+'"><img src="'+forum[data].forumpicture+'" width="35px" height="35px" class="group-picture rounded-circle">&nbsp;&nbsp;<div class="d-flex flex-column flex-grow-1"><h6 class="margin-bottom-0 group-name">'+forum[data].forumname+'</h6><small class="small-smaller message-in-list" id="'+forum[data].forumid+'">'+" "+'</small></div><span class="badge badge-pill"><div class="d-flex flex-column"><small class="group-time" id="'+forum[data].forumid+'">&nbsp;</small><small>&nbsp;</small><div class="notification"><a href="#"><i class="fas fa-volume-off"></i></a>&nbsp;<span class="badge badge-success">4</span><a href="#"><i class="fas fa-chevron-down"></i></a></div></div></span></li>');
          }else{
            $('#joined-group-list').append('<li class="list-group-item d-flex justify-content-between align-items-center rounded-0 group-item join-group" id="'+forum[data].forumid+'"><img src="'+forum[data].forumpicture+'" width="35px" height="35px" class="group-picture rounded-circle">&nbsp;&nbsp;<div class="d-flex flex-column flex-grow-1"><h6 class="margin-bottom-0 group-name">'+forum[data].forumname+'</h6><small class="small-smaller message-in-list" id="'+forum[data].forumid+'">'+forum[data].message+'</small></div><span class="badge badge-pill"><div class="d-flex flex-column"><small class="group-time" id="'+forum[data].forumid+'">'+forum[data].time+'</small><small>&nbsp;</small><div class="notification"><a href="#"><i class="fas fa-volume-off"></i></a>&nbsp;<span class="badge badge-success">4</span><a href="#"><i class="fas fa-chevron-down"></i></a></div></div></span></li>');
          }
        }
      }
    }
  })
});
//SEND MESSAGE TO GROUP FUNCTION
$(document).on('click','#send-message-button',function(){
  var input = $('#input-message').val();
  var forumid = $('.header-group-name').attr('id');
  var lastDate = $('.message-date').last().text();
  $.ajax({
    url:"../php/forum-function.php",
    type:"POST",
    data:{input:input,forumid:forumid,sendmessage:true},
    success:function(result){
      console.log(result);
      var message = JSON.parse(result);
      for(var data in message){
        if(lastDate != message[data].date || lastDate == null){
          $('#message-container').append('<div class="card mx-auto" style="width:80px;"><div class="card-body text-center padding-0"><small class="message-date">'+message[data].date+'</small></div></div>');
        }
        $('#message-container').append('<div class="message-from-user d-flex justify-content-end"><div class="card d-flex" style="max-width:70%;"><div class="card-body padding-0"><div class="row mx-auto"><div class="col-sm-12 d-flex justify-content-start message-input">'+input+'</div></div><div class="row mx-auto"><div class="col-sm-12 d-flex justify-content-end"><span class="badge badge-pill"><div class="d-flex flex-column"><small>'+message[data].time+'</small></div></span></div></div></div></div></div>');
        $('#joined-group-list').find('#'+forumid).find(".message-in-list").text(input);
        $('#joined-group-list').find('#'+forumid).find(".group-time").text(message[data].time);
      }
      $('#input-message').val('');
    }
  })
});
//FORUM-OPTION.PHP FUNCTION TO CREATE FORUM
$(document).on('click','#create-group-button',function(){
  var groupname = $('#group-name').val();
  var groupdescription = $('#group-description').val();
  if(groupname == " " || groupname == null || groupdescription == " " || groupdescription == null){
    $('#error-section').append('<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button>Please Enter Correct Input</div>');
  }else{
    $.ajax({
      url:"../php/forum-function.php",
      type:"POST",
      data:{groupname:groupname,groupdescription:groupdescription,creategroup:true},
      success:function(){
        $('#error-section').append('<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button>Group Has Been Created</div>');
      }
    })
  }
});
$('#input-message').keyup(function(e){
  e.preventDefault();
  if(e.keyCode === 13){
    $('#send-message-button').click();
  }
});
function scrollBottom(){
  var objDiv = $("#message-container");
  var h = objDiv.get(0).scrollHeight;
  objDiv.animate({scrollTop: h});
}
$(document).on('click','#left-group-button',function(){
  var forumid = $('.header-group-name').attr('id');
  $.ajax({
    url:"../php/forum-function.php",
    type:"POST",
    data:{forumid:forumid,leftgroup:true},
    success:function(result){
      location.reload();
    }
  })
});
$(document).ready(function(){
  $.ajax({
    url:"../php/forum-function.php",
    type:"POST",
    data:{forumid:forumid,getparticipantlist:true},
    success:function(result){
      var participant = JSON.parse(result);
      for(var data in participant){
        if(participant[data].selfStatus == '0'){
          if(participant[data].adminStatus == '1'){
            $('#joined-participant-list').append('<li class="list-group-item d-flex justify-content-between align-items-center rounded-0 group-item" id="'+participant[data].userid+'"><img src="'+participant[data].userPicture+'" alt="group" width="35px" height="35px" class="rounded-circle">&nbsp;&nbsp;<div class="d-flex flex-column flex-grow-1"><h6 class="margin-bottom-0 group-name">'+participant[data].username+'</h6></div><span class="badge badge-pill"><div class="d-flex flex-column"><a class="btn btn-sm" href="#" id="optionMain" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a><div class="dropdown-menu dropdown-menu-right" aria-labelledby="optionMain"><a class="dropdown-item smaller" class="make-group-admin" id="'+participant[data].userid+'"><i class="fas fa-fw fa-user-circle"></i>&nbsp;Make Group Admin</a><a class="dropdown-item smaller" class="remove-user" id="'+participant[data].userid+'"><i class="fas fa-fw fa-trash"></i>&nbsp;Remove User</a></div><small id="statusAdmin">'+participant[data].admin+'</small></div></span></li>');
          }else{
            $('#joined-participant-list').append('<li class="list-group-item d-flex justify-content-between align-items-center rounded-0 group-item" id="'+participant[data].userid+'"><img src="'+participant[data].userPicture+'" alt="group" width="35px" height="35px" class="rounded-circle">&nbsp;&nbsp;<div class="d-flex flex-column flex-grow-1"><h6 class="margin-bottom-0 group-name">'+participant[data].username+'</h6></div><span class="badge badge-pill"><div class="d-flex flex-column"><small id="statusAdmin">'+participant[data].admin+'</small></div></span></li>');
          }
        }else{
          $('#joined-participant-list').append('<li class="list-group-item d-flex justify-content-between align-items-center rounded-0 group-item" id="'+participant[data].userid+'"><img src="'+participant[data].userPicture+'" alt="group" width="35px" height="35px" class="rounded-circle">&nbsp;&nbsp;<div class="d-flex flex-column flex-grow-1"><h6 class="margin-bottom-0 group-name">You</h6></div><span class="badge badge-pill"><div class="d-flex flex-column"><small id="statusAdmin"></small></div></span></li>');
        }
      }
    }
  })
});
$(document).on('click','#update-group-button',function(){
  var groupname = $('#group-name').val();
  var groupdesc = $('#group-description').val();
  $.ajax({
    url:"../php/forum-function.php",
    type:"POST",
    data:{groupname:groupname,groupdesc:groupdesc,forumid:forumid,updategroupinfo:true},
    success:function(){
      alert("Update Forum Success!");
    }
  })
});
$('#forumName').keyup(function(e){
  e.preventDefault();
  if(e.keyCode === 13){
    $('#search-button').click();
  }
});
$(document).on("click",'#search-button',function(){
  var searchval = $('#forumName').val();
  $('#list-of-forum').empty();
  $.ajax({
    url:"../php/forum-function.php",
    type:"POST",
    data:{search:searchval,getsearch:true},
    success:function(result){
      var forum = JSON.parse(result);
      for(var data in forum){
        if(forum[data].joinedstatus == 0){
          $('#list-of-forum').append('<li class="list-group-item d-flex justify-content-between align-items-center rounded-0 group-item"><img src="'+forum[data].forumpicture+'" alt="group" width="35px" height="35px" class="rounded-circle">&nbsp;&nbsp;<div class="d-flex flex-column flex-grow-1"><h6 class="margin-bottom-0 group-name">'+forum[data].forumname+'</h6></div><span class="badge badge-pill"><div id="'+forum[data].forumid+'" class="d-flex flex-column join-button"><a href="#" id="'+forum[data].forumid+'" class="btn btn-sm btn-info join">Join This Group</a></div></span></li>');
        }else{
          $('#list-of-forum').append('<li class="list-group-item d-flex justify-content-between align-items-center rounded-0 group-item"><img src="'+forum[data].forumpicture+'" alt="group" width="35px" height="35px" class="rounded-circle">&nbsp;&nbsp;<div class="d-flex flex-column flex-grow-1"><h6 class="margin-bottom-0 group-name">'+forum[data].forumname+'</h6></div><span class="badge badge-pill"><div class="d-flex flex-column"></div></span></li>');
        }
      }
    }
  })
});
$(document).on('click','.join',function(){
  var forumid = $(this).attr('id');
  $.ajax({
    url:"../php/forum-function.php",
    type:"POST",
    data:{forumid:forumid,joinGroup:true},
    success:function(){
      $('#search-button').click();
    }
  })
})
