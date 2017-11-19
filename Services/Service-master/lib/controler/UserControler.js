//#region Require modules
const Models = require('../models/User');
const out = require('../common');
const vali = require('../constant');
const validate = require('validator');
const cry = require('crypto');
const moment = require('moment-timezone');
//#endregion




//#region Controllers 5
exports.addNewUser = function (req, res) {
    var newUser = new Models();
    arrofParam = ["name", "email", "password"];

    newUser.image = "avatar5.png";
    newUser.registerdate = new Date();
    newUser.admin = false;
    newUser.isblock = false;

    if(out.FirstPhase(req)==0){
        
        if(out.SecondPhase(arrofParam,req)==0){
            
            
         if(req.body.name && req.body.email && req.body.password){

            newUser.name = req.body.name;
            newUser.password = req.body.password;
            newUser.email = req.body.email;
           
                if(out.FourthPhase(req.body.email)==0){

       Models.findOne({ 'email': newUser.email.toString()}, function (err, users) {
        if (!users) {

            newUser.save(function (err, data) {
                if (!data){
                    console.log(err);
                    res.send(out.responseError("User not Inserted !",201,true))
                }else{
                    console.log(data);
                    res.send(out.responseError("User Inserted",200,true))
                  }
                });
                

        } else {
            res.send(out.responseError("This email address already registered !",202,false))
        }
      });

    }else{
        //email format wrong
        res.send(out.responseError(vali.FOURTH_PHASE_MESSAGE,vali.FOURTH_PHASE_CODE,false));
    }
    }else{
        //something missing
        res.send(out.responseError(vali.THIRD_PHASE_MESSAGE,vali.THIRD_PHASE_CODE,false));
    }

    }else{
        //reqired field need to be
        res.send(out.responseError(vali.SECOND_PHASE_MESSAGE,vali.SECOND_PHASE_CODE,false));
    }

    }else{
        res.send(out.responseError(vali.FIRST_PHASE_MESSAGE,vali.FIRST_PHASE_CODE,false));
        //json should not be empty
    }
 }


 




exports.listAllUsers = function (req, res) {
    
   
    Models.find({},{"name" : 1,"registerdate" : 1, "email" : 1, "image" : 1}, function (err, data) {
        if (!data) {
            res.send(out.responseError("no users found",404,false));
            console.log(err);
            throw err;
        } else {
            console.log(data);
            res.send(data);
        }
    });

 }

exports.getUserUsingUsername = function (req, res) {
    
    arrofParam = ["email","password"];

     if(out.FirstPhase(req)==0){
        if(out.SecondPhase(arrofParam,req)==0){
           if(req.body.email && req.body.password){
                if(out.FourthPhase(req.body.email)==0){

                    Models.findOne({'email': req.body.email.toString(), 'password': req.body.password.toString()} , {"name" : 1,"registerdate" : 1, "email" : 1, "image" : 1}, function (err, users) {
                        if (!users) {
                            res.send(out.responseError("user not found",201,false));
                            console.log(err);
                        }else {
                            console.log(users);
                            res.send(out.responseWithData("user found",200,true,users));
                        }
                    });

                }else{
                    res.send(out.responseError(vali.FOURTH_PHASE_MESSAGE,vali.FOURTH_PHASE_CODE,false));
                }
           }else{
               res.send(out.responseError(vali.THIRD_PHASE_MESSAGE,vali.THIRD_PHASE_CODE,false)); 
           }
        }else{
         res.send(out.responseError(vali.SECOND_PHASE_MESSAGE,vali.SECOND_PHASE_CODE,false));   
        }
    }else{
         res.send(out.responseError(vali.FIRST_PHASE_MESSAGE,vali.FIRST_PHASE_CODE,false));
    }
 }

exports.getImageUsingEmail = function (req, res) {
    arrofParam = ["email"];

    if(out.FirstPhase(req)==0){

        if(out.SecondPhase(arrofParam,req)==0){

           if(req.body.email){

                if(out.FourthPhase(req.body.email)==0){

                    Models.findOne({'email': req.body.email.toString()} , {"image" : 1}, function (err, users) {
                        if (!users) {
                            res.send(out.responseError("user not found",201,false));
                            console.log(err);
                        } else {
                            console.log(users);
                            res.send(out.responseWithData("user found",200,true,users));
                        }
                    });

                }else{
                    res.send(out.responseError(vali.FOURTH_PHASE_MESSAGE,vali.FOURTH_PHASE_CODE,false));
                }
                
           }else{
               res.send(out.responseError(vali.THIRD_PHASE_MESSAGE,vali.THIRD_PHASE_CODE,false)); 
           }
        }else{
         res.send(out.responseError(vali.SECOND_PHASE_MESSAGE,vali.SECOND_PHASE_CODE,false));   
        }
    }else{
         res.send(out.responseError(vali.FIRST_PHASE_MESSAGE,vali.FIRST_PHASE_CODE,false));
    }

   /* */
 }





