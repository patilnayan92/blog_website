<?php   
    include("header.php");
?>

        <!-- breadcrumb begin -->
        <div class="breadcrumb-todas">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="breadcrumb-content">
                            <h2 class="title">Error</h2>
                            <ul>
                                <li>
                                    <a href="index.php">
                                        Home
                                    </a>
                                </li>
                                <li id="current-page">Error</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->

        <!-- error begin -->
        <div class="error">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="error-content">
                            <img src="assets/img/error.png" alt="image">
                            <div class="part-txt">
                                <h3>Oops... It looks  like you 're lost !</h3>
                                <p>The page you were looking for dosen't exist.</p>
                                <a href="#">GO BACK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- error end -->

<?php 
    include("footer.php")
?>