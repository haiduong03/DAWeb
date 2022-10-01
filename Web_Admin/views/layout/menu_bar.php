<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
        <div class="navbar-item">
            <div class="control"><input placeholder="Search everywhere..." class="input"></div>
        </div>
    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item dropdown has-divider">
                <?php
                session_start();
                if (isset($_SESSION["user_name"])) {
                    echo ' 
                    <a class="navbar-link">
                        <span class="icon"><i class="mdi mdi-menu"></i></span>
                        <span>' . $_SESSION["user_name"] . '</span>
                        <span class="icon">
                            <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="profile.php" class="navbar-item">
                            <span class="icon"><i class="mdi mdi-account"></i></span>
                            <span>My Profile</span>
                        </a>
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-settings"></i></span>
                            <span>Settings</span>
                        </a>
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-email"></i></span>
                            <span>Messages</span>
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="signout.php">
                            <span class="icon"><i class="mdi mdi-logout"></i></span>
                            <span>Sign Out</span>
                        </a>
                    </div>';
                } else {
                    echo '
                    <a class="navbar-link">
                        <span class="icon"><i class="mdi mdi-menu"></i></span>
                        <span>Admin</span>
                        <span class="icon">
                            <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="profile.php" class="navbar-item">
                            <span class="icon"><i class="mdi mdi-account"></i></span>
                            <span>My Profile</span>
                        </a>
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-settings"></i></span>
                            <span>Settings</span>
                        </a>
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-email"></i></span>
                            <span>Messages</span>
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="signin.php">
                            <span class="icon"><i class="mdi mdi-login"></i></span>
                            <span>Sign in</span>
                        </a>
                    </div>';
                } ?>
            </div>

        </div>
    </div>
</nav>