<?php
    require_once("db.php");
    class configuration {
        private $id;
        private $name;
        private $email;
        private $phone;
        private $file;
        private $passsword;
        private $confirmpassword;
        public $conn;

        public function __construct($id=0, $name="", $email="", $phone="", $file="", $passsword="", $confirmpassword=""){
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->file = $file;
            $this->passsword = $passsword;
            $this->confirmpassword = $confirmpassword;
            $this->conn = new PDO("mysql:host=localhost;dbname=newevent", "root", "", [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }
        public function setid($id) {
            $this->id = $id;
        }
        public function getid() {
            return $this->id;
        }
        public function setname($name) {
            $this->name= $name;
        }
        public function getname() {
            return $this->name;
        }
        public function setemail($email) {
            $this->email = $email;
        }
        public function getemail() {
            return $this->email;
        }
        public function setphone($phone) {
            $this->phone = $phone;
        }
        public function getphone() {
            return $this->phone;
        }
        public function setfile($file) {
            $this->file = $file;
        }
        public function getfile() {
            return $this->file;
        }
        public function setpasssword($passsword) {
            $this->passsword = $passsword;
        }
        public function getpasssword() {
            return $this->passsword;
        }
        public function setconfirmpassword($confirmpassword) {
            $this->confirmpassword = $confirmpassword;
        }
        public function getconfirmpassword(){
            return $this->confirmpassword;
        } 
        public function Insertuserinfo() {
            try{
                $stmt = $this->conn->prepare("INSERT INTO userinfo (name, email, phone, file, passsword) 
                VALUES (:name, :email, :phone, :file, :passsword)");
                 $stmt->bindParam(':name', $this->name);
                 $stmt->bindParam(':email', $this->email);
                 $stmt->bindParam(':phone', $this->phone);
                 $stmt->bindParam(':file', $this->file);
                 $stmt->bindParam(':passsword', $this->passsword);
                 $stmt->execute();
                 header("location:../process/login.php");
                 die();
            }
            catch(PDOException $e) {
                echo "ERROR: " . $e->getMessage();
       }  
      }
      public function login($email, $passsword) {
        try {
            $stmt = $this->conn->prepare("SELECT id FROM userinfo WHERE email = :email AND passsword = :passsword");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':passsword', $passsword);
            $stmt->execute();
            $result = $stmt->fetch();
            if ($result) {
                return $result['id'];
            }
            return false;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    public function fetchuser($id) {
        try {
            $stmt = $this->conn->prepare("SELECT id, name, email, phone, file, date FROM userinfo WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    public function Edituser($name, $email, $phone, $file, $id) {
        try {
            $stmt = $this->conn->prepare("UPDATE userinfo SET name = ?, email = ?, phone = ?, file = ? WHERE id = ?");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':file', $file);
            $stmt->execute([$this->name,$this->email,$this->phone,$this->file,$this->id]);
            return $stmt->fetch();
            header("location:../userdata/profile.php");
            die();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    
    }
?>
