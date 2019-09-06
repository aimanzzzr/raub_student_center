$(document).on('click','.building',function(){
  var buildingid = $(this).attr("id");
  $.ajax({
    url:"../php/map-function.php",
    type:"POST",
    data:{buildingID:buildingid,getBuildingInfo:true},
    success:function(result){
      console.log(result);
      var building = JSON.parse(result);
      for(var data in building){
        $('#buildingPicture').attr("src",building[data].buildingpicture);
        $('#buildingPicture-link').attr("href",building[data].buildingpicture);
        $('#buildingName').val(building[data].buildingname);
        $('#buildingdesc').val(building[data].buildingdesc);
      }
    }
  })
  $('#clicked-building').show();
});
$(document).ready(function(){
  $('#clicked-building').hide();
})
