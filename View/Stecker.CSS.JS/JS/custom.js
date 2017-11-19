var require = "Require field is empty";
var success = "Request successfuly comlpeted";
var fail = "Request not successfuly comlpeted";
var unknown = "Something went wrong";
var old_pwd_wrong = "Old Password wrong";
var email_already_there = "Email already register";
var letter_limit = "Minimum 50 letters should be";

function notification(header,message,icon,position,hideaf,loader){
    $.toast({
        heading: header,
        text: message,
        icon: icon,
        position: position,
        loader : loader,
        hideAfter : hideaf,
        stack : 10,
        showHideTransition: 'plain'
    })
}
