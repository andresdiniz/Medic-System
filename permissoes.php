<?php 
    $login_cookie = $_COOKIE['login'];
    $adm_cookie = $_COOKIE['adm'];
    if(!isset($login_cookie)){
        echo ("<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>");
        die();
    }
    if(isset($adm_cookie)){
        $profile = $login_cookie ;
    }else{
        $profile = $login_cookie;
    }
?>