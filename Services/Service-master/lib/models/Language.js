/**
 * Created by Parth Mehta on 08-08-2017.
 */
//region Declare Mongosse variable and connect to database
var mongoose = require('mongoose');
mongoose.connect('mongodb://127.0.0.1:27017/steckercode');
//endregion

//region Created LanguageSchema
var Schema = mongoose.Schema;
var languageSchema = new Schema({
    name: { type: String, required: true,unique: true },
});
//endregion

//region Exports the LanguageSchema as User Model
var Language = mongoose.model('Language',languageSchema);
module.exports = Language;
//endregion
