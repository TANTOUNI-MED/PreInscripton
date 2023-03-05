<?php

    require_once('Connection.php');
    class Region{
        public function __construct(){

        }
       
        public function showAll(){
            $co=new Conn();
            return $co->prepare_execute("select id_region,region from region ;");
        }
    }


?>