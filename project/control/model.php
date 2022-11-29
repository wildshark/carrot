<?php

function __model(){

    if(!isset($_REQUEST["_submit"])){
        header("location: ?page=no-page-found");
    }else{
        switch($_REQUEST["_submit"]){

            case"";

            break;

            default:
        }
    }  
}

?>