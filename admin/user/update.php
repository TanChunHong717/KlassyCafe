<?php 
    include "../../config/database.php";
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../../login.php");
        exit();
    } else if (!isset($_GET['id']) && !isset($_POST['id'])) {
        header("Location: ../index.php");
        exit();
    }

    $query = "SELECT * FROM user WHERE user_id = ". ($_GET['id'] ?? $_POST['id']);
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
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

    <title>Update User</title>
    
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css">
    <link rel="stylesheet" href="../../assets/css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="../../assets/css/owl-carousel.css">
    <link rel="stylesheet" href="../../assets/css/lightbox.css">
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
                            <img src="../../assets/images/klassy-logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="../index.php">Admin Home</a></li>
                            <li><a href="../menu/view.php">Menu</a></li>
                            <li><a href="../table/view.php">Table</a></li>
                            <li><a href="../../logout.php">logout</a></li>
                            <li><a>User</a></li>
                        </ul>        
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** User List Area Starts ***** -->
    <section class="section" id="about" style="margin-bottom: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Admin</h6>
                            <h2>Existing User</h2>
                        </div>
                        <div>
                            <h3>Update User</h3><br>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
                                <div class="form-group">
                                    <label for="name">Name*</label>
                                    <input class="form-control" id="name" type="text" required name="name" value="<?php echo $row['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input class="form-control" id="email" type="email" required name="email" value="<?php echo $row['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="mobile-number">Mobile Number*</label>
                                    <input class="form-control" id="mobile-number" type="text" required name="mobile_number" value="<?php echo $row['mobile_number']; ?>">
                                </div>
                                <?php 
                                    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile_number'])) {
                                        $user_id = $_POST['id'];
                                        $name = $_POST['name'];
                                        $email = $_POST['email'];
                                        $mobile_number = $_POST['mobile_number'];
                                            
                                        $query = "UPDATE user SET name='$name', email='$email', password='$password', mobile_number='$mobile_number' WHERE user_id = '$user_id'";
                                        $result = $conn->query($query);
                                            
                                        if ($result) {
                                            header("Location: view.php");
                                            exit();
                                        } else {
                                            echo "Error executing UPDATE query: " . $conn->error;
                                        }                         
                                    } 
                                ?>
                                <input class="btn btn-outline-secondary" type="submit" value="Update">
                            </form>
                        </div>
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
</body>
</html>