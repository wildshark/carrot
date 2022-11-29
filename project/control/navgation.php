<?php

function __main($apps,$template=false,$request=false){
    
    if(!isset($_REQUEST['main'])){
        header("location: ?page=no-page-found");
        exit(0);
    }else{

        $page = $_REQUEST['main'];
        setcookie("uPage",$page);
    
        switch($page){

            case"dsshboard";

            break;

            default:

        }
    } 
}

?>