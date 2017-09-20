<?php
session_start();

// check for required fields
$_SESSION['error'] = [];
if (!isset($_POST['fname']) || $_POST['fname'] == "") {
    $_SESSION['error']['fname'] = "First Name is Required";
}

if (!isset($_POST['lname']) || $_POST['lname'] == "") {
    $_SESSION['error']['lname'] = "Last Name is Required";
}

if (!isset($_POST['phone']) || $_POST['phone'] == "") {
    $_SESSION['error']['phone'] = "Phone is Required";
}

if (!isset($_POST['email']) || $_POST['email'] == "") {
    $_SESSION['error']['email'] = "Email Address is Required";
}

if (!isset($_POST['message']) || $_POST['message'] == "") {
    $_SESSION['error']['message'] = "Message is Required";
}

// redirect if there are any errors
if (count($_SESSION['error'])) {
    header("Location: /contact.php");
    die();
}

?><!DOCTYPE html>
<html>
<head>
    <title>Thanks for reaching out!</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/">Home</a></li>
            <li><a href="/contact.php">Contact</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">

        <div class="col-xs-12">
            <h1>Thanks for reaching out!</h1>
            <p>Someone has been notified and they will respond soon.</p>
        </div>

    </div>
</div>



</body>
</html>
