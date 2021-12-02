<?php


function getRealIP() {

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
           
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
       
        return $_SERVER['REMOTE_ADDR'];
}


$geo = (unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.getRealIP())));
$country = $geo["geoplugin_countryName"];
$service = $geo["geoplugin_continentName"];

$data = array();
$data['Ip'] = getRealIP();
$data['Ciudad'] = $country;
$data['Servidor'] = $service;
echo json_encode($data);
