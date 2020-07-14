<?php

define('TITLE', "Home");
include '../assets/layouts/header.php';

?>


<main role="main">
    <div class="jumbotron text-center">
        <h2 class="heading-2">The platform for change</h2>
        <p>877 people signs</p>
        <a href="../home" class="btn text-danger border-danger">Start a cause </a>
    </div>
    <div class="card my-3 p-3 bg-white box-shadow container">
        <h6 class="heading-4 font-weight-bold border-bottom pb-4">Latest Causes</h6>
        <div id="latest"></div>
        <small class="d-block text-right mt-3">
            <a href="#">All updates</a>
        </small>
    </div>
</main>



<?php

include '../assets/layouts/footer.php'

?>