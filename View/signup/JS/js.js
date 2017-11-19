$("#done").click(function(){

  

 if($('#uname').val() != '' && $('#email').val()!='' && $('#pwd').val()!='' && $('#cpwd').val()!=''){

  
 		var uname = $('#uname').val();
		var email = $('#email').val();

		var pwd = $('#pwd').val();
    var cpwd = $('#cpwd').val(); 

    var image = "avatar5.png";
    var dt = new Date();
		  var postdata = {"name" : uname , "email" : email, "password" : cpwd, "image" : image, "registerdate" : dt, "admin" : "false" , "isblock" : "false" };
      var postdatainjson = JSON.stringify(postdata);
$.ajax({
              url: 'View/signup/JS/addNewUser.php', // point to server-side PHP script
              type: 'POST',
              data: { jsondata : postdatainjson },
                success: function(data,status,xhr){
                  if(data=='200')
                  {
                    
                    notification("Sign Up","You are registered",'success','top-center',4000,false);
                    
                    $('#uname').val('');
		                $('#email').val('');
		                $('#pwd').val('');
                    $('#cpwd').val('');

                  }else if(data=='202'){
                    notification("Sign Up","Your email already registered",'warning','top-center',4000,false);
                  }else{
                    notification("Sign Up","Something went wrong",'info','top-center',4000,false);
                    
                  }
              }
   });

}else{
  notification("Sign Up","Require fields can not be empty",'error','top-center',4000,false);
  }

});




$(document).ready(function(){
  $('#ins').hide();
  $('#ins1').hide();
$('#ins11').hide();
$('#ins12').hide();

});

$('#pwd').focusin(function(){
  $('#ins').show();
});

 $('#pwd').focusout(function(){
  $('#ins').hide();
});

 $('#pwd').focusout(function(){
if($('#pwd').val()==$('#cpwd').val())
{
$('#ins1').hide();
$('#done').show();

}else{
 $('#ins1').show();
 $('#done').hide();
}
});

$('#cpwd').keyup(function(){

if($('#pwd').val()==$('#cpwd').val())
{
$('#ins1').hide();
$('#done').show();

}else{
 $('#ins1').show();
 $('#done').hide();
}
});

$('#pwd').keyup(function(){

var pwd = $(this).val();
var len = pwd.length;


if(len<8)
{
  $('#cap').html("Minimum 8 length");

}
else {
  $('#cap').html("Ok ");

}

if(pwd.match(/[a-z]/))
{
  $('#cap1').html("Ok ");

}else
{

  $('#cap1').html("Minimum One letter");

}

if(pwd.match(/[A-Z]/))
{
  $('#cap2').html("Ok ");

}else
{
  $('#cap2').html("Minimum One capital letter ");

}

if(pwd.match(/\d/))
{
  $('#cap3').html("Ok ");

}else
{
  $('#cap3').html("Minimum One Digit ");

}



});

$('#uname').focusout(function(){
if($('#uname').val()==''){
        
        $("#ins11").hide();
   
   }else{
      var letters = /^[A-Za-z\s ]+$/;
   if($('#uname').val().match(letters))
     {
        $('#done').show();
       $("#ins11").hide();
      return true;

      }
   else
     {
        $('#done').hide();
       $("#ins11").show();
       return false;  
       
     }

    }
});

$('#email').focusout(function(){

	var x = $('#email').val();
  if(x==''){
 $("#ins12").hide();
  }else{
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");

    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
     $("#ins12").show();
	    $('#done').hide();
        return false;
    }else{
       $('#done').show();
        $("#ins12").hide();
    }
  }
    

});


