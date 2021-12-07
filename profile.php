
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="theme-color" content="blue">

    <meta name="msapplication-navbutton-color" content="#00BCD4">

    <meta name="apple-mobile-web-app-status-bar-style" content="#00BCD4">
    <link rel="shortcut icon" href="/images/car-logo.png" />
    <title><?= $title ?> - Profile</title>

    <link href="bootstrap.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
</head>
<body>

<?php require_once('navigation.html') ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="text-center">
	       <h3>Profile Info</h3>
            </div>
            <br>
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <hr>
                <div class="row">
                    <div class="col-sm-2">
                        <strong>UserName :</strong>
                    </div>
                    <div class="col-sm-10">
                        <?= $user['uname'] ?>
                    </div>
                </div>
		<div class="row">
                    <div class="col-sm-2">
                        <strong>First Name:</strong>
                    </div>
                    <div class="col-sm-10">
                        <?= $user['fname'] ?>
                    </div>
                </div>
		<div class="row">
                    <div class="col-sm-2">
                        <strong>Last Name:</strong>
                    </div>
                    <div class="col-sm-10">
                        <?= $user['lname'] ?>
                    </div>
                </div>
		<div class="row">
                    <div class="col-sm-2">
                        <strong>Email :</strong>
                    </div>
                    <div class="col-sm-10">
                        <?= $user['email'] ?>
                    </div>
                </div>
                <br>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>




<footer class="footer">
    <div class="container text-center" style="padding: 10px;">
    </div>
</footer>

</body>
<style>

body {
    background: #eee;
    padding-top: 80px;
}

.img-responsive {
    margin: 0 auto;
}

.nav-tabs > li, .nav-pills > li {
    float:none;
    display:inline-block;
    *display:inline; /* ie7 fix */
    zoom:1; 
}

.nav-tabs, .nav-pills {
    text-align:center;
}
</style>
</html>