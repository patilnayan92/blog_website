<?php
    
    if(isset($_POST['add_metadetails'])){
	
		/****  create seo friendly url 
		* var string $text
		**/ 	  
	  
		function clean_url($text) 
		{ 
		
			$text=strtolower($text); 
			$code_entities_match = array( '&quot;' ,'!' ,'@' ,'#' ,'$' ,'%' ,'^' ,'&' ,'*' ,'(' ,')' ,'+' ,'{' ,'}' ,'|' ,':' ,'"' ,'<' ,'>' ,'?' ,'[' ,']' ,'' ,';' ,"'" ,',' ,'.' ,'_' ,'/' ,'*' ,'+' ,'~' ,'`' ,'=' ,' ' ,'---' ,'--','--','’'); 
			$code_entities_replace = array('' ,'-' ,'-' ,'' ,'' ,'' ,'-' ,'-' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'-' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'-' ,'' ,'-' ,'-' ,'' ,'' ,'' ,'' ,'' ,'-' ,'-' ,'-','-'); 
			$text = str_replace($code_entities_match, $code_entities_replace, $text); 
			return $text; 
		} 
		$post_name  		= clean_url($_POST['title']);
		$metatitle  		= $_POST['metatitle'];
		$metadescription 	= $_POST['metadescription'];

		
		
		$metaquery="INSERT INTO metainfo SET url='".$post_name."',metatitle='".$metatitle."',metadescription='".$metadescription."'";
		mysqli_query($connection,$metaquery);
    
    }
    

?>
<!--What enctype does is..it prepares form to receive the file such as image using type="file" in input form   -->

<div class="col-md-9">

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
       <label for="title">Enter URL</label>
        <input type="text" class="form-control" name="title">
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
        <input type="submit" value="Add Meta" class="btn btn-primary" name="add_metadetails">
    </div>
</form>
</div>