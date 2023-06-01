<?php 
    include "config/database.php";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Retrieve the entered email and password from the login form
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        // Prepare and execute the query to fetch user details
        $query = "SELECT * FROM user WHERE email = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Check if a row is returned
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $storedPassword = $row["password"];
            $user_id=$row["user_id"];
            // Verify the entered password with the stored hashed password
            if (($password === $storedPassword)) {
                // Check if the user is an admin
                if ($row["is_admin"] == 1) {
                    // Redirect to the admin page
                    session_start();
                    $_SESSION["admin"]="admin";
                    $_SESSION["user_id"]=$user_id;

                    header("Location: admin/index.php");
                    exit();
                } else {
                    session_start();
                    $_SESSION["customer"]="customer";
                    $_SESSION["user_id"]=$user_id;

                    // Redirect to the customer page
                    header("Location: index.php");
                    exit();
                }
            }
        }
    
    // If the email or password is incorrect, set the error message
    $error = "Invalid email or password. Please try again.";
    
    // Pass the error message back to login.php using a query parameter
    header("Location: login.php?error=" . urlencode($error));
    exit();
    }
?>