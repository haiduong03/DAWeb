<!-- header -->
<?php include 'layout/header.php' ?>
<!-- header -->


<body>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Sign Up</h1>
                    <nav class="d-flex align-items-center">
                        <h5>Home <span class="lnr lnr-arrow-right"></span> Sign Up</h5>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <!--================Registration Area =================-->
    <?php
    if (isset($_GET['Message'])) {
        echo "<script type='text/javascript'>alert('" . $_GET['Message'] . "');</script>";
    } ?>
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="col-lg-12">
                <div class="login_form_inner">
                    <h1>Sign Up</h1>
                    <p>Please fill in this form to create an account</p>
                    <form class="row login_form" action="../controller/usercontroller.php" method="POST">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="username" name="username" required placeholder="Username">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required pattern="^([a-zA-Z0-9\+_\-]+)(\.[a-zA-Z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="password" name="password" pattern="^[a-zA-Z0-9\+_\-]*$" required placeholder="Password">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="confirm" name="confirm" pattern="^[a-zA-Z0-9\+_\-]*$" required placeholder="Confirm Password">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="address" name="address" required placeholder="Address">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber" pattern="^[0-9\+_\-]*$" required placeholder="Phone number">
                        </div>
                        <div class="col-md-12">
                            <h5>Gender</h5>
                        </div>
                        <div class="col-md-12">
                            <p> <input type="radio" id="gender" name="gender" value="Male"> Male
                                <input type="radio" id="gender" name="gender" value="Female"> Female
                                <input type="radio" id="gender" name="gender" value="Other" checked> Other
                            </p>
                        </div>
                        <div class="creat_account">
                            <p><input type="checkbox" onclick="showPass()"> Show Password</p>
                            <p><input type="checkbox" id="agree" name="agree" required> By creating an account you agree to our <a href="#">Terms & Privacy</a></p>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" class="primary-btn" id="user" name="user" value="signup">Sign up</button>
                            <p class="container sign in">
                            <p> Already have an account? <a href="signin.php"> Sign in</a></p>
                        </div>
                </div>
            </div>
    </section>
    <!--================End Registration Area =================-->

</body>

</html>
<!-- footer -->
<?php include 'layout/footer.php' ?>
<!-- footer -->