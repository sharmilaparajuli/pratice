welcome
<?php
if (isset($_GET["name"])) {
    echo $_GET["name"]; ?>
    Your email is <?php echo $_GET["email"];
                }
                    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="GET">
        Name<input type="text" name="name"></br>
        Email<input type="text" name="email"></br>
        <input type="submit">
    </form>


</body>

</html>