<?php include '../includes/config.php';  ?>

<?php
    if(isset($_GET['contactId'])){
        $contactId = $_GET['contactId'];
    }
        $sql = "DELETE FROM `contact` WHERE `contactId` = '$contactId'";
        $result = mysqli_query($connection, $sql);

        if($result){
            header('location: ../contact.php');
        }
        else{
            echo "error";
        }
?>