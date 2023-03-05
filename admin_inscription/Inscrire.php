<?php

    require_once('Connection.php');
    class Inscrire{
        private $id_dept;
        private $id_insc;
        private $ordre;
   

        
        public function __construct(){

        }
        public function getid_dept(){
            return $this->id_dept;
        }
        public function getid_insc(){
            return $this->id_insc;
        }
        public function getordre(){
            return $this->ordre;
        }
        public function setid_dept($id_dept){
            $this->id_dept=$id_dept;
        }
        public function setid_insc($id_insc){
            $this->id_insc=$id_insc;
        }
        public function setCNE($ordre){
            $this->ordre=$ordre;
        }
       
       
        public function findIdEtudiant($cne){
            $co=new Conn();
            $rep=$co->prepare_execute("select id_insc from etudiant where CNE='".$cne."'");
            return $rep->fetch()["id_insc"];
              
        }
        public function findIdChoix($id_etud,$order){
            $co=new Conn();
            $rep=$co->prepare_execute("select id_dept from inscrire where id_insc='".$id_etud."' and ordre='".$order."' ");
            return $rep->fetch()["id_dept"];
              
        }

        public function save($n){
            $co=new Conn();
            $co->prepare_execute("insert into  inscrire  (id_dept,id_insc,ordre)
                             values ('".$this->id_dept."','".$this->id_insc."','".$n."')");
        }
        public function update($n){
            $co=new Conn();
            $co->prepare_execute("update inscrire set  id_dept='".$this->id_dept."'
                             where id_insc='".$this->id_insc."' and ordre='".$n."'");
        }

     
     

    }


?>