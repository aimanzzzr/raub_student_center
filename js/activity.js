//---------------------------------------
//ACTIVITY.PHP
//---------------------------------------
//LOAD ACTIVITY ON DOCUMENT LOAD
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
//---------------------------------------
//ACTIVITY-DETAILS.PHP
//---------------------------------------
$(document).ready(function(){
  $.ajax({
    url:"../php/activity-function.php",
    type:"POST",
    data:{activityid:activityid,getactivitydetails:true},
    success:function(result){
      var activity = JSON.parse(result);

    }
  })
});
