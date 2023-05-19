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
  public function getHashedPassword($username){
    $stmt = $this->p->prepare("SELECT password FROM admin WHERE username=:username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['password'];
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
  
  public function getinflu(){
    $stmt = $this->p->prepare("SELECT COUNT(id) AS total FROM influencer");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = $result['total'];
    return $total;
  }
public function getbrands(){
    $stmt = $this->p->prepare("SELECT COUNT(id) AS total FROM brand");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = $result['total'];
    return $total;
  }
  public function deletebrand($username){
    $stmt = $this->p->prepare("DELETE FROM brand WHERE username=:username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
  }
  public function deleteinfluencer($username){
    $stmt = $this->p->prepare("DELETE FROM influencer WHERE username=:username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
  }
  public function updateUserpassword($id, $hashed_password1) {
    // Prepare the SQL query using prepared statements to prevent SQL injection attacks
    $stmt = $this->p->prepare("UPDATE admin SET password=:password WHERE id=:id");
    $stmt->bindParam(':password', $hashed_password1);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
  public function delete($username){
    $stmt = $this->p->prepare("DELETE FROM demender WHERE username=:username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
  }
  public function getInfluencers(){
    $stmt = $this->p->prepare("SELECT * FROM influencer");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
  }
  public function getsupp(){
    $stmt = $this->p->prepare("SELECT * FROM demender");
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
  public function loginSession($username,$password){
    $stmt = $this->p->prepare("SELECT id, username  FROM admin WHERE password=:password and username=:username" );
    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":password",$password);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result){
        session_start();
        $_SESSION["id"]=$result["id"];
        $_SESSION["username"]=$result["username"];
        $this->loggedIn = true;
       // var_dump($_SESSION);
    }
  }

}
?>