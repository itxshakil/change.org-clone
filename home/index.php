<?php

define('TITLE', "Home");
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
            <form class="form-auth" action="includes/create_cause.php" method="post">
                <h6 class="h3 mt-3 mb-3 font-weight-normal text-center">Create new Cause!</h6>
                <small class="text-danger ml-2 font-weight-bold">
                    <?php
                    if (isset($_SESSION['ERRORS']['formerror']))
                        echo $_SESSION['ERRORS']['formerror'];

                    ?>
                </small>
                <!-- <div class="text-center mb-3">
                    <small class="text-success font-weight-bold">
                        <?php
                        if (isset($_SESSION['STATUS']['signupstatus']))
                            echo $_SESSION['STATUS']['signupstatus'];

                        ?>
                    </small>
                </div> -->

                <div class="form-group">
                    <label for="title" class="sr-only">Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="title" required autofocus>
                    <sub class="text-danger">
                        <?php
                        if (isset($_SESSION['ERRORS']['titleerror']))
                            echo $_SESSION['ERRORS']['titleerror'];

                        ?>
                    </sub>
                </div>

                <div class="form-group">
                    <label for="dexription" class="sr-only">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter cause description here" class="form-control" required></textarea>
                    <sub class="text-danger">
                        <?php
                        if (isset($_SESSION['ERRORS']['descriptionerror']))
                            echo $_SESSION['ERRORS']['descriptionerror'];

                        ?>
                    </sub>
                </div>
                <button class="btn btn-primary btn-block" type="submit" name='cause_submit'>Create Cause</button>

            </form>


            <div class="my-3 p-3 bg-white rounded box-shadow">
                <h6 class="mb-0">Dummy Text</h6>
                <sub class="text-muted border-bottom border-gray pb-2 mb-0">[use for your application purpose]</sub>

                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">@somethingsomething</strong>
                        Some dummy text. This is originally meant to be completely replaced with your application's own functionality.<br>
                        Or maybe use this for other functionality, although that is not recommended.
                    </p>
                </div>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">@somethingsomething</strong>
                        Some dummy text. This is originally meant to be completely replaced with your application's own functionality.<br>
                        Or maybe use this for other functionality, although that is not recommended.
                    </p>
                </div>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">@somethingsomething</strong>
                        Some dummy text. This is originally meant to be completely replaced with your application's own functionality.<br>
                        Or maybe use this for other functionality, although that is not recommended.
                    </p>
                </div>

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