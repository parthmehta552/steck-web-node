/**
 * Created by Parth Mehta on 08-08-2017.
 */
//region Declare Mongosse variable and connect to database
var mongoose = require('mongoose');
mongoose.connect('mongodb://127.0.0.1:27017/steckercode');
//endregion

//region Created userSchema
var Schema = mongoose.Schema;
var userSchema = new Schema({
    name: { type: String, required: true},
    email: {  type : String ,required:true,unique: true },
    password: {type: String, required:true},
    image: { type: String ,required:true},
    registerdate: { type: String,required:true},
    admin: Boolean,
    isblock:Boolean
});
//endregion

//region Exports the userSchema as User Model
var User = mongoose.model('User',userSchema);
module.exports = User;
//endregion
