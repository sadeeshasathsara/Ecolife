<?php
include("includes/favicon.php");
include ("includes/config.php");
include ("includes/notification.php");
include ("includes/isLogged.php");
?>

<!-- html structure -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- title -->
    <title>EcoLife - Wildlife safari trip management system</title>
      <!-- icon -->
      <link
         rel="shortcut icon"
         href="./images/logo-icon.png"
         type="image/x-icon"
      />
    <link rel="stylesheet" href="css/login.css?v=1.2">
    <link rel="stylesheet" href="css/signup.css?v=1.1">

</head>

<body>

    <!-- header.php -->
    <?php include "./includes/navbar.php";?>

    <!-- LOG IN PART -->
    <section id="login-main-container">
        <section id="login-container">
            <div class="box" id="left">
            <!-- image -->
            </div>
            <div class="box" id="right">
                <!-- log in form -->
                <form method="post" autocomplete="off">
                    <div class="title-form">
                        <img src="./images/logo-icon.png" alt="" width="70">
                        <h3 id="login-header">Log In</h3>
                    </div>

                    <div class="svg">
                        <!-- <i class="svg-input"></i> -->
                        <img src="./images/svg/user.png" alt="" width = "15">
                        <input type="email" name="email" placeholder="email" autocomplete="off" required>
                    </div>

                    <br>

                    <div class="svg">
                        <!-- <i class="svg-input"></i> -->
                        <img src="./images/svg/lock.png" alt="" width="15">
                        <input type="password" name="password" placeholder="password" autocomplete="off" required>
                    </div>
                    <br>
                    <input id="sign-in-button" type="submit" name="submit" value="LOG IN">
                    <br>
                    <div id="login-error">

                    </div>

                    <div id="hr">
                        <span></span>
                        <p id="hr-text">OR</p>
                        <span></span>
                    </div>

                    <button id="sign-up" onclick="openPopup()">
                    SIGN UP
                    </button>

                    <label id="terms-conditions">
                        <a href="#"><u>Terms and Conditions</u> | <u>Privacy Policy</u></a>
                    </label>
                </form>

                
            </div>

        </section>

    </section>

    <!-- SIGN UP PART -->
    <section id="signup-main-container">
        <section id="signup-container">

            <!-- popup box close svg -->
            <div id="signup-close-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#22222" id="signup-close"
                    viewBox="0 0 16 16" onclick="closePopup()">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                </svg>
            </div>

            <!-- sign up form -->
            <form method="post">
                <h3 id="signup-header-text">Sign Up </h3>

                <input type="text" name="fName" placeholder="First Name" required>
                <br>

                <input type="text" name="lName" placeholder="Last Name" required>
                <br>

                <input type="email" name="email" placeholder="Email" required>
                <br>

                <input type="password" name="password" placeholder="Password" id="password" required>
                <br>

                <input type="password" name="confirmedPassword" placeholder="Confirm Password" id="cPassword" required>
                <br>

                <input type="submit" name="submit" value="SIGN UP" id="signup-button">

            </form>

            <div id="hr">
                <hr>
                <p id="hr-text">OR</p>
                <hr>
            </div>

            <button id="sign-in" onclick="closePopup()">
                SIGN IN
            </button>

            <label id="terms-conditions">
                <a href="#"><u>Terms and Conditions</u> | <u>Privacy Policy</u></a>
            </label>

        </section>
    </section>
    <script src="js/signup_popup.js"></script>


    <!-- footer.php -->
    <?php include("./includes/footer.php"); ?>
</body>

</html>

<!-- log in management -->

<?php

// remind notification to login
if (!isset($_SESSION['email'])) {
    callNotificationPhp("Please log in");
}

// check email and password for login
if (isset($_POST["email"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = 'select email, password from user';

    $result = mysqli_query($connection, $query);

    $login_successfull = false;

    while ($row = mysqli_fetch_assoc($result)) {

        if ($email == $row['email'] && $password == $row['password']) {
            $login_successfull = true;

            $query = "SELECT firstName, lastName FROM user WHERE email = '$email'";

            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $fName = $row['firstName'];
                $lName = $row['lastName'];
            }

            break;
        }
    }

    if ($login_successfull) {
        //for logged in as notification
        $_SESSION["fName"] = $fName;
        $_SESSION["lName"] = $lName;
        //over
        $_SESSION['user_id'] = 1;
        $_SESSION['email'] = $email;
        $_SESSION['alreadyLogged'] = 1;

        $startTime = date("s");
        $endTime = date("s") + 5;

        // redirect to user dashbord after login
        echo "<script>window.location.href = 'http://localhost/ecolife/index.php';</script>";

    } else {
        // notify user email or password is wrong
        callNotificationPhp('E-mail and password did not match');
    }
}


// sign up part
if (isset($_POST["fName"])) {

    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cPassword = $_POST["confirmedPassword"];

    $query = "INSERT INTO user (firstName, lastName, email, password) VALUES ('$fName', '$lName', '$email', '$cPassword')";

    if ($password == $cPassword) {
        $result = mysqli_query($connection, $query);
        callNotificationPhp("Account has succussfully created.");

    } else {
        callNotificationPhp('Confirmed password did not matched.');
        echo "<script>openPopup();</script>";
    }

    if ($connection->error) {
        callNotificationPhp("E-mail already exsist.");
        echo "<script>openPopup();</script>";
    }

}


// ?>