//---------------------------------------
//PROFILE.PHP
//---------------------------------------
//UPDATE PROFILE BUTTON USING AJAX
$(document).on('click','#update-profile-button',function(){
  var about = $('#about').val();
  var interest = $('#interest').val();
  $.ajax({
    url:"../php/profile-function.php",
    type:"POST",
    data:{about:about,interest:interest,updateprofile:true},
    success:function(result){
        $('#notification-section').append('<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button>Update User Profile Success</div>');
    }
  })
});
$(document).on('click','#crop-btn',function(){
  $('.picture-toCrop').croppie('result',{
    type:'canvas',
    size:'original'
  }).then(function(resp){
    $('#base64pic').val(resp);
    $('#upload64').submit();
  })
});
function handleFileSelect(evt){
  var files = evt.target.files;
  for (var i = 0,f;f=files[i];i++) {
    if(!f.type.match('image.*')){
      continue;
    }
    var reader = new FileReader();
    reader.onload = (function(theFile) {
      return function(e){
        $('.upload-demo').croppie({
          viewport:{
            width:250,
            height:250,
            type:'square'
          },
          url:e.target.result
        })
      };
    })(f);
    reader.readAsDataURL(f);
  }
}
document.getElementById('file').addEventListener('change', handleFileSelect, false);
