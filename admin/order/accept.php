<?php 
    include "../../config/database.php";
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../../login.php");
        exit();
    } 
    if (isset($_POST['checkboxes'])) {
        $selectedCheckboxes = $_POST['checkboxes'];
        
        $query = "UPDATE `order` SET `status` = 'Accept' WHERE order_id IN (";
        foreach ($selectedCheckboxes as $checkboxValue) {
            $query = $query . $checkboxValue . ",";
        }
        $query = rtrim($query, ",").")";
        $result = $conn->query($query);
    } 
    header("Location: ../index.php");
    exit();
?>