<?php include "layout/header.php" ?>

<body>

    <div id="app">
        <?php include "layout/menu_bar.php" ?>

        <?php include "layout/left_menu.php" ?>

        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Admin</li>
                    <li>Profile</li>
                </ul>
            </div>
        </section>

        <section class="is-hero-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <h1 class="title">
                    Profile
                </h1>
            </div>
        </section>

        <section class="section main-section">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            <span class="icon"><i class="mdi mdi-account"></i></span>
                            Profile
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="image w-48 h-48 mx-auto">
                            <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
                        </div>
                        <hr>

                        <?php
                        include_once '../controller/admincontroler.php';
                        if (isset($_SESSION["email"])) {
                            $email = $_SESSION["email"];
                            echo '
                            <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input type="text" readonly  class="input is-static" placeholder="' . get_infor($email)->get_username() . '" >
                            </div>
                        </div>
                        <hr>
                        <div class="field">
                            <label class="label">E-mail</label>
                            <div class="control">
                                <input type="text" readonly  class="input is-static"  placeholder="' . get_infor($email)->get_email() . '" >
                            </div>
                        </div>
                        <hr>
                        <div class="field">
                            <label class="label">Address</label>
                            <div class="control">
                                <input type="text" readonly  class="input is-static"  placeholder="' . get_infor($email)->get_address() . '" >
                            </div>
                        </div>
                        <hr>
                        <div class="field">
                            <label class="label">Phone</label>
                            <div class="control">
                                <input type="text" readonly  class="input is-static"  placeholder="' . get_infor($email)->get_phone() . '" >
                            </div>
                        </div>
                        <hr>
                        <div class="field">
                            <label class="label">Gender</label>
                            <div class="control">
                                <input type="text" readonly  class="input is-static"  placeholder="' . get_infor($email)->get_gender() . '" >
                            </div>
                        </div>';
                        } else {
                            echo '
                            <div class="field">
                                <label class="label">Name</label>
                                <div class="control">
                                    <input type="text" readonly  class=" input is-static">
                                </div>
                            </div>
                            <hr>
                            <div class="field">
                                <label class="label">E-mail</label>
                                <div class="control">
                                    <input type="text" readonly  class=" input is-static">
                                </div>
                            </div>
                            <hr>
                            <div class="field">
                                <label class="label">Address</label>
                                <div class="control">
                                    <input type="text" readonly  class="input is-static">
                                </div>
                            </div>
                            <hr>
                            <div class="field">
                                <label class="label">Phone</label>
                                <div class="control">
                                    <input type="text" readonly  class="input is-static">
                                </div>
                            </div>
                            <hr>
                            <div class="field">
                                <label class="label">Gender</label>
                                <div class="control">
                                    <input type="text" readonly  class="input is-static">
                                </div>
                            </div>';
                        } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include "layout/footer.php" ?>

</body>

</html>