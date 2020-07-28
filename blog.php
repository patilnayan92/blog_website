<?php   
    include("header.php");
?>

<!-- breadcrumb begin -->
<div class="breadcrumb-todas">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="breadcrumb-content">
                    <h2 class="title">Blog</h2>
                    <ul>
                        <li>
                            <a href="index.php">
                                Home
                            </a>
                        </li>
                        <li id="current-page">Blog</li>
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
                $showRecordPerPage = 6;
                if(isset($_GET['page']) && !empty($_GET['page'])){
                    $currentPage = $_GET['page'];
                }else{
                    $currentPage = 1;
                }
                $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
                $totalEmpSQL = "SELECT * FROM posts";
                $allEmpResult = mysqli_query($connection, $totalEmpSQL);
                $totalEmployee = mysqli_num_rows($allEmpResult);
                $lastPage = ceil($totalEmployee/$showRecordPerPage);
                $firstPage = 1;
                $nextPage = $currentPage + 1;
                $previousPage = $currentPage - 1;

                $sqlproject="SELECT * FROM posts WHERE post_status='Publish' order by post_date DESC LIMIT $startFrom, $showRecordPerPage";
                $prorow = mysqli_query($connection,$sqlproject);
                while($prores=mysqli_fetch_array($prorow)){
                    $sqlprocattitle ="SELECT * FROM categories WHERE cat_id='".$prores['post_category_id']."'";
                    $projectcattitle =mysqli_query($connection,$sqlprocattitle);
                    $projectcattitleres =mysqli_fetch_array($projectcattitle);
                    
                    //Calculating the Reading time 
                    $mycontent = $prores['post_content']; 
                    $word = str_word_count(strip_tags($mycontent));
                    $m = floor($word / 200);
                    $s = floor($word % 200 / (200 / 60));
                    $est = $m . ' Min' . ($m == 1 ? '' : 's');
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
                        <img src="assets/img/blogimg/<?php echo $prores['post_image'] ?>" alt="">
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
                        <!-- <a href="blogdetails.php?id=<?php echo $prores['post_name'] ?>">
                            <span class="title"><?php echo $prores['post_title'] ?> </span>
                        </a> -->
                        <a href="blog/<?php echo $prores['post_name'] ?>">
                            <span class="title"><?php echo $prores['post_title'] ?> </span>
                        </a>
                        <?php echo $prores['post_content_exp']; ?>
                        <div class="read-more-btn">
                            <a href="blog/<?php echo $prores['post_name'] ?>">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
            
            <div class="col-xl-12 col-lg-12">
                <div class="pagination-todas">
                    <ul>
                        <?php if($currentPage != $firstPage) { ?>
                        <li>
                            <a href="?page=<?php echo $firstPage ?>">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($currentPage >= 2) { ?>
                        <li>
                            <a href="?page=<?php echo $previousPage ?>">
                                </i> <?php echo $previousPage ?>
                            </a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a>
                        </li>
                        <?php if($currentPage != $lastPage) { ?>
                        <li>
                            <a href="?page=<?php echo $nextPage ?>">
                                 <?php echo $nextPage ?>
                            </a>
                        </li>
                        <li>
                            <a href="?page=<?php echo $lastPage ?>">
                                <i class="fas fa-chevron-right"></i> 
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog page end -->

<?php 
    include("footer.php")
?>