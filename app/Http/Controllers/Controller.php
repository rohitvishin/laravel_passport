<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function search(){
        $key=keyIsExist($header);
        if($config['key']==$key && $key!=FALSE){
            $url = "http://".$config['url'].".services.travelomatix.com/webservices/index.php/flight/service/Search";
            $data=$_GET['data'];
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_ENCODING, "gzip,deflate");
            curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $config['api']);
            $result = curl_exec($curl);
            curl_close($curl);
            echo $result;
            if(empty($result) || is_null($result)){
                $response['Status']=0;
                echo json_encode($response);
                exit;
            }
        }
        else{
            $response['Status']=0;
            $response['Message']='Invalid key';
            echo json_encode($response);
            exit;
        }
    }
}
