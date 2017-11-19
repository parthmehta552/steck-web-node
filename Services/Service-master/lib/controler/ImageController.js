const Models = require('../models/Image');
const out = require('../common');
const vali = require('../constant');
const moment = require('moment-timezone');

exports.addNewImage = function(request,reply) {
    arraofParam = ["path","referType","referId","caption"];
    var newImage = new Models();

    if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arraofParam,request)==0){
           if(request.body.path && request.body.referType && request.body.referId && request.body.caption){

                newImage.path = request.body.path;
                newImage.datetime = new Date();
                newImage.referType = request.body.referType;
                newImage.referId = request.body.referId;
                newImage.caption = request.body.caption;
                newImage.isBlock = false;
                //operation
                        newImage.save(function(err,data){    
                            if (!data){
                                console.log(err);
                                reply.send(out.responseError("Image not Inserted !",201,true));
                            }else{
                                console.log(data);
                                reply.send(out.responseError("Image Inserted",200,true));
                            }
                      });


             }else{
            reply.send(out.responseError(vali.THIRD_PHASE_MESSAGE,vali.THIRD_PHASE_CODE,false)); 
           }
        }else{
            reply.send(out.responseError(vali.SECOND_PHASE_MESSAGE,vali.SECOND_PHASE_CODE,false));   
        }
    }else{
        reply.send(out.responseError(vali.FIRST_PHASE_MESSAGE,vali.FIRST_PHASE_CODE,false));
    }
 }

exports.getImagesById = function(request,response) {
    arraofParam = ["referId","isBlock","referType"];
    if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arraofParam,request)==0){
           if(request.body.referId && request.body.referType && request.body.isBlock){
            Models.find({"referId" : request.body.referId , "referType" : request.body.referType , "isBlock" : request.body.isBlock},function(err,images){
                 if(Object.keys(images).length>0){
                      response.send(out.responseWithData("images found",200,true,images));       
                 }else{
                     console.log(images);
                     response.send(out.responseWithData("images not found",201,false,images));
                 }   
            });
        }else{
            response.send(out.responseError(vali.THIRD_PHASE_MESSAGE,vali.THIRD_PHASE_CODE,false)); 
           }
        }else{
            response.send(out.responseError(vali.SECOND_PHASE_MESSAGE,vali.SECOND_PHASE_CODE,false));   
        }
    }else{
        response.send(out.responseError(vali.FIRST_PHASE_MESSAGE,vali.FIRST_PHASE_CODE,false));
    }
 }

exports.updateImagebyId = function(request,response){
    arraofParam = ["_id","path","caption"];
    if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arraofParam,request)==0){
           if(request.body._id){
            
            Models.updateOne({_id : request.body._id },{ path : request.body.path , caption : request.body.caption }, function (err, image) {
                if(err){
                    console.log(err);
                    response.send(out.responseError("image not updated",201,false));
                }else{
                    console.log(image);
                    response.send(out.responseError("image updated",200,true));
                }
            });

        
            }else{
            response.send(out.responseError(vali.THIRD_PHASE_MESSAGE,vali.THIRD_PHASE_CODE,false)); 
           }
        }else{
            response.send(out.responseError(vali.SECOND_PHASE_MESSAGE,vali.SECOND_PHASE_CODE,false));   
        }
    }else{
        response.send(out.responseError(vali.FIRST_PHASE_MESSAGE,vali.FIRST_PHASE_CODE,false));
    }
 }
exports.imageBlockUnblock = function(request,response){
    arraofParam = ["_id","isBlock"];
    if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arraofParam,request)==0){
           if(request.body._id && request.body.isBlock){
            
            Models.updateOne({_id : request.body._id },{ isBlock : request.body.isBlock}, function (err, image) {
                if(err){
                    response.send(out.responseError("image not updated",201,false));
                }else{
                    response.send(out.responseError("image updated",200,true));
                }
            });

        
            }else{
            response.send(out.responseError(vali.THIRD_PHASE_MESSAGE,vali.THIRD_PHASE_CODE,false)); 
           }
        }else{
            response.send(out.responseError(vali.SECOND_PHASE_MESSAGE,vali.SECOND_PHASE_CODE,false));   
        }
    }else{
        response.send(out.responseError(vali.FIRST_PHASE_MESSAGE,vali.FIRST_PHASE_CODE,false));
    }
 }
