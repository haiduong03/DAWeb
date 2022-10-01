<?php include "layout/header.php" ?>

<body>

    <div id="app">
        <?php include "layout/menu_bar.php" ?>

        <?php include "layout/left_menu.php" ?>

        <?php
        if (isset($_GET['Message'])) {
            echo "<script type='text/javascript'>alert('" . $_GET['Message'] . "')</script>";
        }

        include_once '../controller/productcontroller.php';

        if (isset($_GET['id'])) {
            echo '  
            <section class="is-hero-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <h1 class="title">
                    Edit Product
                </h1>
            </div>
        </section>

        <section class="section main-section">
            <!-- <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6"> -->
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                        Edit
                    </p>
                </header>';
        } else {
            echo '
        <section class="is-hero-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <h1 class="title">
                Create Product
                </h1>
            </div>
        </section>

        <section class="section main-section">
            <!-- <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6"> -->
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                        Create
                    </p>
                </header>';
        } ?>


        <div class="card-content">

            <!-- <form action="test.php" method="POST"> -->
            <?php
            include_once '../controller/productcontroller.php';
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                echo '
                    <form action="../controller/productcontroller.php?id=' . inforProduct($id)->get_id() . '" method="POST" enctype="multipart/form-data">
                        <div class="field">
                            <label class="label">Product Name</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" id="name" name="name"  placeholder="' . inforProduct($id)->get_name() . '">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Product Detail</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" id="detail" name="detail" placeholder="' . inforProduct($id)->get_detail() . '" >
                                    </div>
                                </div>
                            </div>
                        </div><div class="field">
                        <label class="label">Product Brand</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" class="input" id="brand" name="brand"  placeholder="' . inforProduct($id)->get_brand() . '">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                        <label class="label">Product Type</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">';
                if (inforProduct($id)->get_type() == 'Boot') {
                    echo          ' <select name="type" id="type" class="input">
                                        <option value="Boot" selected>Boot</option>
                                        <option value="Sneaker">Sneaker</option>
                                        <option value="Sandal">Sandal</option>
                                        <option value="Running">Running</option>
                                    </select>';
                } else if (inforProduct($id)->get_type() == 'Sneaker') {
                    echo          ' <select name="type" id="type" class="input">
                                        <option value="Boot" >Boot</option>
                                        <option value="Sneaker" selected>Sneaker</option>
                                        <option value="Sandal">Sandal</option>
                                        <option value="Running">Running</option>
                                    </select>';
                } else if (inforProduct($id)->get_type() == 'Sandal') {
                    echo          ' <select name="type" id="type" class="input">
                                        <option value="Boot" >Boot</option>
                                        <option value="Sneaker">Sneaker</option>
                                        <option value="Sandal" selected>Sandal</option>
                                        <option value="Running">Running</option>
                                    </select>';
                } else {
                    echo          ' <select name="type" id="type" class="input">
                                        <option value="Boot" >Boot</option>
                                        <option value="Sneaker">Sneaker</option>
                                        <option value="Sandal">Sandal</option>
                                        <option value="Running" selected>Running</option>
                                    </select>';
                }
                echo '          </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Product Size</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">';
                if (inforProduct($id)->get_size() == '40') {
                    echo          '  <select class="input" id="size" name="size">
                                        <option value="40" selected>40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                    </select>';
                } else if (inforProduct($id)->get_size() == '41') {
                    echo          '  <select class="input" id="size" name="size">
                                        <option value="40">40</option>
                                        <option value="41" selected>41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                     </select>';
                } else if (inforProduct($id)->get_size() == '42') {
                    echo          '  <select class="input" id="size" name="size">
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42" selected>42</option>
                                        <option value="43">43</option>
                                    </select>';
                } else {
                    echo         '  <select class="input" id="size" name="size">
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43" selected>43</option>
                                    </select>';
                }
                echo '      </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Product Color</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" class="input" id="color" name="color"  placeholder="' . inforProduct($id)->get_color() . '">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Product Price</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="number" class="input" id="price" name="price"  placeholder="' . number_format(inforProduct($id)->get_price(), 0, '', ',') . '">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Product Promotion</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="number" class="input" id="promotion" name="promotion"  placeholder="' . number_format(inforProduct($id)->get_promotion(), 0, '', ',') . '">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="field">
                    <label class="label">Product Img</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input type="file" class="input" id="image" name="image" placeholder=" ">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                    <div class="field">
                        <div class="control">
                        <button type="submit" class="button green" id="product" name="product" value="change">Confirm</button
                    </div>
                </form>';
            } else {
                echo '
                <form action="../controller/productcontroller.php" method="POST" enctype="multipart/form-data">
                <div class="field">
                    <label class="label">Product Name</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input type="text" class="input" id="name" name="name" requied>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Product Detail</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input type="text" class="input" id="detail" name="detail" requied>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                <label class="label">Product Brand</label>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input type="text" class="input" id="brand" name="brand" requied>
                        </div>
                    </div>
                </div>
                <div class="field">
                <label class="label">Product Type</label>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <select name="type" id="type" class="input">
                                <option value="Boot" selected>Boot</option>
                                <option value="Sneaker">Sneaker</option>
                                <option value="Sandal">Sandal</option>
                                <option value="Running">Running</option>
                            </select>
                        </div>
                    </div>
                </div>
            <div class="field">
                <label class="label">Product Size</label>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <select class="input" id="size" name="size">
                                <option value="40" selected>40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Product Color</label>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input type="text" class="input" id="color" name="color" requied>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="field">
                <label class="label">Product Price</label>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input type="number" class="input" id="price" name="price" requied>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Product Promotion</label>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input type="number" class="input" id="promotion" name="promotion" requied>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
            <label class="label">Product Img</label>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <input type="file" class="input" id="image" name="image" requied>
                    </div>
                </div>
            </div>
        </div>
        <hr>
            <div class="field">
                <div class="control">
                <button type="submit" class="button green" id="product" name="product" value="create">Confirm</button
            </div>
        </form>';
            } ?>
        </div>
    </div>

    </section>
    <?php include "layout/footer.php" ?>

</body>

</html>