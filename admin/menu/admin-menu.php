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

    <title>Admin Menu</title>
    <style>
        main {
            margin-top: 100px;
        }

        .main {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main h1 {
            display: inline-block;
        }


        button {
            background-color: #FB5849;
            color: #ffffff;
        }
    </style>
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
                        <li><a href="admin-index.html">Admin Home</a></li>
                        <li><a>Menu</a></li>
                        <li><a href="admin-table.html">Table</a></li>
                        <li><a href="admin-user.html">User</a></li>
                        <li><a href="../../logout.php">logout</a></li>
                    </ul>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<!-- ***** Content Area Starts ***** -->
<section class="section" id="about" style="margin-bottom: 120px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>Admin</h6>
                        <h2>Available Menu</h2>
                    </div>
                    
                    <table class="table" id="table">
                        <caption>
                            <button type="button" class="btn btn-outline-secondary" id="dish_add" data-bs-toggle="modal"
                                    data-bs-target="#myModal"
                                    onclick="option(this);">New
                            </button>
                            <button type="button" class="btn btn-outline-secondary" id="dish_delete" onclick="option(this);">Delete</button>
                            <button type="button" class="btn btn-outline-secondary" id="dish_edit" data-bs-toggle="modal"
                                    data-bs-target="#myModal"
                                    onclick="option(this);">Edit
                            </button>
                            <button type="button" class="btn btn-outline-secondary" id="dish_find" onclick="option(this);">Find</button>
                            <input type="text" id="s_code" placeholder="Search by code" style="width: 180px"/>
                            <input type="text" id="s_dishName" placeholder="Search by name" style="width: 180px"/>
                            <input type="text" id="s_all" placeholder="Search in all" style="width: 180px"/>
                        </caption>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price(RM)</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        <tr>
                            <td><input type='checkbox'></td>
                            <td>1001</td>
                            <td>Chocolate Cake</td>
                            <td>Satisfy your sweet tooth with our heavenly Chocolate Cake. Made with premium cocoa powder and rich
                                chocolate, our cake is moist and dense, with a decadent and intense flavor that will leave you
                                craving more.</td>
                            <td>Dessert</td>
                            <td>12.49</td>
                            <td><img src="assets/images/menu-item-01.jpg" width="100"></td>
                        </tr>
                        <tr>
                            <td><input type='checkbox'></td>
                            <td>1002</td>
                            <td>Cream Pancake</td>
                            <td>Indulge in a decadent breakfast with our creamy and fluffy pancakes. Our Cream Pancakes are made
                                with a special batter that is infused with cream, creating a rich and luscious texture that will
                                melt in your mouth.
                            </td>
                            <td>Dessert</td>
                            <td>10.99</td>
                            <td><img src="assets/images/menu-item-02.jpg" width="100"></td>
                        </tr>
                        <tr>
                            <td><input type='checkbox'></td>
                            <td>1003</td>
                            <td>Baguette</td>
                            <td>Transport yourself to the streets of Paris with our freshly baked Baguette. Made with a classic
                                French recipe, our Baguette is crusty on the outside, with a soft and chewy interior that will make
                                you feel like you're in the heart of France.
                            </td>
                            <td>Dessert</td>
                            <td>17.99</td>
                            <td><img src="assets/images/menu-item-03.jpg" width="100"></td>
                        </tr>
                        <tr>
                            <td><input type='checkbox'></td>
                            <td>1004</td>
                            <td>Cheesecake</td>
                            <td>Treat yourself to a slice of our creamy and decadent cheesecake. Made with a rich and velvety cream
                                cheese filling, our cheesecake is baked to perfection on a buttery graham cracker crust.
                            </td>
                            <td>Dessert</td>
                            <td>23.49</td>
                            <td><img src="assets/images/menu-item-04.jpg" width="100"></td>
                        </tr>
                        <tr>
                            <td><input type='checkbox'></td>
                            <td>1005</td>
                            <td>Cupcake</td>
                            <td>Our irresistible cupcakes are the perfect way to satisfy your sweet tooth. Each cupcake is made with
                                the finest ingredients, including fresh eggs, creamy butter, and pure vanilla extract, ensuring that
                                every bite is rich and decadent.
                            </td>
                            <td>Dessert</td>
                            <td>12.49</td>
                            <td><img src="assets/images/menu-item-05.jpg" width="100"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Modal -->
    <div class="modal" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">New/Edit Menu Item</h4>
                </div>
                <div class="modal-body" id="modal-body">
                    <label for="m_code">Code:</label>
                    <input type="text" class="form-control" id="m_code" placeholder="Enter code"/>
                    <label for="m_dishName">Dish Name:</label>
                    <input type="text" class="form-control" id="m_dishName" placeholder="Enter dish name"/>
                    <label for="m_description">Description: </label>
                    <input type="text" class="form-control" id="m_description" placeholder="Enter description"/>
                    <label for="m_category">Category: </label>
                    <input type="text" class="form-control" id="m_category" placeholder="Enter category"/>
                    <label for="m_price">Price: </label>
                    <input type="text" class="form-control" id="m_price" placeholder="Enter price"/>
                    <label for="m_image">Image:</label>
                    <input type="text" class="form-control" id="m_image" placeholder="Enter image path"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="save-btn">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</main>
<!-- ***** Content Area Ends ***** -->

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
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/admin-menu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>