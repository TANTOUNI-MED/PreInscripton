<?php

    require_once('Connection.php');
    class ListAdmis{
        private $id_dept;
        private $id_insc;
        private $note;
   

        
        public function __construct(){

        }
        public function getid_dept(){
            return $this->id_dept;
        }
        public function getid_insc(){
            return $this->id_insc;
        }
        public function getnote(){
            return $this->note;
        }
        public function setid_dept($id_dept){
            $this->id_dept=$id_dept;
        }
        public function setid_insc($id_insc){
            $this->id_insc=$id_insc;
        }
        public function setnote($note){
            $this->note=$note;
        }
       
       
        public function findDeptIfexist($id){
            $co=new Conn();
            $rep=$co->prepare_execute("select id_dept from admi where id_dept='".$id."'");
            return count($rep->fetchAll());
              
        }
        public function lister($idDept,$nb){
            $co=new Conn();
            $rep=$co->prepare_execute("select et.id_insc,dept.id_dept,((note_regional*0.25)+(note_national*0.75))*cn.coeff as note 
                                        FROM `etudiant` as et INNER JOIN inscrire as insc on et.id_insc=insc.id_insc 
                                        INNER JOIN dept on insc.id_dept=dept.id_dept 
                                        INNER JOIN type_bac as tb on et.id_bac=tb.id_bac
                                        INNER JOIN concerner as cn on et.id_bac=cn.id_bac AND insc.id_dept=cn.id_dept 
                                        where insc.id_dept='".$idDept."' ORDER BY note DESC LIMIT $nb");
           while($line=$rep->fetch()){
            $this->save($line["id_insc"],$line["id_dept"],$line["note"]);
           }
        }

        public function save($idEtud,$idDept,$n){
            $co=new Conn();
            $co->prepare_execute("insert into  admi  (id_dept,id_insc,note)
                             values ('".$idDept."','".$idEtud."','".$n."')");
        }
        public function showListAdmiByDept($IdDept){
            $co=new Conn();
            return $co->prepare_execute("select et.CNE,et.nom,et.prenom,et.CIN,et.date_N,tb.type_bac,ad.note 
                                        FROM `etudiant` as et INNER JOIN admi as ad on et.id_insc=ad.id_insc 
                                        INNER JOIN dept on ad.id_dept=dept.id_dept INNER JOIN
                                        type_bac as tb on et.id_bac=tb.id_bac where dept.id_dept='".$IdDept."' ORDER BY note DESC;");

        }
      

     
     

    }


?>