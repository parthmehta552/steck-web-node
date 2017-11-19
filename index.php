<?php

include "Controller/Controller.php";
$h = new Controller;

if(!empty($_REQUEST['sc'])){

    include $h->check($_REQUEST['sc']);


}else{
    include "View/index.php";
    //session_unset($_SESSION["userdata"]);
}

?>
