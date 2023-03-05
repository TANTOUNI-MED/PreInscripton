<?php

    require_once('Connection.php');
    class Dept{
        private $id_dept;
        private $filier;
        
   

        
        public function __construct(){

        }
        public function getid_dept(){
            return $this->id_dept;
        }
        public function getfilier(){
            return $this->filier;
        }
        
        public function setid_dept($id_dept){
            $this->id_dept=$id_dept;
        }
        public function setnom($filier){
            $this->filier=$filier;
        }
       
       
       


        public function save(){
            $co=new Conn();
            $co->prepare_execute("insert into  dept  (id_dept,filiere)
                             values ('".$this->id_dept."','".$this->filier."')");
        }
        public function showAll(){
            $co=new Conn();
            return $co->prepare_execute("select id_dept,filiere from dept ;");
        }
     
     

    }


?>