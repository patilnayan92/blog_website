<?php
// session_start();
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "naraci_website";

foreach($db as $key => $value){
    
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


// $connection = mysqli_connect('localhost', 'landing', 'Landing@1234#');
// if (!$connection){
//     die("Database Connection Failed" . mysqli_error($connection));
// }
// $select_db = mysqli_select_db($connection, 'landing');
// if (!$select_db){
//     die("Database Selection Failed" . mysqli_error($connection));
// }
?>