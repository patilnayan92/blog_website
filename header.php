<?php
    include("includes/database.php");
    include("includes/function.php");
    if (($_SERVER['REQUEST_URI'] === '/index.php') || ($_SERVER['REQUEST_URI'] === '/index.php/')) {
      #header('Location: https://www.decorpot.com');
      header('Location: http://localhost/naracinew/');
    }
    #$sitefullpath="https://www.decorpot.com/";
    $sitefullpath="http://localhost/naracinew/";
    $urlnew1 =explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $urlnew=end($urlnew1);
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    //echo $_SERVER['HTTP_HOST'];
    #if($_SERVER['HTTP_HOST']=='www.decorpot.com' && $urlnew==''){
    if ($_SERVER['HTTP_HOST']=='http://localhost/' && $urlnew=='') {
        $sqlmeta="SELECT * FROM metainfo WHERE url='home'";
        $rowmeta = mysqli_query($connection,$sqlmeta);
        if (mysqli_num_rows($rowmeta)>0) {
            $resmeta=mysqli_fetch_array($rowmeta);
            $metatitle=$resmeta['metatitle'];
            $metadetails=$resmeta['metadescription'];
        } else {
            $metatitle='';
            $metadetails='';
        }
    } else {
        $sqlmeta="SELECT * FROM metainfo WHERE url='".$urlnew."'";
        $rowmeta = mysqli_query($connection,$sqlmeta);
        if (mysqli_num_rows($rowmeta)>0) {
            $resmeta=mysqli_fetch_array($rowmeta);
            $metatitle=$resmeta['metatitle'];
            $metadetails=$resmeta['metadescription'];
        } else {
            $metatitle='';
            $metadetails='';
        }
    }
    $last=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $actual_link = "https://$_SERVER[HTTP_HOST]$last";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $metatitle ?></title>
    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?php echo $sitefullpath?>assets/css/bootstrap.min.css">
    <!-- fontawesome icon  -->
    <link rel="stylesheet" href="<?php echo $sitefullpath?>assets/css/fontawesome.min.css">
    <!-- flaticon css -->
    <!-- <link rel="stylesheet" href="<?php echo $sitefullpath?>assets/fonts/flaticon.css"> -->
    <!-- animate.css -->
    <!-- <link rel="stylesheet" href="<?php echo $sitefullpath?>assets/css/animate.css"> -->
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo $sitefullpath?>assets/css/owl.carousel.min.css">
    <!-- magnific popup -->
    <!-- <link rel="stylesheet" href="<?php echo $sitefullpath?>assets/css/magnific-popup.css"> -->
    <!-- vector map css -->
    <!-- <link rel="stylesheet" href="assets/css/jquery-jvectormap-2.0.3.css"> -->
    <!-- stylesheet -->
    <link rel="stylesheet" href="<?php echo $sitefullpath?>assets/css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="<?php echo $sitefullpath?>assets/css/responsive.css">
    
</head>

<body>

    <!-- back to top button begin -->
    <div class="back-to-top-button">
        <button>
            <i class="fas fa-level-up-alt"></i>
        </button>
    </div>
    <!-- back to top button end -->

        
    <!-- Modal -->
    <!-- <div class="modal modal-registration fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <ul class="nav nav-tabs" id="myTab-modal" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="signIn-Tab" data-toggle="tab" href="#signIn" role="tab" aria-controls="signIn" aria-selected="true">SignIn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="signUp-Tab" data-toggle="tab" href="#signUp" role="tab" aria-controls="signUp" aria-selected="false">SignUp</a>
                </li>
            </ul>
            <div class="tab-content" id="myTab-modalContent">
            <div class="tab-pane fade show active" id="signIn" role="tabpanel" aria-labelledby="signIn-Tab">
                <img src="assets/img/naraci-updated.png" alt="">
                <h3 class="title">Create Your Account</h3>
                <form>
                    <input type="text" placeholder="User name">
                    <input type="password" placeholder="Password">
                    <a href="#" class="create-account-btn">Create My Account</a>
                </form>
            </div>
            <div class="tab-pane fade" id="signUp" role="tabpanel" aria-labelledby="signUp-Tab">
                <img src="assets/img/naraci-updated.png" alt="">
                <h3 class="title">Create Your Account</h3>
                <form>
                    <input type="text" placeholder="User name">
                    <input type="email" placeholder="Enter your mail address">
                    <input type="password" placeholder="Password">
                    <input type="checkbox" id="test2" />
                    <label for="test2">By clicking "Sign up" you agree to our Terms of Service and Privacy Policy</label>
                    <a href="#" class="create-account-btn">Create My Account</a>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div> -->

    <!-- header begin -->
    <div class="header">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 d-xl-flex d-lg-flex d-block align-items-center">
                        <div class="part-left">
                            <ul>
                                <li>
                                    <a href="support.html">
                                        <span class="part-icon">
                                            <i class="fas fa-headset"></i>
                                        </span>
                                        <span class="text">
                                            Support
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:info@naraci.com">
                                        <span class="part-icon">
                                            <i class="far fa-envelope"></i>
                                        </span>
                                        <span class="text">
                                            info@naraci.com 
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="part-right">
                            <ul>
                                <li>
                                    <span class="part-icon user">
                                        <i class="far fa-user"></i>
                                    </span>
                                    <a href="#" class="c-acc" data-toggle="modal" data-target="#exampleModal">Sign in | Join</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="header-bottom">
                <div class="row">
                    <div class="col-xl-3 col-lg-2 d-xl-flex d-lg-flex align-items-center">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-6 d-xl-block d-lg-block d-flex align-items-center">
                                <div class="logo">
                                    <a href="<?php echo $sitefullpath?>index.php">
                                        <img src="<?php echo $sitefullpath?>assets/img/naraci-updated.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 d-xl-none d-lg-none d-block">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-10">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                              
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ml-auto">
                                        <!-- <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Home
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                                <a class="dropdown-item" href="index.html">Home One</a>
                                                <a class="dropdown-item" href="index-2.html">Home Two</a>
                                                <a class="dropdown-item" href="index-3.html">Home Three</a>
                                            </div>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sitefullpath?>index.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sitefullpath?>about.php">About Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sitefullpath?>feature.php">Features</a>
                                        </li>
                                        <!-- <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Drone
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
                                                <a class="dropdown-item" href="product-agriculture.html">Agriculture</a>
                                                <a class="dropdown-item" href="product-camera.html">Camera</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                accessories
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown5">
                                                <a class="dropdown-item" href="product-agriculture.html">Agriculture</a>
                                                <a class="dropdown-item" href="product-camera.html">Camera</a>
                                            </div>
                                        </li> 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Blog
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="blog-1.html">Blog One</a>
                                                <a class="dropdown-item" href="blog-2.html">Blog Two</a>
                                                <a class="dropdown-item" href="blog-details.html">Blog Details</a>
                                            </div>
                                        </li>-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sitefullpath?>blog.php">Blog</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sitefullpath?>demo.php">Demo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sitefullpath?>process.php">Process</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Guides
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                                <a class="dropdown-item" href="<?php echo $sitefullpath?>product-tour">Product Tour</a>
                                                <a class="dropdown-item" href="<?php echo $sitefullpath?>knowledge-base.php">Knowledge Base</a>
                                                <a class="dropdown-item" href="<?php echo $sitefullpath?>requirements.php">Requirements</a>
                                                <a class="dropdown-item" href="<?php echo $sitefullpath?>faq.php">Faq</a>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header end -->