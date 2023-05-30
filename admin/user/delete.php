<?php 
    include "../../config/database.php";
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../../login.php");
        exit();
    } else if (!isset($_GET['id'])) {
        header("Location: ../index.php");
        exit();
    }

    
    $user_id = $_GET['id'];
    $query = "DELETE FROM user WHERE user_id = '$user_id'";
    $result = $conn->query($query);
    
    header("Location: view.php");
    exit();
?>