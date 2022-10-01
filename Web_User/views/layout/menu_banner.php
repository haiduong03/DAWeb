<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item item"><a class="nav-link" href="index.php">Home</a></li>
                        <!-- <li class="nav-item submenu dropdown"> -->
                        <!-- <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu">-->


                        <!--<li class="nav-item"><a class="nav-link" href="cart.php">Shopping Cart</a></li>
                        <li class="nav-item"><a class="nav-link" href="confirmation.php">Confirmation</a></li>
                    </ul> -->
                        </li>
                        <!-- <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu"> -->
                        <!-- <li class="nav-item"><a class="nav-link" href="cate.php">Tracking</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="category.php">Category</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="elements.php">Elements</a></li>
                    </ul>
                    </li> -->
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

                        <?php
                        session_start();
                        if (isset($_SESSION["user_name"])) {
                            echo '  <li class="nav-item"><a class="nav-link" href="checkout.php">Checkout</a></li>
                                    <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> ' . $_SESSION["user_name"] . '</a>
                                    <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="information.php">Information</a></li>
                                    <li class="nav-item"><a class="nav-link" href="signout.php">Sign out</a></li>
                                    </ul>
                                    </li>';
                            if (isset($_GET['Message'])) {
                                echo "<script type='text/javascript'>alert('" . $_GET['Message'] . "');</script>";
                            }
                        } else {
                            echo   '<li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" > Member</a>
                                    <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="signin.php">Sign in</a></li>
                                    <li class="nav-item"><a class="nav-link" href="signup.php">Sign up</a></li>                                
                                    </ul>
                                    </li>';
                        }
                        ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"> <a href="cart.php" class="cart"><span class="ti-bag"> <?php if (isset($_SESSION['cart_item']))
                                                                                                        echo count(($_SESSION['cart_item'])); ?></span></a></li>
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- End Header Area -->