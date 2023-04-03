<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
  use AuthorizesRequests, ValidatesRequests;

  function pushFlexMessage($encodeJson, $datas)
	{
    $datasReturn = [];
      	$curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $datas['url'],
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $encodeJson,
          CURLOPT_HTTPHEADER => array(
            // "authorization: Bearer ".config('settings.line_token'),
            "Authorization: Bearer m21u5Ow6tzDUH3F50Sam9Tu1EAryLpgwReJ3nSs8p+uvuq2nfcatDfPgHegDnUcJiI9TFkk3pGniYnwO1yx7raWVwdzo/gHZPlJRR4DGo1kIIJaRT/g1MYZWU2oHD27chJWV7HJ2ek6ZlIGGbqyShAdB04t89/1O/w1cDnyilFU=",
            "cache-control: no-cache",
            "content-type: application/json; charset=UTF-8",
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $datasReturn['result'] = 'E';
            $datasReturn['message'] = $err;
        } else {
            if($response == "{}"){
                $datasReturn['result'] = 'Status';
                $datasReturn['message'] = 'Success';
            }else{
                $datasReturn['result'] = 'E';
                $datasReturn['message'] = $response;
            }
        }
        return $datasReturn;
	}

  public function putMessageLine($line_msg, $type)
    {
        $ch = curl_init('https://api.line.me/v2/bot/message/'.$type);
        $autorization = "Authorization: Bearer m21u5Ow6tzDUH3F50Sam9Tu1EAryLpgwReJ3nSs8p+uvuq2nfcatDfPgHegDnUcJiI9TFkk3pGniYnwO1yx7raWVwdzo/gHZPlJRR4DGo1kIIJaRT/g1MYZWU2oHD27chJWV7HJ2ek6ZlIGGbqyShAdB04t89/1O/w1cDnyilFU=";
        $payload = json_encode($line_msg);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $autorization));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # send request
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
