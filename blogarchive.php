<?php   
    include("header.php");

    $urlnew1 = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $urlnew = end($urlnew1);
    $getdate = strtotime($urlnew);
    $m = date('m', $getdate);
    $y = date('Y', $getdate);
    $month = date('M', $getdate);
    // $archivepost = "SELECT * FROM posts WHERE MONTH(post_date) = $m AND YEAR(post_date) = $y ORDER By post_date DESC";
    // $archiveresult = mysqli_query($connection, $archivepost);
    // $result = mysqli_fetch_assoc($archiveresult);
?>

<!-- breadcrumb begin -->
<div class="breadcrumb-todas">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="breadcrumb-content">
                    <h2 class="title">Blog Archive</h2>
                    <ul>
                        <li>
                            <a href="index.php">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $sitefullpath?>blog">
                                Blog
                            </a>
                        </li>
                        <li id="current-page"><?php echo $month; ?> - <?php echo $y; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<!-- blog page begin -->
<div class="blog-page">
    <div class="container">
        <div class="row">
            <?php
                $sqlproject = "SELECT * FROM posts WHERE MONTH(post_date) = $m AND YEAR(post_date) = $y ORDER By post_date DESC";
                // echo $sqlproject;
                $prorow = mysqli_query($connection,$sqlproject);
                $catcount = mysqli_num_rows($prorow);
                if ($catcount) {
                    while ($prores=mysqli_fetch_array($prorow)){
                        $sqlprocattitle = "SELECT * FROM categories WHERE cat_id='".$prores['post_category_id']."'";
                        $projectcattitle = mysqli_query($connection,$sqlprocattitle);
                        $projectcattitleres = mysqli_fetch_array($projectcattitle);
            ?>
            <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="single-blog">
                    <div class="part-img">
                        <div class="date-box">
                            <?php
                                $time  = strtotime($prores['post_date']);
                                $day   = date('d',$time);
                                $month = date('M',$time);
                                $year  = date('Y',$time);
                            ?>
                            <span class="date"><?php echo $day ?></span>
                            <span class="month"><?php echo $month ?></span>
                        </div>
                        <img src="<?php echo $sitefullpath?>assets/img/blogimg/<?php echo $prores['post_image'] ?>" alt="">
                    </div>
                    <div class="part-text">
                        <ul class="statics-number">
                            <li>
                                <a href="#">
                                    <i class="far fa-comment"></i> <?php echo $projectcattitleres['cat_title']; ?>
                                </a>
                            </li>
                            <li>
                                <a href="#"><i class="far fa-eye"></i> <?php echo $prores['post_views'] ?> View</a>
                            </li>
                        </ul>
                        <a href="<?php echo $sitefullpath?>blog/<?php echo $prores['post_name'] ?>">
                            <span class="title"><?php echo $prores['post_title'] ?> </span>
                        </a>
                        <?php echo $prores['post_content_exp']; ?>
                        <div class="read-more-btn">
                            <a href="<?php echo $prores['post_title'] ?>">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php  
            }  
        }
            else {
                ?>
            <div class="col-xl-12 col-lg-12 col-sm-12">
                <h3>Category dont having any blog</h3>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- blog page end -->

<?php 

    include("footer.php")
?>