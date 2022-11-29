<?php
/****************************************************************
 * Carrot API Framework 1.0
 * Develop by Andrew Quaye
 * Copyright iQuipe Digital Enterprise
 * Email iquipe@outlook.com
 * Mobile +233 548 263 738
 * License MIT
 ***************************************************************/
require_once("./funcation.php");
session_start();

$response = null;
$req = null;
$status = "running";
$_output_response = 1;

$host = "localhost";
$usrn = "root";
$pwd = "";
$port = "3306";
$dbname = "banca";

try{
    $conn = new PDO("mysql:host=$host;dbname=banca", $usrn, $pwd);

    $req = "";
    //request in json
    $req = json_decode(file_get_contents('php://input'),true);
    //funcation and optration 
    //start program

    //end program
}catch(PDOException $e){
    $response = [
        "err_num"=>50555,
        "msg"=>$e->getMessage()
    ];
}

$json_arr = array(
    "clock" => time(),
    "status"=> $status,
    "response"=>$response
);

if((isset($response['err_num'])) ||(is_null($response))){
    http_response_code(500);
}else{
    http_response_code(200); 
}
session_destroy(); 

if($_output_response != 1){
    header('Access-Control-Allow-Origin: *');
    header("Content-type: application/json; charset=utf-8");
    echo json_encode($json_arr);
}else{
    require_once("./lib/xml/xml.php");
}


?>