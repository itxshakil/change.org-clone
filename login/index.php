<?php

define('TITLE', "Login");
include '../assets/layouts/header.php';
check_logged_out();
?>

<div class="container">
    <div class="container-fluid mt-4 border rounded">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image" style="background-image: url('https://res.cloudinary.com/mhmd/image/upload/v1555917661/art-colorful-contemporary-2047905_dxtao7.jpg');background-size: cover;background-position: center center;"></div>


            <!-- The content half -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5" style="min-height: 100vh;">

                    <!-- Demo content-->
                    <div class="w-100">
                        <div class="row">
                            <div class="mx-auto p-2">
                                <h3 class="display-4 mb-1">Welcome Back!</h3>
                                <p class="text-muted mb-4">Login to your account.</p>
                                <form class="form-auth" action="includes/login.inc.php" method="post">
                                    <div class="text-center mb-3">
                                        <small class="text-success font-weight-bold">
                                            <?php
                                            if (isset($_SESSION['STATUS']['loginstatus'])) {
                                                echo $_SESSION['STATUS']['loginstatus'];
                                            }

                                            ?>
                                        </small>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="username" class="sr-only">Username</label>
                                        <input id="username" type="text" name="username" placeholder="Email your username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                        <sub class="text-danger">
                                            <?php
                                            if (isset($_SESSION['ERRORS']['nouser'])) {
                                                echo $_SESSION['ERRORS']['nouser'];
                                            }
                                            ?>
                                        </sub>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password" class="sr-only">Password</label>
                                        <input id="password" name="password" type="password" placeholder="Enter password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                        <sub class="text-danger">
                                            <?php
                                            if (isset($_SESSION['ERRORS']['wrongpassword'])) {
                                                echo $_SESSION['ERRORS']['wrongpassword'];
                                            }
                                            ?>
                                        </sub>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input id="rememberme" type="checkbox" checked class="custom-control-input" name="rememberme">
                                        <label for="rememberme" class="custom-control-label">Remember me</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                                    <hr>
                                    <div class="text-center">
                                        <p class="mb-1">Don't have account? <a href="../register">Create now!</a></p>
                                        <a href="../reset-password" class="d-block">Forgot Password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>
    </div>

    <?php

    include '../assets/layouts/footer.php'

    ?>