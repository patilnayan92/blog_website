<?php
    
    if(isset($_POST['add_post'])){
    	function clean_url($text) 
    	{ 
    		$text=strtolower($text); 
    		$code_entities_match = array( '&quot;' ,'!' ,'@' ,'#' ,'$' ,'%' ,'^' ,'&' ,'*' ,'(' ,')' ,'+' ,'{' ,'}' ,'|' ,':' ,'"' ,'<' ,'>' ,'?' ,'[' ,']' ,'' ,';' ,"'" ,',' ,'.' ,'_' ,'/' ,'*' ,'+' ,'~' ,'`' ,'=' ,' ' ,'---' ,'--','--','’'); 
    		$code_entities_replace = array('' ,'-' ,'-' ,'' ,'' ,'' ,'-' ,'-' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'-' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'-' ,'' ,'-' ,'-' ,'' ,'' ,'' ,'' ,'' ,'-' ,'-' ,'-','-'); 
    		$text = str_replace($code_entities_match, $code_entities_replace, $text); 
    		return $text; 
    	} 
    	
        $post_name  = clean_url($_POST['title']);
    	$chk_url_exists=mysqli_query($connection,"select MAX(post_name) as post_name from posts where post_name like '".$post_name."%'");
    	
        if(mysqli_num_rows($chk_url_exists)>0){			
    		$get_pr=mysqli_fetch_array($chk_url_exists);				
    		$strre=0;
    		if($get_pr['post_name']!=''){
    			$strre=str_replace($post_name,'',$get_pr['post_name']);
    		}
    		if($strre=='0'){					
    			$newcnt=''; 
    		}elseif($strre=='') {					
    			$newcnt='1';   				
    		}else{				
    		  $newcnt=(int)$strre+1;			
    		}
    		$post_name=$post_name.$newcnt;
    	}
        
        $post_title = $_POST['title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_SESSION['username'];
        $post_status = $_POST['post_status'];
        
        $post_image = rand().$_FILES['post_image']['name'];
        $tmp_post_image	= $_FILES['post_image']['tmp_name'];
        
        $post_tags = $_POST['post_tags'];
        $post_content = mysqli_real_escape_string($connection,$_POST['post_content']);
        $post_content_exp = mysqli_real_escape_string($connection,$_POST['post_content_exp']);
        $post_date = date('Y-m-d',strtotime($_POST['post_date']));
    	$metatitle = $_POST['metatitle'];
        $metadescription = $_POST['metadescription'];
        
        $allowed_img_type = array("image/png","image/jpg","image/jpeg","image/gif");
        
        if(in_array($_FILES["post_image"]["type"],$allowed_img_type)){
            move_uploaded_file($tmp_post_image, "../assets/img/blogimg/$post_image");
        }
        
        $query = "INSERT INTO posts SET 
            post_category_id='".$post_category_id."',
            post_title='".$post_title."',
            post_name='".$post_name."',
            post_author='".$post_author."',
            post_status='".$post_status."',
            post_tags='".$post_tags."',
            post_content_exp='".$post_content_exp."',
            post_content='".$post_content."',
            post_date='".$post_date."',
            post_image='".$post_image."'";

        $create_post = mysqli_query($connection,$query);
        
        $post_id = mysqli_insert_id($connection);
    	if($post_id){
            $metaquery="INSERT INTO metainfo SET post_id='".Blog.$post_id."',url='".$post_name."',metatitle='".$metatitle."',metadescription='".$metadescription."'";
            $res=mysqli_query($connection,$metaquery) or die(mysqli_error($connection));
            if($res)
            {
                echo "<h5 class='well col-xs-6'>Post Created!'</h5>";
            }else{
                echo "<h5 class='well col-xs-6'>Post not Created!'</h5>";
            }
        }
    }
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="col-md-9">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Enter title</label>
            <input type="text" class="form-control" name="title">
        </div> 
        <div class="form-group">
            <label for="post_category_id">Post Category Title</label>
            <select class="form-control" name="post_category_id" id="post-category">
            <?php
                $query = "SELECT * FROM categories";
                $get_categories = mysqli_query($connection, $query);
            
                confirm_query($get_categories);
            
                while($row = mysqli_fetch_assoc($get_categories)){
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    echo "<option value='$cat_id'>{$cat_title}</option>";
                }
            ?>
            </select>
        </div>
       
        <div class="form-group">
            <label for="post_status">Post Status</label>
            <select name="post_status" class="form-control" id="post-status">
                <option value="Draft">Draft</option>
                <option value="Publish">Publish</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" name="post_image">
        </div>
        
        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags">
        </div>
        <div class="form-group">
            <label for="post_content">Post Small content</label>
            <textarea class="form-control" name="post_content_exp" id="" cols="30" rows="10"></textarea>
        </div>
        
        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="title">Post Date</label>
            <input type="text" class="form-control" name="post_date" id="datepicker" value="<?php echo date('d-m-y'); ?>">
        </div>
    	<div class="form-group">
            <label for="title">Meta title</label>
            <input type="text" class="form-control" name="metatitle">
        </div> 
    	<div class="form-group">
            <label for="post_content">Meta Description</label>
    		<input type="text" class="form-control" name="metadescription">
        </div>
        
        <div class="form-group">
            <input type="submit" value="Publish Post" class="btn btn-primary" name="add_post">
        </div>
    </form>
</div>