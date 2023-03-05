<?php

    require_once('Connection.php');
    class Date_inscri{
        private $id_date;
        private $date_debut;
        private $date_fin;
        
        public function __construct(){

        }
        public function getid_date(){
            return $this->id_date;
        }
        public function getdate_debut(){
            return $this->date_debut;
        }
        public function getdate_fin(){
            return $this->date_fin;
        }
       


        public function setpassword($id_date){
            $this->id_date=$id_date;
        }
        public function setnom($date_debut){
            $this->date_debut=$date_debut;
        }
        public function setCNE($date_fin){
            $this->date_fin=$date_fin;
        }
     
       


        public function save(){
            $co=new Conn();
            $co->prepare_execute("insert into  date_inscri  (date_debut,date_fin)
                             values ('".$this->date_debut."','".$this->date_fin."')");
        }
        public function showAll(){
            $co=new Conn();
            return $co->prepare_execute("select date_debut,date_fin
                             from date_inscri");
        }
        
     

    }


?>