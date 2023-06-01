
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Log In</title>
    
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
                        <a href="index.php" class="logo">
                            <img src="assets/images/klassy-logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="menu.php">Menu</a></li>
                            <li><a href="sign-up.php">Sign Up</a></li>
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
                            <img src="assets/images/slide-01.jpg" alt="">
                        </div>
                      </div>
                </div>
                <div class="col-lg-4  col-xs-12">
                    <div class="left-content">
                        <div class="inner-content" style="color: white;">
                            <h3>Log In</h3><br>
                            <form action="authenticate_user.php" method="post">
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input class="form-control" id="email" type="email" required name="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password*</label>
                                    <input class="form-control" id="password" type="password" required name="password">
                                </div>
<!--                                <input id="user-log-in" class="btn btn-light" type="submit" value="Log In">-->
                            <button id="user-login" class="btn btn-light">Log In</button>
                            <?php
                                // Check if an error message is set
                                if (isset($_GET['error'])) {
                                    $errorMessage = $_GET['error'];
                                    echo '<p class="error-message">' . $errorMessage . '</p>';
                                }
                            ?>
                            </form>
                            <br>
                            Not Have Account?<br>
                            <a href="sign-up.php" style="color: white;"><u>Sign Up</u></a>
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
<!--
<script>
    const userLoginBtn = document.querySelector("#user-login")
    userLoginBtn.addEventListener('click', (e) =>{
        window.location.href = "./index-after-login.html"
    })
</script>
-->
</body>
</html>
