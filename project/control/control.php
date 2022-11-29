<?php

function uSessionToken(){

}

function uPageMain(){
    
}

function pdoMYSQL_CONNECTION($set = null,$type = null,$dbname = null){
    
    $conn = null; 
    
    if(!is_array($set)){
        return "no-configration-setup";
        exit(0);
    }

    if(is_null($type)){
        return "no-connection-type";
        exit(0);
    }

    if(is_null($dbname)){
        return "no-database";
        exit(0);
    }
     
    try{
        $host = $set['host'];
        $usrn = $set['username'];
        $pwd = $set['password'];  
        $conn = new PDO("mysql:host=$host;dbname=salesbook", $usrn, $pwd);
    }catch(PDOException $e){
        echo "CONNECTION ERROR: ". $e->getMessage();
        exit(0);
    }
    return $conn;
}

function pdoSQLIT_CONNECTION($dbname=null){

    $conn = null;

    if(is_null($dbname)){
        $conn = "no-database";
    }

    try{
        $conn = new PDO("sqlite:".$dbname);
    }catch (Exception $e) {
        echo "CONNECTION ERROR: ". $e->getMessage();
        exit(0);
    }
    return $conn;
}

function uSystemClock($type = null){

    switch($type){

        case"date";
            return date("Y-m-d");
        break;

        case"time";
            return date("H:i:s");
        break;

        default:
            return date("Y-m-d H;i:s");
    }
}
