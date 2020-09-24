<!DOCTYPE html>
<html>
<head>
    <title>Mingma Sherpa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='images/favicon.ico' type='image/x-icon' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mingma Sherpa">
    <meta name="keywords" content="Mingma Sherpa">
    <meta name="author" content="Mingma Sherpa">
   
    <!-- Bootstrap -->
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
    <!-- loader -->
   <!--  <div id="loader-wrapper">

        <div id="loader"></div>

        <div class="loader-section section-left"></div>

        <div class="loader-section section-right"></div>
    </div> -->
    <!-- /loader -->
    <!-- header section starts here -->
    <header>
        <section class="btm-header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light fixed-top">
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
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
            <a class="nav-link  " href="about.php">About Me</a>
        </li>
        <li class="nav-item <?php
            if ($curr_page == 'recent.php') {
                echo "active";
            }
            ?>">
            <a class="nav-link  " href="recent.php">Recent Activity</a>
        </li>
        <li class="nav-item <?php
            if ($curr_page == 'what-we-do.php') {
                echo "active";
            }
            ?>">
            <a class="nav-link  " href="what-we-do.php">What I Do</a>
        </li>
            <li class="nav-item <?php
            if ($curr_page == 'reviews.php') {
                echo "active";
            }
            ?>">
            <a class="nav-link  " href="reviews.php">Reviews</a>
        </li>
        <li class="nav-item <?php
        if ($curr_page == 'gallery.php') {
            echo "active";
        }
        ?>">
        <a class="nav-link  " href="gallery.php">Gallery</a>
    </li>
    <li class="nav-item <?php
        if ($curr_page == 'contact.php') {
            echo "active";
        }
        ?>">
        <a class="nav-link  " href="contact.php">Contact</a>
    </li>
</ul>
</div>
</nav>
</div>
</section>
</header>
<!-- header section ends here -->