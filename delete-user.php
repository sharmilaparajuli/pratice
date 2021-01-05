<?php
require("db-connect.php");
$userid = $_GET['id'];
$sql = "DELETE FROM users WHERE id = $userid";
$result = mysqli_query($conn , $sql);
if($result == true){
    echo "deleted successfully";
    header("location:dashboard.php");
}else{
    echo "error in delete";
}

?>