<?php include"includes/admin_header.php"; ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include"includes/admin_navigation.php"; ?>
        <!-- Content of the admin page --->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> FAQs
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-12">
                        <?php
                            if(isset($_GET['source'])){
                                
                                $source = $_GET['source'];
                            }
                            else{
                                $source = "";
                            }
                            switch($source){
                                    
                                case "add_faqs":
                                    include "includes/add_faqs.php";
                                    break;
                                    
                                case "edit_faqs":
                                    include"includes/edit_faqs.php";
                                    break;
                                    
                                case "100":
                                    echo "Nice 100";
                                    break;
                                    
                                default:
                                    include "includes/view_all_faqs.php";
                                    break;
                            }
                        ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include"includes/admin_footer.php"; ?>