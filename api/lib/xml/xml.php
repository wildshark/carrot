<?php
require_once('vendor/autoload.php');
header('Content-type: text/xml');
use XMLParser\XMLParser;
$xml = XMLParser::encode( $json_arr , 'response' );
echo $xml->asXML();
?>