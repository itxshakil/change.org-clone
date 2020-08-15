<?php

define('TITLE', "Signup");
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
                                <p class="text-muted mb-4">Create new Account.</p>
                                <form class="form-auth" action="includes/register.inc.php" method="post">
                                    <div class="text-center mb-3">
                                        <small class="text-danger font-weight-bold">
                                            <?php
                                            if (isset($_SESSION['ERRORS']['imageerror']))
                                                echo $_SESSION['ERRORS']['imageerror'];

                                            ?> </small>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="username" class="sr-only">Username</label>
                                        <input id="username" type="text" name="username" placeholder="Enter unique username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                        <sub class="text-danger">
                                            <?php
                                            if (isset($_SESSION['ERRORS']['usernameerror']))
                                                echo $_SESSION['ERRORS']['usernameerror'];

                                            ?>
                                        </sub>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="first_name" class="sr-only">First Name</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary" placeholder="First Name">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="last_name" class="sr-only">Last Name</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary" placeholder="Last Name">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="email" class="sr-only">Email address</label>
                                        <input type="email" id="email" name="email" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary" placeholder="Enter your Email" required autofocus>
                                        <sub class="text-danger">
                                            <?php
                                            if (isset($_SESSION['ERRORS']['emailerror']))
                                                echo $_SESSION['ERRORS']['emailerror'];

                                            ?>
                                        </sub>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password" class="sr-only">Password</label>
                                        <input type="password" id="password" name="password" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary" placeholder="Password" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="confirmpassword" class="sr-only">Confirm Password</label>
                                        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary" placeholder="Confirm Password" required>
                                        <sub class="text-danger mb-4">
                                            <?php
                                            if (isset($_SESSION['ERRORS']['passworderror']))
                                                echo $_SESSION['ERRORS']['passworderror'];

                                            ?>
                                        </sub>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Register account</button>
                                    <hr>
                                    <div class="text-center">
                                        <a href="../reset-password" class="d-block">Forgot Password?</a>
                                        <a href="../login" class="d-block">Log in to your account</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>
    </div>
</div>



<?php

include '../assets/layouts/footer.php'

?>