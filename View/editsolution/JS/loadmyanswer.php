<?php
include "../../Model.php";
$m = new Model;
$id=0;
if(!empty($_SESSION['sol_id'])) {
    
   $id = $_SESSION['sol_id'];
   $result = mysql_query("select * from solution_master where s_id=$id");
   $row = mysql_fetch_array($result);

                   $myfile = fopen("../../S_Files/".$row[1],"r") or die("Unable to open");
              echo fread($myfile,filesize("../../S_Files/".$row[1]));
              fclose($myfile);

}
?>
 