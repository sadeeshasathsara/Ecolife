<?php
   session_start();
   include '../includes/config.php';

   if(isset($_POST['cancel'])){
      header("location: ../blog.php");
   }

   if(isset($_GET['blogId'])){
      $blogId = $_GET['blogId'];

      $sql = "SELECT * FROM `blogs` WHERE `blogId` = '$blogId' ";
      $result = mysqli_query($connection, $sql);

      if($result){
         $row = mysqli_fetch_assoc($result);
      }
      else{
         echo "Find Error in update";
      }
   }

   if(isset($_POST['blog-update-btn'])){
      $title = $_POST['blog-title'];
      $content = $_POST['blog-content'];

      $sql1 = "UPDATE `blogs` SET
         `blogTitle` = '$title',
         `blogContent` = '$content'
         WHERE `blogId` = '$blogId';
      ";

      $result1 = mysqli_query($connection,$sql1);

      if(!$result1){
         echo "No added";
         echo "
         <script>
         window.location.href = '../blog.php';
         </script>
         ";
         header('location: ../blog.php');
      }
      else{
         header('location: ../blog.php');
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
         <form action="" method="POST">
            <h4>Update Your Blog</h4>
            <div class="int-grp">
               <label for="blog-title">Title</label>
               <input type="text" name="blog-title" value="<?php echo $row['blogTitle'] ;?>">
            </div>
            
            <div class="int-grp">
               <label for="blog-content">Content</label>
               <textArea name="blog-content"><?php echo $row['blogContent'] ;?></textArea>
            </div>
            <input type="submit" value="Update Blog" name="blog-update-btn" class="add-btn">
            <input type="reset" value="Cancel" name="cancel" class="add-btn">
         </form>
      </div>
      <!-- End Add Blog Form -->
   </body>
</html>