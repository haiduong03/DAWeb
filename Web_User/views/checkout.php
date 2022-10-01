<!-- header -->
<?php include 'layout/header.php' ?>
<!-- header -->

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Checkout</h1>
                <nav class="d-flex align-items-center">
                    <h5>Home <span class="lnr lnr-arrow-right"></span> Checkout</h5>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="returning_customer">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Billing Details</h3>

                        <form class="row contact_form" action="#" method="post">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="first" name="name">
                                <span class="placeholder" data-placeholder="Your name"></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="company" name="company" placeholder="Company name">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="number">
                                <span class="placeholder" data-placeholder="Phone number"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="compemailany">
                                <span class="placeholder" data-placeholder="Email Address"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="country_select">
                                    <option value="1">Country</option>
                                    <option value="2">Country</option>
                                    <option value="4">Country</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add1" name="add1">
                                <span class="placeholder" data-placeholder="Address line 01"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add2" name="add2">
                                <span class="placeholder" data-placeholder="Address line 02"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="city" name="city">
                                <span class="placeholder" data-placeholder="Town/City"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="country_select">
                                    <option value="1">District</option>
                                    <option value="2">District</option>
                                    <option value="4">District</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a href="#">Product <span>Total</span></a></li>
                                <!-- <li><a href="#">Fresh Blackberry <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
                                <li><a href="#">Fresh Tomatoes <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
                                <li><a href="#">Fresh Brocoli <span class="middle">x 02</span> <span class="last">$720.00</span></a></li> -->
                                <?php
                                include_once 'controller/usercontroller.php';
                                $total_price = 0;
                                $ship = 100000;
                                if (isset($_SESSION['cart_item'])) {
                                    foreach ($_SESSION['cart_item'] as $item) {
                                        $item_price = $item['qty'] * $item['price'];
                                        $total_price += ($item["price"] * $item["qty"]);
                                        echo    '<li><a href="product.php?id=' . $item['id'] . '">' . $item["name"] . '&emsp; x' . $item["qty"] . ' <span class="last">' . number_format($item_price, 0, '', ',') . ' VND</span></a></li>';
                                    }
                                } else echo '<p style="text-align:center">Your cart empty</p>';

                                echo '  </ul>
                                        <ul class="list list_2">
                                            <li><a href="#">Subtotal <span>' . number_format($total_price, 0, '', ',') . ' VND</span></a></li>
                                            <li><a href="#">Shipping <span>Flat rate: ' . number_format($ship, 0, '', ',') . ' VND</span></a></li>
                                            <li><a href="#">Total <span>' . number_format($total_price + $ship, 0, '', ',') . ' VND</span></a></li>
                                        </ul>';
                                ?>
                                <div class="payment_item">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option5" name="selector">
                                        <label for="f-option5">COD</label>
                                        <div class="check"></div>
                                    </div>
                                    <p>Please send a check to all your information and make sure that is correct this can't be changed when you confirm.</p>
                                </div>
                                <div class="payment_item active">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option6" name="selector">
                                        <label for="f-option6">Paypal </label>
                                        <img src="img/product/card.jpg" alt="">
                                        <div class="check"></div>
                                    </div>
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                        account.</p>
                                </div>
                                <div class="creat_account">
                                    <input type="checkbox" required>
                                    <label for="f-option4">I’ve read and accept the </label>
                                    <a href="#">terms & conditions*</a>
                                </div>
                                <a class="primary-btn" href="index.php?">Proceed to Paypal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!--================End Checkout Area =================-->

<!-- footer -->
<?php include 'layout/footer.php' ?>
<!-- footer -->
</body>

</html>