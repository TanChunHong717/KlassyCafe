<?php 
  include "config/database.php";
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("config/database.php");

    // Initialize variables
    $name = $email = $mobileNumber = $password = $confirmPassword = '';
    $error = '';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Retrieve form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $mobileNumber = $_POST["mobile-number"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["password-repeat"];

        // Validate form data
        if (empty($name) || empty($email) || empty($mobileNumber) || empty($password) || empty($confirmPassword)) {
            $error = "All fields are required.";
        } elseif ($password !== $confirmPassword) {
            $error = "Passwords do not match.";
        } else {
            // Check if the email is already registered
            $query = "SELECT * FROM user WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $error = "Email is already registered.";
            } else {
                // Insert the new user into the database
               
                $insertQuery = "INSERT INTO user (name, email, mobile_number, password) VALUES (?, ?, ?, ?)";
                $insertStmt = $conn->prepare($insertQuery);
                $insertStmt->bind_param("ssss", $name, $email, $mobileNumber, $password);
                $insertStmt->execute();

                // Check if the insertion was successful
                if ($insertStmt->affected_rows > 0) {
                    // Registration successful, redirect to index page
                    header("Location: login.php");
                    exit();
                } else {
                    $error = "Registration failed. Please try again.";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Sign Up</title>
    
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
</head>
<body>        
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="menu.html">Menu</a></li>
                            <li><a href="login.html">Log In</a></li>
                            <li><a>Sign Up</a></li>
                        </ul>        
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="item">
                        <div class="img-fill">
                            <img src="assets/images/slide-02.jpg" alt="">
                        </div>
                      </div>
                </div>
                <div class="col-lg-4  col-xs-12">
                    <div class="left-content">
                        <div class="inner-content" style="color: white; margin-top: 40px;">
                            <h3>Sign Up</h3><br>
                            <?php if (!empty($error)) : ?>
                                <p style="color: white;"><?php echo $error; ?></p>
                            <?php endif; ?>
                            <form  action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                <div class="form-group">
                                    <label for="name">Name*</label>
                                    <input class="form-control" id="name" type="text" required name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input class="form-control" id="email" type="email" required name="email">
                                </div>
                                <div class="form-group">
                                    <label for="mobile-number">Mobile Number*</label>
                                    <input class="form-control" id="mobile-number" type="text" required name="mobile-number">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password*</label>
                                    <input class="form-control" id="password" type="password" required name="password">
                                </div>
                                <div class="form-group">
                                    <label for="password">Repeat Password*</label>
                                    <input class="form-control" id="repeat-password" type="password" required name="password-repeat">
                                </div>
                                <input class="form-control" style="margin-top: 20px;" class="btn btn-light" type="submit" value="Sign Up">
                            </form>
                            <br>
                            Already Have Account?
                            <a href="login.php" style="color: white;"><u>Log In</u></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Footer Start ***** -->
    <footer style="margin-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer End ***** -->
</body>
</html>