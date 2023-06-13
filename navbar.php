<?php
    session_start();

include_once ('database/dbConnection.php');
?>
<!-- Topbar Start -->
    <div class="container-fluid">
    <div class="row py-1 px-xl-5" style="background-color:#c2e7ff">
            <div class="col-lg-12 mt-2 d-none  d-lg-block" style="text-align: center; ">
                <p>Free home delivery...!</p>
            </div>
               
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 px-2"><img src="img/logo/logo-1.png" alt="amaqazi logo" class="img-fluid" style="width: 10%"></span>
                    <span class="h1 px-2 ml-n1"><img src="img/logo/logo-w1.png" alt="amaqazi logo" class="img-fluid" style="width: 30%;margin-top: 10px;"></span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>procurement@amaqazi.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+1 245 255 4931</p>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <?php

                        $sql = "SELECT * FROM `productcategories`";

                        $result = $db_con->query($sql);

                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {?>
                        <a href="product_category.php?CategoryID=<?php echo $row['CategoryID']?>" class="nav-item nav-link"><?php echo $row['CategoryName']?></a>
                        <?php
                            }
                        }?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="text-uppercase text-dark px-2"><img src="img/logo/logo-1.png" alt="amaqazi logo" width="50"></span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link <?php echo (basename($_SERVER['PHP_SELF'])) == 'index.php' ? 'active': '' ?>">Home</a>
                            <a href="comingsoon.php" class="nav-item nav-link <?php echo (basename($_SERVER['PHP_SELF'])) == 'comingsoon.php' ? 'active': '' ?>">Shop</a>
                            <a href="https://docs.google.com/spreadsheets/d/1ZWfvK4jeGb_kXHFWADiZsnotmGXQlX6SQqnlGiPYXEk/edit?usp=sharing" target="_blank" class="nav-item nav-link <?php echo (basename($_SERVER['PHP_SELF'])) == 'detail.php' ? 'active': '' ?>" >Catalog</a>
                            <a href="about.php" class="nav-item nav-link <?php echo (basename($_SERVER['PHP_SELF'])) == 'about.php' ? 'active': '' ?>">About</a>
                            <a href="https://forms.gle/DgkqvTe9A98bnr3y9" target="_blank" class="nav-item nav-link <?php echo (basename($_SERVER['PHP_SELF'])) == 'comingsoon.php' ? 'active': '' ?>">Request Product</a>
                            <a href="contact.php" class="nav-item nav-link <?php echo (basename($_SERVER['PHP_SELF'])) == 'contact.php' ? 'active': '' ?>">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">
    <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : '0'; ?>
</span>

                            </a>
                        </div>
                     
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->