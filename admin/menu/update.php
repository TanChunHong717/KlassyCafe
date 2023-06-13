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

        $query = "SELECT * FROM `table` WHERE table_id = ". ($_GET['id'] ?? $_POST['id']);
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

        <title>Update Menu</title>
        
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
                            <a href="../index.php" class="logo">
                                <img src="../../assets/images/klassy-logo.png">
                            </a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <li><a href="../index.php">Admin Home</a></li>
                                <li><a href="view.php">Menu</a></li>
                                <li><a href="../table/view.php">Table</a></li>
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
        <section class="section" id="about" style="margin-bottom: 100px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="left-text-content">
                            <div class="section-heading">
                                <h6>Admin</h6>
                                <h2>Menu</h2>
                            </div>
                            <div>
                                <h3>Update Menu</h3><br>
                                <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $row['menu_id']; ?>">
                                    <label>Image*</label>
                                    <div class="custom-file" style="margin-bottom: 15px;">
                                        <input type="file" class="custom-file-input" id="customFile" name="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="menu_name">Name*</label>
                                        <input class="form-control" id="menu_name" type="text" required name="menu_name" value="<?php echo $row['menu_name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description*</label>
                                        <input class="form-control" id="description" type="text" required name="description" value="<?php echo $row['description']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category*</label>
                                        <input class="form-control" id="category" type="text" required name="category" value="<?php echo $row['category']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price (RM)*</label>
                                        <input class="form-control" id="price" type="text" required name="price" pattern="^\d+(\.\d{1,2})?$" title="Please enter a number with up to two decimal places" value="<?php echo $row['price']; ?>">
                                    </div>
                                    <?php 
                                        $targetFilePath = $row['table_image_path'];
                                        if(isset($_FILES['customFile'])) {
                                            $file = $_FILES['customFile'];
                                            $allowedExtensions = ['jpg', 'jpeg', 'png'];
                                            $maxFileSize = 2 * 1024 * 1024;

                                            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                                            if (!in_array($extension, $allowedExtensions)) {
                                                echo "Invalid file extension. Allowed extensions: " . implode(', ', $allowedExtensions);
                                                exit;
                                            }
                                            if ($file['size'] > $maxFileSize) {
                                                echo "File size exceeds the limit of 2MB.";
                                                exit;
                                            }

                                            $targetDirectory = 'assets/uploads/';
                                            $targetFilePath = $targetDirectory . basename($file['name']);
                                        }
                                        if(isset($_POST['menu_name']) && isset($_POST['description']) && isset($_POST['category']) && isset($_POST['price'])) {
                                            $menu_id = $_POST['id'];
                                            $menu_name = $_POST['menu_name'];
                                            $description = $_POST['description'];
                                            $category = $_POST['category'];
                                            $price = $_POST['price'];
                                            
                                            $query = "UPDATE `menu` SET menu_name = '$menu_name', description = '$description', category= '$category', price= '$price', menu_image_path = '$targetFilePath' WHERE menu_id = $menu_id";
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
        