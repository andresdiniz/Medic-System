<?php
#ini_set('display_errors', 1);
#error_reporting(E_ALL);
require 'conexao.php';

$login = $_POST['user'];
$senha = $_POST['pwd'];
$entrar = $_POST['entrar'];
conecta();

if (isset($entrar)) {
    $verifica = mysqli_query($mysqli,"SELECT * FROM users WHERE username ='$login'") 
    or die("erro ao selecionar");
    $array = mysqli_fetch_assoc($verifica);
    $id = $array['id'];
    $hash = $array['senha'];
    echo $hash;
    
    $name = $array['nome'];
        if($array['tipo'] == 'ADM'){
        setcookie("adm",$name);
        }else{
        setcookie("userpadrao",$name);
    }
    
    if (password_verify($senha, $hash)){
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y \à\s H:i:s');
        $query = mysqli_query($mysqli,"UPDATE users SET ultimologin = '$data' WHERE username ='$login'");
        setcookie("login",$name,time()+28800);
        function my_session_start() {
            session_start();
            // Do not allow to use too old session ID
            if (!empty($_SESSION['deleted_time']) && $_SESSION['deleted_time'] < time() - 180) {
                session_destroy();
                session_start();
            }
        }

        // My session regenerate id function
        function my_session_regenerate_id() {
            // Call session_create_id() while session is active to 
            // make sure collision free.
            if (session_status() != PHP_SESSION_ACTIVE) {
                session_start();
            }
            // WARNING: Never use confidential strings for prefix!
            $newid = session_create_id('myprefix-');
            // Set deleted timestamp. Session data must not be deleted immediately for reasons.
            $_SESSION['deleted_time'] = time();
            // Finish session
            session_commit();
            // Make sure to accept user defined session ID
            // NOTE: You must enable use_strict_mode for normal operations.
            ini_set('session.use_strict_mode', 0);
            // Set new custom session ID
            session_id($newid);
            // Start with custom session ID
            session_start();
            
        }
        
        // Make sure use_strict_mode is enabled.
        // use_strict_mode is mandatory for security reasons.
        ini_set('session.use_strict_mode', 1);
        my_session_start();
        
        // Session ID must be regenerated when
        //  - User logged in
        //  - User logged out
        //  - Certain period has passed
        my_session_regenerate_id();
        header("Location:index.php");
      }else{
        echo ("<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos $hash ');window.location
        .href='login.php';</script>");
        die();
      }
        
  }
?>