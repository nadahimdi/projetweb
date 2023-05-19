<?php
require "./connectionbrand.php";
$p=new crud("inflbrand","localhost:3308","root","");
if(isset($_POST["submition"])){
$username=$_POST["username"];
$chiffre=$_POST["CA"];
$email=$_POST["email"];
$photo=$_POST["photo"];
$password=$_POST["password"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT); // hash the password using a secure algorithm
$p->insertData($username, $chiffre, $email, $hashed_password, $photo);
header("location: brand.php");
}
?>