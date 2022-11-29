<?php
namespace shell;

class shell_execute{

    public static function getURL($mode = "dome"){

        if($mode !== "live"){
            $url = "http://localhost/carrot/?";
        }else{
            $url = "http://carrot/carrot/?";
        }
        return $url;
    }

    public static function getAuthorization($usrn = null,$pwd = null,$type = 1){
        
        switch($type){

            case 1:
                $auth =[
                    "account"=>7635469912694,
                    "email"=>$usrn,
                    "password"=>$pwd
                ];
            break;

            case 2:
                $auth = $usrn.":". $pwd;
            break;

            case 3:
                $auth = base64_encode($usrn.":". $pwd);
            break;
        }
        return $auth;
    }

    public static function getSESSION_ID($uID = null){
        
        if(!is_null($uID)){
            return $uID;
        }else{
            return 0;
        }
    }

    public static function getCONNECTED(){
        
        $is_connected = false;

        $headers = @get_headers(self::getURL());
        if(!isset($headers)){
            $is_connected = false;
        }else{
            if(strpos($headers[0],'200')===false){
                $is_connected = false;
            } else {
                $is_connected = true;
            }
        }
        return $is_connected;
    }

    public static function getIP(){
        $ipaddress = null;

        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;        
    }

    public static function getGeoLocation($ip = null){
        
        $country = "UNKNOWN";
        $isp = "UNKNOWN";
        if(is_null($ip)){
            $ip = self::getIP();
        }

        $getGeoLocation = json_decode(file_get_contents("https://api.iplocation.net/?ip=".$ip),true);
        if(!isset($getGeoLocation['country_name'])){
            $geo = array(
                "ctry"=>$country,
                "isp"=>$isp
            );
        }else{
            $geo = array(
                "ctry"=>$getGeoLocation['country_name'],
                "isp"=>$getGeoLocation['isp']
            );
        }

        return $geo;
    }

    public static function query_exe($request=null,$uID=null,$type=1){
      
        $response = null;

        if(is_null($request)){
            $response = "";
        }else{

            if($type == 1){
                //request url
                $data_post = http_build_query([
                    "ept"=>"",
                    "q"=>$request
                ]);

                $context_options = array (
                    'ssl'=> array(
                        "verify_peer" => false,
                        "allow_self_signed" => true
                    ),
                    'http' => array (
                        'method' => 'POST',
                        'header'=> "Content-type: application/x-www-form-urlencoded\r\n"
                            . "Content-Length: " . strlen($data_post) . "\r\n",
                        'content' => $data_post
                    )
                );
            }elseif($type == 2){
                //request json
            }elseif($type ==3){
                //request xml
            }   
            
            $context = stream_context_create($context_options);
            $fp = fopen(self::getURL(), 'r', false, $context);
            $response = json_decode(stream_get_contents($fp),true);
        }
        return $response;
    }
}
?>