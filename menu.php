<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Menu</title>

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
                            <?php
                            session_start();
                            // Check if the user is logged in
                            if (isset($_SESSION['user_id'])) {
                                // User is logged in
                                echo '<li><a href="booking.php">Booking</a></li>';
                                echo '<li><a href="profile.php">Profile</a></li>';
                                echo '<li><a href="logout.php">Log Out</a></li>';
                            } else {
                                // User is not logged in
                                echo '<li><a href="login.php">Log In</a></li>';
                                echo '<li><a href="sign-up.php">Sign Up</a></li>';
                            }
                            ?>
                        </ul>      
                        <!-- ***** Menu End ***** -->    
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <div class="heading-tabs">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <ul>
                                            <li><a href='#tabs-1'><img src="assets/images/tab-icon-01.png" alt="">Breakfast</a></li>
                                            <li><a href='#tabs-2'><img src="assets/images/tab-icon-02.png" alt="">Lunch</a></a></li>
                                            <li><a href='#tabs-3'><img src="assets/images/tab-icon-03.png" alt="">Dinner</a></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <section class='tabs-content'>
                                <article id='tabs-1'>
                                    <h4>Breakfast</h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">
                                                    <?php
                                                    $username = "root";
                                                    $password = "";
                                                    $database = "klassy_cafe";
                                                    $connection = new mysqli("localhost", $username, $password, $database);
                                                    $query = "SELECT * FROM menu WHERE category = 'breakfast'";
                                                    $result = mysqli_query($connection, $query);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            if ($row['menu_id'] % 2 == 0){
                                                                echo '<div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="'. $row['menu_image_path'] .'" alt="">
                                                            <h4>'. $row['menu_name'] .'</h4>
                                                            <p>'. $row['description'] .'</p>
                                                            <div class="price">
                                                                <h6>$'. $row['price'] .'</h6>
                                                            </div>
                                                        </div>
                                                    </div>';
                                                            }
                                                        }
                                                    } else {
                                                        echo "No menu items available.";
                                                    }
                                                    mysqli_close($connection);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="right-list">
                                                    <?php
                                                    $username = "root";
                                                    $password = "";
                                                    $database = "klassy_cafe";
                                                    $connection = new mysqli("localhost", $username, $password, $database);
                                                    $query = "SELECT * FROM menu WHERE category = 'breakfast'";
                                                    $result = mysqli_query($connection, $query);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            if ($row['menu_id'] % 2 == 1){
                                                                echo '<div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="'. $row['menu_image_path'] .'" alt="">
                                                            <h4>'. $row['menu_name'] .'</h4>
                                                            <p>'. $row['description'] .'</p>
                                                            <div class="price">
                                                                <h6>$'. $row['price'] .'</h6>
                                                            </div>
                                                        </div>
                                                    </div>';
                                                            }
                                                        }
                                                    } else {
                                                        echo "No menu items available.";
                                                    }
                                                    mysqli_close($connection);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <hr>
                                <article id='tabs-2'>
                                    <h4>Lunch</h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">
                                                    <?php
                                                    $username = "root";
                                                    $password = "";
                                                    $database = "klassy_cafe";
                                                    $connection = new mysqli("localhost", $username, $password, $database);
                                                    $query = "SELECT * FROM menu WHERE category = 'lunch'";
                                                    $result = mysqli_query($connection, $query);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            if ($row['menu_id'] % 2 == 0){
                                                                echo '<div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="'. $row['menu_image_path'] .'" alt="">
                                                            <h4>'. $row['menu_name'] .'</h4>
                                                            <p>'. $row['description'] .'</p>
                                                            <div class="price">
                                                                <h6>$'. $row['price'] .'</h6>
                                                            </div>
                                                        </div>
                                                    </div>';
                                                            }
                                                        }
                                                    } else {
                                                        echo "No menu items available.";
                                                    }
                                                    mysqli_close($connection);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="right-list">
                                                    <?php
                                                    $username = "root";
                                                    $password = "";
                                                    $database = "klassy_cafe";
                                                    $connection = new mysqli("localhost", $username, $password, $database);
                                                    $query = "SELECT * FROM menu WHERE category = 'lunch'";
                                                    $result = mysqli_query($connection, $query);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            if ($row['menu_id'] % 2 == 1){
                                                                echo '<div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="'. $row['menu_image_path'] .'" alt="">
                                                            <h4>'. $row['menu_name'] .'</h4>
                                                            <p>'. $row['description'] .'</p>
                                                            <div class="price">
                                                                <h6>$'. $row['price'] .'</h6>
                                                            </div>
                                                        </div>
                                                    </div>';
                                                            }
                                                        }
                                                    } else {
                                                        echo "No menu items available.";
                                                    }
                                                    mysqli_close($connection);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <hr>
                                <article id='tabs-3'>
                                    <h4>Dinner</h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">
                                                    <?php
                                                    $username = "root";
                                                    $password = "";
                                                    $database = "klassy_cafe";
                                                    $connection = new mysqli("localhost", $username, $password, $database);
                                                    $query = "SELECT * FROM menu WHERE category = 'dinner'";
                                                    $result = mysqli_query($connection, $query);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            if ($row['menu_id'] % 2 == 0){
                                                                echo '<div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="'. $row['menu_image_path'] .'" alt="">
                                                            <h4>'. $row['menu_name'] .'</h4>
                                                            <p>'. $row['description'] .'</p>
                                                            <div class="price">
                                                                <h6>$'. $row['price'] .'</h6>
                                                            </div>
                                                        </div>
                                                    </div>';
                                                            }
                                                        }
                                                    } else {
                                                        echo "No menu items available.";
                                                    }
                                                    mysqli_close($connection);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="right-list">
                                                    <?php
                                                    $username = "root";
                                                    $password = "";
                                                    $database = "klassy_cafe";
                                                    $connection = new mysqli("localhost", $username, $password, $database);
                                                    $query = "SELECT * FROM menu WHERE category = 'dinner'";
                                                    $result = mysqli_query($connection, $query);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            if ($row['menu_id'] % 2 == 1){
                                                                echo '<div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="'. $row['menu_image_path'] .'" alt="">
                                                            <h4>'. $row['menu_name'] .'</h4>
                                                            <p>'. $row['description'] .'</p>
                                                            <div class="price">
                                                                <h6>$'. $row['price'] .'</h6>
                                                            </div>
                                                        </div>
                                                    </div>';
                                                            }
                                                        }
                                                    } else {
                                                        echo "No menu items available.";
                                                    }
                                                    mysqli_close($connection);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ***** Footer Start ***** -->
    <footer>
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
                        <p>© Copyright Klassy Cafe Co.
                        
                        <br>Design: TemplateMo</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer End ***** -->
</body>
</html>