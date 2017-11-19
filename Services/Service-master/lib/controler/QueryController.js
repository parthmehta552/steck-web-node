//#region Require modules
const Models = require('../models/Query');
const out = require('../common');
const vali = require('../constant');
var mongoo = require('mongoose');
const validate = require('validator');
const moment = require('moment-timezone');
//#endregion


exports.addNewQuery = function (request,response){
    var newQuery = new Models();
    arraOfParam = ["content","languages_id","users_id","query_answertime"]; 

    newQuery.datetime = new Date();
    newQuery.isBlock = false;
    
    if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arraOfParam,request)==0){
           if(request.body.content && request.body.languages_id && request.body.users_id){
               
        
                newQuery.content = request.body.content;
                newQuery.languages_id = request.body.languages_id;
                newQuery.users_id = request.body.users_id;
                newQuery.query_answertime = request.body.query_answertime;    
                //operation
                newQuery.save(function(err,query){
                    if(!query){
                       console.log(err);
                       response.send(out.responseError("Query not inserted",201,false));     
                    }else{
                       console.log(query);
                       response.send(out.responseError("Query is inserted",200,true)); 
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

exports.getdatabyUidandLid = function(request,response){
   arraOfParam = ["languages_id","users_id","isBlock"];

   if(out.FirstPhase(request)==0){
    if(out.SecondPhase(arraOfParam,request)==0){
       if(request.body.languages_id && request.body.users_id && request.body.isBlock){
            
            //operation
            Models.find({'languages_id': request.body.languages_id, 'users_id' : request.body.users_id, 'isBlock' : request.body.isBlock} , {}, function (err, query) {
                if (Object.keys(query).length==0) {
                    response.send(out.responseError("query not found",201,false));
                    console.log(err);
                } else {
                    console.log(query);
                    response.send(out.responseWithData("query found",200,true,query));
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

exports.getDataByLanguageId = function(request,response){

    arraOfParam = ["languages_id"];
    
    if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arraOfParam,request)==0){
           if(request.body.languages_id){
                
                //operation
                Models.aggregate(
                    [ { "$lookup" : {"localField": "users_id","from": "users", "foreignField": "_id","as" : "userinfo" } },{
                        "$match" : { 
                               "isBlock" : false,
                               "languages_id" : mongoo.Types.ObjectId(String(request.body.languages_id))
                            }  
                          },{ "$sort" : {  "_id" : -1  }  } ]).exec(function(err,query){
                        
                        if (Object.keys(query).length==0) {
                            response.send(out.responseError("query not found",201,false));
                            console.log(err);
                        } else {
                            console.log(query);
                            
                            response.send(out.responseWithData("query found",200,true,query));
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

exports.getDataBy_Id = function(request,response){
    arraOfParam = ["_id"];
    if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arraOfParam,request)==0){
           if(request.body._id){
                
                //operation
                Models.find({'_id': request.body._id} , {}, function (err, query) {
                    if (!query) {
                        response.send(out.responseError("query not found",201,false));
                        console.log(err);
                    } else {
                        console.log(query);
                        response.send(out.responseWithData("query found",200,true,query));
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
exports.getDataByContent = function(request,response){
    arraOfParam = ["content","isBlock"];
    if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arraOfParam,request)==0){
           if(request.body.content && request.body.isBlock){
                
                //operation
                Models.find({'content': request.body.content,'isBlock' : request.body.isBlock} , {}, function (err, query) {
                    if (!query) {
                        response.send(out.responseError("query not found",201,false));
                        console.log(err);
                    } else {
                        console.log(query);
                        response.send(out.responseWithData("query found",200,true,query));
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

exports.updateblockby_id = function(request,response){
 arraOfParam = ["_id","isBlock"];

 if(out.FirstPhase(request)==0){
    if(out.SecondPhase(arraOfParam,request)==0){
       if(request.body._id && request.body.isBlock){
            
            //operation
            Models.updateOne({_id : request.body._id },{ isBlock : request.body.isBlock }, function (err, query) {
                if(err){
                    //console.log(err);
                    response.send(out.responseError("query not updated",201,false));
                }else{
                    //console.log(err);
                    response.send(out.responseError("query updated",200,true));
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

exports.updateContentby_id = function(request,response){
    arraOfParam = ["_id","content"];
    
    if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arraOfParam,request)==0){
           if(request.body._id && request.body.content){
                
                //operation
                Models.updateOne({_id : request.body._id },{ content : request.body.content }, function (err, query) {
                    if(err){
                        console.log(err);
                        response.send(out.responseError("query not updated",201,false));
                    }else{
                        response.send(out.responseError("query updated",200,true));
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
exports.getDataByLanguageForSolutionId = function(request,response){
    
        arraOfParam = ["languages_id","limit"];
        
        if(out.FirstPhase(request)==0){
            if(out.SecondPhase(arraOfParam,request)==0){
               if(request.body.languages_id && request.body.limit){
                    
                    //operation
                    Models.aggregate(
                        [ { "$lookup" : {"localField": "users_id","from": "users", "foreignField": "_id","as" : "userinfo" } },{
                            "$match" : { 
                                   "isBlock" : false,
                                   "languages_id" : mongoo.Types.ObjectId(String(request.body.languages_id))
                                }  
                              },{ "$sort" : {  "_id" : 1  }  },{ "$limit" : request.body.limit } ]).exec(function(err,query){
                            
                            if (Object.keys(query).length==0) {
                                response.send(out.responseError("query not found",201,false));
                                console.log(err);
                            } else {
                                console.log(query);
                                
                                response.send(out.responseWithData("query found",200,true,query));
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
exports.getDataByContentForSolution = function(request,response){
    
        arraOfParam = ["content","languages_id"];
        
        if(out.FirstPhase(request)==0){
            if(out.SecondPhase(arraOfParam,request)==0){
               if(request.body.content && request.body.languages_id){
                    
                    //operation
                    Models.aggregate(
                        [ { "$lookup" : {"localField": "users_id","from": "users", "foreignField": "_id","as" : "userinfo" } },{
                            "$match" : { 
                                   "isBlock" : false,
                                   "content" : { $regex: request.body.content,$options: "i" },
                                   "languages_id" : mongoo.Types.ObjectId(String(request.body.languages_id))
                                }  
                              },{ "$sort" : {  "_id" : 1  }  }]).exec(function(err,query){
                            
                            if (Object.keys(query).length==0) {
                                response.send(out.responseError("query not found",201,false));
                                console.log(err);
                            } else {
                                console.log(query);
                                
                                response.send(out.responseWithData("query found",200,true,query));
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