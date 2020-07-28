<?php include"../includes/database.php";

$sqlleaddel ="DELETE FROM users WHERE user_id='".$_GET['delete']."'";
mysqli_query($connection, $sqlleaddel);

header("Location: users.php");

?>