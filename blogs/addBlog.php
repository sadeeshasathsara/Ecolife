<?php
   session_start();
   include '../includes/config.php';

   if(isset($_POST['blog-add-btn'])){
      if(isset($_SESSION['email'])){
         $title = $_POST['blog-title'];
         $content = $_POST['blog-content'];
         $email = $_SESSION['email'];
         
         $img_name = $_FILES['blog-img']['name'];
         $tempname = $_FILES['blog-img']['tmp_name'];
         $folder = '../images/uploads/'.$img_name;
         
         
         $sql = "INSERT INTO `blogs`(`blogTitle`, `blogContent` ,`blogImg`, `email`) VALUES('$title', '$content','$img_name', '$email')";
         
         $result = mysqli_query($connection,$sql);
         
         if(move_uploaded_file($tempname, $folder)){
            echo "file uploaded succesfully";
         }
         else{
            echo "file not uploaded";
         }
         
         if(!$result){
            echo "No added";
         }
         else{
            header('location: ../blog.php');
         }
      }
      else{
         echo "<script>alert('Please Log In')</script>";
         }
   }



?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!-- title -->
      <title>EcoLife - Wildlife safari trip management system</title>
      <!-- icon -->
      <link
         rel="shortcut icon"
         href="./images/logo-icon.png"
         type="image/x-icon"
      />
      <!-- Custom css -->
      <link rel="stylesheet" href="../src/blog.css" />
      <!-- Poppins font -->
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
         href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
         rel="stylesheet"
      />
      <!-- montocarlo font -->
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
         href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&display=swap"
         rel="stylesheet"
      />
   </head>
   <body>
      <!-- Add Blog Form -->
      <div class="blog-form">
         <form action="" method="POST" enctype="multipart/form-data">
            <h2>Add Your Blog</h2>
            <div class="int-grp">
               <label for="blog-title">Title</label>
               <input type="text" name="blog-title">
            </div>
            
            <div class="int-grp">
               <label for="blog-img">Cover Image</label>
               <input type="file" name="blog-img">
            </div>
            <div class="int-grp">
               <label for="blog-content">Content</label>
               <textArea name="blog-content"></textArea>
            </div>
            <input type="submit" value="Add Blog" name="blog-add-btn" class="add-btn">
         </form>
      </div>
      <!-- End Add Blog Form -->

      <!-- JaVAsCRIPT -->
      <script src="./src/alert.js"></script>
   </body>
</html>