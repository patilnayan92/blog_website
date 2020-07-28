<?php   
    include("header.php");

    $sql="SELECT * FROM posts WHERE post_name='".$_GET['id']."' AND post_status='Publish'";
    $get_posts = mysqli_query($connection,$sql);
    if($get_posts){
        $res=mysqli_fetch_array($get_posts);
    }else{
        header("Location: http://localhost/naracinew/blog", true, 301);
    }

    $sql="UPDATE posts SET post_views = post_views + 1 where post_name='".$_GET['id']."'";
    $get_page_view = mysqli_query($connection,$sql);

    $mycontent = $res['post_content']; 
    $word = str_word_count(strip_tags($mycontent));
    $m = floor($word / 200);
    $s = floor($word % 200 / (200 / 60));
    $est = $m . ' Min' . ($m == 1 ? '' : 's');

?>

<!-- breadcrumb begin -->
<div class="breadcrumb-todas">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="breadcrumb-content">
                    <h2 class="title"><?php echo $res['post_title'] ?></h2>
                    <ul>
                        <li>
                            <a href="<?php echo $sitefullpath?>">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $sitefullpath?>blog">
                                Blog
                            </a>
                        </li>
                        <li id="current-page"><?php echo $res['post_title'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<!-- blog page begin -->
<div class="blog-page blog-details"> 
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9">
                <div class="single-blog">
                    <div class="part-img">
                        <div class="date-box">
                            <?php
                                $time  = strtotime($res['post_date']);
                                $day   = date('d',$time);
                                $month = date('M',$time);
                                $year  = date('Y',$time);
                            ?>
                            <span class="date"><?php echo $day ?></span>
                            <span class="month"><?php echo $month ?></span>
                        </div>
                        <img src="<?php echo $sitefullpath?>assets/img/blogimg/<?php echo $res['post_image'] ?>" alt="">
                    </div>
                    <div class="part-text">
                        <ul class="statics-number">
                            <li>
                                <a href="#">
                                    <i class="far fa-eye"></i> <?php echo $res['post_views'] ?> Views
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="far fa-clock"></i> <?php echo $est; ?>
                                </a>
                            </li>
                        </ul>
                        <span class="title"><?php echo $res['post_title'] ?></span>
                        <?php echo $res['post_content']; ?>

                        <div class="social-buttons">
                            <span class="text">
                                SHARE:
                            </span>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- <div class="comment-box">
                    <h3 class="title">Comments (3)</h3>
                    <div>
                        <div class="single-comment">
                            <div class="part-rating">
                                <button class="rating-text">Reply <i class="fas fa-reply"></i></button>
                            </div>
                            <div class="part-img">
                                <img src="assets/img/comment-user-1.jpg" alt="">
                            </div>
                            <div class="part-text">
                                <span class="name">Jordan Foster</span>
                                <span class="location">United Kingdom,15th December, 2018</span>
                                <p>"Easy to fly, looks great coming out of the box, packaged wonderfully. Completely makes this a no-brainer if you are looking for a quality drone!"</p>
                            </div>
                        </div>
                        <div class="single-comment reply">
                            <div class="part-rating">
                                <button class="rating-text">Reply <i class="fas fa-reply"></i></button>
                            </div>
                            <div class="part-img">
                                <img src="assets/img/comment-user-2.jpg" alt="">
                            </div>
                            <div class="part-text">
                                <span class="name">Katrina Mcgee</span>
                                <span class="location">United Kingdom,15th December, 2018</span>
                                <p>"I absolutely love it. I've been talking about one these sense they first came out and now I finally have my own, I'm overjoyed with it."</p>
                            </div>
                        </div>
                    </div>
                </div> -->
                
                <!-- <div class="comment-form">
                    <h2 class="title">Add a Review</h2>
                    <form>
                        <input type="text" placeholder="Name">
                        <input type="email" placeholder="Email Address*">
                        <input type="text" placeholder="Subject*">
                        <textarea placeholder="Your Message"></textarea>
                        <button>Post Comment</button>
                    </form>
                </div> -->
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="sidebar">
                    <div class="newsletter-box">
                        <span class="sub-title">Subscriber</span>
                        <h3>For NewsLetter</h3>
                        <form>
                            <input type="email" placeholder="Enter your email address">
                            <button>subscribe</button>
                        </form>
                    </div>
                    <div class="category">
                        <h3>Category</h3>
                        <?php echo getCatList(); ?>
                    </div>
                    <div class="category">
                        <h3>Archives</h3>
                        <?php echo getArchiveCount(); ?>
                    </div>
                    <!-- <div class="tag">
                        <h3>Tags</h3>
                        <ul>
                            <li>
                                <a href="#" class="tag-word">Battery</a>
                            </li>
                            <li>
                                <a href="#" class="tag-word">Cameras</a>
                            </li>
                            <li>
                                <a href="#" class="tag-word">Controller</a>
                            </li>
                            <li>
                                <a href="#" class="tag-word">VR</a>
                            </li>
                            <li>
                                <a href="#" class="tag-word">Drone</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog page end -->

<?php 
    include("footer.php")
?>