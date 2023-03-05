<?php
require_once("Etudiant.php");
require_once("Inscrire.php");
require_once("DateInscriClass.php");
require_once("UsersClass.php");
require_once("TypeBac.php");
session_start();
if (!isset($_SESSION["CNE"])) {
  header("location:Login.php");
}
  $id_insc="";
  $CIN="";
  $CNE="";
  $nom="";
  $prenom="";
  $email="";
  $tele="";
  $adresse="";
  $note_regional="";
  $note_national="";
  $note_general="";
  $nombre_modif="";
  $mention="";
  $date_N="";
  $photo="";
  $bac_doc="";
  $relver_doc="";
  $CIN_Doc="";
  $id_ville="";
  $id_region="";
  $id_bac="";
  $id_date="";
  $id_list="";
  $choix1="";
  $choix2="";
  $etd=new Etudiant();
  $rep=$etd->findEtudiant($_SESSION["CNE"]);
  if($rep){
    $id_insc=$rep["id_insc"];
    $CIN=$rep["CIN"];
    $CNE=$rep["CNE"];
    $nom=$rep["nom"];
    $prenom=$rep["prenom"];
    $email=$rep["email"];
    $tele=$rep["tele"];
    $adresse=$rep["adresse"];
    $note_regional=$rep["note_regional"];
    $note_national=$rep["note_national"];
    $note_general=$rep["note_general"];
    $nombre_modif=$rep["nombre_modif"];
    $mention=$rep["mention"];
    $date_N=$rep["date_N"];
    $photo=strstr(strrev($rep["photo"]),"/",true);
    $bac_doc=strstr(strrev($rep["bac_doc"]),"/",true);
    $relver_doc=strstr(strrev($rep["relver_doc"]),"/",true);
    $CIN_Doc=strstr(strrev($rep["CIN_Doc"]),"/",true);
    $id_ville=$rep["id_ville"];
    $id_region=$rep["id_region"];
    $id_bac=$rep["id_bac"];
    $id_date=$rep["id_date"];
    $id_list=$rep["id_list"];
    $inscrie=new Inscrire();
    $choix1=$inscrie->findIdChoix($id_insc,1);
    $choix2=$inscrie->findIdChoix($id_insc,2);;
  
  }else{
    $CNE=$_SESSION["CNE"];
    $nom=$_SESSION["nom"];
    $prenom=$_SESSION["prenom"];
    $email=$_SESSION["email"];
  }


