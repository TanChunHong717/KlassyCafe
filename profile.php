<?php 
  require_once("customer_session_validation.php");
  include_once ("config/database.php");
  $userid=$_SESSION["user_id"];
  $name = $email = $mobileNumber = $isAdmin = '';
// Prepare and execute the query to fetch user details
  $query = "SELECT * FROM user WHERE user_id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $userid);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows === 1) {
    $userData = $result->fetch_assoc();  
    $email = $userData["email"];
    $name = $userData["name"];
    $mobileNumber = $userData["mobile_number"];
    $isAdmin = $userData["is_admin"];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    <title>User Profile</title>

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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="booking.php">Booking</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php">Log out</a></li>
                    </ul>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<!-- ***** Form Area Start ***** -->
<div id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <div class="left-content">
                    <div class="inner-content" style="color: white; margin-top: 50px;">
                        <h3>Profile</h3><br>
                        <form autocomplete="off" method="post" action="update_profile.php">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" id="name" type="text" required name="name"
                                       value="<?php echo $name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" type="email" required name="email"
                                       value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="mobile-number">Mobile Number</label>
                                <input class="form-control" id="mobile-number" type="text" required name="mobile-number"
                                       value="<?php echo $mobileNumber; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" id="password" type="password" required name="password" value="">
                                <small class="form-text text-muted">Enter the password to update your profile</small>
                            </div>
                            
                            <input class="form-control" class="btn btn-light" type="submit" value="Update"><br>
                            <?php
                                // Check if an error message is set
                                if (isset($_GET['msg'])) {
                                    $message = $_GET['msg'];
                                    echo '<p class="message">' . $message . '</p>';
                                }
                            ?>
                            <button class="btn btn-light" id="delete-account" style="width: 200px">Delete Account</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="item">
                    <div class="img-fill">
                        <img src="assets/images/slide-04.jfif" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Form Area End ***** -->

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
<script>
    const deleteBtn = document.querySelector("#delete-account")
    deleteBtn.addEventListener('click', (event) => {
        let flag = window.confirm("Are you sure to delete this account?")
        if (!flag) {
            return false
        } else {
            window.location.href = "delete_user_profile.php"
        }
    })
</script>
</body>
</html>
