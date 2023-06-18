<?php

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
                                <a href="new-booking.html">Book A Table</a>
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
                                <th></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                    //get all booking from database
                                    // assuming you have already established a database connection
                                    // and have stored the user id in a variable called $user_id

                                    // prepare the SQL statement
                                    $sql = "SELECT * FROM bookings WHERE user_id = :user_id";

                                    // prepare the statement
                                    $stmt = $pdo->prepare($sql);

                                    // bind the user id parameter
                                    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

                                    // execute the statement
                                    $stmt->execute();

                                    // fetch all the results as an associative array
                                    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    // loop through the bookings and output them in the table
                                    foreach ($bookings as $booking) {
                                        echo "<tr>";
                                        echo "<th scope='row'>" . $booking['id'] . "</th>";
                                        echo "<td>" . $booking['time'] . "</td>";
                                        echo "<td>" . $booking['table'] . "</td>";
                                        echo "<td>" . $booking['menu'] . "</td>";
                                        echo "<td><a class='btn btn-outline-secondary'>Update</a></td>";
                                        echo "<td><a class='btn btn-outline-secondary'>Cancel</a></td>";
                                        echo "</tr>";
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