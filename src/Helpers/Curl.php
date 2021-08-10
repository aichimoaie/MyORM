<?php


namespace App\MyORM\Helpers;


class Curl
{
    //HARDCODED FOR NOW
    private static $instance = null;
    private static $apiEndpoint = 'http://127.0.0.1:8000';
    private static $ch;


    private function __construct()
    {
        //        $this->apiKey = Crypt::decrypt(SystemConfigurator::where('name', 'RULE_API_TOKEN')->value('value'));
        self::initRequest();
    }

    private static function initRequest()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
//                'Authorization: Bearer ' . $this->apiKey,
                'Content-Type: application/json'
            )
        );
        self::$ch = $ch;
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Curl();
        }
        return self::$instance;
    }

    public static function getRequest($url)
    {
        if (!self::$ch) {
            self::initRequest();
        }
        echo self::$apiEndpoint . $url;
        curl_setopt(self::$ch, CURLOPT_URL, self::$apiEndpoint . $url);
        $response = curl_exec(self::$ch);
        curl_close(self::$ch);
        return $response;
    }


    public static function postRequest($url, $data)
    {
        if (self::$ch) {
            self::initRequest();
        }

        curl_setopt(self::$ch, CURLOPT_URL, self::$apiEndpoint . $url);
        curl_setopt(self::$ch, CURLOPT_POST, true);
        curl_setopt(self::$ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt(self::$ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt(self::$ch, CURLOPT_CUSTOMREQUEST, "POST");
        $response = curl_exec(self::$ch);
        curl_close(self::$ch);
        return $response;
    }

    public static function putRequest($url, $data)
    {
        if (!self::$ch) {
            self::initRequest();
        }
        curl_setopt(self::$ch, CURLOPT_URL, self::$apiEndpoint . $url);
        curl_setopt(self::$ch, CURLOPT_PUT, true);
        curl_setopt(self::$ch, CURLOPT_POSTFIELDS, json_encode($data));
        $response = curl_exec(self::$ch);
        curl_close(self::$ch);
        return $response;
    }

    public static function deleteRequest($url)
    {
        if (!self::$ch) {
            self::initRequest();
        }
        curl_setopt(self::$ch, CURLOPT_URL, self::$apiEndpoint . $url);
        curl_setopt(self::$ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        $response = curl_exec(self::$ch);
        curl_close(self::$ch);
        return $response;
    }
}
