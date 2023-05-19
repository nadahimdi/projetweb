<?php 
 /**
  * This script is used to check if the user is logged in and has a valid session. If the user is not logged in, they are redirected to the login page.
  * 
  * @require connectioninfluencer.php
  * @param string $p - an instance of the crud class with the database name, host, username, and password
  * @session_start() - starts a new or resumes an existing session
  */
 require "./connectioninfluencer.php";
 $p=new crud("inflbrand","localhost:3308","root","");

 session_start();
 if(!isset($_SESSION["id"])){
     header("location: loginbrand.php");
     exit();
 }
 if (isset($_GET["login_err"])) {
    $login_err = $_GET["login_err"];
} else {
    $login_err = "";
}

//Assigns session variables to corresponding variables for easier access and readability.

$user = $_SESSION["username"];
$nom = $_SESSION["nom"];
$prenom = $_SESSION["prenom"];
$instagram = $_SESSION["instagram"];
$facebook = $_SESSION["facebook"];
$twitter = $_SESSION["twitter"];
$photo = $_SESSION["photo"];
$user_id = $_SESSION["id"];
$email= $_SESSION["email"];
$age=$_SESSION["age"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width =device-width, initial-scale=1.e">
         <title>  Modifications</title>
         <link rel="stylesheet" href="influencercss/modifierinf.css">
         <script src="https://kit.fontawesome.com/986277bb10.js" crossorigin="anonymous"></script>
    </script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="text-sci">
                     <!-- logo -->
                   <div class="logo"> 
                    <h2 > COLLABNATION</h2></div>
                    <br><br><br>
                 <span> ..... WELCOME! .....</span><br><br><br>
                    <br><br><br>
                    <br><br><br>
                    <p></p>
                    <div class="social-icons">
                         <!-- Social icons -->
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-tiktok"></i>
                    </div>
                </div>
            </div>
            <div class="lorgreg-box"></div>
            <div class="form-box">
                <form action="./modifierinfluencer.php" method="post">
                       <!-- Form title -->
                <h1 id="title"> Modifications </h1>
                <br><br><br>
                    <div class="input-group">
                           <!-- Username input field -->
                        <div class="input-field" id="username" >
                            <i class="fa-solid fa-user"></i>
                        <input type ="text" placeholder="Name" name="username" value=<?php echo $user;?>  required >
                        </div> 
                          <!-- Nom input field -->
                        <div class="input-field" id="nom" >
                            <i class="fa-solid fa-user"></i>
                        <input type ="text" placeholder="First-Name" name="nom" value=<?php echo $nom;?>  required >
                        </div> 
                          <!-- prenom input field -->
                        <div class="input-field" id="prenom" >
                            <i class="fa-solid fa-user"></i>
                        <input type ="text" placeholder="Last-Name" name="prenom" value=<?php echo $prenom;?>  required >
                        </div> 
                          <!-- age input field -->
                        <div class="input-field" id="age">
                            <i class="fa-solid fa-user"></i>
                        <input type ="text" placeholder="age"  pattern="[1-9][0-9]*" name="age" value=<?php echo $age;?> required>
                        </div> 
                          <!-- instgram input field -->
                        <div class="input-field" id="instagram" >
                            <i class="fa-brands fa-instagram"></i>
                        <input type ="text" placeholder="instagram" name="instagram" value=<?php echo $instagram;?>  required >
                        </div> 
                        <div class="input-field" id="facebook" >
                            <i class="fa-brands fa-facebook"></i>
                        <input type ="text" placeholder="facebook" name="facebook" value=<?php echo $facebook;?>  required >
                        </div> 
                        <div class="input-field" id="username" >
                            <i class="fa-brands fa-twitter"></i>
                        <input type ="text" placeholder="twitter" name="twitter" value=<?php echo $twitter;?>  required >
                        </div> 
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                        <input type ="password" placeholder="Password" name="password"required>
                      </div>
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                        <input type ="email" placeholder="Email" id="email" name="email" value=<?php echo $email;?> required>
                        </div> 
                    </div>   
                    
                      <!--   If the login error message is not empty, display it as a danger alert. -->
                    <?php 
        if(!empty($login_err)  ){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
            $login_err="";
        }        
        ?>
             <div class="btn-field1">
                    <div class="btn-field">
                          <!-- submmit button -->
                        <button type="submit" id="update" name="update"> Done </button>
                    </div></div>
                </form>
            </div>
        </div>
        
    </body>
 


</html>