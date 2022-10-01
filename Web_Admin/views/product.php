<?php include "layout/header.php" ?>

<body>

    <div id="app">
        <?php include "layout/menu_bar.php" ?>

        <?php include "layout/left_menu.php" ?>

        <?php if (isset($_GET['Message'])) {
            echo "<script type='text/javascript'>alert('" . $_GET['Message'] . "')</script>";
        } ?>
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Admin</li>
                    <li>Product</li>
                </ul>
            </div>
        </section>

        <section class="section main-section">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                        Product
                    </p>
                    <a href="product.php" class="card-header-icon">
                        <span class="icon"><i class="mdi mdi-refresh"></i></span>
                    </a>
                    <a href="product_action.php" class="card-header-icon">
                        <span class="icon"><i class="mdi mdi-plus"></i></span>
                    </a>
                </header>
                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Img</th>
                                <th>Name</th>
                                <th>Detail</th>
                                <th>Brand</th>
                                <th>Type</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th>Promotion</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody> <img src="">
                            <?php
                            include_once '../controller/productcontroller.php';

                            foreach (printProduct() as $product) {
                                echo '  
                                <tbody>
                                    <tr>
                                        <td data-label="Img"><img src="data:image/gif;base64,' . base64_encode($product->get_image()) . '" width="150"></td>
                                        <td data-label="Name">' . $product->get_name() . '</td>
                                        <td data-label="Detail" width="500">' . $product->get_detail() . '</td>
                                        <td data-label="Brand">' . $product->get_brand() . '</td>
                                        <td data-label="Type">' . $product->get_type() . '</td>
                                        <td data-label="Size">' . $product->get_size() . '</td>
                                        <td data-label="Color">' . $product->get_color() . '</td>
                                        <td data-label="Price">' . number_format($product->get_price(), 0, '', ',') . ' VND</td>
                                        <td data-label="Price">' . number_format($product->get_promotion(), 0, '', ',') . ' VND</td>
                                        <td class="actions-cell">
                                            <div class="buttons right nowrap">
                                                <button class="button small green --jb-modal" data-target="sample-modal-2" >
                                                    <a href="product_action.php?id=' . $product->get_id() . '"> <span class="icon"><i class="mdi mdi-pen"></i></span></a>
                                                </button>
                                                <form action="../controller/productcontroller.php?id=' . $product->get_id() . '" method="post">
                                                    <button class="button small red --jb-modal" data-target="sample-modal" type="submit"  id="product" name="product" value="delete" >
                                                        <span class=" icon"><i class="mdi mdi-trash-can"></i></span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>';
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>
    <!-- Scripts below are for demo only -->
    <?php include "layout/footer.php" ?>
</body>

</html>