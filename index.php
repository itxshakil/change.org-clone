<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aawaz: Change.org Clone">
    <meta name="author" content="itxshakil">

    <title>Home | Aawaz</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="assets/vendor/fontawesome-5.12.0/css/all.min.css"> -->

    <!-- Custom styles -->
    <!-- <link rel="stylesheet" href="assets/css/app.css"> -->
    <!-- <link rel="stylesheet" href="custom.css" > -->

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="home">Aawaz</a>
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
                        <a class="nav-link" href="contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main role="main">
        <div class="jumbotron text-center">
            <h2 class="display-4">The platform for change</h2>
            <p>877 people signs</p>
            <a href="home" class="btn btn-danger">Start a cause </a>
        </div>
        <div class="card my-3 p-3 bg-white box-shadow container">
            <h6 class="heading-4 font-weight-bold border-bottom pb-4">Latest Causes</h6>
            <div id="latest"></div>
            <small class="d-block text-right mt-3">
                <a href="#">All updates</a>
            </small>
        </div>
    </main>



    <div class="text-center border-top ">
        <p class="font-weight-bold text-muted">
            &copy; 2020 All Rights reserved
        </p>
    </div>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script>
        $.ajax({
            url: 'api/latest_cause.php'
        }).done(function(response) {
            response = JSON.parse(response);
            $.map(response, function(cause, i) {
                $('#latest').append(`<div class="p-3 border-bottom">
                    <strong>${cause.title.substring(1, 80)}</strong>
                    <p>${cause.description.substring(1, 120)}...</p>
                    <div class="row justify-content-between px-3">
                        <span class="text-muted">By ${cause.first_name} ${cause.last_name}</span>
                        <a href="causes?id=${cause.id}" class="btn btn-primary">Sign the cause </a>
                    </div>
                </div>`)
            })
        })
    </script>
</body>

</html>