<?php
 require_once("db.php");
class eventconfig {
    private $id;
    private $eventname;
    private $eventphoto;
    private $location;
    private $datee;
    private $details;
    private $user_id;
    public $conn;

    public function __construct($id=0, $eventname="", $eventphoto="", $location="", $datee="", $details="", $user_id=0) {
        $this->id = $id;
        $this->eventname = $eventname;
        $this->eventphoto = $eventphoto;
        $this->location = $location;
        $this->datee = $datee;
        $this->details = $details;
        $this->user_id = $user_id;
        $this->conn = new PDO("mysql:host=localhost;dbname=newevent", "root", "", [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    public function setid($id){
        $this->id = $id;
    }
    public function getid(){
        return $this->id;
    }
    public function seteventname($eventname){
        $this->eventname = $eventname;
    }
    public function geteventname(){
        return $this->eventname;
    }
    public function seteventphoto($eventphoto){
        $this->eventphoto = $eventphoto;
    }
    public function geteventphoto(){
        return $this->eventphoto;
    }
    public function setlocation($location){
        $this->location = $location;
    }
    public function getlocation(){
        return $this->location;
    }
    public function setdatee($datee){
        $this->datee = $datee;
    }
    public function getdatee(){
        return $this->datee;
    }
    public function setdetails($details){
        $this->details = $details;
    }
    public function getdetails(){
        return $this->details;
    }
    public function setuser_id($user_id){
        $this->user_id = $user_id;
    }
    public function getuser_id(){
        return $this->user_id;
    }
    public function addevent(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO eventinfo (eventname, eventphoto, location, datee, details, user_id) 
            VALUES (:eventname, :eventphoto, :location, :datee, :details, :user_id)");
             $stmt->bindParam(':eventname', $this->eventname);
             $stmt->bindParam(':eventphoto', $this->eventphoto);
             $stmt->bindParam(':location', $this->location);
             $stmt->bindParam(':datee', $this->datee);
             $stmt->bindParam(':details', $this->details);
             $stmt->bindParam(':user_id', $this->user_id);
             $stmt->execute();
            echo "<script>alert('Your Event has been created successfully');document.location='../userdata/profile.php'</script>";
            die();
        }
        catch(PDOException $e) {
            echo "ERROR: " . $e->getMessage();
   }  
    }
    public function collecteventdata(){
        $this->setuser_id( $_SESSION['user_id']);
        try{
            $stmt = $this->conn->prepare("SELECT id, user_id, eventname, eventphoto, location, datee, details FROM eventinfo WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            // return $_SESSION['user_id'];
        }
        catch(PDOException $e) {
            echo "ERROR: " . $e->getMessage();
   }  
    }
    public function homeeventdata(){
        // $this->setuser_id( $_SESSION['user_id']);
        try{
            $stmt = $this->conn->prepare("SELECT * FROM eventinfo ORDER BY id DESC LIMIT 6");
            // $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            // return $_SESSION['user_id'];
        }
        catch(PDOException $e) {
            echo "ERROR: " . $e->getMessage();
   }  
    }
    public function alleventdata(){
        // $this->setuser_id( $_SESSION['user_id']);
        try{
            $stmt = $this->conn->prepare("SELECT * FROM eventinfo ORDER BY id DESC");
            // $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            // return $_SESSION['user_id'];
        }
        catch(PDOException $e) {
            echo "ERROR: " . $e->getMessage();
   }  
    }
    public function collectoneeventdata($id){
        $this->setuser_id( $_SESSION['user_id']);
        try{
            $stmt = $this->conn->prepare("SELECT id, user_id, eventname, eventphoto, location, datee, details FROM eventinfo WHERE id = :id");
            $stmt->bindParam('id', $this->id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            // return $_SESSION['user_id'];
        }
        catch(PDOException $e) {
            echo "ERROR: " . $e->getMessage();
   }  
    }
    public function collectoneeventdataone($id){
        
        try{
            $stmt = $this->conn->prepare("SELECT id, user_id, eventname, eventphoto, location, datee, details FROM eventinfo WHERE id = :id");
            $stmt->bindParam('id', $this->id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            // return $_SESSION['user_id'];
        }
        catch(PDOException $e) {
            echo "ERROR: " . $e->getMessage();
   }  
    }
    public function updateeventimg($eventname,$eventphoto,$location,$datee,$details,$id){
        try{
            $stmt = $this->conn->prepare("UPDATE eventinfo SET eventname = ?, eventphoto = ?, location = ?, datee = ?, details =?  WHERE id = ?");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':eventname', $eventname);
            $stmt->bindParam(':eventphoto', $eventphoto);
            $stmt->bindParam(':location', $location);
            $stmt->bindParam(':datee', $datee);
            $stmt->bindParam(':details', $details);
            $stmt->execute([$this->eventname,$this->eventphoto,$this->location,$this->datee,$this->details,$this->id]);
            return $stmt->fetch();
            header("location:../userdata/profile.php");
            die();
        }
        catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    public function updateevent($eventname,$location,$datee,$details,$id){
        try{
            $stmt = $this->conn->prepare("UPDATE eventinfo SET eventname = ?, location = ?, datee = ?, details =?  WHERE id = ?");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':eventname', $eventname);
            $stmt->bindParam(':location', $location);
            $stmt->bindParam(':datee', $datee);
            $stmt->bindParam(':details', $details);
            $stmt->execute([$this->eventname,$this->location,$this->datee,$this->details,$this->id]);
            return $stmt->fetch();
            header("location:../userdata/profile.php");
            die();
        }
        catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    public function deletevent() {
        try{
            $stmt = $this->conn->prepare("DELETE FROM eventinfo WHERE id = ?");
            $stmt->execute([$this->id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "<script>alert('Event deleted Successfully');document.location='../userdata/profile.php'</script>";
        }
        catch(PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}
?>