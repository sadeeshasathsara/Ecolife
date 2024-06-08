<?php
include '../includes/config.php';
$id = $_GET['updateid'];

if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $date = mysqli_real_escape_string($connection, $_POST['date']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);

    $sql = "UPDATE `incident` SET FirstName='$fname', LastName='$lname', Date='$date', Description='$description' WHERE IncidentID=$id";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo '
        <script>
            alert("Incident Updated Successfull");
            window.location.href = "http://localhost/ecolife/incident.php";
        </script>
        ';
    } else {
        echo "Error: ";
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >
    <title>Hello, world!</title>

    <style>

	div.scroll-container {
                     background-color: #fff;
                     overflow: auto;
                     white-space: nowrap;
                     padding:none;
                  }

        div.scroll-container img {
            padding: 10px;
            width:70%;
            height:500px;
           }
       
	 body {
            font-family: "Poppins", sans-serif;
            background-color: #f5f5f5;
            color: var(--primaryBlack);
            padding: 20px;
        }

        .container {
            color:#000000;
            font-family: "Poppins", sans-serif;
            max-width: 600px;
            margin: 0 auto;
            background-color: #008455;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }


        input[type="text"],
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
    </style>

  </head>
  <body>


	<br>
	<br>
	<br>

    <div class="container">
        <h1>Update Your Incident</h1>
        <form action="" method="POST">
	
           
            <input type="text" id="fname" name="fname" placeholder="First Name" style="margin-right:100px;" required>

            
            <input type="text" id="lname" name="lname" placeholder="Last Name" required>


            <input type="date" id="date" name="date" placeholder="Date" required><br>

            
            <textarea id="description" name="description" placeholder="Type In Your Experience" rows="6" required></textarea><br>

            
            <button type="submit" class="btn btn-primary" name="submit">Update</button>

            <button type="reset" class="btn btn-primary" name="clear">Clear</button>
        
        </form>
    </div>
</body>
</html>
