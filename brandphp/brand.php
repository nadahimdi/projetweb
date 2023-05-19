<?php 
 require "./connectionbrand.php";
 $p=new crud("inflbrand","localhost:3308","root","");
 
 if (isset($_GET["login_err"])) {
    $login_err = $_GET["login_err"];
} else {
    $login_err = "";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width =device-width, initial-scale=1.e">
         <title> Sign In and Sign Up Form - Easy Turtorials </title>
         <link rel="stylesheet" href="brandcss/signupbrand.css">
         <script src="https://kit.fontawesome.com/986277bb10.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="text-sci">
                   <div class="logo"> 
                    <h2 > COLLABNATION</h2></div>
                    <br><br><br>
                 <span> ..... WELCOME!</span><br><br><br><span> To the brand era </span></h2>
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
                <form action="./signupbrand.php" method="post">
                <h1 id="title"> Sign Up </h1>
                <div class="btn-field">
                    <button type="button" id="signupBtn"> click to Sign Up</button>
                    <button type="button" id="signinBtn" class="disable"> click to Sign In</button>
                </div> 
                    <div class="input-group">
                        <div class="input-field" id="username" >
                            <i class="fa-solid fa-user"></i>
                        <input type ="text" placeholder="Name" name="username" required>
                        </div> 
                        <div class="input-field" id="CA">
                            <i class="fa-solid fa-user"></i>
                        <input type ="text" placeholder="chiffre d affaire"  pattern="[1-9][0-9]*" name="CA" required>
                        </div> 
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                        <input type ="email" placeholder="Email" id="email" name="email" required>
                        </div> 
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                        <input type ="password" placeholder="Password" name="password"required>
                      </div>
                      <div class="input-field" id="verifier">
                        <i class="fa-solid fa-user"></i>
                    <input type ="password" placeholder="re-enter Password"  name="verifier" required>
                  </div>
                  <div class="field" id="photo">
                    <input type="file" placeholder="photo" name="photo" required>
                  </div>
                  <?php 
        if(!empty($login_err)  ){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
            $login_err="";
        }        
        ?>
                    </div>    
             <div class="btn-field1">
                    <div class="btn-field">
                        <button type="submit" id="submition" name="submition"> Done </button>
                    </div></div>
                </form>
            </div>
        </div>
        <script>





         let signupBtn=document.getElementById("signupBtn");
         let signinBtn=document.getElementById("signinBtn");
         let nameField=document.getElementById("nameField");
         let title=document.getElementById("title");

         document.getElementById("submition").addEventListener("click", function(event) {
          
            let password = document.querySelector('input[name="password"]').value;
let verifyPassword = document.querySelector('input[name="verifier"]').value;
if (signinBtn.classList.contains("disable")) {
if (password !== verifyPassword) {
  alert("Passwords do not match!");
  event.preventDefault();
}
         }}
);




         signinBtn.onclick = function(){
            verifier.style.maxHeight = "0";
            username.style.maxHeight = "0";
            photo.style.display = "none";
            CA.style.maxHeight = "0";
            CA.querySelector('input').removeAttribute('required', '');
            verifier.querySelector('input').removeAttribute('required', '');
            photo.querySelector('input').removeAttribute('required', '');
            username.querySelector('input').removeAttribute('required', '');
            title.innerHTML="Sign In";
            signupBtn.classList.add("disable");
            signinBtn.classList.remove("disable");
            document.querySelector("form").action = "./loginbrand.php";

         }
         
         signupBtn.onclick = function(){
            verifier.style.maxHeight = "60px";
            username.style.maxHeight = "60px";
            photo.style.maxHeight = "60px";
            photo.style.display = "inline-block";
            CA.style.maxHeight = "60px";
            CA.querySelector('input').setAttribute('required', '');
            verifier.querySelector('input').setAttribute('required', '');
            photo.querySelector('input').setAttribute('required', '');
            username.querySelector('input').setAttribute('required', '');
            title.innerHTML="Sign Up";
            signupBtn.classList.remove("disable");
            signinBtn.classList.add("disable");
            document.querySelector("form").action = "./signinbrand.php";

         }
        </script>
    </body>
</html>