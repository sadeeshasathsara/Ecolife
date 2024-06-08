<?php include './includes/header.php' ;?>
<html>
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
      <link rel="stylesheet" href="./src/wildinfo.css" />
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
    <body id="main">
        
        <!-- navbar -->
        
    <!-- Hero section -->
    <div class="wild-hero">
        <div class="hero-topic">
            Wild information
        </div>
    </div>

    <!-- Wild information container -->
    <div class="container">
           <div class="card">
                <img src="./images/elephant.jpg" class="card-img-top">
                <div class="card-content">
                    <h2 class="card-title">ELEPHANT</h2>
                    <p class="card-text">The Sri Lankan elephant (Elephas maximus maximus) is a revered and iconic symbol of Sri Lanka's wildlife and cultural heritage.</p>
                </div>
            </div>

            <div class="card">
                <img src="images/lepord.jpg" class="card-img-top">
                <div class="card-content">
                    <h2 class="card-title">LEOPARD</h2>
                    <p class="card-text">
                        The Sri Lankan leopard (Panthera pardus kotiya) is a majestic big cat endemic to the island of Sri Lanka. It's a subspecies of the leopard found in Sri Lanka's diverse habitats, and grasslands</p>
                </div>                                 
            </div>

            <div class="card">
                <img src="images/deer.jpg" class="card-img-top">
                <div class="card-content">
                    <h2 class="card-title">DEER</h2>
                    <p class="card-text">The Sri Lankan deer, also known as the Sri Lankan axis deer or Ceylon spotted deer (Axis axis ceylonensis), is a beautiful and iconic species native to Sri Lanka.</p>
                </div>                                 
            </div>
    </div>

    


    <div class="container">
        <div class="card">
             <img src="images/sinharaja.jpg" class="card-img-top">
             <div class="card-content">
                 <h2 class="card-title">SINHARAJA FOREST</h2>
                 <p class="card-text">Sinharaja Forest Reserve is a verdant gem nestled in the heart of Sri Lanka, renowned as one of the island's last remaining primary tropical rainforests.</p>
             </div>
         </div>

         <div class="card">
             <img src="images/yalasafari.jpg" class="card-img-top">
             <div class="card-content">
                 <h2 class="card-title">YALA SAFARI</h2>
                 <p class="card-text">Yala National Park Safari offers an exhilarating adventure into one of Sri Lanka's most renowned wildlife sanctuaries. </p>
             </div>                                 
         </div>

         <div class="card">
             <img src="images/beach.jpg" class="card-img-top">
             <div class="card-content">
                 <h2 class="card-title">BEACH</h2>
                 <p class="card-text">Sri Lanka boasts some of the most breathtaking beaches in the world, each offering its own unique charm and appeal.</p>
             </div>                                 
         </div>
 </div>
<!--photo slides-->
<section class="slide">
    <div class="slide-container">
    </div>
</section>

<!-- footer -->
<?php include './includes/footer.php' ?>

<!-- JavaScript -->
<script src="./src/wildinfo.js"></script>
</body>
</html>