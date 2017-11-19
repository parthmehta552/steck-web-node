<?php
$id=0;
//include "View/Model.php";
include '../../../Controller/Controller.php';
$con = new Controller;

if(isset($_REQUEST['id'])){

    $id = $_REQUEST['id'];
    $_SESSION['sol_id'] = $id;
    $result = $con->Get_Data("select * from solution_master where s_id=$id");
   $row = mysql_fetch_array($result);

                   $myfile = fopen("View/S_Files/".$row[1],"r") or die("Unable to open");
              $_SESSION['solution'] = fread($myfile,filesize("View/S_Files/".$row[1]));
              fclose($myfile);

        header("location:?sc=editsolution");
    

}else{

}
?>
