<?php 
require "./connectioninfluencer.php";
$p=new crud("inflbrand","localhost:3308","root","");
session_start();
if(!isset($_SESSION["id"])){
    header("location: logininfluencer.php");
    exit();
// Check if the user is logged in, if not then redirect him to login page
} 
$brands = $p->getallbrands();
$user = $_SESSION["username"];
$photo = $_SESSION["photo"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>to collab with</title>
    <link rel="stylesheet" href="influencercss/tocollabwithinfluencer.css" />
  </head>
  <body>
  <main>

  <input type="checkbox" placeholder="checkbox" id="sidebar-toggle" />
    <!--side bar-->
    <div class="sidebar">
      <!--sidebar-header-->
      <div class="sidebar-header">
        <h3 class="brand">
         <span> <?= '<img style="width:3em;height:3em;border-radius: 50%; margin:0 10px; " src="influencerimg/'.$photo.'">';?>
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
        <li><a href="./tabledebordinfluencer.php"><img src="influencerimg/home.jpg" alt="" />&nbsp;<span  style="color:aliceblue;">Home</a></span></li>
          <li><a href="mesinfos.php"><img src="influencerimg/profil.png" alt="" />&nbsp;<span style="color:aliceblue;">Mon profile</a></span></li>
          <li><a href="Tocollabwith.php"><img src="influencerimg/brand.png" alt="" />&nbsp;<span  style="color:aliceblue;">To Collab with</a></span></li>
          <li><a href="tabledebordinfluencer.php"><img src="influencerimg/marks.png" alt="" />&nbsp;<span  style="color:aliceblue;">table de bord</a></span></li>
          <li><a href="resetpassword.php"><img src="influencerimg/pass.png" alt="" />&nbsp;<span  style="color:aliceblue;">resset password</a></span></li>
          <li ><a href="logout.php"><img  class="radios"src="influencerimg/logout.jpeg" alt="" />&nbsp;<span style="color:aliceblue;">log-out</a></span></li>
      
        </ul>
      </div>
    </div>
    <div class="main-content">
    <h2 class="dash-title">Scroll to see the Brands</h2>
        <div class="hello">
          <div class="card-body1">
              <div class="welcome">
                
                  <h1>Hello  <?= $user;?> !</h1>
                  <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum neque in consequatur delectus ducimus est sint tempora possimus ad eaque aperiam fugiat consectetur, veritatis dicta, officia corrupti numquam. Et, nesciunt?</h5>

              </div>
              <span class="card1">
                <img src="influencerimg/headersmall_brandevolution.jpg" alt="">
             </span>
          </div>
       </div>
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
          
        <span> <?= '<img style="width:4em;height:4em;border-radius: 50%; margin:0 10px; " src="influencerimg/'.$photo.'">';?>
        </div>
      </header>
    <main>
           <!-- /**
             * Loop through an array of brands and assign each brand to the $brand variable.

             */-->
            <?php foreach($brands as $brand): ?>
          <div class="content-2">
        <div class="web">
         <br>
                 <h1 class=""> <?php echo $brand['username']  ; ?> Brand </h1>

                <div class="profile-page ">


                    <!-- photo et nom prenom -->

                    <div class="overview ">
                        <div class="photo-et-nom ">
                      <div> <span> <?= '<img style="width:10em;height:10em;border-radius: 50%;  margin-left:40px ; border: 1px solid black;  margin-right:50px ; " src="../brandphp/brandimg/'.$brand['photo'].'">';?></div>
                      <br><br> <br><br>
                      <br><br> 
                      <div class="card-footer " style="margin-top: -70px; ">
                         <!--
                       * Generates a link to the "contacter.php" page with the brand's username as a parameter
                       * @param string $username The username of the brand to be contacted.
                       * @return string The HTML link to the "contacter.php" page with the brand's username as a parameter.
                       */-->
                      <a href="contacter.php?brandusername=<?php echo $brand['username']; ?>">Contacter</a>

</div>

                        </div>

               <!--  /**
                  * Generates HTML code for displaying user information.
                  * @param array $brand An associative array containing user information.
                  * @return string Returns the HTML code for displaying user information.
                  */-->
                 <div class="info-text ">
                            <div class="box  ">
                                <h4 class=" ">Username</h4>
                                <div class="text ">
                                    <span class=""><?php echo $brand['username']; ?></span>    
                             </div>
                           </div>
                        </div>
                        <div class="info-text">
                            <div class="box  ">
                             <h4 class=" ">Email</h4>
                                <div class="text ">
                                       <span class=""><?php echo $brand['email']; ?></span>
                                </div>  
                             </div>  
                             </div> 
                             <div class="info-text">
                             <div class="box  ">
                             <h4 class=" ">CA</h4>
                                <div class="text ">
                                       <span class=""><?php echo $brand['CA']; ?></span>
                                </div>  
                             </div>  
                         </div>            
        </div>
      </div>
      </div>  
      </div> 
    <?php endforeach; ?>
  </tbody>
  </div>
</table>
  </body>