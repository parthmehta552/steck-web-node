
const Models = require('../models/Language');
const out = require('../common');
const vali = require('../constant');

exports.addNewLanguage = function(request,reply) {
    var newLanguage = new Models();
    arraofParam = ["name"];

    if(out.FirstPhase(request)==0){
        if(out.SecondPhase(arraofParam,request)==0){
           if(request.body.name){

                newLanguage.name = request.body.name;    
                //operation
                Models.findOne({'name' : request.body.name },function(err,lang){
                    if(!lang){
                        newLanguage.save(function(err,data){    
            
                            if (!data){
                                console.log(err);
                                reply.send(out.responseError("Language not Inserted !",201,true));
                            }else{
                                console.log(data);
                                reply.send(out.responseError("Language Inserted",200,true));
                              }
                      });
                    }else{
                      reply.send(out.responseError("this language name already exist",201,false));  
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

exports.listAllLanguages = function (req, res) {
    
        Models.find({},{"name" : 1}, function (err, data) {
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