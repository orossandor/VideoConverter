<?php

function login($user, $pw){
    if ( !isset( $_SERVER[ 'PHP_AUTH_USER' ] ) ){
        authenticate();
    } else{
       ( $_SERVER['PHP_AUTH_USER'] == $user && $_SERVER['PHP_AUTH_PW'] == $pw ) ? "" : authenticate();
    }
}

function authenticate(){
    header("WWW-Authenticate: Basic realm=\"Private Area\"");
    header("HTTP/1.0 401 Unauthorized");
    echo "Please log in";
    exit;
}
$user   = "admin";
$passw  = "admin";
login($user, $passw);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>
