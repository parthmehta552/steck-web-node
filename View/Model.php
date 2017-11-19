<?php
date_default_timezone_set("Asia/Kolkata");
session_start();

class Model

{

function  __construct()
{
  $link =  mysql_connect("localhost","root","");
  mysql_select_db("steckercode",$link);
	
}

function Iud_Data($q)
{
  mysql_query($q);
}


function Get_Data($query)
{
 $data = mysql_query($query);
  return $data;
}

}

?>
