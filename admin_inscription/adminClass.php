<?php

    require_once('Connection.php');
    class Admin{
        private $id_admin;
        private $password;
        private $login;
        private $nom;
        private $prenom;
      

        
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
        public function getlogin(){
            return $this->login;
        }
      


        public function setpassword($password){
            $this->password=$password;
        }
        public function setnom($nom){
            $this->nom=$nom;
        }
        public function setlogin($login){
            $this->login=$login;
        }
     
        public function setprenom($prenom){
            $this->prenom=$prenom;
        }
       
        public function testLogin(){
            $co=new Conn();
            return $co->prepare_execute("select password,login,nom,prenom from admin where password ='".$this->password."' and login ='".$this->login."'");
            

        }
     

    }


?>