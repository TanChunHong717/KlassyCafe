<?php
    require_once("config/database.php");
    require_once("customer_session_validation.php");

    // Check if the delete account button is clicked
    
        // Get the user ID from the session
        $userId = $_SESSION["user_id"];

        // Delete the user account
        $deleteQuery = "DELETE FROM user WHERE user_id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $userId);
        $deleteStmt->execute();

        // Check if the deletion was successful
        if ($deleteStmt->affected_rows > 0) {
            // Clear the session and redirect to the homepage
            session_destroy();
            header("Location: login.php");
            exit();
        } else {
            $errorMsg = "Failed to delete the account. Please try again.";
        }

?>