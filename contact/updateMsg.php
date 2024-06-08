<link rel="stylesheet" href="../src/contact.css">
<?php include '../includes/config.php';  ?>

<?php
    if(isset($_GET['contactId'])){
        $contactId = $_GET['contactId'];
        $sql = "SELECT * FROM `contact` WHERE `contactId` = '$contactId'";
        $result = mysqli_query($connection, $sql);

        if($result){
            $row = mysqli_fetch_assoc($result);
        }
        else{
            echo "error";
        }
    }
?>

<?php
    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $tpno = $_POST['tpno'];
        $country = $_POST['country'];
        $msg = $_POST['message'];
        
        $sql1 = "UPDATE `contact` SET `fullName` = '$name', `phoneNumber` = '$tpno', `country` = '$country', `message` = '$msg' WHERE `contactId` = '$contactId' ";

        $result1 = mysqli_query($connection, $sql1);

        if($result){
            header('location: ../contact.php');
        }
    }
?>


<div class="update">

    <div class="contact-update">
        <h2 ><center>Update Details</center></h2>
        
        <form class="up-form" method="post">
            <div class="inputrow-up">
                <div class="input-group-up">
                    <input class="input-up" type="text" name="name" placeholder=" Full Nmame" value="<?php echo $row['fullName'] ;?>" >
                </div>
                
                <div class="input-group-up">
                    <input class="input-up" type="tel" name="tpno" placeholder=" TP Number"  value="<?php echo $row['phoneNumber'] ;?>">
                </div>
                
                <div class="input-group-up">
                    <input class="input-up" type="text" name="country" placeholder=" Country"  value="<?php echo $row['country'] ;?>">
                </div>
                
                <textarea class="up-text" rows="8" name="message" placeholder="Briefly explain your expection"><?php echo $row['message'] ;?></textarea>
                
                <br>
                
                <input class="up-btn" type="submit" value="Update Details" name="submit"/>
                
                <!-- Add data to database -->
            </div>
        </form>
    </div>
</div>