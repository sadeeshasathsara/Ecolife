<?php
include("includes/favicon.php");
include ("includes/config.php");
include ("includes/isLogged.php");
include ("includes/notification.php");
if(isset($_SESSION['email'])){
    $session_email = $_SESSION['email'];
}

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
    <link rel="stylesheet" href="css/userdashboard.css?v=2.0">
    <script src="js/userdashboard.js?v=2.6"></script>
</head>

<body>
    <!-- header.php -->
    <?php include ("./includes/navbar.php"); ?>

    <!-- user dashboard -->
    <div id="user-dashboard-main-container">

        <div id="user-dashboard-container">

            <div id="user-status">

                <!-- user profile side (right side) -->
                <div id="user-profile">
                    <div id="account-settings" onclick="openSettings()"></div>

                    <div id="profile-pic" onclick="openSettings()"></div>
                    <div id="user-name"></div>
                    <div id="user-email"></div>
                    <form id="button-set" method="post">
                        <div id="delete-account" name="deleteAccount" onclick="deletePopup()">Delete Account</div>
                        <input type="submit" id="logout" name='logOut' value='Log Out'>
                    </form>
                </div>

                <!-- password change side (left side) -->
                <div id="user-password">
                    <p id="user-password-header">Change Password</p>
                    <form method="post">
                        <input type="password" name="currentPassword" placeholder="Current Password" id="current-password"
                            required>
                        <br>
                        <p id="status-para">Enter new password</p>
                        <input type="password" name="newPassword" placeholder="New Password" id="new-password" required>
                        <br>
                        <input type="password" name="confirmNewPassword" placeholder="Confirm New Password"
                            id="confirm-new-password" required>
                        <br>
                        <div id="change-password-container">
                            <input type="submit" id="change-password" value="Change Password">
                        </div>
                    </form>
                </div>

            </div>

            <!-- account delete confirmation popup -->
            <div id="account-delete-dialog-box-container">
                <div id="account-delete-dialog-box">
                    <p id="dialog-header">Are you sure to delete your account?</p>
                    <form method="post">
                        <input type="submit" name="yes" value="Yes" id="yes">
                        <button name="no" id="no" onclick="deleteClosePopup()">No</button>
                    </form>
                </div>
            </div>

            <!-- user reservations title -->
            <div id="user-trips-container">
                <p id="user-trips-text">My Reservations</p>
            </div>

            <!-- Reservatiobns -->
            <div id="reservation">
                <table>
                    <th>
                        <tr style="background-color:#222; color:#fff;">

                            <td>Name</td>
                            <td>Email</td>
                            <td>Date</td>
                            <td>Count</td>
                            <td>Package Type</td>
                            <td>Tour Type</td>
                            <td>Status</td>
                        </tr>
                    </th>
                    <?php

                    $session_email = $_SESSION['email'];

                    
                    $sql = "SELECT `fullName`,`email`,`date`,`countOfPeople`, `pkgType`, `tourType`,`status` FROM `reservation` WHERE email = '$session_email' ";

                    $result = mysqli_query($connection, $sql);

                    if($row = mysqli_fetch_assoc($result)){
                        echo '  
                        <tbody>
                            <tr style="background-color:#fff;">
                                <td>'.$row['fullName'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['date'].'</td>
                                <td>'.$row['countOfPeople'].'</td>
                                <td>'.$row['pkgType'].'</td>
                                <td>'.$row['tourType'].'</td>
                                <td id="status">'.$row['status'].'</td>
                            </tr>
                        </tbody>';
                    }
                    else{
                        echo '
                        <tbody><tr><td>No Reservations</td></tr></tbody>';
                    }
                    
                    ?>
                </table>
            </div>

        </div>

    </div>


    <!-- change prifile picture popup box -->
    <div id="account-settings-container">

        <form method="post" enctype="multipart/form-data">

            <div id="account-settings-close-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="#ffffff"
                    id="account-settings-close" viewBox="0 0 16 16" onclick="closeSettings()">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                </svg>
            </div>

            <div id="choose-file">
                <label id="change-profile-pic">Change profile picture </label>
                <input id="profile-pic-input" type="file" accept="image/*" name="profilePicture" required>
            </div>

            <br>

            <input id="submit" type="submit" value="Save" name="save">
        </form>

    </div>

    <!-- footer -->
    <?php include ("./includes/footer.php"); ?>
