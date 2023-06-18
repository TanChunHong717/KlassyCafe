<?php
    include "./config/database.php";
    session_start();

    require_once("customer_session_validation.php")

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

    <title>New Reservation</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
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
                <div class="col-lg-8">
                    <div class="item">
                        <div class="img-fill">
                            <img src="assets/images/slide-01.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-content">
                        <div class="inner-content" style="color: white;">
                            <h3>New Reservation</h3><br>
                            <form action="create_booking.php" method="post">
                                <div class="form-group">
                                    <label for="time">Time*</label>
                                    <input class="form-control" id="time" type="time" required name="time">
                                </div>
                                <div class="form-group">
                                    <label for="table">Table*</label>
                                    <select class="custom-select" id="table" required name="table">
                                        <option selected>Open this to select table</option>
                                        <?php
                                            $query = "SELECT * FROM `table`";
                                            $result = $conn->query($query);

                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="'.$row['table_id'].'">'.$row['table_name'].'</option>';
                                            }

                                            $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="menu">Menu</label>
                                    <select class="selectpicker" multiple data-live-search="true" id="menu" name="menu">
                                        <?php

                                        // Query the database to get the menu items
                                        $query = "SELECT * FROM menu";
                                        $result = $conn->query($query);

                                        // Output the menu items as options in a select element
                                        echo '<select class="selectpicker" multiple data-live-search="true" id="menu" name="menu">';
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row['menu_id'].'">'.$row['menu_name'].'</option>';
                                        }
                                        echo '</select>';

                                        // Close the database connection
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <input class="btn btn-light" type="submit" value="Submit">
                            </form>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</body>

</html>