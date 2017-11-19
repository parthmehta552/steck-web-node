
$("#query").keyup(function(){
  var chrs = $("#query").val();
  var count = 1000 - chrs.length;
  $("#char").html("Charaters "+count);
});

function captionchars(str){
  $("#imagecaption-"+str).keyup(function(){
    var chrs = $("#imagecaption-"+str).val();
    var count = 500 - chrs.length;
    $("#caption-"+str).html("Charaters "+count);
  });
}


function editCaption(str){
  alert(str);
}


function refre()
{
  $.ajax({
              url: 'View/query/JS/loadqs.php', // point to server-side PHP script
              type: 'GET',
                  success: function(data,status,xhr){
                  //$("#msg").html(data); // display response from the PHP script, if any
                  //$("#imgs").attr('src',data);
                  $("#qudata").html("<span class='fa fa-spinner fa-pulse fa-1x fa-fw margin-bottom'></span> Refreshing.. ");
                  $("#qudata").html(data);

              }
   });
}

function refre4(str){

  var postdata = JSON.stringify({ "referId" : str, "referType" : 2001 , "isBlock" : "false" });
  //alert(postdata);
  $.ajax({
              url: 'View/query/JS/loadimg.php', // point to server-side PHP script
              type: 'POST',
              data: { jsondata : postdata },
                success: function(data,status,xhr){
                $('#imgload-'+str).html(data);

              }
   });
}

function refre5(str){
  var postdata = '&id='+str;
  $.ajax({
              url: 'View/query/JS/loadimg.php', // point to server-side PHP script
              type: 'POST',
              data: postdata,
                success: function(data,status,xhr){
                $('#delimgload-'+str).html(data);

              }
   });

}

function refre2()
{

  $.ajax({
              url: 'View/query/JS/loadqs2.php', // point to server-side PHP script
              type: 'GET',
                  success: function(data,status,xhr){
                  //$("#msg").html(data); // display response from the PHP script, if any
                  //$("#imgs").attr('src',data);

                  $("#qudata2").html(data);
              }
   });
}
function refre3()
{

  $.ajax({
              url: 'View/query/JS/loadqs3.php', // point to server-side PHP script
              type: 'GET',
                  success: function(data,status,xhr){
                  //$("#msg").html(data); // display response from the PHP script, if any
                  //$("#imgs").attr('src',data);

                  $("#qudata3").html(data);
              }
   });
}
$(document).ready(function(){
$("#qudata").html("<span class='fa fa-spinner fa-pulse fa-1x fa-fw margin-bottom'> </span> Getting query.. ");
});

$(document).ready(function(){
$("#qudata").load('View/query/JS/loadqs.php');
 $("#cquery").load('View/query/JS/dtquerylist.php');

/*setInterval(function(){

   $("#cquery").load('View/query/JS/dtquerylist.php');

},20000);*/

});
$(document).ready(function(){

$("#qudata2").html("<img src='View/gif/ring-alts.gif' height='40px' width='40px'> Getting your queries.. ");

});

$(document).ready(function(){

$("#qudata2").load('View/query/JS/loadqs2.php');

});
$(document).ready(function(){

$("#qudata3").html("<img src='View/gif/ring-alts.gif' height='40px' width='40px'> Getting your deleted queries.. ");

});

$(document).ready(function(){

$("#qudata3").load('View/query/JS/loadqs3.php');

});

$("#refresh").click(function(){

  $("#refresh").html("Refreshing...");
  refre();
  $("#refresh").html("Refresh");

});

$("#done").click(function(){

var querydata = $('#query').val();
var postdata = JSON.stringify({"content" : querydata});

$("#msg4").html("<span class='fa fa-spinner fa-pulse fa-1x fa-fw margin-bottom'></span>Posting & Refresh...");
$("#query").focusout();

if(querydata!=''){
  $.ajax({
              url: 'View/query/JS/addNewQuery.php', // point to server-side PHP script
              type: 'POST',
              data: { jsondata : postdata },
                success: function(data,status,xhr){
                  //alert(data);
                  if(data=='200'){
                    $("#msg4").html("<div class='alert alert-success alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Posted ! </strong> Your query is posted </div>");
                    $("#query").val('');
                    $('#querydiv').animate({scrollTop:0}, 'slow');
                    $('#yourquerydiv').animate({ scrollTop: $('#yourquerydiv').prop("scrollHeight")}, 1000);
                  }else if(data=='201'){
                    $("#msg4").html("<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>oops  </strong> Your query is not posted </div>");
                  }else{
                    $("#msg4").html("<div class='alert alert-warning alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Ohh ! </strong> Something went wrong ! </div>");
                  }
                  refre();
                  $("#cquery").load('View/query/JS/dtquerylist.php');
                  refre2();
                  //$("#msg4").html(data);
              }
   });
  }else{
    $("#msg4").html("<div class='alert alert-warning alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Ohh ! </strong> Query could not be blank ! </div>");
  }

});

