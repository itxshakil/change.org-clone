<?php if (isset($_SESSION['auth'])) : ?>

    <footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2 class="logo">
                        <a href="../home/" target="_blank">
                            <img src="../assets/images/logowhite.png" alt="" width="200" height="200" class="">
                        </a>
                    </h2>
                </div>
                <div class="col-sm-2">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="../welcome/" target="_blank">Welcome</a></li>
                        <li><a href="../login/" target="_blank">Log in</a></li>
                        <li><a href="../signup/" target="_blank">Sign up</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Features</h5>
                    <ul>
                        <li><a href="../home/" target="_blank">Home</a></li>
                        <li><a href="../dashboard/" target="_blank">Dashboard</a></li>
                        <li><a href="../profile/" target="_blank">Profile</a></li>
                        <li><a href="../profile-edit/" target="_blank">Edit Profile</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="../contact/" target="_blank">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 my-3">
                    <div class="social-networks">
                        <a href="https://github.com/msaad1999" class="twitter" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/muhammadsaadhussaini/" class="facebook" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                    <a class="btn btn-default" href="mailto:saad01.1999@gmail.com" target="_blank">Email Me</a>
                </div>
            </div>
        </div>
    </footer>

<?php endif; ?>
<div class="text-center border-top ">
    <p class="font-weight-bold text-muted">
        &copy; 2020 All Rights reserved
    </p>
</div>
<script src="../assets/js/jquery-3.4.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>

<?php if (isset($_SESSION['auth'])) : ?>

    <script src="../assets/js/check_inactive.js"></script>

<?php endif; ?>


</body>

</html>

<?php

if (isset($_SESSION['ERRORS'])) {
    $_SESSION['ERRORS'] = null;
}
if (isset($_SESSION['STATUS'])) {
    $_SESSION['STATUS'] = null;
}
