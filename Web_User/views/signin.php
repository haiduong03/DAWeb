<!-- header -->
<?php include 'layout/header.php' ?>
<!-- header -->


<body>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1> Signin </h1>
                    <nav class="d-flex align-items-center">
                        <h5>Home <span class="lnr lnr-arrow-right"></span> Signin</h5>
                    </nav>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <!--================Login Box Area =================-->
    <?php
    if (isset($_GET['Message'])) {
        echo "<script type='text/javascript'>alert('" . $_GET['Message'] . "');</script>";
    } ?>
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img src="img/3.jpg" alt="">
                        <div class="hover">
                            <h4>New to our website?</h4>
                            <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                            <a class="primary-btn" href="signup.php">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Sign in to enter</h3>
                        <form class="row login_form" action="../controller/usercontroller.php" method="POST">
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" name="email" pattern="^([a-zA-Z0-9\+_\-]+)(\.[a-zA-Z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password" pattern="^[a-zA-Z0-9\+_\-]*$" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <p><input type="checkbox" onclick="showPass()">Show Password</p>
                                    <p><input type="checkbox" onclick="lsRememberMe()">Remember me</p>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" class="primary-btn" id="user" name="user" value="signin">Sign In</button>
                                <a href=" #">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->
    <!-- footer -->
    <?php include 'layout/footer.php' ?>
    <!-- footer -->
</body>

</html>