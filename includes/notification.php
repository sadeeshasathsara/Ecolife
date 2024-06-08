<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/notification.css?v=1.5">
    <script src="js/notification.js?v=1.2"></script>
</head>
<body>
    <div id="notification-main-container">

        <div id="notification-container" onclick="slideOut()">
            <p id="notification-header-text">Notification</p>
            <p id="notification-text">
                Demo notification
            </p>
        </div>
    </div>
</body>
</html>

<?php

function callNotificationPhp($demoMsg){
    $notification = "
            <script>
                callNotification('$demoMsg');
            </script>
        ";
    echo $notification;
}