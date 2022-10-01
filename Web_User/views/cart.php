<!-- header -->
<?php include 'layout/header.php' ?>
<!-- header -->

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <!-- <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shopping Cart</h1>
                <nav class="d-flex align-items-center">
                    <h5>Home <span class="lnr lnr-arrow-right"></span> Shopping Cart</h5>
                </nav>
            </div>
        </div> -->
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <?php
                include_once '../controller/usercontroller.php';
                if (isset($_SESSION['cart_item'])) {
                    if (count($_SESSION["cart_item"]) == 0) {
                        unset($_SESSION["cart_item"]);
                        echo '<h1 style="text-align:center">Your cart empty</h1>';
                    } else {
                        $total_price = 0;
                        echo '  
                <table class="table">
                    <thead>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>';
                        foreach ($_SESSION['cart_item'] as $item) {
                            $item_price = $item['qty'] * $item['price'];
                            echo '
                    <tbody>
                        <tr>
                            <td>
                                <div class="media">
                   <div class="d-flex">
                                        <img src="data:image/gif;base64,' . base64_encode($item["image"]) . '" width="150px" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <p>' . $item["name"] . '</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5>' . number_format($item["price"], 0, '', ',') . 'VND</h5>
                                            </td>
                                            <td>
                                            <form action="../controller/usercontroller.php?id=' . $item['id'] . '" method="post">
                                                <div class="product_count">
                                                    <input type="number" name="qty" value="' . $item["qty"] . '" min="0" max="10" >
                                                </div>
                                            </td>
                                            <td>
                                                <h5>' . number_format($item_price, 0, '', ',') . 'VND</h5>
                                            </td>
                                            <td>
                                                <button type="submit" class="gray_btn" name="cart" value="update" >Update</button>
                                            </td>
                                            <td>
                                                <button type="submit" class="gray_btn" name="cart" value="remove">Remove</button>
                                            </td>
                                            </form>
                                        </tr>';
                            $total_price += ($item["price"] * $item["qty"]);
                        }
                        echo '
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>' . number_format($total_price, 0, '', ',') . 'VND</h5>
                            </td>
                        </tr>
                    <!-- <tr class="shipping_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Shipping</h5>
                            </td>
                            <td>
                                <div class="shipping_box">
                                    <ul class="list">
                                        <li><a href="#">Flat Rate: $5.00</a></li>
                                        <li><a href="#">Free Shipping</a></li>
                                        <li><a href="#">Flat Rate: $10.00</a></li>
                                        <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                    </ul>
                                    <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                    <select class="shipping_select">
                                        <option value="1">Bangladesh</option>
                                        <option value="2">India</option>
                                        <option value="4">Pakistan</option>
                                    </select>
                                    <select class="shipping_select">
                                        <option value="1">Select a State</option>
                                        <option value="2">Select a State</option>
                                        <option value="4">Select a State</option>
                                    </select>
                                    <input type="text" placeholder="Postcode/Zipcode">
                                    <a class="gray_btn" href="#">Update Details</a>
                                </div>
                            </td>
                        </tr> -->

                    <tr class="out_button_area">
                        <td>
                            <a></a>
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>
                            <div class="checkout_btn_inner d-flex align-items-center">
                                <a class="gray_btn" href="category.php">Continue Shopping</a>
                                <a class="primary-btn" href="../controller/usercontroller.php?checkout=1">Proceed to checkout</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>';
                    }
                } else echo '<h1 style="text-align:center">Your cart empty</h1>'; ?>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

<!-- footer -->
<?php include 'layout/footer.php' ?>
<!-- footer -->
</body>

</html>