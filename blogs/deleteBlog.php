<?php
   include '../includes/config.php';

   if(isset($_GET['blogId'])){
      $blogId = $_GET['blogId'];

      $sql = "DELETE FROM `blogs` WHERE `blogId` = $blogId";

      $result = mysqli_query($connection,$sql);

      if(!$result){
         echo "Can't find the blog";
      }
      else{
         header('location: ../blog.php');
      }
   }
?>