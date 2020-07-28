<?php
session_start();
ob_clean();
include"../includes/database.php";
if(isset($_POST['sub'])){
	global $connection;
	  $query = "SELECT * FROM users WHERE username ='".mysqli_real_escape_string($connection,$_POST['username'])."' AND user_password='".md5(mysqli_real_escape_string($connection,$_POST['pass']))."'";
    $row = mysqli_query($connection,$query);
	if(mysqli_num_rows($row)>0){
		$res=mysqli_fetch_array($row);
		$_SESSION['user_id']=$res['user_id'];
		$_SESSION['username']=$res['username'];
		header("Location: index.php");
	}else{
		header("Location: login.php");
	}
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Naraci Admin</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel-heading" style="margin-left:10px;"><img src="images/naraci-updated.png" ></div>
        <div class="panel-body">
          <form action="" method="post" name="logfrm">
          <fieldset>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required="required">
                </div>
              </div>
              <div class="form-group">
                      <div class="form-label-group">
                <input type="submit" name="sub" value="Login" class="btn btn-primary btn-block">
              </div>
          </fieldset>
          </form>
			  </div>
        </div>
      </div>
    </div>

    <script src="js/jquery.js"></script>

    <script src="js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>

</html>