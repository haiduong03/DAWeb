<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            <a href="index.php"> Manage <b class="font-black">Store</b></a>
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
            <li class="active">
                <a href="index.php  ">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">Management</p>
        <!-- <ul class="menu-list">
            <li class="active">
                <a href="index.html">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>
        </ul> -->
        <!-- <p class="menu-label">Examples</p> -->
        <?php if (isset($_SESSION["user_name"])) {
            echo '  <ul class="menu-list">
                        <li>
                            <a class="dropdown">
                                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                                <span class="menu-item-label">Management</span>
                                <span class="icon"><i class="mdi mdi-plus"></i></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="user.php">
                                        <span class="icon"><i class="mdi mdi-table"></i></span>
                                        <span>User</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="admin.php">
                                        <span class="icon"><i class="mdi mdi-table"></i></span>
                                        <span>Admin</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="product.php">
                                        <span class="icon"><i class="mdi mdi-table"></i></span>
                                        <span>Product</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="order.php">
                                        <span class="icon"><i class="mdi mdi-table"></i></span>
                                        <span>Order</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>';
        } ?>
    </div>
</aside>