function upload(str) {
    var file_data = $('#sortpicture-'+str).prop('files')[0];
    var caption = $('#imagecaption-'+str).val();
    var form_data = new FormData();
    form_data.append('file', file_data);
    form_data.append('id',str);
    form_data.append('caption',caption);
    if(caption!='' && file_data != ''){
      $.ajax({
                  url: 'View/query/JS/addimg.php', // point to server-side PHP script
                  dataType: 'text',  // what to expect back from the PHP script, if anything
                  cache: false,
                  contentType: false,
                  processData: false,
                  data: form_data,
                  type: 'post',
                  success: function(php_script_response){
                      $('#sortpicture-'+str).val('');
                      $('#imagecaption-'+str).val('');
                      if(php_script_response=='200'){
                        notification("Add Image","Image uploaded !","success",'top-center',4000,false);
                      }else if(php_script_response=='201'){
                        notification("Add Image","Image not uploaded !","error",'top-center',4000,false);
                      }else if(php_script_response=='277'){
                        notification("Add Image","Only JPG are allowed !","info",'top-center',4000,false);
                      }else{
                        notification("Add Image","Something went wrong","warning",'top-center',4000,false);
                      }

                      refre4(str);

                  }
       });
      }else{
        notification("Add Image","Require fields can not be empty","error",'top-center',4000,false);

      }
}

function loadingmsg(str){
$('#imgload-'+str).html("<center><img src='View/gif/ring-alts.gif' height='40px' width='40px'> Finding related photos... </center>");
}


function getimg(str){

  var postdata = JSON.stringify({ "referId" : str, "referType" : 2001 , "isBlock" : "false" });
   $.ajax({
              url: 'View/query/JS/loadimg.php', // point to server-side PHP script
              type: 'POST',
              data: {jsondata : postdata},
                success: function(data,status,xhr){
                $('#imgload-'+str).html(data);

              }
  });

}

function loadingmsg2(str){
$('#delimgload-'+str).html("<center><img src='View/gif/ring-alts.gif' height='40px' width='40px'> Finding deleted photos... </center>");
}

function vImg(str,str2,str3,str4){
$("#imgview-"+str4).attr("src","View/userimg/"+str);
$("#imgcaption-"+str4).html(str2);
$("#imgtimedate-"+str4).html(str3);

}

function delimg(str)
{
 var postdata = JSON.stringify({ "_id" : str , "isBlock" : true });
  $.ajax({
              url: 'View/query/JS/delimg.php',
              type: 'POST',
              data: { jsondata : postdata },
                success: function(data,status,xhr){
                  if(data=="200"){
                      notification("Delete Image","Image deleted !",'success','top-center',4000,false);
                      notification("Delete Image","You can recover this image from image trash",'info','top-right',5000,false);
                      $("#imgdiv-"+str).hide("slow");
                  }else if(data=="201"){
                    notification("Delete Image","Image not deleted !",'error','top-center',4000,false);
                  }else{
                    notification("Delete Image","Something went wrong !",'warning','top-center',4000,false);
                  }

              }
   });

}




function getdelimg(str)
{
  var postdata = JSON.stringify({ "referId" : str, "referType" : 2001 , "isBlock" : "true" });
  $.ajax({
              url: 'View/query/JS/loadtimg.php',
              type: 'POST',
              data: { jsondata : postdata },
                success: function(data,status,xhr){
                    $('#delimgload-'+str).html(data);

              }
   });
}

function undoimg(str)
{
  var postdata = JSON.stringify({ "_id" : str , "isBlock" : "false" });
  $.ajax({
              url: 'View/query/JS/delimg.php',
              type: 'POST',
              data: { jsondata : postdata },
                success: function(data,status,xhr){
                  if(data=="200"){
                      notification("Undo Image","Image recovered !",'success','top-center',4000,false);
                      //notification("Undo Image","You can recover this image from image trash",'info','top-right',5000,false);
                      $("#undoimgdiv-"+str).hide("slow");
                  }else if(data=="201"){
                    notification("Undo Image","Image not recovered !",'error','top-center',4000,false);
                  }else{
                    notification("Undo Image","Something went wrong !",'warning','top-center',4000,false);
                  }
                  }
   });


}
