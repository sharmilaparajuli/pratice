<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "record";

$conn = mysqli_connect($servername , $db_username , $db_password , $db_name);
if(!$conn){
    die("error establishing connection".mysqli_connect_error($conn));
}
?>