var winston = require("winston");
winston.emitErrs = true;


var cDate = new Date().toDateString(); 
var filename = "./lib/logs/"+cDate + "-logs.log";

var logger = new winston.Logger({
    transports: [
        new winston.transports.File({
            level: 'info',
            filename: filename,
            handleExceptions: true,
            json: false,
            maxsize: 5242880, //5MB
            maxFiles: 5,
            colorize: true
        }),
        new winston.transports.Console({
            level: 'debug',
            handleExceptions: true,
            json: false,
            colorize: true
        })
    ],
    exitOnError: false
});
module.exports = logger;

