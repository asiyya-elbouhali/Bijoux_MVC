<?php

require_once 'controllers/UsersController.php';

?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="bijou jewelry jewellery ring earing necklace gold diamand " />
  <meta name="description" content=" We offer wide range of divine piece of gold jewelry with a design that is desired by everyone. Visit Asiyya jewellery store! #DesignerJewellery #jewellerydesigngold #Goldjewellery" />
  <meta name="author" content="Asiyya" />
  <link rel="shortcut icon" href="img/AJ.png" type="image/x-icon">

  <title>Gallery</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>

  <div class="hero_area" style="height: 80px ; ">
    <!-- header section strats -->
    <header class="header_section" >
      <div class="container-fluid" >
        <nav class="navbar navbar-expand-lg custom_nav-container " >
          <a class="navbar-brand" href="index.html">
            <img src="img/AJ.png" alt="">
            <!-- <span>
              Logo
            </span> -->
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo BASE_URL; ?>indexj">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo BASE_URL; ?>gallery"> Gallery</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo BASE_URL; ?>contact"> Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo BASE_URL; ?>about"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo BASE_URL; ?>login"> login</a>
                </li>
              </ul>

            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  

  <!-- price section -->

  <section class="price_section layout_padding">
    <div class="container">
      <div class="heading_container forher">
        <h2>
For Her        </h2>
      </div>
      <div class="price_container">
      <?php foreach ($products as $produit): ?>
        <div class="box">
          <div class="img-box">
            <img src="uploads/<?=$produit['img']?>" alt="">
            <!-- <img src="img/1.jpg" alt=""> -->
          </div>
          <div class="name">
            <h6>
            <?php echo $produit['libelle']; ?>
                        </h6>
          </div>
          <div class="detail-box">
            <h5>
              <span><?php echo $produit['prix']; ?>.00 $</span>
            </h5>
            <a href="">

              Buy Now
            </a>
          </div>
        </div>
        <?php endforeach; ?>
        
        
        </div>
      <div class="d-flex justify-content-center">
        <a href="" class="price_btn">
          See More
        </a>
      </div>
    </div>
  </section>

  <!-- end price section -->

  <!-- ring section -->

  <section class="ring_section layout_padding">
    <div class="design-box">
      <img src="images/design-1.png" alt="">
    </div>
    <div class="container">
      <div class="ring_container layout_padding2">
        <div class="row">
          <div class="col-md-5">
            <div class="detail-box">
              <h4>
                special
              </h4>
              <h2>
                Wedding Ring
              </h2>
              <a href="">
                Buy Now
              </a>
            </div>
          </div>
          <div class="col-md-7">
            <div class="img-box">
              <img src="img/design-1.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end ring section -->

  

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="info_container">
        <div class="row">
          <div class="col-md-3">
            <div class="info_logo">
              <a href="">
                <img src="img/AJ.png" alt="">
                <!-- <span>
                  Logo
                </span> -->
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="images/location.png" alt="">
                <span>
                  Address
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="images/phone.png" alt="">
                <span>
                  +01 1234567890
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="images/mail.png" alt="">
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="info_form">
          <div class="d-flex justify-content-center">
            <h5 class="info_heading">
              Newsletter
            </h5>
          </div>
          <form action="">
            <div class="email_box">
              <label for="email2">Enter Your Email</label>
              <input type="text" id="email2">
            </div>
            <div>
              <button>
                subscribe
              </button>
            </div>
          </form>
        </div>
        <div class="info_social">
          <div class="d-flex justify-content-center">
            <h5 class="info_heading">
              Follow Us
            </h5>
          </div>
          <div class="social_box">
            <a href="">
              <img src="images/fb.png" alt="">
            </a>
            <a href="">
              <img src="images/twitter.png" alt="">
            </a>
            <a href="">
              <img src="images/linkedin.png" alt="">
            </a>
            <a href="">
              <img src="images/insta.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved 
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>