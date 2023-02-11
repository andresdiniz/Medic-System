<?php
if (isset($_POST["envia"])) {
    $envia = $_POST["envia"];
    var_dump($envia);
    $latitude = $envia["lat"];
    
    $longitude = $envia["lng"];
    
    // Use the latitude and longitude values here as needed
  }else{
    echo "Sem dados de localização";
  }
  ?>