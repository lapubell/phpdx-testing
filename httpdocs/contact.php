<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/">Home</a></li>
            <li class="active"><a href="/contact.php">Contact</a></li>
        </ul>
    </div>
</nav>


<div class="container">
    <div class="row">

        <div class="col-xs-12">
            <h1>Contact Us!</h1>
        </div>

        <div class="col-xs-12 col-sm-8">

            <?php
            if (isset($_SESSION['errorMessage'])) {
                echo "<p>Please correct the following errors.</p>";
                echo $_SESSION['errorMessage'];
            }
            ?>

            <form action="thank-you.php" method="POST">

                <div class="form-group<?php
                if (isset($_SESSION['error']['fname'])) {
                    echo " has-error";
                } ?>">
                    <label for="fname" class="control-label">First Name*</label>
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Jane" value="<?php echo $_SESSION['old']['fname']; ?>">
                </div>

                <div class="form-group<?php
                if (isset($_SESSION['error']['lname'])) {
                    echo " has-error";
                } ?>">
                    <label for="lname" class="control-label">Last Name*</label>
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Doe" value="<?php echo $_SESSION['old']['lname']; ?>">
                </div>

                <div class="form-group<?php
                if (isset($_SESSION['error']['phone'])) {
                    echo " has-error";
                } ?>">
                    <label for="phone" class="control-label">Phone Number*</label>
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="503-123-4567" value="<?php echo $_SESSION['old']['phone']; ?>">
                </div>

                <div class="form-group<?php
                if (isset($_SESSION['error']['email'])) {
                    echo " has-error";
                } ?>">
                    <label for="email" class="control-label">Email Address*</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="jane@example.com" value="<?php echo $_SESSION['old']['email']; ?>">
                </div>

                <div class="form-group<?php
                if (isset($_SESSION['error']['message'])) {
                    echo " has-error";
                } ?>">
                    <label for="message" class="control-label">Message*</label>
                    <textarea name="message" id="message" class="form-control" rows="4"><?php echo $_SESSION['old']['message']; ?></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Hit us up!</button>
                </div>

            </form>

        </div>

        <aside class="col-xs-12 col-sm-4">
            <p>
                <strong>Contact info:</strong><br>
                123 Main Street<br>
                Portland, OR 97222<br>
                <a href="tel:5031234567">503-123-4567</a>
            </p>
        </aside>

    </div>
</div>

</body>
</html>
<?php

$_SESSION = [];
