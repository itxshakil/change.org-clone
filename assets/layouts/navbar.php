<nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <div class="container">
        <a class="navbar-brand" href="../"><?php echo APP_NAME; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="../">Home</a>
                </li>

                <?php if (!isset($_SESSION['auth'])) : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="../contact">Contact Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../login">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../register">Signup</a>
                    </li>

                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact">Contact Us</a>
                    </li>

                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="imgdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <small><?php echo $_SESSION['username'] ?></small>
                            <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="imgdropdown">
                            <!-- <a class="dropdown-item text-muted" href="../profile"><i class="fa fa-user pr-2"></i>
                                    Profile</a>
                                <a class="dropdown-item text-muted" href="../profile-edit"><i class="fa fa-pencil-alt pr-2"></i> Edit Profile</a> -->
                            <a class="dropdown-item text-muted" href="../logout"><i class="fa fa-running pr-2"></i>Logout</a>
                        </div>
                    </div>

                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>