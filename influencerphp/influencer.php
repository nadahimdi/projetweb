<?php 
 /**
  * Establishes a connection to the database and creates a new instance of the CRUD class.
  * @param string $databaseName The name of the database to connect to.
  * @param string $serverName The name of the server to connect to.
  * @param string $username The username to use for the connection.
  * @param string $password The password to use for the connection.

  */
 require "./connectioninfluencer.php";
 $p=new crud("inflbrand","localhost:3308","root","");
 
 /**
  * Checks if the login error message is set in the URL parameters and assigns it to the $login_err variable.
  * If the login error message is not set, assigns an empty string to the $login_err variable.
  *
  * @return string
  */
 if (isset($_GET["login_err"])) {
    $login_err = $_GET["login_err"];
} else {
    $login_err = "";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
         <!--- The meta tag specifies the character encoding of the document. -->
        <meta charset="utf-8">
           <!--- The meta tag sets the viewport for responsive design. -->
        <meta name="viewport" content="width =device-width, initial-scale=1.e">
         <title> Sign In and Sign Up Form </title>
           <!--- The link tag is used to include an external CSS file. -->
         <link rel="stylesheet" href="influencercss/signupinfluencer.css">
       
         <script src="https://kit.fontawesome.com/986277bb10.js" crossorigin="anonymous"></script>
    </head>
    <body>
           <!--- The div element with class "container" is used to contain the content of the form. -->
        <div class="container">
              <!--- used to contain the main content of the form. -->
            <div class="content">
                <!--- " contains the text content and logo of the form. -->
                <div class="text-sci">
                     <!--- contains the logo text. -->
                   <div class="logo"> 
                    <h2 > COLLABNATION</h2></div>
                     <!--- The br elements create line breaks for spacing. -->
                    <br><br><br>
                       <!--- The span element contains the welcome message. -->
                 <span> ..... WELCOME! .....</span><br><br><br><span> To the influencer era </span></h2>
                     <!---  contains social media icons. -->
                    <div class="social-icons">
                          <!--- The i elements with class "fa-brands" and specific class names represent different social media icons. -->
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-tiktok"></i>
                    </div>
                </div>
            </div>
               <!--- The div element with class "lorgreg-box" is a placeholder element. -->
            <div class="lorgreg-box"></div>
            <div class="form-box">
                  <!--- The form element has an action attribute that specifies the URL where the form data will be sent. -->
                <form action="./signupinfluencer.php" method="post">
                       <!--- The h1 element with id "title" displays the form title. -->
                <h1 id="title"> Sign Up </h1>
                <div class="btn-field">
                    <button type="button" id="signupBtn"> click to Sign Up</button>
                    <button type="button" id="signinBtn" class="disable"> click to Sign In</button>
                </div> 
                    <div class="input-group">
                         <!--- The div elements with class "input-field" contain input fields for user information. -->
                        <div class="input-field" id="username" >
                              <!--- The i element with class "fa-solid" and specific class names represents different icons. -->
                            <i class="fa-solid fa-user"></i>
                        <input type ="text" placeholder="Name" name="username" required>
                        </div> 
                        <div class="input-field" id="nom" >
                            <i class="fa-solid fa-user"></i>
                        <input type ="text" placeholder="First-Name" name="nom" required>
                        </div> 
                        <div class="input-field" id="prenom" >
                            <i class="fa-solid fa-user"></i>
                        <input type ="text" placeholder="Family-Name" name="prenom" required>
                        </div> 
                        <div class="input-field" id="age">
                            <i class="fa-solid fa-user"></i>
                        <input type ="text" placeholder="AGE"  pattern="[1-9][0-9]*" name="age" required>
                        </div> 
                        <div class="input-field" id="instagram">
                            <i class="fa-brands fa-instagram"></i>
                        <input type ="text" placeholder="instagram"   name="instagram" required>
                        </div> 
                        <div class="input-field" id="facebook">
                            <i class="fa-brands fa-facebook"></i>
                        <input type ="text" placeholder="facebook"  name="facebook" required>
                        </div> 
                        <div class="input-field" id="twitter">
                            <i class="fa-brands fa-twitter"></i>
                        <input type ="text" placeholder="twitter"   name="twitter" required>
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
                    <!--- The PHP code displays an error message if the "login_err" variable is not empty. -->
                 <!--* If the $login_err variable is not empty, display an alert with the error message and reset the variable to an empty string.-->
                  <?php 
        if(!empty($login_err)  ){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
            $login_err="";
        }        
        ?> 
          <!--- The div element with class "btn-field1" contains the submit button. -->
             <div class="btn-field1">
                    <div class="btn-field">
                        <button type="submit" id="submition" name="submition"> Done </button>
                    </div></div></div>
                </form>
            </div>
        </div>
        <script>
              // Get references to elements using their IDs
         let signupBtn=document.getElementById("signupBtn");
         let signinBtn=document.getElementById("signinBtn");
         let nameField=document.getElementById("nameField");
         let title=document.getElementById("title");
        // Add event listener to the "submition" button
         document.getElementById("submition").addEventListener("click", function(event) {
          
            let password = document.querySelector('input[name="password"]').value;
let verifyPassword = document.querySelector('input[name="verifier"]').value;
  // Check if sign-in button is disabled and passwords match
if (signinBtn.classList.contains("disable")) {
if (password !== verifyPassword) {
  alert("Passwords do not match!");
  event.preventDefault();
}
         }}
);

 // Event handler for the sign-in button click
         signinBtn.onclick = function(){
            verifier.style.maxHeight = "0";
            username.style.maxHeight = "0";
            nom.style.maxHeight = "0";
            prenom.style.maxHeight = "0";
            photo.style.display = "none";
            instagram.style.maxHeight = "0";
            facebook.style.maxHeight = "0";
            twitter.style.maxHeight = "0";
            age.style.maxHeight = "0";
             // Remove "required" attribute from certain input fields
            age.querySelector('input').removeAttribute('required', '');
            verifier.querySelector('input').removeAttribute('required', '');
            photo.querySelector('input').removeAttribute('required', '');
            username.querySelector('input').removeAttribute('required', '');
            nom.querySelector('input').removeAttribute('required', '');
            prenom.querySelector('input').removeAttribute('required', '');
            twitter.querySelector('input').removeAttribute('required', '');
            facebook.querySelector('input').removeAttribute('required', '');
            instagram.querySelector('input').removeAttribute('required', '');
              // Update the title
            title.innerHTML="Sign In";
              // Disable sign-up button and enable sign-in button
            signupBtn.classList.add("disable");
            signinBtn.classList.remove("disable");
              // Update the form action
            document.querySelector("form").action = "./logininfluencers.php";

         }
          // Event handler for the sign-up button click
         signupBtn.onclick = function(){
              // Adjust styling and display of input fields
            verifier.style.maxHeight = "60px";
            nom.style.maxHeight = "60px";
            prenom.style.maxHeight = "60px";
            facebook.style.maxHeight = "60px";
            twitter.style.maxHeight = "60px";
            instagram.style.maxHeight = "60px";
            username.style.maxHeight = "60px";
            photo.style.maxHeight = "60px";
            photo.style.display = "inline-block";
            age.style.maxHeight = "60px";
             // Add "required" attribute to input fields
            age.querySelector('input').setAttribute('required', '');
            verifier.querySelector('input').setAttribute('required', '');
            photo.querySelector('input').setAttribute('required', '');
            username.querySelector('input').setAttribute('required', '');
            nom.querySelector('input').setAttribute('required', '');
            prenom.querySelector('input').setAttribute('required', '');
            facebook.querySelector('input').setAttribute('required', '');
            instagram.querySelector('input').setAttribute('required', '');
            twitter.querySelector('input').setAttribute('required', '');
            title.innerHTML="Sign Up";
            signupBtn.classList.remove("disable");
            signinBtn.classList.add("disable");
             // Update the form action
            document.querySelector("form").action = "./signininfluencer.php";

         }
        </script>
    </body>
</html>