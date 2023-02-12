
<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$entrar = $_POST['entrar'];

function logando(){
    $login = $_POST['user'];
    $senha = $_POST['pwd'];
    $hash1 = password_hash($senha, PASSWORD_DEFAULT);
    require 'conexao.php';
    $mysqli = conectadb();
    $stmt = $mysqli->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $array = $result->fetch_assoc();
    $id = $array['id'];
    $hash = $array['senha'];
    $tipo = $array['nivel'];
    $name = $array['name'];
    $num_rows = $result->num_rows;
    if($num_rows>0){
        setcookie("tp",$tipo,0,"","",true,true);

        if (password_verify($senha, $hash)){
            date_default_timezone_set('America/Sao_Paulo');
            $data1 = date('Y/m/d H:i:s');
            setcookie("login",$id,time()+28800,"","",true,true);
            setcookie("username",$name,time()+28800);
            function my_session_start() {
                session_start();
                // Do not allow to use too old session ID
                if (!empty($_SESSION['deleted_time']) && $_SESSION['deleted_time'] < time() - 180) {
                    session_destroy();
                    session_start();
                }
            }
            $stmt1 = $mysqli->prepare("UPDATE user SET ultimologin = ? WHERE username = ?");
            $stmt1->bind_param("ss", $data1,$login);
            $stmt1->execute();
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
            $expire = time() + (86400); // 1 dia em segundos
            setcookie("ID", $id, $expire, "/", "", true, true);
            header("Location:index.php");
        }else{
            echo ("<script language='javascript' type='text/javascript'>
            alert('Erro ao fazer login');window.location
            .href='login.html';
            </script>");
            die();
        }
    }else{
        echo ("<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos $hash ');//window.location
            .href='login.html';</script>");
            die();
    }
}
if (isset($entrar)) {
    logando();
}

?>