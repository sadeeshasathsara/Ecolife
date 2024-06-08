<?php
   include './includes/config.php';
?>

<html>
    <head>
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
      <link rel="stylesheet" href="./src/contact.css" />
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
    <body id="body">
        <!-- Navbar -->
        <?php include './includes/header.php' ;?>

        <!--hero section-->
        <div class="wild-hero">
            <div class="hero-topic">
                Contact US
            </div>
        </div>
         <div class="container">
            <div class="contact-box">
                <div class="contact-left">
                    <h2 >Send A Massage</h2>

                    <form method="post">
                    <div class="inputrow">
                        <div class="input-group">
                        <input type="text" name="name" placeholder=" Full Nmame">
                        </div>

                        <div class="input-group">
                            <input type="email" name="email" placeholder=" Email Address">
                        </div>

                        <div class="input-group">
                            <input type="tel" name="tpno" placeholder=" TP Number">
                        </div>

                        <div class="input-group">
                            <input type="text" name="country" placeholder=" Country">
                        </div>

                        <textarea rows="8" name="message" placeholder="Briefly explain your expection"></textarea>
                        <br>

                        <input type="submit" value="Sent Message" name="submit"/>

                        <!-- Add data to database -->
                        <?php
                        include './includes/config.php';

                        if (isset($_POST['submit'])) {
                            $name = mysqli_real_escape_string($connection, $_POST                       ['name']);
                            $email = mysqli_real_escape_string($connection, $_POST['email']);
                            $tpno = mysqli_real_escape_string($connection, $_POST['tpno']);
                            $country = mysqli_real_escape_string($connection, $_POST['country']);
                            $msg = mysqli_real_escape_string($connection, $_POST['message']);
                            $_SESSION['name'] = $name;

                            $sql = "INSERT INTO `contact`(`fullName`, `email`, `phoneNumber`, `country`, `message`) VALUES('$name', '$email', '$tpno', '$country', '$msg')";

                            $result = mysqli_query($connection, $sql);

                            if (!$result) {
                                echo "Data not inserted";
                            } else {
                                echo "<script>alert('Message Sent')</script>";
                            }
                        }
?>


                    </div>
                    </form>
                </div>

                <div class="contact-right">
                    <h2>REACH US</h2>
                    <table>
                        <tr>
                            <td><img class="icon" src="images/l.jpg"> </td>
                            <td>28,<sub>st</sub> cross street<br>
                            Pagoda Road,<br>Nugegoda,<br>Sri Lanka.</td>
                        </tr>
                        <tr>
                            <td><img class="icon" src="images/t.jpg"> </td>
                            <td>+94 71 5856892<br>+94 71 5856893</td>
                        </tr>
                        <tr>
                            <td><img src="images/em.png" class="icon"> </td>
                            <td>example@gmail.com</td>
                        </tr>
                        <tr>
                            <td colspan="2"><iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55974
                                .74041481701!2d80.42803035607915!3d6.415745932698884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                                1!3m3!1m2!1s0x3ae3e76bd109d45f%3A0x8c0ef1010649701b!2sSinharaja%20Forest%20Reserve!5e0!3m2!
                                1sen!2slk!4v1714367389992!5m2!1sen!2slk"style="border:0;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td>
                        </tr>
                    </table>
                </div>
            </div>
         </div>

         <!-- Your message display -->
         <div class="display-msg">
            
            
            <!-- Display msg from database -->
            <?php
            if(isset($_SESSION['name'])){
                $session_name = $_SESSION['name'];

                $sql1 = "SELECT * FROM `contact` WHERE `fullName` = '$session_name'";

                $result1 = mysqli_query($connection, $sql1);

                if($row = mysqli_fetch_assoc($result1)){ 
                    $contactId = $row["contactId"];

                    echo '<div class="read-details">
    
                    <div class="display-container">
                    <h3 class="read-h3">'.'Full_Name'.'</h3>
                    <p class="para-read">'.$row["fullName"].'</p>
                    <h3 class="read-h3">'.'Email_Addres'.'</h3>
                    <p class="para-read">'.$row["email"].'</p>
                    <h3 class="read-h3">'.'Phone_Number'.'</h3>
                    <p class="para-read">'.$row["phoneNumber"].'</p>
                    <h3 class="read-h3">'.'Country'.'</h3>
                    <p class="para-read">'.$row["country"].'</p>
                    <h3 class="read-h3">'.'Message'.'</h3>
                    <p class="para-read">'.$row["message"].'</p>
                    <div class="btn-grp">
                    <a href="./contact/updateMsg.php?contactId='.$contactId.'"><button>Edit</button></a>
                    <a href="./contact/deletMsg.php?contactId='.$contactId.'" id="delete-btn"><button>Delete</button></a>
                </div>
                </div>
                </div>';
                }
            }
            ?>

         </div>

         <!-- footer -->
         <?php include './includes/footer.php' ?>

    </body>
</html>