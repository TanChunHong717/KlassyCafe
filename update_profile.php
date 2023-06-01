<?php 
  require_once("customer_session_validation.php");
  include_once ("config/database.php");
  $userid=$_SESSION["user_id"];
  $msg=$name = $email = $mobileNumber = $isAdmin = '';
// Prepare and execute the query to fetch user details
  $query = "SELECT * FROM user WHERE user_id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $userid);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows === 1) {
     $userData = $result->fetch_assoc();
   
     $password=$userData["password"];
    if($password === $_POST["password"]){
      $email = $_POST["email"];
      $name = $_POST["name"];
      $mobileNumber = $_POST["mobile-number"];
      $update_query = "UPDATE user SET name = ?, email = ?, mobile_number = ? WHERE user_id = ?";
      $update_stmt = $conn->prepare($update_query);
      $update_stmt->bind_param("sssi", $name, $email, $mobileNumber, $userid);
      $update_stmt->execute();
       // Check if the update was successful
      if ($update_stmt->affected_rows > 0) {
         $msg="Succesfully updated" ;
        // Redirect to a success page or display a success message
        header("Location: profile.php?msg=" . urlencode($msg));
        exit();
    } else {
        $msg="There was an error" ;
        // Redirect to an error page or display an error message
        header("Location: profile.php?msg=". urlencode($msg));
        exit();
    }
    }
    else{
     $msg = "Invalid password. Please try again.";
    
    // Pass the error message back to login.php using a query parameter
     header("Location: profile.php?msg=" . urlencode($msg));
     exit();
    }
    }
    else{
      exit();
    }
  
?>