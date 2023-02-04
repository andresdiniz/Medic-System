<?php
    $host = "localhost";
    $username = "root@localhost";
    $password = "";
    $dbname = "medic-system";

    // Crear conexión
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Verificar conexión
    if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
    }
    echo "Conexão bem-sucedida";

    $mysqli = $conn;
    // Cerrar conexión
    mysqli_close($conn);
    return $mysqli;
?>