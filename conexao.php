<?php
function conectadb(){
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "medicsystem";

    // Crear conexión
    $mysqli = mysqli_connect($host, $username, $password, $dbname);

    // Verificar conexión
    if (!$mysqli) {
        die("Erro de conexão: " . mysqli_connect_error());
    }else{
        return $mysqli;
    }

    // Cerrar conexión
    //mysqli_close($conn);
    
}
?>