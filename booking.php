<?php
    include "config/database.php";
    require_once("customer_session_validation.php")
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

    <title>Booking</title>

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

    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>KlassyCafe</h4>
                            <h6>THE BEST EXPERIENCE</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="new-booking.php">Book A Table</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="item">
                        <div class="img-fill">
                            <img height="1000" src="assets/images/slide-05.avif" alt="">
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Booking List Area Starts ***** -->
    <section class="section" id="about" style="margin-bottom: 120px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>History Booking</h6>
                            <h2>We Leave A Delicious Memory For You</h2>
                        </div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Time</th>
                                <th scope="col">Table</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Amount(RM)</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $userid=$_SESSION["user_id"];
                                    $query = "SELECT `order`.order_id, user_id, order_date, table_name, `status`, order_amount,GROUP_CONCAT(menu_name) AS menu 
                                    FROM `order` 
                                    JOIN `table` USING (table_id) 
                                    JOIN contain USING (order_id) 
                                    JOIN menu USING (menu_id) 
                                    WHERE `order`.user_id = ".$userid."
                                    GROUP BY order_id";
                                    $result = $conn->query($query);

                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>
                                        <td><input type="checkbox" name="checkboxes[]" value="'.$row['order_id'].'"></td>
                                        <td>'.$row['order_date'].'</td>
                                        <td>'.$row['table_name'].'</td>
                                        <td>'.$row['menu'].'</td>
                                        <td>'.$row['order_amount'].'</td>
                                        <td><span>'.$row['status'].'</span></td>
                                        </tr>
                                        ';
                                    }
                                ?>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Booking List Area Ends ***** -->

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