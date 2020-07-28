<?php
	if(isset($_GET['update'])){
		$update_id = $_GET['update'];
        $query = "SELECT * FROM faqs WHERE faq_id = $update_id ";
        $get_update_data = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($get_update_data))
        {
            $faq_question = $row['faq_question'];
    		$faq_answer = $row['faq_answer'];
        }
		if(isset($_POST['update_faq'])){
            $faq_question = $_POST['question'];
            $faq_answer = $_POST['answer'];
            $query = "UPDATE faqs SET faq_question ='$faq_question', faq_answer='$faq_answer' WHERE faq_id = $update_id ";
            $update_faqs = mysqli_query($connection, $query);
            confirm_query($update_faqs);
		    echo "<h5 class='well col-xs-6'>Post Updated!</h5>";
        }
    }
?>

<div class="col-md-9">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
           <label for="question">FAQ Question</label>
            <input value="<?php echo $faq_question; ?>" type="text" class="form-control" name="question">
        </div>
        <div class="form-group">
           <label for="answer">FAQ Answer</label>
            <textarea class="form-control" name="answer" id="" cols="30" rows="10"><?php echo $faq_answer; ?></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Update FAQ" class="btn btn-primary" name="update_faq">
        </div>
    </form>
</div>