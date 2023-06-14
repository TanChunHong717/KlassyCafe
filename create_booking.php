<?php
    include "./config/database.php";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Retrieve the entered email and password from the login form
        $order_date = $_POST["time"];
        $table_id = $_POST["table"];
        $order_amount = 0;
        $status = "Pending";
        $user_id = $_SESSION["user_id"];

        // Validate form data
        if (empty($time) || empty($table) || empty($menu)) {
            $error = "All fields are required.";
        } else {

                $insertQuery = "INSERT INTO order (order_date, table_id, order_amount, status, user_id) VALUES (?, ?, ?, ?,?)";
                $insertStmt = $conn->prepare($insertQuery);
                $insertStmt->bind_param("ssss", $order_date, $table_id, $order_amount, $status, $user_id);
                $insertStmt->execute();

                // Check if the insertion was successful
                if ($insertStmt->affected_rows > 0) {
                    // Registration successful, redirect to index page
                    header("Location: new-booking.php?success=true");
                    exit();
                } else {
                    $error = "Booking failed. Please try again.";
                }
            }
        }
    header("Location: new-booking.php?error=" . urlencode($error));
    exit();

?>