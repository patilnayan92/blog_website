<?php   
    include("header.php");
    $catname = "SELECT * FROM categories WHERE cat_name = '".$_GET['id']."'";
    $selectedCat = mysqli_query($connection, $catname);
    $name = mysqli_fetch_assoc($selectedCat);
?>

<!-- breadcrumb begin -->
<div class="breadcrumb-todas">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="breadcrumb-content">
                    <h2 class="title">Blog Category</h2>
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
                        <li id="current-page"><?php echo $name['cat_title'] ?></li>
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
                $sqlproject="SELECT * FROM posts WHERE post_category_id='".$name['cat_id']."' AND post_status='Publish' order by post_date DESC ";
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