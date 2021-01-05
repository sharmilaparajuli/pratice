<?php
require("db-connect.php");
$userid = $_GET['id'];
$sql = "DELETE FROM addfacullty WHERE id = $userid";
$result = mysqli_query($conn , $sql);
if($result == true){
    echo"deleted successfully";
    header("location:faculty.php");
    
}else{
    echo "error in delete";

}

?>