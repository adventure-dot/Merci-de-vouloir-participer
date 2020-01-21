<?php
function getLocationDataFromApi(){
    $ip = getRealIpAddr();
    $details = json_decode(file_get_contents('http://ip-api.com/json/' . $ip), true);
    if ($details['countryCode'] != null){
        return $details['countryCode'];
    } else return false;
}

function getRealIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return explode(", ", $ip)[0];
}