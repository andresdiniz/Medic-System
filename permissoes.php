<?php 

    $login_cookie = $_COOKIE['login'];
    $tp_cookie = $_COOKIE['tp'];
    $nome_user = $_COOKIE['name'];
    if(!isset($login_cookie)){
        echo ("<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>");
        die();
    }
    if(isset($tp_cookie)){
        $profile = $login_cookie ;
    }else{
        $profile = $login_cookie;
    }
?>