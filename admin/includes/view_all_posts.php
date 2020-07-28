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
<form action="" method="post">
    <div style="padding: 0 0 55px 0;">
        <div class="pull-right">
            <a class="btn btn-primary" href="posts.php?source=add_posts">Add New Post</a>
        </div>
    </div>
    <table class="table table-hover" id="myTable">
        <thead>
            <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Date</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM posts ORDER BY post_id DESC";
            $get_posts = mysqli_query($connection,$query);
            
            while($row = mysqli_fetch_assoc($get_posts)){
                
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                
                // $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                // $get_comment_count = mysqli_query($connection,$query);
                // $post_comment_count = mysqli_num_rows($get_comment_count);
                
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_hero_image = $row['post_hero_image'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_date = $row['post_date'];
                $post_views = $row['post_views'];
                $post_content = substr($row['post_content'],0,150);
                
                $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
                $get_categories = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($get_categories)){
                    $cat_title = $row['cat_title'];
                }
                
                echo "<tr>";
                ?>
                <td><input class='checkBoxes' type='checkbox' name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>                            
                <?php
                    echo "<td>$post_id</td>";
                    echo "<td>$post_author</td>";
                    echo "<td>$post_title</td>";
                    echo "<td>$cat_title</td>";
                    echo "<td>$post_status</td>";
                    echo "<td><img width='140px' src='../assets/img/blogimg/$post_image' alt='images'></td>";
                    echo "<td>$post_date</td>";
                ?>
                <td>
                    <a class='btn btn-primary' href='posts.php?source=edit_posts&update=<?php echo $post_id ?>'>Update</a>&nbsp;
                    <a href='deleteblogpost.php?id=<?php echo $post_id ?>' class='btn btn-warning'>Disable Blog</a>
                </td>
                <?php echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</form>
                
<script>
    $('#myModal').on('show.bs.modal', function (e) {
	    $(this).find('.modal_delete_link').attr('href', $(e.relatedTarget).data('href'));
    });
</script>