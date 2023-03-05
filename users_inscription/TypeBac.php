<?php

    require_once('Connection.php');
    class TypeBac{
        private $id_bac;

        private $type_bac;

        private $coeff;

        
        public function __construct(){

        }
        public function getid_bac(){
            return $this->id_bac;
        }
        public function gettype_bac(){
            return $this->type_bac;
        }
  


        public function setpassword($id_bac){
            $this->id_bac=$id_bac;
        }
        public function setnom($type_bac){
            $this->type_bac=$type_bac;
        }
     
     
       


        public function save(){
            $co=new Conn();
            $co->prepare_execute("insert into  type_bac  (id_bac,type_bac)
                             values ('".$this->id_bac."','".$this->type_bac."')");
        }
        public function showAll(){
            $co=new Conn();
            return $co->prepare_execute("select id_bac,type_bac from type_bac ;");
        }
     

    }


?>