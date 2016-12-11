<?php

class Curl{
    private $cookie = "cookie.txt";
    function __construct() {
        
    }

    public function login($url, $data){
        $fp = fopen($this->cookie, "w");
        fclose($fp);

        $login = curl_init();
        curl_setopt($login, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
        curl_setopt($login, CURLOPT_COOKIEJAR, $this->cookie);
        curl_setopt($login, CURLOPT_COOKIEFILE, $this->cookie);
        curl_setopt($login, CURLOPT_TIMEOUT, 40000);
        curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($login, CURLOPT_URL, $url);
        curl_setopt($login, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.98 Safari/537.36");
        curl_setopt($login, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($login, CURLOPT_POST, TRUE);
        curl_setopt($login, CURLOPT_POSTFIELDS, $data);
        curl_setopt($login, CURLOPT_POSTFIELDS, $data);
        ob_start();

        if (curl_exec($login) === FALSE) {
            die("Curl Failed: " . curl_error($login));
        } else {
            return curl_exec($login);
        }           
    }                  

    public function grab_page($site){
        if(file_exists($this->cookie)){
           // ตั้งเงื่อนไขต่างๆได้ตามใจเลยจ้า;
        }else{

        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSLVERSION, 'SSLv3');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.98 Safari/537.36");
        curl_setopt($ch, CURLOPT_TIMEOUT, 40);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie);
        curl_setopt($ch, CURLOPT_URL, $site);
        ob_start();
        ob_end_flush();

        if (curl_exec($ch) === FALSE) {
            die("Curl Failed: " . curl_error($ch));
        } else {
            return curl_exec($ch);
        }
    }
}
?>