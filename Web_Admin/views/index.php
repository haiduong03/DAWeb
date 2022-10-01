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
                    <li><a href="index.php">Admin</a> </li>
                    <li>Dashboard</li>
                </ul>
            </div>
        </section>

        <section class="is-hero-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <h1 class="title">
                    Dashboard
                </h1>
                <button class="button light">Button</button>
            </div>
        </section>

        <section class="section main-section">
            <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
                <div class="card">
                    <div class="card-content">
                        <div class="flex items-center justify-between">
                            <div class="widget-label">
                                <h3>
                                    Clients
                                </h3>
                                <h1>
                                    512
                                    <!-- đếm số user  -->
                                </h1>
                            </div>
                            <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="flex items-center justify-between">
                            <div class="widget-label">
                                <h3>
                                    Sales
                                </h3>
                                <h1>
                                    $7,770
                                </h1>
                            </div>
                            <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                        <div class="flex items-center justify-between">
                            <div class="widget-label">
                                <h3>
                                    Performance
                                </h3>
                                <h1>
                                    256%
                                </h1>
                            </div>
                            <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-6">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-finance"></i></span>
                        Performance
                    </p>
                    <a href="#" class="card-header-icon">
                        <span class="icon"><i class="mdi mdi-reload"></i></span>
                    </a>
                </header>
                <div class="card-content">
                    <div class="chart-area">
                        <div class="h-full">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div></div>
                                </div>
                            </div>
                            <canvas id="big-line-chart" width="2992" height="1000" class="chartjs-render-monitor block" style="height: 400px; width: 1197px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <?php include "layout/footer.php" ?>
</body>

</html>