const Models = require('../models/Solution');
const out = require('../common');
const vali = require('../constant');
const moment = require('moment-timezone');
var mongoo = require('mongoose');
var logger = require('../logger');




exports.AddNewSolution = function(request,response){
    arrofParam = ["content","users_id","queries_id"];
    var newSolutions = new Models();

    if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arrofParam,request)==0){
           if(request.body.content && request.body.users_id && request.body.queries_id){
            
            newSolutions.content = request.body.content;
            newSolutions.users_id = request.body.users_id;
            newSolutions.queries_id = request.body.queries_id;
            newSolutions.datetime = new Date();
            newSolutions.isBlock = false;

            newSolutions.save(function(err,solution){
                   if(!solution){
                       console.log(err);
                       response.send(out.responseError("solution not inserted !",201,false));
                   }else{
                       console.log(solution);
                       response.send(out.responseError("soltion inserted",200,true));
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


exports.GetSolutionByUserId = function(request,response){
    arrofParam = ["users_id","languages_id","limit"];

    if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arrofParam,request)==0){
           if(request.body.users_id && request.body.languages_id && request.body.limit){
           
            Models.aggregate(
                [
                    {
                       "$lookup" : {
                               "localField": "queries_id", 
                               "from": "queries",
                               "foreignField": "_id",
                               "as" : "getSolution_info" 
                           }
                    },
                    {   
                        $unwind:{
                            path: "$getSolution_info",
                            preserveNullAndEmptyArrays: true
                        
                        }
                        },
                        {
                  $lookup: {
                    from: "users",
                    localField: "getSolution_info.users_id",
                    foreignField: "_id",
                    as: "getSolution_info.userinfo",
                  }
                },{
                      "$match" : { 
                             "isBlock" : false,
                             "users_id" : mongoo.Types.ObjectId(String(request.body.users_id)),
                             "getSolution_info.languages_id" : mongoo.Types.ObjectId(String(request.body.languages_id))
                          }  
                        },{ "$limit" : request.body.limit }
                ]).exec(function(err,soltion){
                    
                    if (Object.keys(soltion).length==0) {
                        response.send(out.responseError("solution not found",201,false));
                        console.log(err);
                    } else {
                        console.log(soltion);
                        
                        response.send(out.responseWithData("solution found",200,true,soltion));
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

exports.GetBlockedSolutionByUserId = function(request,response){
    arrofParam = ["users_id","languages_id","limit"];
    
    logger.info("Get blocked solution on load");

    if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arrofParam,request)==0){
           if(request.body.users_id && request.body.languages_id && request.body.limit){
           
            logger.info("request data : "+request.body);

            Models.aggregate(
                [
                    {
                       "$lookup" : {
                               "localField": "queries_id", 
                               "from": "queries",
                               "foreignField": "_id",
                               "as" : "getSolution_info" 
                           }
                    },
                    {   
                        $unwind:{
                            path: "$getSolution_info",
                            preserveNullAndEmptyArrays: true
                        
                        }
                        },
                        {
                  $lookup: {
                    from: "users",
                    localField: "getSolution_info.users_id",
                    foreignField: "_id",
                    as: "getSolution_info.userinfo",
                  }
                },{
                      "$match" : { 
                             "isBlock" : true,
                             "users_id" : mongoo.Types.ObjectId(String(request.body.users_id)),
                             "getSolution_info.languages_id" : mongoo.Types.ObjectId(String(request.body.languages_id))
                          }  
                        },{ "$limit" : request.body.limit }
                ]).exec(function(err,soltion){
                    
                    if (Object.keys(soltion).length==0) {
                        response.send(out.responseError("solution not found",201,false));
                        console.log(err);
                    } else {
                        console.log(soltion);
                        
                        response.send(out.responseWithData("solution found",200,true,soltion));
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

exports.updateBlockunBlockSolutionById = function(request,response){
    arraOfParam = ["_id","isBlock"];
    
     if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arraOfParam,request)==0){
           if(request.body._id && request.body.isBlock){
                
                //operation
                Models.updateOne({_id : request.body._id },{ isBlock : request.body.isBlock }, function (err, query) {
                    if(err){
                        //console.log(err);
                        response.send(out.responseError("solution not updated",201,false));
                    }else{
                        //console.log(err);
                        response.send(out.responseError("solution updated",200,true));
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

exports.getSolutionUsingId = function (req, res) {
    arrofParam = ["_id"];

    if(out.FirstPhase(req)==0){

        if(out.SecondPhase(arrofParam,req)==0){

           if(req.body._id){

                    Models.findOne({'_id': req.body._id.toString()} , {"content" : 1}, function (err, users) {
                        if (!users) {
                            res.send(out.responseError("solution not found",201,false));
                            console.log(err);
                        } else {
                            console.log(users);
                            res.send(out.responseWithData("solution found",200,true,users));
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


