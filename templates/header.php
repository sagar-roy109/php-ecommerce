


<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link href="apple-touch-icon.png" rel="apple-touch-icon">
  <link href="favicon.png" rel="icon">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Flourish Store - HTML Template</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CLibre+Baskerville:400,700" rel="stylesheet">
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="plugins/furniture-icon/style.css">
  <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.carousel.css">
  <link rel="stylesheet" href="plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
  <link rel="stylesheet" href="plugins/slick/slick/slick.css">
  <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="plugins/lightGallery-master/dist/css/lightgallery.min.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/style.css">
  <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
  <!--WARNING: Respond.js doesn't work if you view the page via file://-->
  <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

<body>
  <div class="header--sidebar"></div>
  <!--  Header-->
   <header class="header" data-sticky="true">
    <div class="header__top">
      <div class="ps-container">
        <div class="row">
        
          <div class="col-12">
            <?php 
           
              if(isset($_SESSION['auth_user'])){
              ?>
              <div class="header__actions"><a href="logout.php"> Log Out</a></div>
               <div class="header__actions"><a href="logout.php"> <?php echo "Hello, ". $_SESSION['auth_user']['name'] ?></a></div>
               
             <?php }
             else{
              ?>

              <div class="header__actions"><a href="register.php"> Register</a>
              <?php
             }
            ?>
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="navigation">
      <div class="ps-container"><a class="ps-logo" href="index.php"><img src="images/logo.png" alt="logo"></a>
        <ul class="main-menu menu">
          <li class="current-menu-item menu-item-has-children"><a href="index.php">Home</a></li>
          <li class="menu-item-has-children has-mega-menu"><a href="products.php">Products</a>
          </li>
          <li><a href="checkout.php">checkout</a></li>
          
        </ul>
        <div class="menu-toggle"><span></span></div>
        <div class="ps-cart"><a class="ps-cart__toggle" href="cart.php"><span><i id="cart_items"><?= isset($_SESSION['auth_user']['cart'])? $_SESSION['auth_user']['cart']:'0' ?></i></span><img src="images/market.svg" alt=""></a>
        </div>
        <form class="ps-form--search" action="http://warethemes.com/html/flourish/do_action" method="post"><i class="furniture-search"></i>
          <input class="form-control" type="text" placeholder="Find product">
          <button>Search</button>
        </form>
      </div>
    </nav>
  </header>
  <!--
  <div class="ps-slider--banner owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="9000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
    <div class="ps-product--banner">
      <div class="ps-product__thumbnail"><a href="#"><img src="images/banner/banner-1.png" alt=""></a></div>
      <div class="ps-product__content">
        <h3>STOCKHOLM 2017</h3>
        <select class="ps-rating">
          <option value="1">1</option>
          <option value="1">2</option>
          <option value="1">3</option>
          <option value="1">4</option>
          <option value="2">5</option>
        </select>
        <p>Dressed in soft velvet, extra deep and wonderfully spacious. Also, lots of loose cushions that give comfort and support, for however you prefer to sit or lie down. A sofa to long for and enjoy for years.</p>
        <h4><del> $300 </del> $155</h4>
        <div class="ps-product__actions"><a class="ps-btn" href="cart.html">Add to cart</a><a href="product-detail.html">More info</a></div>
      </div>
    </div>
    <div class="ps-product--banner">
      <div class="ps-product__thumbnail"><a href="#"><img src="images/banner/banner-2.png" alt=""></a></div>
      <div class="ps-product__content">
        <h3>STOCKHOLM 2017</h3>
        <select class="ps-rating">
          <option value="1">1</option>
          <option value="1">2</option>
          <option value="1">3</option>
          <option value="1">4</option>
          <option value="2">5</option>
        </select>
        <p>Dressed in soft velvet, extra deep and wonderfully spacious. Also, lots of loose cushions that give comfort and support, for however you prefer to sit or lie down. A sofa to long for and enjoy for years.</p>
        <h4><del> $300 </del> $155</h4>
        <div class="ps-product__actions"><a class="ps-btn" href="cart.html">Add to cart</a><a href="product-detail.html">More info</a></div>
      </div>
    </div>
  </div> -->