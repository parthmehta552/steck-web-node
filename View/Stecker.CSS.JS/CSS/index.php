<?php

/**
 * Created by PhpStorm.
 * User: Parth Mehta
 * Date: 9/10/2017
 * Time: 4:44 PM
 */

//region Use Block
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//endregion
//error_reporting(0);

//region Require Files
require_once '../slim/vendor/autoload.php';
require_once '../model/model.php';
require_once '../controler/utility.php';
require_once '../controler/logger.php';
require_once '../controler/config.php';
require_once '../controler/doctorControler.php';
//endregion

$app = new \Slim\App;

//region test the api /loginDoctor
$app->get('/loginDoctor', function (Request $request, Response $response) {
    $log0 = new logger(" ****** loginDoctor API Call ****** ", "loginDoctor");

    $doctorControler = new doctorControler();

    $arrayofData = array('email' => $request->getQueryParam('email') , 'password' => $request->getQueryParam('password'));

    $response->getBody()->write($doctorControler->loginDoctor($arrayofData));
    return $response;
});
//endregion




$app->run();

?>
