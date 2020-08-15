<?php

define('TITLE', "Home");
include '../assets/layouts/header.php';
check_logged_in();

?>

<main class="container">
    <div class="row">
        <div class="col-sm-3 mt-2">
            <div class="card m-1">
                <div class="card-header">
                    <h3 class="text-center"> <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></h3>
                    <p class="text-center"> <?php echo $_SESSION['username']; ?></p>
                    <p class="text-center"> <?php echo $_SESSION['email']; ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <form class="form-auth" action="includes/create_cause.php" method="POST">
                <h6 class="h3 mt-3 mb-3 font-weight-normal text-center">Create new Cause!</h6>
                <small class="text-danger ml-2 font-weight-bold">
                    <?php
                    if (isset($_SESSION['ERRORS']['formerror']))
                        echo $_SESSION['ERRORS']['formerror'];
                    ?>
                </small>
                <div class="form-group mt-2">
                    <label for="title" class="sr-only">Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter petition title" required autofocus>
                    <sub class="text-danger">
                        <?php
                        if (isset($_SESSION['ERRORS']['titleerror']))
                            echo $_SESSION['ERRORS']['titleerror'];

                        ?>
                    </sub>
                </div>

                <div class="form-group">
                    <label for="dexription" class="sr-only">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter petition description here..." class="form-control" required></textarea>
                    <sub class="text-danger">
                        <?php
                        if (isset($_SESSION['ERRORS']['descriptionerror']))
                            echo $_SESSION['ERRORS']['descriptionerror'];

                        ?>
                    </sub>
                </div>
                <button class="btn btn-primary btn-block " type="submit">Create Cause</button>

            </form>


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