<?php 
 require "./connectionadmin.php";
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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/986277bb10.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="newstyle.css">
    <title>Admin login</title>
   </head>

<body>
    <div class="content">
        <div class="text-sci">
            <div class="logo">
                <h2> COLLABORATION</h2>
            </div>
            <br><br><br>
            <h2><span id="wel"> ....... WELCOME! .......</span><br><span id=adm> To the admin era </span></h2>
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
                            <form action="./loginadmin.php" method="post">
                                <h1>LOGIN</h1>
                                <div class="inputbox">
                                    <div class="input-field" id="username">
                                        <i class="fa-solid fa-user"></i>
                                        <input placeholder="Username" type="text" name="username" class="form-control" required>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="inputbox">
                                    <div class="input-field" id="username">
                                        <i class="fa-solid fa-key"></i>
                                        <input placeholder="Password" type="password" name="password"
                                            class="form-control"
                                            required>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="btn-field">
                        <button type="submit" id="submition" name="submition"> Done </button>
                    </div>
                                <div class="register">
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