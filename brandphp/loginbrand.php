<?php 
 require "./connectionbrand.php";
 $p=new crud("inflbrand","localhost:3308","root","");
 $login_err="";
 if(isset($_POST["submition"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashed_password = $p->getHashedPassword($email); // get the hashed password from the database
    if(password_verify($password, $hashed_password)){ // compare the hashed password with user input
        $p->loginSession($email,$hashed_password);
        $login_err="";
        header("location: tabledebordmark.php");
} else{
   $login_err = " you maybe not a memeber in our website yet sign up or verify the password you entered";
   header("location: pageprinc.php?login_err=" . urlencode($login_err));
}
 }
?>