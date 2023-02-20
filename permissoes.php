<?php 
    require "conexao.php";
    $x = MD5(rand(1,150));
    $login_cookie = $_COOKIE['login'];
    $tp_cookie = $_COOKIE['tp'];
    $nome_user = $_COOKIE['username'];

// Do something with the latitude, longitude, and accuracy values



    if(!isset($login_cookie)){
        echo ("<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>");
        die();
    }
        if($tp_cookie == "GER"){
            setcookie("ger",$x,0,"","",true,true);
        }elseif($tp_cookie == "ATD"){
            setcookie("atd",$x,0,"","",true,true);
        }elseif($tp_cookie == "MED"){
            setcookie("med",$x,0,"","",true,true);
        }



?>