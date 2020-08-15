<?php if (isset($_SESSION['auth'])) : ?>

    <footer id="myFooter" class="container">
        <div class="row">
            <div class="col-sm-4">
                <h5>Get started</h5>
                <ul>
                    <li><a href="../welcome/">Welcome</a></li>
                    <li><a href="../login/">Log in</a></li>
                    <li><a href="../register/">Sign up</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h5>Features</h5>
                <ul>
                    <li><a href="../" >Aawaz</a></li>
                    <li><a href="../home/" >Dashboard</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h5>Support</h5>
                <ul>
                    <li><a href="../contact/" target="_blank">Contact Us</a></li>
                </ul>
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
<?php
if (file_exists('main.js')) {
    echo '<script src="main.js"></script>';
}
?>
</body>

</html>

<?php

if (isset($_SESSION['ERRORS'])) {
    $_SESSION['ERRORS'] = null;
}
if (isset($_SESSION['STATUS'])) {
    $_SESSION['STATUS'] = null;
}
