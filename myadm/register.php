<?php
// Include configuration file
require_once "configuration.php";
  
// Define variables and initialize them with empty values
$username = $email  = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // validation of username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM `admin` WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 3){
        $password_err = "Password must have atleast 3 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql="insert into `admin` (username,password) values (?,?) ";
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/986277bb10.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="newstyle.css">
    <title>Register Admin</title>
</head>

<body>
    <div class="content">
        <div class="text-sci">
            <div class="logo">
                <h2> SIGNUP ADMIN</h2>
            </div>
            <br><br><br>
            <h2><span id="wel"> ..... WELCOME!</span><br><span id=adm> To the admin era </span></h2>
            <div class="social-icons">
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-tiktok"></i>
            </div>
        </div>
    </div>
    <table>
        <tr>
            <td>
                <div class="form-box">
                    <div class="form-value">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <h1>sign up</h1>
                            <div class="inputbox">
                                <div class="input-field" id="username">
                                    <i class="fa-solid fa-user"></i>
                                    <input placeholder="Username" type="text" name="username"
                                        class="input-field <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                                        value="<?php echo $username; ?>">
                                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                </div>
                            </div>
                            <div class="inputbox">
                                <div class="input-field" id="username">
                                    <i class="fa-solid fa-lock"></i>
                                    <input placeholder="Password" type="password" name="password"
                                        class="input-field <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                                        value="<?php echo $password; ?>">
                                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                </div>
                            </div>
                            <div class="inputbox">
                                <div class="input-field" id="username">
                                    <i class="fa-solid fa-key"></i>
                                    <input placeholder="re-enter Password" type="password" name="confirm_password"
                                        class="input-field <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                                        value="<?php echo $confirm_password; ?>">
                                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                </div>
                            </div>
                            <div class="btn-field">
                                <input type="submit" name="submit" id="signupBtn" value="Submit">
                                <input type="reset" id="signinBtn" value="Reset">
                            </div>
                            <div class="register">
                                <p class="qst">Already registered?  <a href="login.php">Log in</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </td>
        </tr>
        </section>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>