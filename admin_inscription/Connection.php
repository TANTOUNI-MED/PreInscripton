<?php
  class Conn{
      private $db_host="localhost";
      private $db_name="inscription";
      private $db_pass="";
      private $db_user="root";
      private $bdd;
      private $statement;
      private $error;
      public function __construct(){
            $con='mysql:host='.$this->db_host.';dbname='.$this->db_name.'';
          try{
              $this->bdd=new PDO($con,$this->db_user,$this->db_pass);

          }catch(Exception $e){
              $this->error=$e->getMessage();
              echo $this->error;

          }

      }
      public function prepare_execute($req){
        $this->statement= $this->bdd->prepare($req);
         $this->statement->execute();
         return $this->statement;
      }
      

  }
?>