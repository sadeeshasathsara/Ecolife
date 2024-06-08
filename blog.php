<?php include './includes/config.php' ; ?>

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
      <link rel="stylesheet" href="./src/blog.css" />
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
   <body id='body'>
      <!-- header -->
      <?php include './includes/header.php' ;?>

      <!-- hero -->
      <section class="blog-hero">
         <h1>Read Our Blog</h1>
      </section>

      <!-- Display others Blogs -->
      <section class="blogs">
         <h4>Read Our Blogs</h4>
         <div class="blogs-container">
         <!-- Display Blog cards -->
         <?php 
            $sql = "SELECT * FROM `blogs`;
            ";
            $result = mysqli_query($connection, $sql);
            
            if($result){
               while($row = mysqli_fetch_assoc($result)){
                  echo '
                  <div class="post">
                  <img src="./images/uploads/'.$row["blogImg"].'" alt="">
                  <h3>'.$row['blogTitle'].'</h3>
                  <p>'.$row['blogContent'].'</p>
                  </div>
                  ';
               }
            }
         ?>
         <!-- End of Display Blog cards -->
         </div>
      </section>
      <!-- End of Display others Blogs -->

      <!-- Display My Blogs -->
      <section class="blogs">
         <h4>Your Blogs</h4>
         <div class="blogs-container">
         <!-- Display Blog cards -->
         <?php
         if(isset($_SESSION['email'])){
            $session_email = $_SESSION['email'];
            $sql = "SELECT * FROM `blogs` WHERE `email` = '$session_email'";
            $result = mysqli_query($connection, $sql);
            
            if($result){
               while($row = mysqli_fetch_assoc($result)){
                  echo '
                  <div class="post">
                  <img src="./images/uploads/'.$row["blogImg"].'" alt="">
                  <h3>'.$row['blogTitle'].'</h3>
                  <p>'.$row['blogContent'].'</p>
                  <div class="edit-btn">
                  <a href="./blogs/updateBlog.php?blogId='.$row['blogId'].'" ><button>Edit</button></a>
                  <a href="./blogs/deleteBlog.php?blogId='.$row['blogId'].'" ><button>Delete</button></a>
                  </div>
                  </div>
                  ';
               }
            }
         }
         else{
            echo "<div class='blog-error'>Join with us for add blogs</div>";
         }
            ?>
         <!-- End of Display Blog cards -->
         </div>
      </section>
      <!-- End of Display My Blogs -->

      <!-- Add blog area -->
      <section class="add-blog-area">
         <h4>Write Blog Post</h4>
         <button onclick='openPopup()' id="add-blog-btn">Add Blog</button>
      </section>

      <div id='popup-container'>
         <div id='popup'>
               <?php

            if(isset($_POST['blog-add-btn'])){
               if(isset($_SESSION['email'])){
                  $title =  mysqli_real_escape_string($connection, $_POST['blog-title']);
                  $content = mysqli_real_escape_string($connection, $_POST['blog-content']);
                  $email = $_SESSION['email'];
                  
                  $img_name = $_FILES['blog-img']['name'];
                  $tempname = $_FILES['blog-img']['tmp_name'];
                  $folder = './images/uploads/'.$img_name;
                  
                  
                  $sql = "INSERT INTO `blogs`(`blogTitle`, `blogContent` ,`blogImg`, `email`) VALUES('$title', '$content','$img_name', '$email')";
                  
                  $result = mysqli_query($connection,$sql);
                  
                  if(move_uploaded_file($tempname, $folder)){
                     
                  }
                  else{
                  }
                  
                  if(!$result){
                     echo "No added";
                  }
                  else{
                     
                  }

                  if($result){
                     echo "
                     <script>
                        window.location.href = 'blog.php';
                     </script>
                     ";
                  }
               }
               else{
                  echo "<script>alert('Please Log In')</script>";
                  }
            }



         ?>


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
                     <input type="reset" value="Cancel" name="cancel" class="add-btn" onclick='closePopup()'>
                  </form>
               </div>
               <!-- End Add Blog Form -->

               <!-- JaVAsCRIPT -->
               <script src="./src/alert.js"></script>
         </div>
               </div>
               <script src="./src/blog.js"></script> 
  </body>
</html>
