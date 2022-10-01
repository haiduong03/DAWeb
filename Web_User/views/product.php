<!-- header -->
<?php include 'layout/header.php' ?>
<link rel="stylesheet" href="css/ion.rangeSlider.css" />
<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
<!-- header -->

<?php
if (isset($_GET['Message'])) {
    echo "<script type='text/javascript'>alert('" . $_GET['Message'] . "')</script>";
} ?>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Product Details Page</h1>
                <nav class="d-flex align-items-center">
                    <h5>Home <span class="lnr lnr-arrow-right"></span> Product Details Page</h5>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<?php
include_once '..controller/usercontroller.php';
include_once '../model/product.php';
$id = $_GET['id'];
echo '
<section class="product_description_area">
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" src="data:image/gif;base64,' . base64_encode(inforProduct($id)->get_image()) . '" width="300" alt="">
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid" src="data:image/gif;base64,' . base64_encode(inforProduct($id)->get_image()) . '" width="300" alt="">                        
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid" src="data:image/gif;base64,' . base64_encode(inforProduct($id)->get_image()) . '" width="300" alt="">                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>' . inforProduct($id)->get_name() . '</h3>';
if (inforProduct($id)->get_promotion() > 0) {
    echo               '<h2>' . number_format(inforProduct($id)->get_promotion(), 0, '', ',') . ' VND</h2>
                        <h4>Old Price: ' . number_format(inforProduct($id)->get_price(), 0, '', ',') . ' VND</h4>';
} else {
    echo                '<h2>' . number_format(inforProduct($id)->get_price(), 0, '', ',') . ' VND</h2>';
}
echo '                  <ul class="list">
                            <li><a class="active" href="#"><span>Category</span> : ' . inforProduct($id)->get_brand() . '</a></li>
                            <li><a href="#"><span>Availibility</span> : In Stock</a></li>
                        </ul>
                        <p>' . inforProduct($id)->get_detail() . '</p>
                            <form action="../controller/usercontroller.php?id=' . inforProduct($id)->get_id() . '" method="post">
                                <div class="product_count">
                                    <label for="qty">Quantity:</label>
                                    <input type="number" name="qty" id="quantity" min="1" max="10" value="1" title="Quantity:" class="input-text qty">
                                </div>
                                <div class="card_area d-flex align-items-center">                       
                                    <button class="primary-btn" type="submit" name="cart" value="add">Add to Cart</button>
                                    <button class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></button>
                                    <button class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
?>

<!--================End Single Product Area =================-->
<!-- Start related-product Area -->
<?php include 'layout/deal_of_week.php' ?>
<!-- End related-product Area -->

<!-- footer -->
<?php include 'layout/footer.php' ?>
<!-- footer -->
</body>

</html>