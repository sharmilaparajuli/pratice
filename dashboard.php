
<!-- // make connection
// $conn = mysqli_connect("localhost" , "root" , "");
// // select db
// $db= mysqli_select_db('record' , $conn);
// $sql = "SELECT * FROM users";
// $result = mysqli_query($sql , $conn); -->
<?php
require("db-connect.php");
session_start();
// print_r($_SESSION);
if(!isset($_SESSION["logged_in"])){
    header("location:login.php");
}
$user = $_SESSION["email"];
echo "<p>Welcome , " .$user . "</p>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<table class="table table-striped table-dark w-50 m-auto table-bordered" >
    <tr>
    <th>id</th>
    <th>name</th>
    <th>email</th>
    <th>password</th>
    <th>email</th>
    <th>faculty</th>
    <th>action</th>
    </tr>
    <?php
     $sql =  "SELECT * FROM users";
     $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['password']?></td>
        <td><?php echo $row['address']?></td>
        <td><?php echo $row['faculty']?></td>
        <td>
            <a href="edit-user.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="delete-user.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    
    <?php } ?>
    
    </table>
    <button class = "btn btn-success"><a href = "logout.php">logout</a></button>
</body>
</html>