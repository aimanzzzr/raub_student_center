$(document).ready(function(){
  $('#map-information-table').dataTable();
});
$(document).on('click','.edit-button',function(){
  var mapID = $(this).attr("id");
  $.ajax({
    url:"../php/admin/map-function.php",
    type:"POST",
    data:{mapID:mapID,getMapInfo:true},
    success:function(result){
      var map = JSON.parse(result);
      for(var data in map){
        $('#buildingname').val(map[data].buildingname);
        $('#buildingdesc').val(map[data].buildingdesc);
        $('#mapID').val(mapID);
      }
    }
  })
  $('#editMapModal').modal();
});
$(document).on('click','.building',function(){
  var buildingid = $(this).attr("id");
  $.ajax({
    url:"../php/admin/map-function.php",
    type:"POST",
    data:{buildingID:buildingid,getBuildingInfo:true},
    success:function(result){
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
