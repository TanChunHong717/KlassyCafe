<?php 
    include "../config/database.php";
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../login.php");
        exit();
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

    <title>Admin Home</title>
    
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="../assets/css/owl-carousel.css">
    <link rel="stylesheet" href="../assets/css/lightbox.css">
</head>
<body>        
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="../assets/images/klassy-logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a>Admin Home</a></li>
                            <li><a href="menu/view.php">Menu</a></li>
                            <li><a href="table/view.php">Table</a></li>
                            <li><a href="user/view.php">User</a></li>
                            <li><a href="../logout.php">logout</a></li>
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
                            <h6>EVERTHING IS UNDER CONTROL</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="#orders">Customer Order</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="item">
                        <div class="img-fill">
                            <img src="../assets/images/slide-01.jpg" alt="">
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Booking List Area Starts ***** -->
    <section class="section" id="orders" style="margin-top: 50px;margin-bottom: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Admin</h6>
                            <h2>Customer Booking</h2>
                        </div>
                        <form id="form" method="post">
                            <table class="table">
                                <caption>
                                    <input type="submit" value="Accept" onclick="setAction('order/accept.php')">
                                    <input type="submit" value="Denied" onclick="setAction('order/denied.php')">
                                </caption>
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
                                        $query = "SELECT `order`.order_id, order_date, table_name, `status`, order_amount,GROUP_CONCAT(menu_name) AS menu FROM `order` JOIN `table` USING (table_id) JOIN contain USING (order_id) JOIN menu USING (menu_id) GROUP BY order_id";
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
    
                                        $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Booking List Area Ends ***** -->
                                         
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
                        <p>© Copyright Klassy Cafe Co.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer End ***** -->

<script>
  function setAction(action) {
    document.getElementById('form').action = action;
  }
</script>
</body>
</html>