if (isset($_POST["inscrire"])) {
 
  $etud = new Etudiant();
  
  //  print_r($_FILES);
  $etud->setnom($_POST["nom"]);
  $etud->setprenom($_POST["prenom"]);
  $etud->setCIN($_POST["CIN"]);
  $etud->setCNE($_POST["CNE"]);
  $etud->setadresse($_POST["adresse"]);
  $etud->setmention($_POST["mention"]);
  $etud->setnote_general($_POST["note_general"]);
  $etud->setnote_national($_POST["note_national"]);
  $etud->setnote_regional($_POST["note_regional"]);
  $etud->settele($_POST["tele"]);
  $etud->setid_region($_POST["region"]);
  $etud->setid_ville($_POST["ville"]);
  $etud->setid_bac($_POST["typeBac"]);
  $etud->setemail($_POST["email"]);
  $etud->setdateN($_POST["date_N"]);
  
  function files($file)
  {
    if (!empty($file)) {
      $filename = $file["name"];
      $filetmpname = $file["tmp_name"];
      $filerror = $file["error"];
      if ($filerror === 0) {
        $url = 'images/' . $filename;
        move_uploaded_file($filetmpname, $url);
        return $url;
      }
    }
    return 0;
  }
  $etud->setphoto(files($_FILES["photo"]));
  $etud->setbac_doc(files($_FILES["bac"]));
  $etud->setrelver_doc(files($_FILES["relvet"]));
  $etud->setCIN_Doc(files($_FILES["CIN"]));
  $etud->setchoix1($_POST["choix1"]);
  $etud->setchoix2($_POST["choix2"]);
  $etud->save();


  // if(!empty($_FILES["photo"])){
  //   $filename = $_FILES['photo']["name"];
  //   $filetmpname = $_FILES['photo']["tmp_name"];
  //   $filerror = $_FILES['photo']["error"];
  //   if ($filerror === 0) {
  //           $url = 'images/' . $filename;
  //           move_uploaded_file($filetmpname, $url);
  //           }

  // }
}elseif(isset($_POST["modifier"])){
  $_SESSION["CNE"]=$_POST["CNE"];
  $_SESSION["nom"] =$_POST["nom"];
  $_SESSION["prenom"]=$_POST["prenom"];
  $_SESSION["email"]=$_POST["email"];  
  $etud = new Etudiant();
  
  //  print_r($_FILES);
  $etud->setnom($_POST["nom"]);
  $etud->setprenom($_POST["prenom"]);
  $etud->setCIN($_POST["CIN"]);
  $etud->setCNE($_POST["CNE"]);
  $etud->setadresse($_POST["adresse"]);
  $etud->setmention($_POST["mention"]);
  $etud->setnote_general($_POST["note_general"]);
  $etud->setnote_national($_POST["note_national"]);
  $etud->setnote_regional($_POST["note_regional"]);
  $etud->settele($_POST["tele"]);
  $etud->setid_region($_POST["region"]);
  $etud->setid_ville($_POST["ville"]);
  $etud->setid_bac($_POST["typeBac"]);
  $etud->setemail($_POST["email"]);
  $etud->setdateN($_POST["date_N"]);
  
  function files($file)
  {
    if (!empty($file)) {
      $filename = $file["name"];
      $filetmpname = $file["tmp_name"];
      $filerror = $file["error"];
      if ($filerror === 0) {
        $url = 'images/' . $filename;
        move_uploaded_file($filetmpname, $url);
        return $url;
      }
    }
    return 0;
  }
  $etud->setphoto(files($_FILES["photo"]));
  $etud->setbac_doc(files($_FILES["bac"]));
  $etud->setrelver_doc(files($_FILES["relvet"]));
  $etud->setCIN_Doc(files($_FILES["CIN"]));
 
  $etud->setchoix1($_POST["choix1"]);
  $etud->setchoix2($_POST["choix2"]);
  $user=new Users();
  $user->setemail($_POST["email"]);
  $user->setprenom($_POST["prenom"]);
  $user->setnom($_POST["nom"]);
  $user->setCNE($_POST["CNE"]);
  $user->updateNPE();
   $etud->update();

  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" a href="css/style.css">
</head>

<body>
  <?php require 'navBar.php'; ?>

  <div class="page2">
    <?php
    if (isset($_GET["valide"])) {
    ?>
      <div class="toast-msg"  style="background-color: green;">>
         l'inscreption est bien enregistrer :)
      </div>
    <?php } elseif(isset($_GET["error"])){?>
      <div class="toast-msg" style="background-color: red;">
        cne ou cin exist deja :(
      </div>
    <?php } elseif(isset($_GET["errorChoix"])){ ?>
      <div class="toast-msg" style="background-color: red;">
      Veuillez choisir deux choix différents :(
      </div>    
      <?php }?>
      <?php
    if (isset($_GET["valideModif"])) {
    ?>
    <div class="toast-msg"  style="background-color: green;">>
        votre inscreption est bien modifier :)
      </div>
      <?php } elseif(isset($_GET["errorModif"])){?>
      <div class="toast-msg" style="background-color: red;">
        vous depasser le nombre de modification :(
      </div>
    <?php }?>
    <?php 
    $date=new Date_inscri();
    $rep=$date->showAll();
    $line=$rep->fetch();
    $dateDebut=$line["date_debut"];
    $dateFin=$line["date_fin"];
    if($dateDebut<=date("Y-m-d") && $dateFin >= date("Y-m-d") ){
    ?>
    <div class="container">
      <div class="title">Inscription</div>
      <div class="content">
        <form method="post" action="#" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Nom</span>
              <input type="text" name="nom" value="<?php echo $nom?>" placeholder="Entrer vote nom" required>
            </div>
            <div class="input-box">
              <span class="details">Prenom</span>
              <input type="text" name="prenom" value="<?php echo $prenom?>" placeholder="Entrer votre prenom" required>
            </div>
            <div class="input-box">
              <span class="details">CNE</span>
              <input type="text" disabled   value="<?php echo $CNE?>" placeholder="Entrer votre CNE" required>
              <input type="hidden" name="CNE"    value="<?php echo $CNE?>" placeholder="Entrer votre CNE" required>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="text" name="email" value="<?php echo $email ?>" placeholder="Entrer votre email" required>
            </div>
            <div class="input-box">
              <span class="details">CIN</span>
              <input type="text" name="CIN" value="<?php echo $CIN?>" placeholder="Entrer votre CIN" required>
            </div>
            <div class="input-box">
              <span class="details">tele</span>
              <input type="number" name="tele" value="<?php echo $tele?>" placeholder="Entrer votre tele" required>
            </div>

            <div class="input-box">
              <span class="details">Adresse</span>
              <input type="text" name="adresse" value="<?php echo $adresse?>" placeholder="Entrer votre adresse" required>
            </div>
            <div class="input-box">
              <span class="details">Date de naissance</span>
              <input type="date" name="date_N" value="<?php echo $date_N?>" placeholder="Entrer votre date de naissance" required>
            </div>
            <div class="input-box">
              <span class="details">Type de bac</span>
              <select name="typeBac" id="" required>
                <option selected disabled value="">Choisir votre type de bac</option>
                <?php
                $typeBac = new TypeBac();
                $res = $typeBac->showAll();
                while ($line = $res->fetch()) {
                  if($id_bac==$line["id_bac"]){
                    ?>
                   <option selected value="<?php echo $line["id_bac"] ?>"><?php echo $line["type_bac"] ?></option>
                    <?php
                     }else{
                      ?>
                         <option value="<?php echo $line["id_bac"] ?>"><?php echo $line["type_bac"] ?></option>
                    <?php
                     }
                 ?>


                <?php
                }

                ?>
              </select>

            </div>
            <div class="input-box">
              <span class="details">Note regional</span>
              <input type="number" name="note_regional" value="<?php echo $note_regional ?>" min="10" max="20" placeholder="Entrer votre Note regional" required>
            </div>
            <div class="input-box">
              <span class="details">Note national</span>
              <input type="number" name="note_national" value="<?php echo $note_national ?>" min="10" max="20" placeholder="Entrer votre Note national" required>
            </div>
            <div class="input-box">
              <span class="details">Note general</span>
              <input type="number" name="note_general" value="<?php echo $note_general ?>" min="10" max="20" placeholder="Entrer votre Note general" required>
            </div>
            <div class="input-box">
              <span class="details">Mention</span>
              <select name="mention" required>
              <?php if($mention){?><option selected value="<?php echo $mention?>"><?php echo $mention?></option>
              <?php } if($mention==""){?><option selected disabled>Choisir votre Mention</option>
              <?php } if($mention!="passable"){?><option value="passable">passable</option>
              <?php } if($mention!="assez bien"){?><option value="assez bien">assez bien</option>
              <?php } if($mention!="bien"){?><option value="bien">bien</option>
              <?php } if($mention!="tres bien") {?><option value="tres bien">tres bien</option>
                <?php }?>
              </select>
            </div>
            <div class="input-box">
              <span class="details">Region</span>
              <select name="region" id="" required>
                <option selected disabled value="">Choisir votre region</option>
                <?php
                require_once("RegionClass.php");
                $region = new Region();
                $rep = $region->showAll();
                while ($line = $rep->fetch()) {
                  if($id_region==$line["id_region"]){
                    ?>
                   <option selected value="<?php echo $line["id_region"] ?>"><?php echo $line["region"] ?></option>
                    <?php
                     }else{
                      ?>
                         <option value="<?php echo $line["id_region"] ?>"><?php echo $line["region"] ?></option>
                    <?php
                     }
                 ?>


                <?php
                }
             
                ?>
              </select>
            </div>
            <div class="input-box">
              <span class="details">Ville</span>
              <select name="ville" id="" required>
                <option selected disabled value="">Choisir votre ville</option>
                <?php
                require_once("VilleClass.php");
                $ville = new Ville();
                $rep = $ville->showAll();
                while ($line = $rep->fetch()) {
                  if($id_ville==$line["id_ville"]){
                    ?>
                   <option selected value="<?php echo $line["id_ville"] ?>"><?php echo $line["ville"] ?></option>
                    <?php
                     }else{
                      ?>
                         <option value="<?php echo $line["id_ville"] ?>"><?php echo $line["ville"] ?></option>
                    <?php
                     }
                 ?>


                <?php
                }
                
                ?>
              </select>
            </div>

            <div class="input-box">
              <span class="details">photo</span>
              <input type="file" name="photo" value="<?php echo $photo ?>" accept="" required>
            </div>
            <div class="input-box">
              <span class="details">Doc baccalaureat</span>
              <input type="file" name="bac" value="<?php echo $bac_doc ?>" required>
            </div>
            <div class="input-box">
              <span class="details">Doc relvet de note</span>
              <input type="file" name="relvet" value="<?php echo $relver_doc ?>" required>
            </div>
            <div class="input-box">
              <span class="details">Doc CIN</span>
              <input type="file" name="CIN"  value="<?php echo $CIN_Doc ?>" required>
            </div>
            <div class="input-box">
              <span class="details">choix 1 de filier</span>
              <select name="choix1" id="" required>
                <option selected disabled value="">Choisir votre 1ere choix</option>
                <?php
                require_once("DeptClass.php");
                $dept = new Dept();
                $rep = $dept->showAll();
                while ($line = $rep->fetch()) {
                  if($choix1==$line["id_dept"]){
                    ?>
                    <option selected value="<?php echo $line["id_dept"] ?>"><?php echo $line["filiere"] ?></option>
                    <?php
                     }else{
                      ?>
                         <option  value="<?php echo $line["id_dept"] ?>"><?php echo $line["filiere"] ?></option>
                    <?php
                     }
                 ?>


                <?php
                }
                ?>
              </select>
            </div>
            <div class="input-box">
              <span class="details">choix 2 de filier</span>
              <select name="choix2" id="" required>
                <option selected disabled value="">Choisir 2eme choix</option>
                <?php
                require_once("DeptClass.php");
                $dept = new Dept();
                $rep = $dept->showAll();
                while ($line = $rep->fetch()) {
                  if($choix2==$line["id_dept"]){
                    ?>
                    <option selected value="<?php echo $line["id_dept"] ?>"><?php echo $line["filiere"] ?></option>
                    <?php
                     }else{
                      ?>
                         <option  value="<?php echo $line["id_dept"] ?>"><?php echo $line["filiere"] ?></option>
                    <?php
                     }
                 ?>


                <?php
                }
                ?>
              </select>
            </div>
          </div>
          
          <?php if($id_insc) {?>
          <div class="button">
            <input type="submit" name="modifier" value="Modifier">
          </div>
          <?php }else { ?>
          <div class="button">
            <input type="submit" name="inscrire" value="Inscrire">
          </div>
          <?php } ?>
        </form>
      </div>
    </div>
    <?php } else{?>
      <div class="toast-msg"style=" color:black; background-color: #ecc103;">
        la date d'inscription est terminer :(
      </div>
    <?php }?>
  </div>

</body>

</html>