exports.updateUserById = function (req, res) {
    arrofParam = ["_id","name" ,"email"];

    if(out.FirstPhase(req)==0){
        if(out.SecondPhase(arrofParam,req)==0){
           if(req.body._id && req.body.name && req.body.email){
                //operation

                Models.findOne({'email': req.body.email.toString()}, function (err, users) {
                      if(users){
                        if(users._id == req.body._id){
                            Models.updateOne({_id : req.body._id },{ name : req.body.name , email : req.body.email }, function (err, query) {
                                if(err){
                                    console.log(err);
                                    res.send(out.responseError("user not updated",201,false));
                                }else{
                                    res.send(out.responseError("user updated",200,true));
                                }
                            });         
                        }else{
                            res.send(out.responseError("email already exist",299,false));
                         } 
                     }else{
                        Models.updateOne({_id : req.body._id },{ name : req.body.name , email : req.body.email }, function (err, query) {
                            if(err){
                                console.log(err);
                                res.send(out.responseError("user not updated",201,false));
                            }else{
                                res.send(out.responseError("user updated",200,true));
                            }
                        });
                     }  
                    });
           }else{
               res.send(out.responseError(vali.THIRD_PHASE_MESSAGE,vali.THIRD_PHASE_CODE,false)); 
           }
        }else{
         res.send(out.responseError(vali.SECOND_PHASE_MESSAGE,vali.SECOND_PHASE_CODE,false));   
        }
    }else{
         res.send(out.responseError(vali.FIRST_PHASE_MESSAGE,vali.FIRST_PHASE_CODE,false));
    }
 }

exports.updateUserImageById = function (req, res) {
    arrofParam = ["_id","image"];

    if(out.FirstPhase(req)==0){
        if(out.SecondPhase(arrofParam,req)==0){
           if(req.body._id && req.body.image){
                //operation
                Models.updateOne({_id : req.body._id },{ image : req.body.image }, function (err, user) {
                    if(err){
                        console.log(err);
                        res.send(out.responseError("user not updated",201,false));
                    }else{
                        res.send(out.responseError("user updated",200,true));
                    }
                });

           }else{
               res.send(out.responseError(vali.THIRD_PHASE_MESSAGE,vali.THIRD_PHASE_CODE,false)); 
           }
        }else{
         res.send(out.responseError(vali.SECOND_PHASE_MESSAGE,vali.SECOND_PHASE_CODE,false));   
        }
    }else{
         res.send(out.responseError(vali.FIRST_PHASE_MESSAGE,vali.FIRST_PHASE_CODE,false));
    }
  }
exports.updatePasswordById = function (req, res) {
    arrofParam = ["_id","oldPassword","newPassword"];

    if(out.FirstPhase(req)==0){
        if(out.SecondPhase(arrofParam,req)==0){
           if(req.body._id && req.body.oldPassword && req.body.newPassword){
                //operation

                Models.findOne({'_id': req.body._id, 'password' : req.body.oldPassword }, function (err, users) {
                    if(users){
                        Models.updateOne({_id : req.body._id },{ password : req.body.newPassword }, function (err, user) {
                            if(err){
                                console.log(err);
                                res.send(out.responseError("password not updated",201,false));
                            }else{
                                res.send(out.responseError("password updated",200,true));
                            }
                        });
                    }else{
                        res.send(out.responseError("old password not match",500,false));
                    }
                });   
           }else{
               res.send(out.responseError(vali.THIRD_PHASE_MESSAGE,vali.THIRD_PHASE_CODE,false)); 
           }
        }else{
         res.send(out.responseError(vali.SECOND_PHASE_MESSAGE,vali.SECOND_PHASE_CODE,false));   
        }
    }else{
         res.send(out.responseError(vali.FIRST_PHASE_MESSAGE,vali.FIRST_PHASE_CODE,false));
    }
  }
  
//#endregion

