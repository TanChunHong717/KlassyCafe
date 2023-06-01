<?php 
    $username = "root"; 
    $password = ""; 
    $database = "klassy_cafe"; 
    $conn = new mysqli("localhost", $username, $password, $database); 

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>