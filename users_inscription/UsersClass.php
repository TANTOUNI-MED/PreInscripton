<?php

    require_once('Connection.php');
    class Users{
        private $id_user;
        private $password;
        private $CNE;
        private $nom;
        private $prenom;
        private $email;

        
        public function __construct(){

        }
        public function getpassword(){
            return $this->password;
        }
        public function getnom(){
            return $this->nom;
        }
        public function getprenom(){
            return $this->prenom;
        }
        public function getCNE(){
            return $this->CNE;
        }
        public function getemail(){
            return $this->email;
        }


        public function setpassword($password){
            $this->password=$password;
        }
        public function setnom($nom){
            $this->nom=$nom;
        }
        public function setCNE($CNE){
            $this->CNE=$CNE;
        }
        public function setemail($email){
            $this->email=$email;
        }
        public function setprenom($prenom){
            $this->prenom=$prenom;
        }
       


        public function save(){
            $co=new Conn();
            // echo "fdfcccccccccccccccccccccc   ".$this->verifeyCne();
            // echo "fdfcccccccccccccccccccccc   ".$this->verifeyEmail();
            if($this->verifeyCne() === 0 && $this->verifeyEmail() === 0){ 
                     
              $co->prepare_execute("insert into  users  (CNE,password,nom,prenom,email)
                 values ('".$this->CNE."','".$this->password."','".$this->nom."','".$this->prenom."','".$this->email."')");
            }else{
                header("location:AjoutEtudiant.php?error");
            }
        }
        public function verifeyCne(){
            $co=new Conn();
            $result = $co->prepare_execute("select CNE FROM etudiant WHERE CNE = '$this->CNE';");
            return count($result->fetchAll());
        }
        public function verifeyEmail(){
            $co=new Conn();
            $result = $co->prepare_execute("select email FROM etudiant WHERE email = '$this->email';");
            return count($result->fetchAll());
        }
    
        public function testLogin(){
            
            $co=new Conn();
            return $co->prepare_execute("select password,CNE,nom,prenom,email from users where password ='".$this->password."' and CNE ='".$this->CNE."'");
            

        }
        public function updateNPE(){
            
            $co=new Conn();
            return $co->prepare_execute("update users set nom='".$this->nom."',prenom='".$this->prenom."',email='".$this->email."' where CNE ='".$this->CNE."'");
            

        }
     

    }


?>