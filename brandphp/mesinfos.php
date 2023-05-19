<?php 
require "./connectionbrand.php";
// Initialize the session
session_start();
if(!isset($_SESSION["id"])){
    header("location: loginbrand.php");
    exit();
// Check if the user is logged in, if not then redirect him to login page
} 
// Update the $_SESSION variables with the new user data

$user = $_SESSION["username"];
$photo = $_SESSION["photo"];
$user_id = $_SESSION["id"];
$email= $_SESSION["email"];
$CA=$_SESSION["CA"];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brand Profil</title>
    <link rel="stylesheet" href="brandcss/mesinfos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Moon+Dance&family=Open+Sans:wght@400;700;800&family=Press+Start+2P&family=Work+Sans:wght@200;300;400;600&display=swap" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Courgette&family=Handlee&family=Merriweather+Sans:wght@600&family=Nunito&family=Playfair+Display&family=Rubik:ital,wght@0,500;1,300;1,800&family=Titan+One&family=Work+Sans:wght@200;300;600&display=swap" rel="stylesheet">
  </head>
  <body>
  <input type="checkbox" placeholder="checkbox" id="sidebar-toggle" />
    <!--side bar-->
    <div class="sidebar">
      <!--sidebar-header-->
      <div class="sidebar-header">
        <h3 class="brand">
         <span> <?= '<img style="width:3em;height:3em;border-radius: 50%; margin:0 10px; " src="brandimg/'.$photo.'">';?>
          <span> <?php echo $user; ?></span></span>
        </h3>
        
        <label for="sidebar-toggle" style="cursor: pointer">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            fill="currentColor"
            class="bi bi-list"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
            />
          </svg>
        </label>
      </div>

      

      <!--sidebar-menu-->
      <div class="sidebar-menu">
        <ul>
          <li><a href="tabledebordmark.php"><img src="brandimg/home.jpg" alt="" />&nbsp;<span  style="color:aliceblue;">Home</a></span></li>
          <li><a href="mesinfos.php"><img src="brandimg/profil.png" alt="" />&nbsp;<span style="color:aliceblue;">Mon profile</a></span></li>
          <li><a href="Tocollabwith.php"><img src="brandimg/marks.png" alt="" />&nbsp;<span  style="color:aliceblue;">To Collab with</a></span></li>
          <li><a href="resetpassword.php"><img src="brandimg/pass.png" alt="" />&nbsp;<span  style="color:aliceblue;">resset password</a></span></li>
          <li><a href="logout.php"><img class="radio"  src="brandimg/logout.jpeg" alt="" />&nbsp;<span style="color:aliceblue;">log-out</a></span></li>
      
        </ul>
      </div>
    </div>

    <!--main-content-->
    <div class="main-content">
      <!--header-->
      <header>
        <div class="search-wrapper">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
            </span>
            <input type="text" name="search" placeholder="Search" />
        </div>

        <div class="social-icons">
          
        <span> <?= '<img style="width:4em;height:4em;border-radius: 50%; margin:0 10px; " src="brandimg/'.$photo.'">';?>
        </div>
      </header>




      <!--main-->

      <main>
        <h2 class="dash-title">Welcome To Your Profil</h2>
        <div class="hello">
          <div class="card-body1">
              <div class="welcome">
                  <h1>Hello  <?= $user;?> !</h1>
                  <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum neque in consequatur delectus ducimus est sint tempora possimus ad eaque aperiam fugiat consectetur, veritatis dicta, officia corrupti numquam. Et, nesciunt?</h5>

              </div>
              <span class="card1">
                <img src="brandimg/inf.png" alt="">
             </span>
          </div>
       </div>





       <div class="content-2">
        <div class="web">
         
                 <h1 class="">Profile</h1>

                <div class="profile-page ">


                    <!-- photo et nom prenom -->

                    <div class="overview ">
                        <div class="photo-et-nom ">
                      <div> <span> <?= '<img style="width:14em;height:14em;border-radius: 50%; " src="brandimg/'.$photo.'">';?>
                      <br><br>
                      <div class="card-footer">
                      <a   href="supprimerbrand.php"  id="deleteLink">Remove Contact</a>

</div></div>
                         
                          
                        </div>

                        <div class="info-text ">
                            <div class="box  ">
                                <h4 class=" ">Username</h4>
                                <div class="text ">
                                    <span class=""><?= $user;?></span>
                                   
                                </div>
                                </div>
                            </div>
                            <div class="info-text ">
                            <div class="box  ">
                                <h4 class=" ">email</h4>
                                <div class="text ">
                                    <span class=""><?= $email;?></span>
                                   
                                </div>
                                </div>
                            </div>
                            <div class="info-text ">
                            <div class="box  ">
                                <h4 class=" ">Chiffre d affaire</h4>
                                <div class="text ">
                                    <span class=""><?= $CA;?></span>
                                   
                                </div>
                                </div>
                                </div>      
                       


                        <div class="info-text">
                   </div>
                </div>
            </div>               
        </div>
      </div>

      <div class="title">
            <h2 class="rec">Modifications & Collaborations</h2>
          </div>
           <!--cards-->
           <div class="dash-cards">
         
            <div class="card-single">

                <div class="card-body">
                   
                    <div>
                        <h5>Modifications </h5>
                    </div>

                    <span class="card2">
                      <img style=" width: 190px; height:150px; margin-top:130px;" src="brandimg/Inteltelecom — 3d illustration for web site.png" alt="">
                    </span>

                </div>
                <div class="butoon">
                    <a href="brandmodify.php" >Modify infos</a>
                </div>
                <div class="butoon">
                    <a href="profilemodify.php" >Modify profil</a>
                </div>
            </div>

            <div class="card-single">
                <div class="card-body">
                   
                    <div>
                        <h5>Collaborations</h5>
                    </div>

                    <span class="card2">
                      <img src="brandimg/Pitch _ Product design case study.png" style=" width: 180px; height:180px; margin-top:130px;" alt="">
                   </span>
                </div>
    <div class="card-footer">
    <a href="mycollabsbrand.php" id="deleteLink" >Check Collabs</a>
</div>
</div>
        </div>

      </main>
    </div>



  </body>
</html>