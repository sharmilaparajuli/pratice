<?php
require("db-connect.php");
session_start();
?>
<!-- heder("loction:dashboard.php"); -->
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
    if (isset($_POST["loginform"])){
        $error = [];
        $email = $_POST['email'];
        if (empty($email)) {
            array_push($error, 'Email is empty');
        } else {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === FALSE) {
                array_push($error, "invalid email");
            } else {
                $email = $_POST['email'];
            }
        }
        $password = filter_var($_POST["password"] , FILTER_SANITIZE_STRING);
        if(empty($password)){
            array_push($error , "password is required");
        }else{
            if (strlen($password)<6){
                array_push($error , "password must be longer than 6");

            }
        }
        // select
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result=mysqli_query($conn, $sql);
        print_r($result);
        if($result){
            if(mysqli_num_rows($result) > 0 ){
                $_SESSION["logged_in"] = true;
                $_SESSION["email"] = $email;
            // if(mysqli_num_rows($result)>0){
                echo "logged in successfully";
                header("location:dashboard.php");
            }
            else{
                echo"user doesnot exist";
                header("location:signups.php");
            }
        } else {
            
            echo mysqli_error($conn);
        }
    }
    ?>

<form action = "" method = "POST" class = "w-50 m-auto">
<div class = "form-group">
<label>Email</label>
<input type = "text" name = "email" class = "form-control">
</div>
<div class = "form-group">
<label>Password</label>
<input type = "password" name = "password" class = "form-control">
</div>
<button name = "loginform" type = "submit" class = "btn btn-success">Login</button>
<!-- <input type = "submit" class = "btn btn-success" name = "submit"> -->
<!-- <script>alert("hello");</script> -->

</form>   
</body>
</html>