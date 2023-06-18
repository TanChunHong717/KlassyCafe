<?php 
    include "../../config/database.php";
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../../login.php");
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

    <title>Admin Table</title>
    
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css">
    <link rel="stylesheet" href="../../assets/css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="../../assets/css/owl-carousel.css">
    <link rel="stylesheet" href="../../assets/css/lightbox.css">
    <link rel="stylesheet" href="../../assets/css/admin-table.css">
</head>
<body>        
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="../index.php" class="logo">
                            <img src="../../assets/images/klassy-logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="../index.php">Admin Home</a></li>
                            <li><a href="../menu/admin-menu.php">Menu</a></li>
                            <li><a>Table</a></li>
                            <li><a href="../user/view.php">User</a></li>
                            <li><a href="../../logout.php">logout</a></li>
                        </ul>        
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** User List Area Starts ***** -->
    <section class="section" id="about" style="margin-bottom: 120px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Admin</h6>
                            <h2>Table In Restaurant</h2>
                        </div>
                        <div class="text-right" style="margin-bottom: 15px;"><a href="add.php" class="btn btn-outline-secondary">Add Table</a></div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Space</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM `table`";
                                    $result = $conn->query($query);

                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>
                                        <td scope="row">'.$row['table_id'].'</td>
                                        <td><img src="../../'.$row['table_image_path'].'" alt=""></td>
                                        <td>'.$row['table_name'].'</td>
                                        <td>'.$row['table_space'].'</td>
                                        <td><a class="btn btn-outline-secondary" href="update.php?id='.$row['table_id'].'">Update</a></td>
                                        <td><a class="btn btn-outline-secondary" onclick="deleteTable()" href="delete.php?id='.$row['table_id'].'">Delete</a></td>
                                        </tr>
                                        ';
                                    }

                                    $conn->close();
                                ?>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** User List Area Ends ***** -->
                                         
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
        function deleteTable() {
            alert("Do you want to deletet this table? All the order with this table will be also deleted");
        };
    </script>
</body>
</html>