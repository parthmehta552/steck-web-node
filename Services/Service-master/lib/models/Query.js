//region Declare Mongosse variable and connect to database
var mongoose = require('mongoose');
mongoose.connect('mongodb://127.0.0.1:27017/steckercode');
//endregion

var Schema = mongoose.Schema;
    ObjectId = Schema.ObjectId;
var querySchema = new Schema({

    content : { type: String, required:true },
    datetime : { type: String, required:true },
    languages_id : { type: ObjectId,required:true },
    users_id : { type: ObjectId,required: true },
    query_answertime: { type: Number },
    isBlock:Boolean 

});

//region Exports the userSchema as User Model
var Query = mongoose.model('Query',querySchema);
module.exports = Query;
//endregion