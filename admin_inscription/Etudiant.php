<?php

    require_once('Connection.php');
    require_once('Inscrire.php');
    class Etudiant{
        private $id_insc;
        private $CIN;
        private $CNE;
        private $nom;
        private $prenom;
        private $email;
        private $tele;
        private $adresse;
         private $note_regional;
         private $note_national;
         private $note_general;
         private $nombre_modif;
         private $mention;
         private $date_N;
         private $photo;
         private $bac_doc;
         private $relver_doc;
         private $CIN_Doc;
         private $id_ville;
         private $id_region;
         private $id_bac;
         private $id_date;
         private $id_list;
         private $choix1;
         private $choix2;


        public function __construct(){

        }
        public function getCIN(){
            return $this->CIN;
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
        public function gettele(){
            return $this->tele;
        }
        public function getadresse(){
            return $this->adresse;
        }
        public function getnote_regional(){
            return $this->note_regional;
        }
        public function getnote_national(){
            return $this->note_national;
        }
        public function getnote_general(){
            return $this->note_general;
        }
        public function getnombre_modif(){
            return $this->nombre_modif;
        }
        public function getmention(){
            return $this->mention;
        } 
        public function getdateN(){
            return $this->date_N;
        }
        public function getphoto(){
            return $this->photo;
        }
        public function getbac_doc(){
            return $this->bac_doc;
        }
        public function getrelver_doc(){
            return $this->relver_doc;
        }
        public function getCIN_Doc(){
            return $this->CIN_Doc;
        }
        public function getid_ville(){
            return $this->id_ville;
        }
        public function getid_region(){
            return $this->id_region;
        }
        public function getid_bac(){
            return $this->id_bac;
        }
        public function getid_date(){
            return $this->id_date;
        }
        public function getid_list(){
            return $this->id_list;
        }
        public function get_choix1(){
            return $this->choix1;
        }
        public function get_choix2(){
            return $this->choix2;
        }

        public function setCIN($CIN){
            $this->CIN=$CIN;
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
         public function settele($tele){
            $this->tele=$tele;
        }

        public function setchoix1($choix1){
            $this->choix1=$choix1;
        }  
         public function setchoix2($choix2){
            $this->choix2=$choix2;
        }


        
        public function setadresse($adresse){
             $this->adresse=$adresse;
        }
        public function setnote_regional($note_regional){
             $this->note_regional=$note_regional;
        }
        public function setnote_national($note_national){
             $this->note_national=$note_national;
        }
        public function setnote_general($note_general){
             $this->note_general=$note_general;
        }
        public function setnombre_modif($nombre_modif){
             $this->nombre_modif=$nombre_modif;
        }
        public function setmention($mention){
             $this->mention=$mention;
        } 
        public function setdateN($date_N){
             $this->date_N=$date_N;
        }
            
            public function setphoto($photo){
             $this->photo=$photo;
        }
        public function setbac_doc($bac_doc){
             $this->bac_doc=$bac_doc;
        }
        public function setrelver_doc($relver_doc){
             $this->relver_doc=$relver_doc;
        }
        public function setCIN_Doc($CIN_Doc){
             $this->CIN_Doc=$CIN_Doc;
        }
        public function setid_ville($id_ville){
             $this->id_ville=$id_ville;
        }
        public function setid_region($id_region){
             $this->id_region=$id_region;
        }
        public function setid_bac($id_bac){
             $this->id_bac=$id_bac;
        }
        public function setid_date($id_date){
             $this->id_date=$id_date;
        }
        public function setid_list($id_list){
             $this->id_list=$id_list;
        }


        public function save(){
            $co=new Conn();
            if($this->verifeyCin() === 0 && $this->verifeyCne() === 0 ){
                if($this->choix1!=$this->choix2){
                $co->prepare_execute("insert into etudiant (CIN,nom,prenom,CNE,email,tele,adresse,note_regional,note_national,note_general
                                ,mention,date_N,photo,bac_doc,relver_doc,CIN_Doc,id_ville,id_region,id_bac)
                                values ('".$this->CIN."','".$this->nom."','".$this->prenom."','".$this->CNE."','".$this->email."','".$this->tele."','".$this->adresse."',
                                '".$this->note_regional."','".$this->note_national."','".$this->note_general."','".$this->mention."','".$this->date_N."'
                                ,'".$this->photo."','".$this->bac_doc."','".$this->relver_doc."','".$this->CIN_Doc."','".$this->id_ville."','".$this->id_region."'
                                ,'".$this->id_bac."')"); 
                $insc1=new Inscrire();
                $insc1->setid_insc($insc1->findIdEtudiant($this->CNE));
                $insc1->setid_dept($this->choix1);
                $insc1->save(1);
                $insc2=new Inscrire();
                $insc2->setid_insc($insc2->findIdEtudiant($this->CNE));
                $insc2->setid_dept($this->choix2);
                $insc2->save(2); 
                header("location:Home.php?valide");  
                    }else  header("location:Home.php?errorChoix");          
            } else{
                header("location:Home.php?error");              
            }

        }
        public function update(){
            $co=new Conn();
            $nbmodif=$this->findNombreModif();
           
                if($this->choix1!=$this->choix2){
                    if($nbmodif<2){
                        $co->prepare_execute("update etudiant set CIN='".$this->CIN."',nom='".$this->nom."',prenom='".$this->prenom."',CNE='".$this->CNE."',email='".$this->email."',tele='".$this->tele."',adresse='".$this->adresse."',note_regional='".$this->note_regional."',note_national='".$this->note_national."',note_general='".$this->note_general."',
                        nombre_modif=nombre_modif+1,mention='".$this->mention."',date_N='".$this->date_N."',photo='".$this->photo."',bac_doc='".$this->bac_doc."',relver_doc='".$this->relver_doc."',CIN_Doc='".$this->CIN_Doc."',id_ville='".$this->id_ville."',id_region='".$this->id_region."',id_bac='".$this->id_bac."' where CNE='".$this->CNE."'");
                        $insc1=new Inscrire();
                        $insc1->setid_insc($insc1->findIdEtudiant($this->CNE));
                        $insc1->setid_dept($this->choix1);
                        $insc1->update(1);
                        $insc2=new Inscrire();
                        $insc2->setid_insc($insc2->findIdEtudiant($this->CNE));
                        $insc2->setid_dept($this->choix2);
                        $insc2->update(2); 
                        header("location:Home.php?valideModif");
                        }else{
                            header("location:Home.php?errorModif"); 
                        }
                }else  header("location:Home.php?errorChoix"); 
            }


            

        

        public function verifeyCne(){
            $co=new Conn();
            $result = $co->prepare_execute("select CNE FROM etudiant WHERE CNE = '$this->CNE';");
            return count($result->fetchAll());
        }
        
        public function verifeyCin(){
            $co=new Conn();
            $result = $co->prepare_execute("select CNE FROM etudiant WHERE CNE = '$this->CNE';");
            return count($result->fetchAll());
        }
        public function findEtudiant($cne){
            $co=new Conn();
            $rep=$co->prepare_execute("select * from etudiant where CNE='".$cne."'");
            return $rep->fetch();
              
        }
        public function findNombreModif(){
            $co=new Conn();
            $rep=$co->prepare_execute("select nombre_modif from etudiant where CNE='".$this->CNE."'");
            return $rep->fetch()["nombre_modif"];
              
        }

         
        public function findEtudiantsByDept($dept){
            $co=new Conn();
            $rep=$co->prepare_execute("select et.CNE,et.nom,et.prenom,et.CIN,et.date_N,((note_regional*0.25)+(note_national*0.75)) as note,filiere
            FROM `etudiant` as et INNER JOIN inscrire as insc on et.id_insc=insc.id_insc INNER JOIN dept
            on insc.id_dept=dept.id_dept where insc.id_dept='".$dept."' ORDER BY note DESC;");
             return $rep;
        }

    }


?>