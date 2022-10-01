<?php include "layout/header.php" ?>

<body>
    <?php
    if (isset($_GET['Message'])) {
        echo "<script type='text/javascript'>alert('" . $_GET['Message'] . "')</script>";
    }
    ?>
    <div id="app">
        <?php include "layout/menu_bar.php" ?>

        <?php include "layout/left_menu.php" ?>

        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Admin</li>
                    <li>User</li>
                </ul>
            </div>
        </section>

        <section class="section main-section">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                        Clients
                    </p>
                    <a href="user.php" class="card-header-icon">
                        <span class="icon"><i class="mdi mdi-refresh"></i></span>
                    </a>
                    <a href="user_action.php" class="card-header-icon">
                        <span class="icon"><i class="mdi mdi-plus"></i></span>
                    </a>
                </header>
                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th></th>
                            </tr>
                        </thead>

                        <?php
                        include_once '../controller/usercontroler.php';

                        foreach (printUser() as $user) {
                            echo '  <tbody>
                                    <tr>
                                        <td data-label="Name">' . $user->get_username() . '</td>
                                        <td data-label="Email">' . $user->get_email() . '</td>
                                        <td data-label="Address">' . $user->get_address() . '</td>
                                        <td data-label="Phone">' . $user->get_phone() . '</td>
                                        <td data-label="Gender">' . $user->get_gender() . '</td>
                                        <td class="actions-cell">
                                            <div class="buttons right nowrap">
                                                <button class="button small green --jb-modal" data-target="sample-modal-2" >
                                                <a href="user_action.php?id=' . $user->get_id() . '"> <span class="icon"><i class="mdi mdi-pen"></i></span></a>
                                                </button>
                                                <form action="../controller/usercontroler.php?id=' . $user->get_id() . '" method="POST">
                                                    <button class="button small red --jb-modal" data-target="sample-modal" type="submit"  id="user" name="user" value="delete">
                                                        <span class=" icon"><i class="mdi mdi-trash-can"></i></span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>';
                        } ?>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- Scripts below are for demo only -->
    <?php include "layout/footer.php" ?>
</body>

</html>