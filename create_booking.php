<?php
    include "./config/database.php";
    require_once("customer_session_validation.php");

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $date = $_POST['date'];
        $time = $_POST['time'];
        $orderDate = $date . ' ' . $time;
        $tableId = $_POST['table'];
        $menu = $_POST['menu'];
        $userId = $_SESSION["user_id"];

        // Calculate order amount
        $orderAmount = 0;
        $selectMenu = implode(",", $menu);
        $selectMenuQuery = "SELECT SUM(price) AS total_price FROM menu WHERE menu_id IN ($selectMenu)";
        $result = $conn->query($selectMenuQuery);
        $row = $result->fetch_assoc();
        $orderAmount = $row['total_price'];

        $insertOrderQuery = "INSERT INTO `order` (user_id, table_id, order_amount, order_date, status)
                         VALUES (?, ?, ?, ?, 'Pending')";
        $stmt = $conn->prepare($insertOrderQuery);
        $stmt->bind_param("iids", $userId, $tableId, $orderAmount, $orderDate); 
        $stmt->execute();
        $orderId = $stmt->insert_id;

        // Insert into `contain` table
        $insertContainQuery = "INSERT INTO `contain` (order_id, menu_id) VALUES"; 
        foreach ($menu as $menuId) {
            $insertContainQuery = $insertContainQuery."($orderId, $menuId),";
        }
        $insertContainQuery = rtrim($insertContainQuery, ',');
        $stmt = $conn->prepare($insertContainQuery);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows > 0) {
            header("Location: booking.php");
            exit();
        } else {
            echo "Failed to create the order.";
        }

        // Close the prepared statement
        $stmt->close();
    }

    $conn->close();
?>
