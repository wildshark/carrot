<?php

function uSessionToken(){

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

?>