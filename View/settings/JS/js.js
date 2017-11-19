$("#pwddone").click(function(){
 
  var old = $('#oldpwd').val();
  var newp = $('#newpwd').val();
    var postdata = JSON.stringify({ "oldpassword" : old , "newpassword"  : newp  });
if(old=!'' && newp!=''){
$.ajax({
            url: 'View/settings/JS/updatepassword.php', // point to server-side PHP script
            type: 'POST',
            data: { jsondata : postdata },
              success: function(data,status,xhr){
                if(data=='200'){
                    alert('Your password has been changed ! so you have to login with new password');window.location='?sc=logout';
                } else if(data=='500'){
                  notification("Change Password","Old password not matched",'error','top-center',4000,false);  
                }else if(data=='201'){
                  notification("Change Password","Password not changed",'error','top-center',4000,false);  
               } else{
                notification("Change Password","Something wrong !",'warning','top-center',4000,false);  
                }              
                
            }
          });

        }else{
          notification("Change Password","Require fields can not be empty !",'info','top-center',4000,false);
        }

});