</body>

</html>

<!-- PHP -->

<?php

$session_email = $_SESSION["email"];


echo "
    <script>
    document.getElementById('notification-main-container').style.display = 'none';
    </script>
";

//get infromation from user table
$query = "SELECT * FROM user WHERE email = '$session_email'";

$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $fName = $row['firstName'];
    $lName = $row['lastName'];
    $email = $row['email'];
    $password = $row['password'];
    $profilePic = $row['profilePicture'];
}

// display user information
echo "
<script>
    displayName('$fName', '$lName'); 
    displayEmail('$email');
</script>";

//display profile pic
if (!$profilePic == null) {

    $profilePic = str_replace(' ', '', $profilePic);

    $getProfilePic = "images/uploads/" . $profilePic;

    echo "
    <script>
        document.getElementById('profile-pic').style.backgroundImage = 'url($getProfilePic)';
        document.getElementById('profile-pic').style.backgroundRepeat = 'no-repeat';
        document.getElementById('profile-pic').style.backgroundSize = 'cover';
    </script>
    ";

}

//logOut
if ((isset($_POST['logOut'])) || ($session_email == null)) {
    logout();

    echo '
        <script>
            window.location.href = "http://localhost/ecolife/";
        </script>
        ';
}

//change password
if (isset($_POST['currentPassword'])) {
    $currentPassword = $_POST['currentPassword'];
    if ($currentPassword == $password) {
        $newPassword = $_POST['newPassword'];
        $cNewPassword = $_POST['confirmNewPassword'];

        if ($newPassword == $cNewPassword) {
            $changePasswordSql = "UPDATE user SET password = '$cNewPassword' WHERE email = '$email'";
            if ($success = mysqli_query($connection, $changePasswordSql)) {
                callNotificationPhp('Password change successfull.');

            } else {
                $error = mysqli_error($connection);

                callNotificationPhp('$error');
            }
        } else {
            callNotificationPhp('Confirmed password did not match.');
        }

    } else {
        callNotificationPhp("Current password is wrong.");
    }
}



//user-profile-settings
if (isset($_POST['save'])) {

    //profilepic
    if (isset($_FILES['profilePicture'])) {
        $changedProfilePic = $_FILES['profilePicture'];

        $img_name = $_FILES['profilePicture']['name'];
        $tmp_name = $_FILES['profilePicture']['tmp_name'];
        $error = $_FILES['profilePicture']['error'];

        $setProfilePicSql = "UPDATE user SET profilePicture = '$img_name' where email = '$session_email'";

        if (mysqli_query($connection, $setProfilePicSql)) {

            callNotificationPhp("Profile Picture Updated.");

            if ($error == 0) {
                $upload_path = 'images/uploads/' . $img_name;
                if (!move_uploaded_file($tmp_name, $upload_path)) {
                    callNotificationPhp('Upload path is wrong.');
                }
            } else {
                callNotificationPhp("Unknown error occured.");
            }

            echo "
            <script>
            window.location.href = 'user-dashboard.php';
            </script>
            ";

        } else {
            echo mysqli_error($connection);
            callNotificationPhp("Query Failed.");
        }

        if (!$profilePic == null) {

            $profilePic = str_replace(' ', '', $profilePic);
        
            $getProfilePic = "images/uploads/" . $profilePic;
        
            echo "
            <script>
                document.getElementById('profile-pic').style.backgroundImage = 'url($getProfilePic)';
                document.getElementById('profile-pic').style.backgroundRepeat = 'no-repeat';
                document.getElementById('profile-pic').style.backgroundSize = 'cover';
            </script>
            ";
        
        }
    } else {
        callNotificationPhp("Profile Picture is not selected.");
    }
}

//Delete Account

if (isset($_POST["yes"])) {
    
    $accountDeleteSql = "DELETE FROM user WHERE `user`.`email` = '$session_email'";

    callNotificationPhp("You will be logged out in 3s.");

    if (mysqli_query($connection, $accountDeleteSql)) {
        

        $startTime = date("s");
        $endTime = date("s") + 5;

        while ($startTime != $endTime) {
            $startTime = date("s");
            if ($startTime == $endTime - 1) {
                logout();

                echo '
                <script>
                    window.location.href = "http://localhost/ecolife/";
                </script>
                ';
            }
        }
    }else{
        echo mysqli_error($connection);
    }

}
