<!--/**
 * This script is used to display the influencer's dashboard after successful login.
 */-->
<?php 
 require "./connectioninfluencer.php";
 $p=new crud("inflbrand","localhost:3308","root","");

 /**
  * Starts a new session and checks if the user is logged in. If the user is not logged in, redirects to the login page.
  */
 session_start();
 if(!isset($_SESSION["id"])){
     header("location: logininfluencer.php");
     exit();
 }
 /**
  * Checks if the login error message is set in the URL parameters and assigns it to the $login_err variable.
  */
 if (isset($_GET["login_err"])) {
    $login_err = $_GET["login_err"];
} else {
    $login_err = "";
}
 /**
  * Retrieves user information from the current session.
  */
 $user = $_SESSION["username"];
 $photo = $_SESSION["photo"];
 $user_id = $_SESSION["id"];
 $email = $_SESSION["email"];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width =device-width, initial-scale=1.e">
         <title> Modify-Profile</title>
         <link rel="stylesheet" href="influencercss/signupinfluencer.css">
         <script src="https://kit.fontawesome.com/986277bb10.js" crossorigin="anonymous"></script>
    </script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="text-sci">
                   <div class="logo"> 
                    <h2 > COLLABNATION</h2></div>
                    <br><br><br>
                 <span> ..... WELCOME!</span><br><br><br>
                    <br><br><br>
                    <br><br><br>
                    <p></p>
                    <div class="social-icons">
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-tiktok"></i>
                    </div>
                </div>
            </div>
            <div class="lorgreg-box"></div>
            <div class="form-box">
                <form action="./modifierprofile.php" method="post">
                <h1 id="title"> Modify-Profile </h1>
                <br><br><br>
                    <div class="input-group">
                       
                    <div class="field" id="photo">
                    <input type="file" placeholder="photo" name="photo" required>
                  </div>
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                        <input type ="password" placeholder="Password" name="password"required>
                      </div>
                    </div>    
                    <?php 
        if(!empty($login_err)  ){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
            $login_err="";
        }        
        ?>
             <div class="btn-field1">
                    <div class="btn-field">
                        <button type="submit" id="update" name="update"> Done </button>
                    </div></div>
                </form>
            </div>
        </div>
        
    </body>
 


</html>