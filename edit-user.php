
<?php
require("db-connect.php");
if(!isset($_GET['id'])){
   header('location: dashboard.php');
}

$id = intval($_GET['id']);

$userData = mysqli_query($conn , "SELECT * FROM users WHERE id = $id");
$user = mysqli_fetch_assoc($userData);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    // $user_id = intval($_POST['userid']);
    $sql = "UPDATE users SET  name = '$name' , email = '$email' , password = '$password' , address = '$address' WHERE id = $id";
    if(mysqli_query($conn , $sql)){
        echo "successfully updated";
        header("location:dashboard.php");

        }
        else{
            echo "fail to update";
        }
    }
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
<?php
    if (isset($_POST["editform"])){

    $error = [];
    $name = filter_var($_POST["name"] , FILTER_SANITIZE_STRING);
    if(empty($name)){
        array_push($error , "invalid name");
    }else{
        $name = $_POST["name"];
    }

    $email = filter_var($_POST["email"] , FILTER_SANITIZE_STRING);
    if(empty($email)){
        array_push($error , "invalid email");
    } else{
        if(filter_var($_POST["email"] , FILTER_VALIDATE_EMAIL) == false){
            array_push($error , "invalid email");
        } else{
            $email = $_POST["email"];
        }
    }
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        if (empty($password)) {
            array_push($error, "password is required");
        }

        if (strlen($password) < 6) {
            array_push($error, "password must be longer than 6");
        }
        $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
        if (empty($address)) {
            array_push($error, "Address is required");
        } else {
            $address = $_POST['address'];
        }
    }
  
    


    ?>
    <form action = "" method = "POST" class = "w-50 m-auto">
        <input type = "hidden"  name = "userid" value = "<?php echo $user['id']?>">
    <div class="form-group">
    <label>Name</label>
    <input type = "text" name = "name" class = "form-control"  value = "<?php echo $user['name'];?>">
    </div>
    <div class="form-group">
    <label>Email</label>
    <input type = "text" name = "email" class = "form-control" value = "<?php echo $user['email'];?>">
    </div>
    <div class="form-group">
    <label>Password</label>
    <input type = "text" name = "password" class = "form-control" value = "<?php echo $user['password'];?>">
    </div>
    
    <div class="form-group">
    <label>Address</label>
    <input type = "text" name = "address" class = "form-control" value = "<?php echo $user['address'];?>">
    </div>
    <button type = "submit" class = "btn btn-success" name = "editform" >Update</button>


</form>
</body>
</html>

