<html>
<head>
<title>php</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<!-- <?php
$capital = 0;
?>
<p>total capital is <?php echo $capital;?></p>
<p>total capital is <?php echo $capital;?></p> -->

<?php
// $x = 20;
// function printNum(){
//     global $x;
//     $x = 40;
//     echo "value of x is :" .$x;
// }
// printNum();
// echo "value of x outside of function :" .$x;
// $num = 3;
// function evenodd($num){
//    global $num;
//     if($num%2 == 0){
//         echo "number is even";
//     }
//     else{
//         echo"number is odd";
//     }

// }
//  evenodd(4);

// function sumofdigit($num){
//     $sum = 0;
//     $rem = 0;
//     for($i=0; $i<=strlen($num);$i++){
//         $rem = $num%10;
//         $sum = $sum + $rem;
//         $num = abs($num/10);
//     }
//     echo $sum;
// }
// sumofdigit(1234);
// define("DATABASE_NAME","students");
// define("DB_PASSWORD","password");
// echo DATABASE_NAME;
// echo DB_PASSWORD;
// print_r($GLOBALS);
// print_r($_SERVER);
// print_r($_GET);
// print_r($_POST);
// print_r($_REQUEST);
// print_r($_COOKIE);
// print_r($_SESSION);
//****************************************************/
// filehandling
// if(!file_exists("/tmp/text.txt")){
//     die("couldnot read file");
// }
// else{
//     $file = fopen("/tmp/text.txt",'r');
//     print ("file opened successfully");
// }
//**********************************************************/
// errorhandling
// try{
//     $error = "always throw this error";
//     throw new exception($error);

// }
// catch(exception $e){
//     echo $e -> getmessage();
// }
// echo "hello world";
// $a = 5;
// $b = 0;
// try{
//     if($b==0){
//         throw new exception("divide by zero");
//     }
//     echo $a/$b;
// }
// catch(exception $e){
//     echo $e -> getMessage();
// }
// $number = $_POST["number"];
// for($i = 1; $i<=10;$i++){
//     echo "<tr> <td> $number * </td><td>$i =</td><td>".$number*$i ."</td></tr>" . "<br>";
// }
// ?>

<!-- <form action = "" method ="POST">
 <label>Number</label>
 <input type = "number" name = "number">
<input type = "submit"> -->
<?php
// echo $_SERVER["REQUEST_METHOD"];
// if ($_SERVER["REQUEST_METHOD"]=="POST"){

if (isset($_POST["submit"])){
    $firstname = $_POST["name"];
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    echo $firstname . "<br>",$lastname . "<br>",$address . "<br>",$email;
}
     ?>
<form action = "" method = "POST" class = "w-50 m-auto" >
    <div class ="form-group">
        <label>Firstname</label>
        <input type ="text" name ="name" class ="form-control">
    </div>
    <div class ="form-group">
        <label>lastname</label>
        <input type ="text" name ="lastname" class ="form-control">
    </div>
    <div class ="form-group">
        <label>Address</label>
        <input type ="text" name ="address" class ="form-control">
    </div>
    <div class ="form-group">
        <label>Email</label>
        <input type ="email" name ="email" class ="form-control">
    </div>
    <input type = "submit" class = "btn btn-success" name ="submit">
</div>
</form>
</body>
</html>
