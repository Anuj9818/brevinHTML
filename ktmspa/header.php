<!DOCTYPE html>
<html>
<head>
    <title>KTMSPA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel='shortcut icon' href='images/favicon.ico' type='image/x-icon' /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="KTMSPA">
    <meta name="keywords" content="KTMSPA">
    <meta name="author" content="Brevin Creation ~ Arun Daduwa">

    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.default.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <link href="css/all.css" rel="stylesheet"> 
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/hover.css" rel="stylesheet">
    <link href="css/preloader.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
</head>

<body  class="<?php basename($_SERVER['PHP_SELF'], '.php'); ?>">
      <header class="fixed-top">
        <section class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="th-content left-pull-container">
                                    A royal treat for your mind and body
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="th-content pull-right">
                                    <ul>
                                         <li> <a href="tel:01-4422661"><i class="fa fa-phone"></i> 01-4422661</a></li>
                                        <li> <a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
        <section class="btm-header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php"><img class="logo" src="images/logo.png"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <?php $url_pages = $_SERVER['REQUEST_URI'];

                            $ex_pages = explode("/", $url_pages);

                            $curr_page = $ex_pages[count($ex_pages) - 1];  ?>

                            <li class="nav-item 
                            <?php if (($curr_page == 'index.php') || $curr_page == "") 
                            {
                                echo "active"; 
                            }
                            ?>">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item <?php
                        if ($curr_page == 'about.php') {

                            echo "active";

                        }

                        ?>">

                        <a class="nav-link  " href="about.php">About Us</a>

                    </li>
                    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="services.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="massage.php">Massage Therapy</a>
          <a class="dropdown-item" href="beauty">Beauty Therapy</a>
          <a class="dropdown-item" href="yoda">Yoga & Meditation</a>
          <a class="dropdown-item" href="hydro">Hydro Therapy</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="offers.php">Offers</a>
        </div>
      </li>
                <li class="nav-item <?php
                if ($curr_page == 'gallery.php') {

                    echo "active";

                }

                ?>">

                <a class="nav-link  " href="gallery.php">Gallery</a>

            </li>
             <li class="nav-item <?php
                if ($curr_page == 'packages.php') {

                    echo "active";

                }

                ?>">

                <a class="nav-link  " href="packages.php">Packages</a>

            </li>
             <li class="nav-item <?php
                if ($curr_page == 'contact.php') {

                    echo "active";

                }

                ?>">

                <a class="nav-link  " href="contact.php">Contact Us</a>

            </li>
        </ul>
    </div>
</nav>
</div>
</section>
</header>
<!-- header section ends here -->