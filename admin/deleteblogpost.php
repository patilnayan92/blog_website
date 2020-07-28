<?php include"../includes/database.php";

// $sqlleaddel ="DELETE FROM posts WHERE post_id='".$_GET['id']."'";
// mysqli_query($connection, $sqlleaddel);

$sql = "UPDATE posts SET post_status='Draft' WHERE post_id='".$_GET['id']."'";
mysqli_query($connection, $sql);

header("Location: posts.php");

?>