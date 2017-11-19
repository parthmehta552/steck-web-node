/**
 * Created by Parth Mehta on 08-08-2017.
 */
//region Declare Mongosse variable and connect to database
var mongoose = require('mongoose');
mongoose.connect('mongodb://127.0.0.1:27017/steckercode');
//endregion

//region Created ImageSchema
var Schema = mongoose.Schema;
    ObjectId = Schema.ObjectId;
    
var ImageSchema = new Schema({
    path: {type: String, required: true},
    caption: {type :String ,required : true},
    datetime: {type : String,required : true},
    referType: {type : Number, required : true},
    referId: {type : ObjectId ,required : true},
    isBlock: {type : Boolean }
});

/*
refer Type : 2001 : Query 
             2002 : Solution
*/

//endregion

//region Exports the ImageSchema as Image Model
var Image = mongoose.model('Image',ImageSchema);
module.exports = Image;
//endregion
