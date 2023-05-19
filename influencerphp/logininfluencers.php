<?php 
 /**
  * Creates a new instance of the CRUD class with the specified parameters.
  *
  * @param string $databaseName The name of the database to connect to.
  * @param string $serverName The name of the server to connect to.
  * @param string $username The username to use for the connection.
  * @param string $password The password to use for the connection.
  */
 require "./connectioninfluencer.php";
 $p=new crud("inflbrand","localhost:3308","root","");


 //Checks if the form has been submitted and retrieves the email and password from the POST request.
 // If the form has not been submitted, the `login_err` variable will be an empty string.

 $login_err="";
 if(isset($_POST["submition"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashed_password = $p->getHashedPassword($email); // get the hashed password from the database
    if(password_verify($password, $hashed_password)){ // compare the hashed password with user input
        $p->loginSession($email,$hashed_password);
        $login_err="";
       header("location: tabledebordinfluencer.php");
/**
 * If the user is not authenticated, redirect them to the influencer page with an error message.
 */
} else{
   $login_err = " you maybe not a memeber in our website yet sign up or verify the password you entered";
   header("location: influencer.php?login_err=" . urlencode($login_err));
}
 }

?>