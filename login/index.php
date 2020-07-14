<?php

define('TITLE', "Login");
include '../assets/layouts/header.php';
check_logged_out();
?>

<div class="container">
    <div class="row ">
        <div class="col-md-4">

        </div>
        <div class="col-lg-6 card m-2 m-sm-3">
            <form class="form-auth" action="includes/login.inc.php" method="post">
                <h6 class="h2 mb-3 font-weight-normal text-center">Log in</h6>

                <div class="text-center mb-3">
                    <small class="text-success font-weight-bold">
                        <?php
                        if (isset($_SESSION['STATUS']['loginstatus'])) {
                            echo $_SESSION['STATUS']['loginstatus'];
                        }

                        ?>
                    </small>
                </div>

                <div class="form-group">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                    <sub class="text-danger">
                        <?php
                        if (isset($_SESSION['ERRORS']['nouser'])) {
                            echo $_SESSION['ERRORS']['nouser'];
                        }
                        ?>
                    </sub>
                </div>

                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <sub class="text-danger">
                        <?php
                        if (isset($_SESSION['ERRORS']['wrongpassword'])) {
                            echo $_SESSION['ERRORS']['wrongpassword'];
                        }
                        ?>
                    </sub>
                </div>

                <div class="col-auto my-1 mb-4">
                    <div class="ml-2">
                        <input type="checkbox" class="custom-control-input" id="rememberme" name="rememberme">
                        <label class="custom-control-label" for="rememberme">Remember me</label>
                    </div>
                </div>

                <button class="btn btn-primary btn-block" type="submit">Login</button>

                <hr>
                <div class="text-center">
                    <a href="../reset-password" class="d-block">Forgot Password?</a>
                    <a href="../register" class="d-block">Create new account</a>
                </div>
            </form>
        </div>
        <div class="col-md-4">

        </div>
    </div>


    <?php

    include '../assets/layouts/footer.php'

    ?>