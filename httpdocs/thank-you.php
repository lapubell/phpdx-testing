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
    <title></title>
</head>
<body>

</body>
</html>
