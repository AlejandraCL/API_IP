<?php


function getRealIP() {

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
           
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
       
        return $_SERVER['REMOTE_ADDR'];
}


$API = (unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.getRealIP())));
$Country = $API["geoplugin_countryName"];
$Service = $API["geoplugin_continentName"];

$Data = array();
$Data['Ip'] = getRealIP();
$Data['Ciudad'] = $Country;
$Data['Servidor'] = $Service;
echo json_encode($Data);
