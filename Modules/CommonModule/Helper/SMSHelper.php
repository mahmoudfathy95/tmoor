<?php

namespace Modules\CommonModule\Helper;


trait SMSHelper
{


    function sendMSG($mobile, $msg)
    {

        $url = 'https://mobily.ws/api/msgSend.php';
        $ch = curl_init($url);
        $data = array(
            'apiKey' => '72ef0d17bc9ad9093ad2857dc68a149d',
            'numbers' => $mobile,
            'sender' => 'ALJAL',
            'msg' => $msg,
            "lang" => "3",
            'applicationType' => 68
        );
        $response_data = json_encode($data);
        curl_setopt($ch, CURLOPT_POST, 1);
        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $response_data);
        //Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        //Execute the request
        $result = curl_exec($ch);

    }

}
