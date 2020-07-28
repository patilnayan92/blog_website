<?php
    if(isset($_POST['checkBoxArray'])){
        bulk_post_options();
    }
    if(isset($_GET['delete'])){
        delete_posts(); 
    }
?>
<style>
#BulkOptionContainer{padding:0;}
</style>
<?php include "delete_modal.php"; ?>
           
<div class="pull-right" style="padding: 0 0 20px 0;">
    <a class="btn btn-primary" href="metadetails.php?source=add_metadetails">Add New Meta Details</a>
</div>
<table class="table table-hover" id="myTable">
    <thead>
        <tr>
			<th>URL</th>
			<th>Meta Title</th>
			<th>Meta Details</th>
			<th>Action</th>
        </tr>
    </thead>
    <tbody>
		<?php
		$query = "SELECT * FROM metainfo ORDER BY id DESC";
		$get_posts = mysqli_query($connection,$query);
						
		while($row = mysqli_fetch_assoc($get_posts)){
									
		$post_id     = $row['id'];
		$url         = $row['url'];
		$metatitle   = $row['metatitle'];
		$metadetails = $row['metadescription'];				
		echo "<tr>";
		?>
																		   
    	<?php
    		echo "<td>$url</td>";
    		echo "<td>$metatitle</td>";
    		echo "<td>$metadetails</td>";
    		echo "<td><a class='btn btn-primary' href='metadetails.php?source=edit_metadetails&update=$post_id'>Update</a></td>";
    		echo "</tr>";
    	}
    	?>
    </tbody>
</table>
                   
<script>
    $('#myModal').on('show.bs.modal', function (e) {
        $(this).find('.modal_delete_link').attr('href', $(e.relatedTarget).data('href'));
    });
</script>