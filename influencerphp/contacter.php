
<?php 
/**
 * Establishes a connection to the database and creates a new instance of the CRUD class.
 */
require "./connectioninfluencer.php";
$p=new crud("inflbrand","localhost:3308","root","");
session_start();

if(!isset($_SESSION["id"])){
    header("location: logininfluencer.php");
    exit();
// Check if the user is logged in, if not then redirect him to login page
} 

/**
 * Sends a message from the current user to a brand user.

 */
$influencerphoto=$_SESSION['photo'];
if(isset($_POST['submit'])){  // @param string $influencerphoto The path to the current user's profile photo.
    $message=$_POST['message'];   // @param string $message The message to be sent.
    $recevoir= $_GET['brandusername']; // @param string $recevoir The username of the brand user who will receive the message.
    $envoyer=$_SESSION['username'];
    if(!empty($message)){
      $stmt = $p->insertmessage($envoyer, $recevoir,$message); // $p An instance of the class responsible for inserting the message into the database.
      header("Location: ".$_SERVER['PHP_SELF']."?brandusername=".$_GET['brandusername']);
      exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }  

//Retrieves brand information from the database based on the brand's username passed through the GET request

$brandid=$_GET["brandusername"];
$results=$p->getbrand($brandid);
foreach($results as $row){
$brandphoto=$row['photo'];
$id=$row['id'];
$photo=$row['photo'];
$username=$row['username'];
$email=$row['email'];}
$idb=$_SESSION['id'];
$influencerusername=$_SESSION['username'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Message</title>
  <!--style CSS située dans le répertoire "../influencer/css et image" et portant le nom "MESSAGE.css"-->
  <link rel="stylesheet" href="../influencer/css et image/MESSAGE.css" />
   <!---->
  <link rel="stylesheet" href="influencercss/contacter.css" />
   <!---->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Moon+Dance&family=Open+Sans:wght@400;700;800&family=Press+Start+2P&family=Work+Sans:wght@200;300;400;600&display=swap" rel="stylesheet">
   <!--bibliothèque d'icônes Font Awesome-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
      <!---->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/986277bb10.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Courgette&family=Handlee&family=Merriweather+Sans:wght@600&family=Nunito&family=Playfair+Display&family=Rubik:ital,wght@0,500;1,300;1,800&family=Titan+One&family=Work+Sans:wght@200;300;600&display=swap" rel="stylesheet">
</head>


<body>



  <div class="container">

    <div class="chat">
       <!--  chat header qui contient la photo et les icons--->
      <div class="chat-header">
        <div class="profile">
          <div class="left">
            

           <!--  * Displays the brand ID and photo in an HTML format.
             *
             * @param string $brandphoto The path to the brand photo.
             * @param string $brandid The ID of the brand.
            -->

            <?php
              echo '<img style="width:3em;height:3em;border-radius: 50%;  margin-left: 8px;
              margin-bottom: 5px; " src="../brandphp/brandimg/'.$brandphoto.'">             
              <h2>'.$brandid.'</h2>';
              ?>
             
          </div>
          <!-- les 3 icons a gauche-->
          <i class="fa-solid fa-video"></i>
          <i  class="fa-solid fa-phone"></i>
          <i class="fa-solid fa-ellipsis-vertical"></i>
        </div>
      </div>


      <div class="chat-box">
         <?php
               /**
                * Selects messages from the database for a given influencer and brand.
                */
               $results= $p->selectmessage($influencerusername, $brandid);
                if($results){
                    foreach($results as $row){
                            $date=$row['date'];
                            $message=$row['message'];
                            $envoyerX=$row['envoyer'];
                            /**
                             * Displays a chat message on the right side of the chat window if the sender is the logged in user.
                             */
                            if($envoyerX==$influencerusername){
                                echo '
                                <div class="chat-r">
                               
                                    <div class="sp"></div>
                                    <div class="mess mess-r">
                                    <p>'.$message.'</p>
                                    
                                    <div class="check">
                                        <span style=" color: white; margin-top:5px;">'.$date.'</span>
                                    </div>
                                    
                                    </div>
                                    <img style="width:3em;height:3em;border-radius: 50%;  margin-left: 8px; margin-right: 10px;
                                    margin-bottom: 5px; margin-top: 30px;  " src="influencerimg/'.$influencerphoto.'">
                                </div>';

                            }else{
                                /**
                                 * @param string $brandphoto The path to the brand photo.
                                 * @param string $message The message to display.
                                 * @param string $date The date to display.
                                 * @return string The HTML block for the chat message.
                                 */
                                echo '
                                <div class="chat-l">
                                <img style="width:3em;height:3em;border-radius: 50%;  
                                margin-bottom: 0px; margin-top: 27px; margin-right: 7px; " src="../brandphp/brandimg/'.$brandphoto.'">
                                    <div class="mess">
                                    <p>'.$message.'</p>
                                    <div class="check">
                                        <span>'.$date.'</span>
                                    </div>
                                </div>
                                <div class="sp"></div>
                                </div>
                                 ';
                            }
                    }
                } 
                ?>



          
        </div>
        <div class=""  style="margin-top: 10px;margin-bottom: 20px;">
          <form action="" method="post">
            <div id="down"></div>
            <!-- la place d'ecriture-->
            <input placeholder="Message" type="text" name="message"
              style="margin-top:20px;margin-left:10px; text-align: center ;padding:10px 270px 10px 270px;font-size: 15px;color: black;border: 1px solid black;background-color: #fdf2e9;border-radius: 50px;box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);">
              <!--le button envoyer-->
            <button  class="button button1" type="submit" name="submit" style=" border-radius: 50px">Envoyer</button>
            <br> 
            
            
              </form>
         </div>
    </div>

    <div class="col-2">
    <?php  
              /**
               * Displays the brand photo and brand ID in HTML format.
               *
               * @param string $brandphoto The filename of the brand photo to be displayed.
               * @param string $brandid The ID of the brand to be displayed.
               * @return string The HTML code to display the brand photo and brand ID.
               */
              echo '<img style="width:9em;height:9em;border-radius: 50%;  margin-top:40px;
              margin-bottom: 5px;" src="../brandphp/brandimg/'.$brandphoto.'">
              
              <h2 style="  margin-top : 15px; font-size:40px;">'.$brandid.'</h2>';

              
              ?>

                  <ul>
                    <li class="online"><span>USERNAME </span> <br><br> <?= $username;?></li>
                    <li class="offline"><span>EMAIL</span> <br><br> <?= $email;?></li>
                </ul>

              <!--   * Generates a button with a link to a partnership page.
                 *
                 * @param string $brandid The ID of the brand
                 * @param string $influencerusername The username of the influencer
                
                -->
                <?php echo '<button style=" border: 1px solid black; margin-left: 10px ;margin-top: 30px ; border-radius: 40px;padding:20px 50px 20px 50px; background-color: white;"class="button button1"><a style="color:black; text-decoration:none;font-family: sans-serif;font-size: 15px;"  href="paretenariat.php?username='.$brandid.'&&brandusername='.$influencerusername.'">Partenariat</a></button>';?>
               
            </div>

</body>

</html>