<?php
session_start();

class Controller
{//class start

function check($sc)
{//function start
$rt="";

if($sc=="signup")
{//if start

$rt ="View/signup/index2.php";

}else if($sc=="signin"){

$rt ="View/signin/index2.php";


}else if($sc=="home"){

if(empty($_SESSION['userdata'])){$rt ="View/signin/index2.php";}else{$rt ="View/home/index2.php";}


}else if($sc=="query"){

  if(empty($_SESSION['userdata'])){$rt ="View/signin/index2.php";}else{$rt ="View/query/index2.php";if(!empty($_SESSION['lang_name'])){}else{$rt ="View/home/index2.php";echo "<script>alert('You need to select Language first');</script>";}}


}else if($sc=="settings"){

if(empty($_SESSION['userdata'])){$rt ="View/signin/index2.php";}else{$rt ="View/settings/index2.php";}


}else if($sc=="profile"){

  if(empty($_SESSION['userdata'])){$rt ="View/signin/index2.php";}else{$rt ="View/profile/index2.php";}


}else if($sc=="solution"){

  if(empty($_SESSION['userdata'])){$rt ="View/signin/index2.php";}else{$rt ="View/solution/index2.php";if(!empty($_SESSION['lang_name'])){}else{$rt ="View/home/index2.php";echo "<script>alert('You need to select Language first');</script>";}}


}else if($sc=="logout"){

$rt ="View/logout/logout.php";


}else if($sc=="final"){

$rt ="View/query_redirect/final.php";


}else if($sc=="final2"){

$rt ="View/query_redirect/final2.php";


}else if($sc=="editsol"){

$rt ="View/editsolution/edit.php";


}else if($sc=="editsolution"){

 if(empty($_SESSION['userdata'])){$rt ="View/signin/index2.php";}else{$rt ="View/editsolution/index.php";if(!empty($_SESSION['sol_id'])){}else{$rt ="View/solution/index2.php";echo "<script>alert('You need to edit any answer');</script>";}}


}else
{

$rt ="View/index.php";

}

return $rt;


}//function end


function cUrl_Call($url,$postdata){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$postdata);  //Post Fields
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $headers = [
        'Content-Type: application/json'
          ];
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $server_output = curl_exec ($ch);
    
    curl_close ($ch);

    return json_decode($server_output,true);


}

function cUrl_Call_GET($url){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 0);
    //curl_setopt($ch, CURLOPT_POSTFIELDS,$postdata);  //Post Fields
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $headers = [
        'Content-Type: application/json'
          ];
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $server_output = curl_exec ($ch);
    
    curl_close ($ch);

    return json_decode($server_output,true);


}

function write_file($content,$userid,$qid){
    
    $randomno =rand(000000,999999);
    $filename = $randomno."_".$userid."_".$qid.".txt";
    $fullpath = "../../S_Files/".$filename;
    $myfile = fopen($fullpath, "w") or die("Unable to open file!");
    fwrite($myfile, $content);
    return $filename;
}

function read_file($content){

    $filename = "../../S_Files/".$content;

    $myfile = fopen($filename, "r") or die("Unable to open file!");
    return fread($myfile,filesize($filename));
    fclose($myfile);

}

}//class End





?>