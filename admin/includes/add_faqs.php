<?php
    if(isset($_POST['add_post'])){
        $faq_question = $_POST['question'];
        $faq_answer = $_POST['answer'];
        $query = "INSERT INTO faqs SET 
            faq_question='".$faq_question."',
            faq_answer='".$faq_answer."'";
        $create_post = mysqli_query($connection,$query);
    }
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="col-md-9">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="question">FAQ Question</label>
            <input type="text" class="form-control" name="question">
        </div> 
        <div class="form-group">
            <label for="answer">FAQ Answer</label>
            <textarea class="form-control" name="answer" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Publish Post" class="btn btn-primary" name="add_post">
        </div>
    </form>
</div>