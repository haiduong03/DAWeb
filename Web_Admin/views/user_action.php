<?php include "layout/header.php" ?>

<body>

    <div id="app">
        <?php include "layout/menu_bar.php" ?>

        <?php include "layout/left_menu.php" ?>

        <?php
        if (isset($_GET['Message'])) {
            echo "<script type='text/javascript'>alert('" . $_GET['Message'] . "')</script>";
        }

        include_once '../controller/usercontroler.php';

        if (isset($_GET['id'])) {
            echo '  
            <section class="is-hero-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <h1 class="title">
                    Edit User
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
                Create User
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
            include_once '../controller/usercontroler.php';
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                echo '
                    <form action="../controller/usercontroler.php?id=' . inforUser($id)->get_id() . '" method="POST">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" id="username" name="username"  placeholder="' . inforUser($id)->get_username() . '">
                                    </div>
                                    <p class="help">Required. Your name</p>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">E-mail</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="email" class="input" id="email" name="email" placeholder="' . inforUser($id)->get_email() . '"  pattern="^([a-zA-Z0-9\+_\-]+)(\.[a-zA-Z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$">
                                    </div>
                                    <p class="help">Required. Your e-mail</p>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                        <label class="label">New Password</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="password" class="input" id="new_password" name="new_password" pattern="^[a-zA-Z0-9\+_\-]*$" placeholder="Password">
                                </div>
                                <p class="help">Required. Your password</p>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Confirm password</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="password" class="input" id="confirm" name="confirm" pattern="^[a-zA-Z0-9\+_\-]*$" placeholder="Confirm Password">
                                </div>
                                <p class="help">Required. Your confirm password</p>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                            <label class="label">Address</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" id="address" name="address"  placeholder="' . inforUser($id)->get_address() . '">
                                    </div>
                                    <p class="help">Required. Your address</p>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Phone number</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" id="phonenumber" name="phonenumber" pattern="^[0-9\+_\-]*$"  placeholder="' . inforUser($id)->get_phone() . '">
                                    </div>
                                    <p class="help">Required. Your phone number</p>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Gender</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">';
                if (inforUser($id)->get_gender() == 'Female') {
                    echo '  <p> <input type="radio" id="gender" name="gender" value="Male"> Male
                                    <input type="radio" id="gender" name="gender" value="Female" checked> Female
                                    <input type="radio" id="gender" name="gender" value="Other" > Other </p>';
                } else if (inforUser($id)->get_gender() == 'Male') {
                    echo '  <p> <input type="radio" id="gender" name="gender" value="Male" checked> Male
                                    <input type="radio" id="gender" name="gender" value="Female" > Female
                                    <input type="radio" id="gender" name="gender" value="Other" > Other </p>';
                } else {
                    echo '  <p> <input type="radio" id="gender" name="gender" value="Male" > Male
                                    <input type="radio" id="gender" name="gender" value="Female" > Female
                                    <input type="radio" id="gender" name="gender" value="Other" checked> Other </p>';
                }
                echo '</div>
                                    <p class="help">Required. Your gender</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="field">
                            <div class="control">
                            <button type="submit" class="button green" id="user" name="user" value="change">Confirm</button
                        </div>
                    </form> ';
            } else {
                echo '
                    <form action="../controller/usercontroler.php" method="POST">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" id="username" name="username" required placeholder="Username">
                                    </div>
                                    <p class="help">Required. Your name</p>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">E-mail</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="email" class="input" id="email" name="email" placeholder="Email" required pattern="^([a-zA-Z0-9\+_\-]+)(\.[a-zA-Z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$">
                                    </div>
                                    <p class="help">Required. Your e-mail</p>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                <label class="label">Password</label>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input type="password" class="input" id="password" name="password" pattern="^[a-zA-Z0-9\+_\-]*$" placeholder="Password">
                        </div>
                        <p class="help">Required. Your password</p>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Confirm password</label>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input type="password" class="input" id="confirm" name="confirm" pattern="^[a-zA-Z0-9\+_\-]*$" placeholder="Confirm Password">
                        </div>
                        <p class="help">Required. Your confirm password</p>
                    </div>
                </div>
            </div>
                <div class="field">
                            <label class="label">Address</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" id="address" name="address" required placeholder="Address">
                                    </div>
                                    <p class="help">Required. Your address</p>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Phone number</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" id="phonenumber" name="phonenumber" pattern="^[0-9\+_\-]*$" required placeholder="Phone number">
                                    </div>
                                    <p class="help">Required. Your phone number</p>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Gender</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                    <p> <input type="radio" id="gender" name="gender" value="Male" > Male
                                    <input type="radio" id="gender" name="gender" value="Female" > Female
                                    <input type="radio" id="gender" name="gender" value="Other" checked> Other </p>
                                    </div>
                                    <p class="help">Required. Your gender</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="field">
                            <div class="control">
                            <button type="submit" class="button green" id="user" name="user" value="create">Confirm</button
                        </div>
                    </form>';
            } ?>
        </div>
    </div>

    </section>
    <?php include "layout/footer.php" ?>

</body>

</html>