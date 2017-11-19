
$('#upload').on('click', function() {
    var file_data = $('#sortpicture').prop('files')[0];
    var form_data = new FormData();
    var fldata = $('#sortpicture').val();
    form_data.append('file', file_data);
    if(fldata.length!=0){
      $.ajax({
                  url: 'View/profile/JS/updateimage.php', // point to server-side PHP script
                  dataType: 'text',  // what to expect back from the PHP script, if anything
                  cache: false,
                  contentType: false,
                  processData: false,
                  data: form_data,
                  type: 'post',
                  success: function(php_script_response){
                      if(php_script_response=='200'){
                        notification("Edit Profile Picture","Profile picture uploaded !",'success','top-center',4000,false);
                        $("#refreshimg").html("<a href='?sc=profile'>Click here to view changes</a>");
                      }else if(php_script_response=='201'){
                        notification("Edit Profile Picture","Profile picture not uploaded !",'error','top-center',4000,false);
                      }else if(php_script_response=='277'){
                        notification("Edit Profile Picture","Only JPG files are allowed !",'info','top-center',4000,false);

                      }else{
                        notification("Edit Profile Picture","Something wrong !",'warning','top-center',4000,false);
                      }
                       // display response from the PHP script, if any
                  }
       });
     }else{notification("Edit Profile Picture","Please Select the image",'info','top-center',4000,false);}

});


$("#done").click(function(){

  var uname = $('#uname').val();
  var email = $('#email').val();
    var postdata = JSON.stringify({"name" : uname , "email" : email });
if(uname != '' && email != ''){
$.ajax({
            url: 'View/profile/JS/updateprofile.php', // point to server-side PHP script
            type: 'POST',
            data: { jsondata  : postdata },
              success: function(data,status,xhr){
                 if(data=='200'){
                  notification("Profile details","Profile details updated !",'success','top-center',4000,false);
                  $("#refresh").html("<a href='?sc=profile'>Click here to view changes</a>");
                 }else if(data=='201'){
                  notification("Profile details","Profile details not updated !",'error','top-center',4000,false);
                }else if(data=='299'){
                  notification("Profile details","Email already in use !",'info','top-center',4000,false);
                }else{
                  notification("Profile details","Something went wrong !",'warning','top-center',4000,false);
                }

            }
 });
}else{
  notification("Profile details","Require fields can not be empty !",'error','top-center',4000,false);
}
});







/*function WebSocketTest()
       {
          if ("WebSocket" in window)
          {
             alert("WebSocket is supported by your Browser!");

             // Let us open a web socket
             var ws = new WebSocket("ws://parthe:9998/echo");
               ws.onopen = function()
               {
                  // Web Socket is connected, send data using send()
                  ws.send("Message to send");

               };


             ws.onmessage = function (evt)
             {
                var received_msg = evt.data;
                alert("Message is received...");
             };

             ws.onclose = function()
             {
                // websocket is closed.
                alert("Connection is closed...");
             };
          }

          else
          {
             // The browser doesn't support WebSocket
             alert("WebSocket NOT supported by your Browser!");
          }
       }*/
