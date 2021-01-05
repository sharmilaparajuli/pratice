<?php
$cookiename = "user";
$cookievalue = "admin";
setcookie($cookiename , $cookievalue , time() + (86400*30) , "");
if(!isset($_COOKIE[$cookiename])){
    echo "cookie" .$cookiename . "is not set";
} else{
    echo $_COOKIE[$cookiename];
    setcookie("user" , "" , time() - 3600 , "/");
}
?>