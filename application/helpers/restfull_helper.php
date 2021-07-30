<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * Author    : Fauzan Falah
 * apps      : CodeIgniter RestServer
 * Website   : https://www.codekop.com/
 * 
 * 
 * 
 * 
 */

if(!function_exists('url_get_api')) {
    function url_get_api($url) {
        $header = array(
            'Accept: application/json',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        //curl_setopt($ch, CURLOPT_POST, 1);
        $result = curl_exec($ch);
        return json_decode($result);
    }
}