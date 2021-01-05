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
    print_r(filter_var(intval($_POST["name"]), FILTER_SANITIZE_NUMBER_INT));
    if (isset($_POST["signupform"])){
        $username = "";
        if(!filter_var($_POST["name"],'FILTER_VALIDATE_STRING')){

        }
    
        $username = $_POST["name"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $phoneno = $_POST["number"];
        echo $username ."<br>", $address ."<br>", $email ."<br>", $phoneno;
    }
    ?>
    <form action="" method="POST" class = "w-50 m-auto">
        <div class="form-group">
            <label>username</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>phoneno</label>
            <input type="number" name="number" class="form-control">
        </div>
        <button name = "signupform" class = "btn btn-success">Login</button>
    </form>
</body>
</html>