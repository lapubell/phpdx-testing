<?php
session_start();

require "../Validator.php";
$v = new \phpdx\Validator;
$rules = [
    'fname' => 'required',
    'lname' => 'required',
    'phone' => 'required',
    'email' => 'required|isEmail',
    'message' => 'required',
];
$v->setRules($rules);
if (!$v->validate($_POST)) {
    $_SESSION['error'] = $v->errorMessages;
    $_SESSION['errorMessage'] = $v->errorMessage;
    $_SESSION['old'] = $_POST;
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
