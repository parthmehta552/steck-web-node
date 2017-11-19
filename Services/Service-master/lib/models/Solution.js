/**
 * Created by Parth Mehta on 08-08-2017.
 */
//region Declare Mongosse variable and connect to database
var mongoose = require('mongoose');
mongoose.connect('mongodb://127.0.0.1:27017/steckercode');
//endregion

//region Created SolutionSchema
var Schema = mongoose.Schema;
    ObjectId = Schema.ObjectId;
    
var SolutionSchema = new Schema({
    content: {type: String, required: true},
    datetime: {type : String,required : true},
    users_id: {type : ObjectId ,required : true},
    queries_id: {type : ObjectId ,required : true},
    isBlock: {type : Boolean }
});
//endregion

//region Exports the ImageSchema as Image Model
var Solution = mongoose.model('Solution',SolutionSchema);
module.exports = Solution;
//endregion