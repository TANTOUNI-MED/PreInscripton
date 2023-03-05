<?php

    require_once('Connection.php');
    class Ville{
       
        public function __construct(){

        }
       
        public function showAll(){
            $co=new Conn();
            return $co->prepare_execute("select id_ville,ville from ville ;");
        }
     

    }


?>