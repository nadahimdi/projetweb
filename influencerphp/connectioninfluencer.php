<?php 

class crud {
  private $loggedIn = false; // Variable pour vérifier si l'utilisateur est connecté
  private $p;// Variable pour stocker l'objet PDO
  private $rowCount ;// Variable pour stocker le nombre de lignes affectées par une requête
  public function __construct($dbname,$host,$user,$password){
    try{
   $this->p=new PDO("mysql:dbname=" .$dbname.";host=".$host,$user,$password);
    // Connexion à la base de données MySQL en utilisant l'objet PDO
    }catch(PDOException $error1){
    echo "something went wrong with your connection";
       // Affichage d'un message d'erreur en cas de problème de connexion
    }
    catch(Exception $error2){
      echo "Generic error";
       // Affichage d'un message d'erreur générique en cas d'exception non gérée
    }
  }
  public function updateUserData($id, $username,$nom,$prenom,$age,$instagram,$twitter,$facebook, $email){
    $stmt = $this->p->prepare("UPDATE influencer SET username=:username, nom=:nom, prenom=:prenom, age=:age, instagram=:instagram ,facebook=:facebook, twitter=:twitter,email=:email  WHERE id=:id");
      // Préparation d'une requête de mise à jour des données de l'utilisateur dans la table "influencer"
    // Les valeurs sont liées aux paramètres de la requête pour éviter les injections SQL
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':instagram', $instagram);
    $stmt->bindParam(':facebook', $facebook);
    $stmt->bindParam(':twitter', $twitter);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
public function updatecollab($contrat,$status){
  $stmt = $this->p->prepare("UPDATE collaboration SET status=:status WHERE contrat=:contrat");
  $stmt->bindParam(':contrat', $contrat);
  $stmt->bindParam(':status',$status);
  $stmt->execute();// Exécution de la requête
}
public function deletecollab($contrat){
  $stmt = $this->p->prepare("DELETE FROM collaboration WHERE contrat=:contrat");
  $stmt->bindParam(':contrat', $contrat);
  $stmt->execute();
}

public function updateUserpassword($id, $hashed_password1) {
  // Prepare the SQL query using prepared statements to prevent SQL injection attacks
  $stmt = $this->p->prepare("UPDATE influencer SET password=:password WHERE id=:id");
  $stmt->bindParam(':password', $hashed_password1);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}
/**
 * Update the 'envoyer' field in the 'chat' table with the new username.
 *
 * @param string $username The new username to be set.
 * @param string $oldusername The old username to be replaced.

 */


public function updateenvoyer($username,$oldusername) {
  $stmt = $this->p->prepare("UPDATE chat SET envoyer=:username WHERE envoyer=:oldusername");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':oldusername', $oldusername);
  $stmt->execute();
}


/**
 * Update the 'recevoir' field in the 'chat' table with the new username.
 *
 * @param string $username The new username to be set.
 * @param string $oldusername The old username to be replaced.
 * @return void
 */
public function updaterecevoir($username,$oldusername) {
  $stmt = $this->p->prepare("UPDATE chat SET recevoir=:username WHERE recevoir=:oldusername");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':oldusername', $oldusername);
  $stmt->execute();
}

/**
 * Update the 'premier' field in the 'collaboration' table with the new username.
 *
 * @param string $username The new username to be set as 'premier'.
 * @param string $oldusername The old username to be replaced with the new username.
 * @return void
 */
public function updatepremier($username,$oldusername) {
  $stmt = $this->p->prepare("UPDATE collaboration SET premier=:username WHERE premier=:oldusername");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':oldusername', $oldusername);
  $stmt->execute();
}

/**
 * Update the 'deuscieme' field in the 'collaboration' table with the new username.
 *
 * @param string $username The new username to be updated.
 * @param string $oldusername The old username to be replaced.
 * @return void
 */

public function updatedeuscieme($username,$oldusername) {
  $stmt = $this->p->prepare("UPDATE collaboration SET deuscieme=:username WHERE deuscieme=:oldusername");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':oldusername', $oldusername);
  $stmt->execute();
}


/**
 * Inserts a new message into the chat table with the given sender, receiver, and message content.
 *
 * @param string $envoyer The sender of the message.
 * @param string $recevoir The receiver of the message.
 * @param string $message The content of the message.

 */
public function insertmessage($envoyer, $recevoir,$message){
  $p=$this->p->prepare("INSERT INTO  chat(envoyer,	recevoir,	message) VALUES(:e,:r,:m)");
  $p->bindValue(":e",$envoyer);
  $p->bindValue(":r",$recevoir);
  $p->bindValue(":m",$message);
  $p->execute();
  return $p;
}

/**
 * Inserts a new partnership into the collaboration table.
 *
 * @param string $brand_username
 * @param string $inf_username
 * @param string $contrat
 * @param string $status
 * @param string $from_date
 * @param string $to_date
 * @param float $montant

 */


public function insertparetenariat ($brand_username,$inf_username,$contrat, $status, $from_date, $to_date, $montant){
  $p=$this->p->prepare("INSERT INTO  collaboration(premier, deuscieme, contrat, status, date_depart, date_final, montant )VALUES(:p,:d,:c,:s,:dp,:df,:m)");
  $p->bindValue(":p",$brand_username);
  $p->bindValue(":d",$inf_username);
  $p->bindValue(":c",$contrat);
  $p->bindValue(":s",$status);
  $p->bindValue(":dp",$from_date);
  $p->bindValue(":df",$to_date);
  $p->bindValue(":m",$montant);
  $p->execute();
  return $p;
}

