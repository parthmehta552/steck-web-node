$("#email").focusout(function() {

  if ($("#email").val() != '') {

    $("#res").html("<img src='View/gif/ring-alts.gif' height='30px' width='30px'> Getting Image....");

    var email = $('#email').val();
    var postemail = JSON.stringify({
      "email": email
    });

    $.ajax({
      url: 'View/signin/JS/getImagebyEmail.php', // point to server-side PHP script
      type: 'POST',
      data: {
        jsondata: postemail
      },
      success: function(data, status, xhr) {
        if (data == "") {
          $("#imgs").attr("src", "View/userimg/avatar5.png");
          $("#res").html("");
        } else if (data == "201") {
          $("#imgs").attr("src", "View/userimg/avatar5.png");
          $("#res").html("");
        } else {
          $("#imgs").attr("src", "View/userimg/" + data);
          $("#res").html("");

        }
      }

    });
  }
});





$("#done").click(function() {
  var email = $('#email').val();
  var pwd = $('#pwd').val();

  var postdata = JSON.stringify({
    "email": email,
    "password": pwd
  });


  $.ajax({
    url: 'View/signin/JS/userLogin.php', // point to server-side PHP script
    type: 'POST',
    data: {
      jsondata: postdata
    },
    success: function(data, status, xhr) {
      //$("#msg").html(data); // display response from the PHP script, if any
      if (data == '201') {
        notification("Sign In", "Email or password wrong", 'error', 'top-center', 4000, false);

      } else {
        notification("Sign In", "Welcome", 'info', 'top-center', 1000, false);

        window.location = "?sc=home";
        //alert(data);
      }
    }
  });
});
