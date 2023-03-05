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
            if($this->findDeptByNomm($this->filier)==0){
                 $co->prepare_execute("insert into  dept (filiere)
                             values ('".$this->filier."')");
            }
           
        }
        public function update(){
            $co=new Conn();
            $co->prepare_execute("update dept set  filiere='".$this->filier."'
                                where id_dept='".$this->id_dept."'");
        }
        public function showAll(){
            $co=new Conn();
            return $co->prepare_execute("select id_dept,filiere from dept ;");
        }
        public function delete($id){
            $co=new Conn();
            return $co->prepare_execute("delete from dept where id_dept='".$id."';");
        }
       public function findDeptById($n){
        $co=new Conn();
        return $co->prepare_execute("select id_dept,filiere from dept where id_dept='".$n."';");
          
       }
       public function findDeptByNomm($n){
        $co=new Conn();
        $rep=$co->prepare_execute("select id_dept,filiere from dept where filiere='".$n."';");
        return count($rep->fetchAll());
       }
     
     

    }


?>