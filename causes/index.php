<?php

define('TITLE', "Cause");
include '../assets/layouts/header.php';
check_verified();

?>


<main role="main" class="container">

    <div class="row">
        <div class="col-sm-3">

            <div class="card m-1">
                <div class="card-header">
                    <h3 class="text-center"> <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></h3>
                    <p class="text-center"> <?php echo $_SESSION['username']; ?></p>
                    <p class="text-center"> <?php echo $_SESSION['email']; ?></p>
                </div>
            </div>

        </div>
        <div class="col-sm-9">
            <div class="card p-2">
                <strong class="heading-3">Title</strong>
                <p class="text-muted">736 people sign it</p>
                <div id="live" class="border rounded p-2"></div>
                <div class="text-muted">By Shakil Alam</div>
                <div class="text-black-50">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa sit ad, consequatur distinctio alias debitis obcaecati mollitia tenetur reprehenderit exercitationem.</div>
                <textarea class="form-control mt-2" name="comment" id="comment" rows="3" placeholder="Enter Your Message" required></textarea>
                <button class="mt-2 btn btn-primary btn-block">Sign the cause</button>
            </div>

            <div class="card my-3 p-3 bg-white box-shadow">
                <h6 class="heading-4 font-weight-bold border-bottom pb-4">Latest Causes</h6>
                <div id="latest"></div>
                <small class="d-block text-right mt-3">
                    <a href="#">All updates</a>
                </small>
            </div>

        </div>
    </div>
</main>



<?php

include '../assets/layouts/footer.php'

?>