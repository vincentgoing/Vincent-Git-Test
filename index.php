<?php

if( !isset($_SERVER['PHP_AUTH_USER']) )
{
    $server_http_auth = isset($_SERVER["HTTP_AUTHORIZATION"])?$_SERVER["HTTP_AUTHORIZATION"]:$_SERVER["REDIRECT_HTTP_AUTHORIZATION"];
    
    list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', base64_decode(substr($server_http_auth, 6)));
    if( strlen($_SERVER['PHP_AUTH_USER']) == 0 || strlen($_SERVER['PHP_AUTH_PW']) == 0 )
    {
        unset($_SERVER['PHP_AUTH_USER']);
        unset($_SERVER['PHP_AUTH_PW']);
    }
}

include("xcache.php");

echo phpinfo();