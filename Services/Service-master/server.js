
//#region Require Modules
const userController = require('./lib/controler/UserControler');
const languageController = require('./lib/controler/LanguageController');
const queryController = require('./lib/controler/QueryController');
const imageController = require('./lib/controler/ImageController');
const solutionController = require('./lib/controler/SolutionController');
const common = require('./lib/common');
var logger = require("./lib/logger");
const express = require('express');
var bodyparser = require('body-parser');
const app = express();
app.use(bodyparser.json());
app.use(bodyparser.urlencoded({extended:true}));
//#endregion 

app.get('/test',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "GET") == 0) {
        response.send(common.responseError("Hello Test Service",200,true));
        logger.info("Test Service");
    } else {
        response.send(common.responseError("Method type should be GET and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",0,false)); 
 }
 });


//#region UserController Routes
app.post('/addNewUser',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        userController.addNewUser(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
 }
 });

app.post('/getUserUsingemail&password',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        userController.getUserUsingUsername(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",0,false)); 
 }
 });

app.get('/listAllUsers',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "GET") == 0) {
        userController.listAllUsers(request,response);
    } else {
        response.send(common.responseError("Method type should be GET and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",0,false)); 
 }
 });


app.post('/getImageUsingEmail',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        userController.getImageUsingEmail(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",0,false)); 
 }
 });

app.post('/updateUserById',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        userController.updateUserById(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",0,false)); 
 }
 });

app.post('/updateUserImageById',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        userController.updateUserImageById(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",0,false)); 
 }
 });

app.post('/updatePasswordById',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        userController.updatePasswordById(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",0,false)); 
 }
 });
 





//#endregion

//#region LanguageController Routes
app.post('/addNewLanguage',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        languageController.addNewLanguage(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
 }
 });


app.get('/listAllLanguages',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "GET") == 0) {
        languageController.listAllLanguages(request,response);
    } else {
        response.send(common.responseError("Method type should be GET and Content-Type : JSON or You are not authorized person",402,false));
    }
  }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",0,false)); 
  }
  });


//#endregion

//#region QueryController Routes 
app.post('/addnewQuery',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        queryController.addNewQuery(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
 }
 });

app.post('/getQueryusingUidLid',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        queryController.getdatabyUidandLid(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
  }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
  }
  });

app.post('/getDataByLanguageId',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        queryController.getDataByLanguageId(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
  }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
  }
  });
app.post('/getDataByLanguageForSolutionId',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        queryController.getDataByLanguageForSolutionId(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
  }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
  }
  });
app.post('/getDataBy_Id',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        queryController.getDataBy_Id(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
  }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
  }
  });

app.post('/getDataByContent',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        queryController.getDataByContent(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
  }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
  }
  });

app.post('/updateblockby_id',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        queryController.updateblockby_id(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
  }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
  }
  });

app.post('/updateContentby_id',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        queryController.updateContentby_id(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
  }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
  }
  });
app.post('/getDatabycontentforSolution',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        queryController.getDataByContentForSolution(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
  }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
  }
  });

//#endregion

//#region ImageController Routes
app.post('/addnewImage',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        imageController.addNewImage(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
 }
 });
app.post('/getImagesById',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        imageController.getImagesById(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
 }
 });
app.post('/updateImageById',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        imageController.updateImagebyId(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
 }
 });

app.post('/BlockUnBlockImagebyId',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        imageController.imageBlockUnblock(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",0,false)); 
 }
 });
 
//#endregion

//#region SolutionController Routes
app.post('/addNewSolution',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        solutionController.AddNewSolution(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
 }
 });

app.post('/getSolutionByUser',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        solutionController.GetSolutionByUserId(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
 }
 });

app.post('/getBlockedSolutionByUser',function(request,response){
    try{
       
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        solutionController.GetBlockedSolutionByUserId(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
 }
 });
app.post('/blockunblock',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        solutionController.updateBlockunBlockSolutionById(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
 }
 });

app.post('/getSolutionbyId',function(request,response){
    try{
    response.set('Content-Type', 'application/json');
    if (common.validateRequestMethodContentType(request, response, "POST") == 0) {
        solutionController.getSolutionUsingId(request,response);
    } else {
        response.send(common.responseError("Method type should be POST and Content-Type : JSON or You are not authorized person",402,false));
    }
 }catch(e){
    console.log(e);
   response.send(common.responseError("Server not working correctly please try again later.....",000,false)); 
 }
 });


//#endregion


app.listen(3030, function () {
    console.log('SteckerCode Services Running On 3030! ');
    //common.info("Server.js:app.listen","AppStore Running On 3036! ");
 });

 