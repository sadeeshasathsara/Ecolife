<?php
include './includes/config.php'; 

?>

<!doctype html>
<html lang="en">
  <head>

    <style>
          .container {
            color:#ffffff;
            font-family: "Poppins", sans-serif;
            width: 80%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
        }
        .container table{
          width: 100%;
        }
        .text-light{
          color:#fff !important;
        }
    </style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Incident Report Form</title>

    <title>Incident CRUD</title>
  </head>
<body>
    

<div class="container">
<button class="btn btn-primary my-5"> <a href="Incident.php" class="text-light"> Add incident </a></button>

<table class="table">
  <thead>
    <tr>
      <th scope="col">IncidentID</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">ReservationID</th>
      <th scope="col">Date</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>

  <?php
  
  if(isset($_SESSION['rid'])){

    $rid = $_SESSION['rid'];

    $sql="Select * from `incident` where `ReservationID` = '$rid'";
    $result=mysqli_query($connection,$sql);
    if ($row=mysqli_fetch_assoc($result)){
        $id=$row['IncidentID'];
        $fname=$row['FirstName'];
        $lname=$row['LastName'];
        $rid=$row['ReservationID'];
        $date=$row['Date'];
        $description=$row['Description'];
        
        
        echo '<tr>
        <td>'.$id.'</td>
        <td>'.$fname.'</td>
        <td>'.$lname.'</td>
        <td>'.$rid.'</td>
        <td>'.$date.'</td>
        <td>'.$description.'</td>
        
        <td><button class="btn btn-primary"><a href="./incident/update.php? updateid='.$id.'" class="text-light">Update</a><button> </td>
        <td><button class="btn btn-danger"><a href="./incident/delete.php? deleteid='.$id.'" class="text-light">Delete</a><button> </td>
        </tr>';
      }
  }
  

  ?>
   

  </tbody>
</table>
</div>

</body>
</html>

