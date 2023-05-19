<?php
require "./connectionbrand.php";
$p=new crud("inflbrand","localhost:3308","root","");
session_start();
$id = $_SESSION["id"];
$email=$_SESSION["email"];
$oldusername=$_SESSION["username"];
$hashed_password = $p->getHashedPassword($email);
if(isset($_POST["update"])){
  $password = $_POST["password"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $CA=$_POST["CA"];
  // Update the brand's data in the database
  if(password_verify($password, $hashed_password)){ // compare the hashed password with user input
    $p->updateUserData($id, $username, $email, $CA);
    $p->updateenvoyer($username,$oldusername);
    $p->updaterecevoir($username,$oldusername);
    $p->updatepremier($username,$oldusername);
    $p->updatedeuscieme($username,$oldusername);
    $login_err="";
    session_start(); 
   $_SESSION["username"] = $username;
   $_SESSION["email"] = $email;
   $_SESSION["CA"] = $CA;
    header("location: mesinfos.php");
} else{
$login_err = " verify the password you entered";
header("location: brandmodify.php?login_err=" . urlencode($login_err));
}
}
?>

