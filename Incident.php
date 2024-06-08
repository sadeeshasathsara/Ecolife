<?php
include './includes/header.php';
include './includes/config.php';

if(isset($_POST['submit'])){
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $rid = mysqli_real_escape_string($connection, $_POST['rid']);
    $date = mysqli_real_escape_string($connection, $_POST['date']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $_SESSION['rid'] = $_POST['rid'];

    $sql = "INSERT INTO `incident` (`FirstName`, `LastName`, `ReservationID`, `Date`, `Description`)
            VALUES ('$fname', '$lname', '$rid', '$date', '$description')";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo '<script> alert("Incident report saved successfully!");</script>';
    } else {
    echo "Error: " . mysqli_error($connection);
    }
}
?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Incident Report Form</title>

    
    <title>Hello, world!</title>

    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing:border-box;
        }

        /* Colors */
:root {
   --primaryGreen: #008455;
   --primaryBlack: #111111;
   --seconderyCream: #f5dea8;
   --lightGreen: #b5e48c;
   --mainWhite: #ffffff;
   --seconderyText: #2f3e46;
}


	.scroll-container {
        background-color: #fff;
        overflow: auto;
        white-space: nowrap;
        padding:none;
        width: 100%;
        height: 90vh;
    }

    .scroll-container img {
            padding: 10px;
            width:100%;
            height: 90vh;
            object-fit:cover;
           }
       
           body {
            font-family: "Poppins", sans-serif;
            background-color: #f5f5f5;
            color: var(--primaryBlack);
        }

    .containerc {
        position: absolute;
        right: 0;
        margin: 20px;
        max-width: 600px;
        padding: 16px;
        background-color: white;
}

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }


        input[type="text"],
        input[type="date"],
        textarea {
            width: 40%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
	    width: 100%;
            height: 150px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #ffffff;
            color: #111;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        input[type="reset"] {
            background-color: #ffffff;
            color: #111;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 380px;
        }

        input[type="reset"]:hover {
            background-color: #bd2130;
        }

       .bg-img {  
    background-image:linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)) ,url("./images/hero.jpg");
    height:520px;
    background-position: left;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    }

    .btn {
        background-color:#222;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .btn:hover {
        opacity: 1;
    }

    .inc-hero {
   background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
      url(./images/jungle-2.jpg);
   background-size: cover;
   background-position: bottom;
   background-attachment: fixed;
   width: 100%;
   height: 50vh;
   display: flex;
   align-items: center;
   justify-content: center;
}

.inc-hero h1 {
   background-color: #fff;
   padding: 15px 40px;
   font-weight: 600;
   border-radius: 4px;
   box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.1);
   margin-top: 50px;
}


    </style>

  </head>
  <body>

    <section class="inc-hero" id="incident-hero">
         <h1>Incident Report</h1>
    </section>

	<br>
	<br>
	<br>

    <div class="bg-img">
    <div class="containerc">
        <h1>Report Your Incident</h1>
        <form action="" method="POST">
	
           
            <input type="text" id="fname" name="fname" placeholder="First Name" style="margin-right:100px;" required>

            
            <input type="text" id="lname" name="lname" placeholder="Last Name" required>


            <input type="text" id="rid" name="rid" placeholder="Reservation ID" style="margin-right:100px;" required>


            <input type="date" id="date" name="date" required><br>

            
            <textarea id="description" name="description" placeholder="Type In Your Experience" rows="6" required></textarea>
        
        </br>
        </br>
 
        <div class="btn-grp" style="display:flex; gap:10px;">

            <button type="submit" class="btn"  style="width:25%;" name="submit">Submit</button> 
            
            <button type="reset" class="btn"  style="width:25%;"  name="clear">Clear</button>
        </div>
        
        </form>
    </div>
</div>
    </br>
    </br>
    </br>
    <?php include './incident/display.php'; ?>

    <!-- JavaSCRIPT -->
    <script src="./src/incident.js"></script>
</body>
</html>
<?php
include './includes/footer.php';
?>
