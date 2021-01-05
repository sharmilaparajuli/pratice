<?php
require("db-connect.php");
$faculty = "";
$label = "";
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

    if (isset($_POST["addfaculty"])) {
        $error = [];
        $faculty = filter_var($_POST['faculty'], FILTER_SANITIZE_STRING);
        if (empty($faculty)) {
            array_push($error, "faculty is required");
        } else {
            $faculty = $_POST['faculty'];
        }

        $label = filter_var($_POST['label'], FILTER_SANITIZE_STRING);
        if (empty($label)) {
            array_push($error, "label is required");
        } else {
            $label = $_POST['label'];
        }

        if (count($error) == 0) {
            $sql = "INSERT INTO addfacullty (faculty , label) VALUES ('$faculty' , '$label')";
            if (mysqli_query($conn, $sql)) {
                echo "successfully inserted";
                header("location:faculty.php");
            } else {
                echo "error in insert";
                echo mysqli_error($conn);
            }
        }
        print_r($error);
    }

    ?>
    <form action="" method="POST" class="w-50 m-auto">
        <div class="form-group">
            <label>faculty</label>
            <input type="text" name="faculty" class="form-control" value = "<?php echo $faculty;?>">
        </div>
        <div class="form-group">
            <label>Label</label>
            <input type="text" name="label" class="form-control" value = "<?php echo $label;?>">
        </div>
        <button type="submit" name="addfaculty" class="btn btn-success">add</button>
    </form>
</body>

</html>