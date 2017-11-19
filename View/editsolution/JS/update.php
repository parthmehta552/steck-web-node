<?php
include "../../Model.php";
$m = new Model;
$sid = $_SESSION['sol_id'];
if(!empty($_POST["content"])){

    $result = mysql_query("select s_content from solution_master where s_id=$sid");
    $row = mysql_fetch_array($result);
    $content = $_POST["content"];
     $myfile = fopen("../../S_Files/".$row['s_content'],"w") or die("Unable to open file");
     fwrite($myfile,$content);
     fclose($myfile);
   $_SESSION["solution"] = $content;
     echo "<small class='label bg-blue'> Your solution is updated ! </small><br>";
   
    
}else{
    
     echo "<small class='label bg-blue'> Something Wrong try again ! </small><br>";

    
}


?>

