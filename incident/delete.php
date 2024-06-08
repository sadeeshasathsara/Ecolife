<?php
include '../includes/config.php'; 

if(isset ($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "DELETE FROM `incident` WHERE `IncidentID`=$id";
    $result= mysqli_query($connection,$sql);
    if($result){
        echo '
        <script>
            alert("Incident Deleted Successfull");
            window.location.href = "http://localhost/ecolife/incident.php";
        </script>
        ';
    }
    else{
        die(mysqli_error($connection));
    }
}

?>