/**
 * Update the user photo in the database for the given user ID.
 *
 * @param int $id The ID of the user whose photo is to be updated.
 * @param string $photo The new photo to be set for the user.
 * @return void
 */
public function updateUserphoto($id, $photo){
  $stmt = $this->p->prepare("UPDATE influencer SET  photo=:photo WHERE id=:id");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':photo', $photo);
  $stmt->execute();
}
  /**
   * Retrieves the hashed password of the influencer with the given email from the database.
   *
   * @param string $email The email of the influencer whose password is to be retrieved.
   * @return string The hashed password of the influencer.
   */
  public function getHashedPassword($email){
    $stmt = $this->p->prepare("SELECT password FROM influencer WHERE email=:email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['password'];
}
/**
 * Selects all messages between two users from the chat table.
 *
 * @param string $envoyer The username of the sender.
 * @param string $recevoir The username of the receiver.
 * @return array An array of messages between the two users.
 */
public function selectmessage($envoyer, $recevoir){
  $stmt = $this->p->prepare("SELECT * FROM chat WHERE ( envoyer=:envoyer and recevoir=:recevoir ) or ( envoyer=:recevoir and recevoir=:envoyer )" );
  $stmt->bindParam(':envoyer', $envoyer);
  $stmt->bindParam(':recevoir', $recevoir);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // use fetchAll instead of fetch
  return $results;
}

/**
 * Returns the total number of brands in the database.
 *
 * @return int The total number of brands.
 * @throws PDOException If there is an error executing the SQL statement.
 */
public function getbrands(){
  $stmt = $this->p->prepare("SELECT COUNT(id) AS total FROM brand");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $total = $result['total'];
  return $total;
}
/**
 * Retrieves all the influencers from the database.
 *
 * @return array An array of all the influencers in the database.
 */
public function getInfluencers(){
  $stmt = $this->p->prepare("SELECT * FROM influencer");
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}

/**
 * Retrieves the brand information from the database for the given brand ID.
 *
 * @param int $brandid The ID of the brand to retrieve.
 * @return array An array containing the brand information as key-value pairs.
 */
public function getbrand($brandid){
  $stmt = $this->p->prepare("SELECT * FROM brand WHERE username=:username");
  $stmt->bindParam(':username', $brandid);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}
/**
 * Retrieves all the collaborations from the database.
 *
 * @return array An array of all the collaborations in the database.
 */
public function getcollabs(){
  $stmt = $this->p->prepare("SELECT * FROM collaboration");
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}
/**
 * Retrieves all the brands from the database.
 *
 * @return array An array of associative arrays representing the brands.
 * Each associative array contains the brand's information, such as its ID, name, and description.
 * @throws PDOException if there is an error executing the SQL query.
 */
public function getallbrands(){
  $stmt = $this->p->prepare("SELECT * FROM brand");
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}


/**
 * Retrieves the total number of collaborations from the database.
 *
 * @return int The total number of collaborations.
 * @throws PDOException If there is an error executing the SQL statement.
 */
public function getnumberofcollabs(){
  $stmt = $this->p->prepare("SELECT COUNT(id) AS total FROM collaboration");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $total = $result['total'];
  return $total;
}

  /**
   * Inserts a new row into the 'demender' table with the given username and influencer/brand type.
   *
   * @param string $username
   * @param string $influencerORbrand
   * @return void
   */
  public function insertsuppdata($username, $influencerORbrand){
    $p=$this->p->prepare("INSERT INTO  demender(username, influencerORbrand) VALUES(:u,:b)");
    $p->bindValue(":u",$username);
    $p->bindValue(":b",$influencerORbrand);
    $p->execute();
  }
    /**
     * Inserts data into the 'influencer' table with the given parameters.
     *
     * @param string $username
     * @param string $nom
     * @param string $prenom
     * @param int $age
     * @param string $instagram
     * @param string $facebook
     * @param string $twitter
     * @param string $email
     * @param string $password
     * @param string $photo
     * @return void
     */
    public function insertData($username,$nom,$prenom,$age,$instagram,$facebook,$twitter,$email,$password,$photo){
    $p=$this->p->prepare("INSERT INTO  influencer(username,	nom, prenom, age, email, instagram, facebook, twitter, password, photo) VALUES(:u,:n,:pn,:a,:e,:i,:f,:t,:p,:ph)");
    $p->bindValue(":u",$username);
    $p->bindValue(":pn",$prenom);
    $p->bindValue(":n",$nom);
    $p->bindValue(":a",$age);
    $p->bindValue(":i",$instagram);
    $p->bindValue(":f",$facebook);
    $p->bindValue(":t",$twitter);
    $p->bindValue(":e",$email);
    $p->bindValue(":p",$password);
    $p->bindValue(":ph",$photo);
    $p->execute();
  }
  /**
   * Logs in the user with the given email and password.
   *
   * @param string $email The email of the user.
   * @param string $password The password of the user.
   * @return void
   */
  public function loginSession($email,$password){
    $stmt = $this->p->prepare("SELECT * FROM influencer WHERE password=:password and email=:email" );
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":password",$password);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result){
        session_start();
        $_SESSION["username"]=$result["username"];
        $_SESSION["nom"]=$result["nom"];
        $_SESSION["prenom"]=$result["prenom"];
        $_SESSION["facebook"]=$result["facebook"];
        $_SESSION["instagram"]=$result["instagram"];
        $_SESSION["twitter"]=$result["twitter"];
        $_SESSION["id"]=$result["id"];
        $_SESSION["photo"]=$result["photo"];
        $_SESSION["email"]=$result["email"];
        $_SESSION["age"]=$result["age"];
        $this->loggedIn = true;
       // var_dump($_SESSION);
    }
  }

}
?>