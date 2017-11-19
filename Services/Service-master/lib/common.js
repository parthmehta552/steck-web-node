
const vali = require('validator');


exports.response = function(data){
    return JSON.stringify(data).replace(/]|[[]/g, '');
 } 



exports.responseError = function(errorMessage,errorCode,result){
    return JSON.stringify({ "appName" : "SteckerCode", "response" : { "result" : result, "error_code" : errorCode , "error_message" : errorMessage }});
 }




exports.responseWithData = function(errorMessage,errorCode,result,data){
    return JSON.stringify({ "appName" : "SteckerCode", "response" : { "result" : result, "error_code" : errorCode , "error_message" : errorMessage , "data" : data }});
 }



exports.validateRequestMethodContentType = function (request,response,methodType) {
    var po=0;
    if(request.method==methodType && request.headers['content-type']=="application/json" /*&& request.headers["apikey"]=="123456789"*/){
        po+=0
    }else{
        po+=1;
    }
    return po;
 }


exports.validateRequestParam = function (arrofParam,request) {
    var op=0;
    arrofParam.forEach(function (value) {
        if(!request.body.value){
            op+=0;
        }else{op+=1;}

    })
    return op;
 }

exports.FirstPhase = function(request){
    if(Object.keys(request.body).length!=0){
        return 0;
    }else{
        return 1;
    }
 }


exports.SecondPhase = function(arrofParam,request) {
    if(this.validateRequestParam(arrofParam,request)==0){
        return 0;
    }else{
        return 1;
    }
 }



exports.FourthPhase = function(email){
    if(vali.isEmail(email)){
        return 0;
    }else{
        return 1;
    }
 }
 
 
 
 


