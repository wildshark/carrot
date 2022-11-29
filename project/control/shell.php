<?php
namespace shellEXE;

class shell{

    public static function getURL($mode = "dome"){

        if($mode !== "live"){
            $url = "http://localhost/gbankash/?";
        }else{
            $url = "http://161.35.237.70/gbankash/?";
        }
        return $url;

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