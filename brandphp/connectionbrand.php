<?php 

class crud {
  private $loggedIn = false; 
  private $p;
  private $rowCount ;
  public function __construct($dbname,$host,$user,$password){
    try{
   $this->p=new PDO("mysql:dbname=" .$dbname.";host=".$host,$user,$password);
    }catch(PDOException $error1){
    echo "something went wrong with your connection";
    }
    catch(Exception $error2){
      echo "Generic error";
    }
  }
  public function updateUserData($id, $username, $email, $CA){
    $stmt = $this->p->prepare("UPDATE brand SET username=:username, email=:email, CA=:CA WHERE id=:id");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':CA', $CA);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
public function updateenvoyer($username,$oldusername) {
  $stmt = $this->p->prepare("UPDATE chat SET envoyer=:username WHERE envoyer=:oldusername");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':oldusername', $oldusername);
  $stmt->execute();
}
public function updaterecevoir($username,$oldusername) {
  $stmt = $this->p->prepare("UPDATE chat SET recevoir=:username WHERE recevoir=:oldusername");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':oldusername', $oldusername);
  $stmt->execute();
}
public function updatepremier($username,$oldusername) {
  $stmt = $this->p->prepare("UPDATE collaboration SET premier=:username WHERE premier=:oldusername");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':oldusername', $oldusername);
  $stmt->execute();
}
public function updatedeuscieme($username,$oldusername) {
  $stmt = $this->p->prepare("UPDATE collaboration SET deuscieme=:username WHERE deuscieme=:oldusername");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':oldusername', $oldusername);
  $stmt->execute();
}
public function updatecollab($contrat,$status){
  $stmt = $this->p->prepare("UPDATE collaboration SET status=:status WHERE contrat=:contrat");
  $stmt->bindParam(':contrat', $contrat);
  $stmt->bindParam(':status',$status);
  $stmt->execute();
}
public function deletecollab($contrat){
  $stmt = $this->p->prepare("DELETE FROM collaboration WHERE contrat=:contrat");
  $stmt->bindParam(':contrat', $contrat);
  $stmt->execute();
}

public function updateUserpassword($id, $hashed_password1) {
  // Prepare the SQL query using prepared statements to prevent SQL injection attacks
  $stmt = $this->p->prepare("UPDATE brand SET password=:password WHERE id=:id");
  $stmt->bindParam(':password', $hashed_password1);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}
public function insertmessage($envoyer, $recevoir,$message){
  $p=$this->p->prepare("INSERT INTO  chat(envoyer,	recevoir,	message) VALUES(:e,:r,:m)");
  $p->bindValue(":e",$envoyer);
  $p->bindValue(":r",$recevoir);
  $p->bindValue(":m",$message);
  $p->execute();
  return $p;
}
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
public function updateUserphoto($id, $photo){
  $stmt = $this->p->prepare("UPDATE brand SET  photo=:photo WHERE id=:id");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':photo', $photo);
  $stmt->execute();
}
  public function getHashedPassword($email){
    $stmt = $this->p->prepare("SELECT password FROM brand WHERE email=:email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['password'];
}
public function selectmessage($envoyer, $recevoir){
  $stmt = $this->p->prepare("SELECT * FROM chat WHERE ( envoyer=:envoyer and recevoir=:recevoir ) or ( envoyer=:recevoir and recevoir=:envoyer )" );
  $stmt->bindParam(':envoyer', $envoyer);
  $stmt->bindParam(':recevoir', $recevoir);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // use fetchAll instead of fetch
  return $results;
}

public function getbrands(){
  $stmt = $this->p->prepare("SELECT COUNT(id) AS total FROM brand");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $total = $result['total'];
  return $total;
}
public function getInfluencers(){
  $stmt = $this->p->prepare("SELECT * FROM influencer");
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}
public function getInfluencer($inlfluencerid){
  $stmt = $this->p->prepare("SELECT * FROM influencer WHERE username=:username");
  $stmt->bindParam(':username', $inlfluencerid);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}
public function getcollabs(){
  $stmt = $this->p->prepare("SELECT * FROM collaboration");
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}
public function getallbrands(){
  $stmt = $this->p->prepare("SELECT * FROM brand");
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}


public function getnumberofcollabs(){
  $stmt = $this->p->prepare("SELECT COUNT(id) AS total FROM collaboration");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $total = $result['total'];
  return $total;
}

  public function insertsuppdata($username, $influencerORbrand){
    $p=$this->p->prepare("INSERT INTO  demender(username, influencerORbrand) VALUES(:u,:b)");
    $p->bindValue(":u",$username);
    $p->bindValue(":b",$influencerORbrand);
    $p->execute();
  }
    public function insertData($username,$CA,$email,$password,$photo){
    $p=$this->p->prepare("INSERT INTO  brand(username,	CA,	email, password, photo) VALUES(:u,:c,:e,:p,:ph)");
    $p->bindValue(":u",$username);
    $p->bindValue(":c",$CA);
    $p->bindValue(":e",$email);
    $p->bindValue(":p",$password);
    $p->bindValue(":ph",$photo);
    $p->execute();
  }
  public function loginSession($email,$password){
    $stmt = $this->p->prepare("SELECT id, username,photo,email,CA FROM brand WHERE password=:password and email=:email" );
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":password",$password);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result){
        session_start();
        $_SESSION["username"]=$result["username"];
        $_SESSION["id"]=$result["id"];
        $_SESSION["photo"]=$result["photo"];
        $_SESSION["email"]=$result["email"];
        $_SESSION["CA"]=$result["CA"];
        $this->loggedIn = true;
       // var_dump($_SESSION);
    }
  }

}
?>
