<?php
	if(isset($_GET['update'])){
		function clean_url($text){ 
		
			$text=strtolower($text); 
			$code_entities_match = array( '&quot;' ,'!' ,'@' ,'#' ,'$' ,'%' ,'^' ,'&' ,'*' ,'(' ,')' ,'+' ,'{' ,'}' ,'|' ,':' ,'"' ,'<' ,'>' ,'?' ,'[' ,']' ,'' ,';' ,"'" ,',' ,'.' ,'_' ,'/' ,'*' ,'+' ,'~' ,'`' ,'=' ,' ' ,'---' ,'--','--','’'); 
			$code_entities_replace = array('' ,'-' ,'-' ,'' ,'' ,'' ,'-' ,'-' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'-' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'-' ,'' ,'-' ,'-' ,'' ,'' ,'' ,'' ,'' ,'-' ,'-' ,'-','-'); 
			$text = str_replace($code_entities_match, $code_entities_replace, $text); 
			return $text; 
		} 
		
		
		$row=mysqli_query($connection,"SELECT * FROM metainfo WHERE id = '".$_GET['update']."'");
		$res=mysqli_fetch_array($row);

        if(isset($_POST['update_post'])){
			$post_name  		= $_POST['post_name'];
			$metatitle  		= addslashes($_POST['metatitle']);
			$metadescription 	= addslashes($_POST['metadescription']);
			$metainfoupdate = "UPDATE  metainfo SET url='".$post_name."',metatitle='".$metatitle."',metadescription='".$metadescription."' WHERE id='".$_GET['update']."'";
			if(mysqli_query($connection, $metainfoupdate)){
				echo "<h5 class='well col-xs-6'>Meta info update!'</h5>";
			}
		}
	}
?>
<!--What enctype does is..it prepares form to receive the file such as image using type="file" in input form   -->
<div class="col-md-9">
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
       <label for="title">Post Url</label>
        <input value="<?php echo $res['url'] ?>" type="text" class="form-control" name="post_name">
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
        <input type="submit" value="Update Meta" class="btn btn-primary" name="update_post">
    </div>
</form>
</div>