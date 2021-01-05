<?php
require("db-connect.php");
// form complete huda samma data naharaos
$name = "";
$email = "";
$password = "";
$address = "";
$faculty = "";
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
    // error nadhekauney
    if (isset($_POST["signupsform"])) {
        $error = [];
        // validation
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        if (empty($_POST["name"])) {
            array_push($error, "invalid name");
        } else {
            $name = $_POST["name"];
        }


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
        // $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
        // if (empty($_POST["email"])) {
        // } else {
        //     $email = $_POST["email"];
        // }
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
        $faculty = filter_var($_POST['faculty'], FILTER_SANITIZE_NUMBER_INT);
        if (empty($faculty)) {
            array_push($error, "faculty is required");
        } 







        // insert garne
        if (count($error) === 0) {
            $users = mysqli_query($conn , "SELECT * FROM users WHERE email = '$email'");
            if(mysqli_num_rows($users) === 0){
                $sql = "INSERT INTO users(name , email , password , address , faculty) VALUES('$name' , '$email' , '$password' , '$address' , $faculty)";
    
                if (mysqli_query($conn, $sql)) {
                    echo "user inserted successfully";
                    header('location: dashboard.php');
                } else {
                    echo " couldnot create user";
                }
            
             } else{
                    echo "already exist";
                }
            }
        }
                
            
                

            

        //     error checking
        // } else {
        //     $errorMessage = "<ul>";
        //     foreach ($error as $err) {
        //         $errorMessage .= "<li>" . $err . "</li>";
        //     }
        //     $errorMessage .= "</ul>";
        //     echo $errorMessage;
        // }
    
    










    //     $email = $_POST["email"];
    //     $password = $_POST["password"];
    //     $address = $_POST["address"];
    // echo $name . "<br>", $email ."<br>", $password ."<br>", $address;

    // }
    ?>

    <form action="" method="POST" class="w-50 m-auto">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
        </div>
        <label for="">faculty</label>
        <select class="form-control" name="faculty">
            <?php
            $sql = "SELECT * FROM addfacullty";
            $faculty = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($faculty)) :
            ?>
                <option></option>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['faculty']; ?>
                </option>
            <?php endwhile; ?>
        </select>


        <button type="submit" name="signupsform" class="btn btn-success">Signup</button>
    </form>
</body>

</html>