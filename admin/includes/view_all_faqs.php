<?php
    if(isset($_POST['checkBoxArray'])){
        bulk_post_options();
    }
    // if(isset($_GET['delete'])){
    //     delete_posts(); 
    // }
?>
    <style>
        #BulkOptionContainer{padding:0;}
    </style>

<form action="" method="post">
    <div style="padding: 0 0 55px 0;">
        <div class="pull-right">
            <a class="btn btn-primary" href="faqs.php?source=add_faqs">Add New FAQ's</a>
        </div>
    </div>
    <table class="table table-hover" id="myTable">
        <thead>
            <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>Id</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT * FROM faqs ORDER BY faq_id DESC";
            $get_posts = mysqli_query($connection,$query);
            
            while($row = mysqli_fetch_assoc($get_posts)){
                
                $faq_id = $row['faq_id'];
                $faq_question = $row['faq_question'];
                $faq_answer = $row['faq_answer'];
                echo "<tr>";
                ?>
 
                <td>
                    <input class='checkBoxes' type='checkbox' name="checkBoxArray[]" value="<?php echo $post_id; ?>">
                </td>
                <?php
                    echo "<td>$faq_id</td>";
                    echo "<td>$faq_question</td>";
                    echo "<td>$faq_answer</td>";
                ?>
                <td><a class='btn btn-primary' href='faqs.php?source=edit_faqs&update=<?php echo $faq_id ?>'>Update</a></td>
                <?php echo "</tr>";
                    }
                ?>
        </tbody>
    </table>
</form>