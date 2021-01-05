<?php
require("db-connect.php");
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
<table class = "table table-bordered w-50 m-auto">
    <tr>
        <th>ID</th>
        <th>FACULTY</th>
        <th>LABEL</th>
        <th>ACTION</th>
</tr>
<?php
$sql = "SELECT * FROM addfacullty";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['faculty']?></td>
    <td><?php echo $row['label']?></td>
        <td>
            <a href="edit-faculty.php?id=<?php echo $row['id'];?>">Edit</a>
            <a href="delete-faculty.php?id=<?php echo $row['id'];?>">Delete</a>
        </td>
</tr>
<?php } ?>
</table>
<button class = "btn btn-success"><a href = "add-faculty.php">addfaculty</a></button>
</body>
</html>