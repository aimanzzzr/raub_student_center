$(document).ready(function(){
  $('#activity-details').dataTable();
})
$(document).on("click",".edit-button",function(){
  var id = $(this).attr("id");
  $.ajax({
    url:"../php/admin/activity-function.php",
    type:"POST",
    data:{activityid:id,getActivity:true},
    success:function(result){
      var activity = JSON.parse(result);
      for(var data in activity){
        $('#edit-activityID').val(activity[data].activityID)
        $('#edit-activityName').val(activity[data].activityName);
        $('#edit-activityDescription').val(activity[data].activityDescription);
        $('#edit-activityDate').val(activity[data].activityDate);
        $('#edit-activityTime').val(activity[data].activityTime);
      }
    }
  })
  $('#editActivityModal').modal();
})
$(document).on("click",".delete-button",function(){
  var id = $(this).attr("id");
  $("#delete-activity-id").val(id);
  $('#deleteActivityModal').modal();
})
$(document).ready(function(){
  $.ajax({
    url:"../php/activity-function.php",
    type:"POST",
    data:{getactivity:true},
    success:function(result){
      var activity = JSON.parse(result);
      var count = 0;
      for(var data in activity){
        if(activity[data].activityid == null){
          if(count == 0){
              $('#carousel-indicators').append('<li data-target="#activity-slider" data-slide-to="'+count+'" class="active"></li>');
              $('#carousel-inner').append('<div class="carousel-item active"><img src="'+activity[data].activityPicture+'"></div>');
          }else{
              $('#carousel-indicators').append('<li data-target="#activity-slider" data-slide-to="'+count+'"></li>');
              $('#carousel-inner').append('<div class="carousel-item"><img src="'+activity[data].activityPicture+'"></div>');
          }
          count = count + 1;
        }else{
          if(count == 0){
              $('#carousel-indicators').append('<li data-target="#activity-slider" data-slide-to="'+count+'" class="active"></li>');
              $('#carousel-inner').append('<div class="carousel-item active"><img src="'+activity[data].activityPicture+'"></div>');
          }else{
              $('#carousel-indicators').append('<li data-target="#activity-slider" data-slide-to="'+count+'"></li>');
              $('#carousel-inner').append('<div class="carousel-item"><img src="'+activity[data].activityPicture+'"></div>');
          }
          count = count + 1;
        }
      }
    }
  })
});
