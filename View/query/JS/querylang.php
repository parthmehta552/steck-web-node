<?php
include '../../../Controller/Controller.php';
$con = new Controller;

$result = $con->Get_Data("select * from language_master");
while($row = mysql_fetch_array($result)){
         echo "<li>
         
         <a href='?sc=final&id=".$row["lang_id"]."&lang=".$row["lang_name"]."'>
        
            ".$row["lang_name"]."
         </a>

         </li>";   
}
?>