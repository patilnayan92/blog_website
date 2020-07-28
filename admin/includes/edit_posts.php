<?php
	if(isset($_GET['update'])){
		function clean_url($text){ 
			$text=strtolower($text); 
			$code_entities_match = array( '&quot;' ,'!' ,'@' ,'#' ,'$' ,'%' ,'^' ,'&' ,'*' ,'(' ,')' ,'+' ,'{' ,'}' ,'|' ,':' ,'"' ,'<' ,'>' ,'?' ,'[' ,']' ,'' ,';' ,"'" ,',' ,'.' ,'_' ,'/' ,'*' ,'+' ,'~' ,'`' ,'=' ,' ' ,'---' ,'--','--','’'); 
			$code_entities_replace = array('' ,'-' ,'-' ,'' ,'' ,'' ,'-' ,'-' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'-' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'-' ,'' ,'-' ,'-' ,'' ,'' ,'' ,'' ,'' ,'-' ,'-' ,'-','-'); 
			$text = str_replace($code_entities_match, $code_entities_replace, $text); 
			return $text; 
		} 
		
        $update_id = $_GET['update'];
		$query = "SELECT * FROM posts WHERE post_id = $update_id ";
		$get_update_data = mysqli_query($connection, $query);
    
        while($row = mysqli_fetch_assoc($get_update_data))
        {
            $post_title = $row['post_title'];
    		$post_name = $row['post_name'];
            $post_comment_count = $row['post_comment_count'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
            $post_content_exp =$row['post_content_exp'];
            $post_date =$row['post_date'];
        }
		//echo "SELECT * FROM metainfo WHERE post_id = $update_id";
		$row=mysqli_query($connection,"SELECT * FROM metainfo WHERE post_id = 'Blog$update_id' ");
		$res=mysqli_fetch_array($row);

        if(isset($_POST['update_post'])){
            $post_title = $_POST['title'];
            $post_category_id = $_POST['post_category_id'];
            $post_status = $_POST['post_status'];
            
            $post_tags = $_POST['post_tags'];
            $post_content_exp = mysqli_real_escape_string($connection,$_POST['post_content_exp']);
            $post_content = mysqli_real_escape_string($connection,$_POST['post_content']);
            $post_date = $_POST['post_date'];
            $post_name = $_POST['post_name'];
            
            if(isset($_FILES["post_image"]["name"]) && !empty($_FILES["post_image"]["name"])){
            $post_image = rand().$_FILES['post_image']['name'];
            $tmp_post_image = $_FILES['post_image']['tmp_name'];
            $allowed_img_type = array("image/png","image/jpg","image/jpeg","image/gif");
                if(in_array($_FILES["post_image"]["type"],$allowed_img_type)){
                    move_uploaded_file($tmp_post_image, "../assets/img/blogimg/$post_image");
                    $updateimage = "UPDATE posts SET `post_image`='".$post_image."' WHERE post_id = $update_id";
             
                    mysqli_query($connection, $updateimage);
                }
            }
        
            if(empty($post_image)){
                $query = "SELECT * FROM posts WHERE post_id =$update_id";
                $select_image = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_image)){
                    $post_image = $row['post_image'];
                }
            }
	
    		$metatitle = $_POST['metatitle'];
    	    $metadescription = $_POST['metadescription'];
        
            $query = "UPDATE posts SET post_title ='{$post_title}',post_name='{$post_name}', post_category_id ='{$post_category_id}', post_status = '{$post_status}', post_tags = '{$post_tags}', post_content= '{$post_content}',post_content_exp='{$post_content_exp}',post_date='{$post_date}' WHERE post_id = $update_id ";
            
            $update_posts = mysqli_query($connection, $query);
            confirm_query($update_posts);
    		
    		$metainfoupdate = "UPDATE  metainfo SET url='".$post_name."',metatitle='".$metatitle."',metadescription='".$metadescription."' WHERE post_id = 'Blog$update_id' ";
    		mysqli_query($connection, $metainfoupdate);
            
            echo "<h5 class='well col-xs-6'>Post Updated!</h5>";
		}
    }
?>

<div class="col-md-9">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
           <label for="title">Enter title</label>
            <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
        </div>
    	<div class="form-group">
           <label for="title">Post Url</label>
            <input value="<?php echo $post_name; ?>" type="text" class="form-control" name="post_name">
        </div>
        <div class="form-group">
           <label for="post_category_id">Post Category ID</label>
            <select class="form-control" name="post_category_id" id="">
                <?php
                $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                $get_categories = mysqli_query($connection, $query);
                
                confirm_query($get_categories);
                
                while($row = mysqli_fetch_assoc($get_categories)){
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    
                    echo "<option value='$cat_id'>{$cat_title}</option>";
                }
                
                $query = "SELECT * FROM categories";
                $get_categories = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($get_categories)){
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    if($cat_id != $post_category_id){
                    echo "<option value='$cat_id'>{$cat_title}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
        <div class="form-group">
           <label for="post_status">Post Status</label>
           <select name="post_status" class="form-control" id="">
                <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
                <?php
               if($post_status == "Draft"){
                   echo "<option value='Publish'>Publish</option>";
               }else{
                  echo "<option value='Draft'>Draft</option>";
               }
                ?>
                
            </select>
        </div>
        
        <div class="form-group">
            <img width="200" src="../assets/img/blogimg/<?php echo $post_image; ?>" alt="">
        </div>
        <div class="form-group">
           <label for="post_image">Post Image</label>
            <input type="file" name="post_image">
        </div>
        
        <div class="form-group">
           <label for="post_tags">Post Tags</label>
            <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
        </div>
        <div class="form-group">
           <label for="post_content">Post Small content</label>
           <textarea class="form-control" name="post_content_exp" id="" cols="30" rows="10"><?php echo $post_content_exp; ?></textarea>
        </div>
        
        <div class="form-group">
           <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
        </div>
        <div class="form-group">
            <label for="title">Post Date</label>
            <input type="text" class="form-control" name="post_date" id="datepicker" value="<?php echo $post_date; ?>">
        </div> 
    	<div class="form-group">
           <label for="title">Meta title</label>
            <input type="text" class="form-control" name="metatitle" value="<?php echo $res['metatitle'] ?>">
        </div> 
    	<div class="form-group">
           <label for="post_content">Meta Description</label>
    		<input type="text" class="form-control" name="metadescription" value="<?php echo $res['metadescription'] ?>">
        </div>
        
        <div class="form-group">
            <input type="submit" value="Update Post" class="btn btn-primary" name="update_post">
        </div>
    </form>
</div>