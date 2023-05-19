<?php 
 require "./connectionadmin.php";
 $p=new crud("inflbrand","localhost:3308","root","");
 $login_err="";
 if(isset($_POST["submition"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashed_password = $p->getHashedPassword($username); // get the hashed password from the database
    if(password_verify($password, $hashed_password)){ // compare the hashed password with user input
        $p->loginSession($username,$hashed_password);
        $login_err="";
        header("location: dashboard.php");
} else{
   $login_err = " you maybe not an admin in our website or verify the password you entered";
     header("location: login.php?login_err=" . urlencode($login_err));
}
 }
?>