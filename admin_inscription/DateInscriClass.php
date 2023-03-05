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
       


        public function setid_date($id_date){
            $this->id_date=$id_date;
        }
        public function setdate_debut($date_debut){
            $this->date_debut=$date_debut;
        }
        public function setdate_fin($date_fin){
            $this->date_fin=$date_fin;
        }
     
       


        public function save(){
            $co=new Conn();
            $co->prepare_execute("insert into  date_inscri  (date_debut,date_fin)
                             values ('".$this->date_debut."','".$this->date_fin."')");
        }
        public function showAll(){
            $co=new Conn();
            return $co->prepare_execute("select *
                             from date_inscri");
        }
        public function updateFin($d){
            $co=new Conn();
            return $co->prepare_execute("update date_inscri set date_fin='".$this->date_fin."'
                             where id_date='".$d."'");
        }
        public function updateDebut($d){
            $co=new Conn();
            $dateFin=$this->getDateFin($d);
            if($dateFin>$this->date_debut){
                 $co->prepare_execute("update date_inscri set date_debut='".$this->date_debut."'
                                 where id_date='".$d."'");
            }  
        }
        public function getDateFin($d){
            $co=new Conn();
            $rep= $co->prepare_execute("select date_fin from date_inscri 
                                                where id_date='".$d."'");
            return $rep->fetch()['date_fin'];
        }
        
     

    }


?>