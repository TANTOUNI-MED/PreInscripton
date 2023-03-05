<?php

require_once("DeptClass.php");
require_once("Etudiant.php");
session_start();
if (!isset($_SESSION["loginA"])) {
  header("location:Login.php");
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

<body class="page2">
  <div class="wrapper">
    <?php require_once('navbar.php'); ?>
    <div class="main_contentH">
      <form method="post" action="#" style="width: 70% ;" class="filiere-ajout">
        <select name="filiere" required>
          <option selected disabled value="">Rechercher une filiere 'GI,TM...</option>
          <?php
          $dpt = new Dept();
          $rp = $dpt->showAll();
          while ($line = $rp->fetch()) {
          ?>
            <option value="<?php echo $line["id_dept"] ?>"><?php echo $line["filiere"] ?></option>
          <?php
          }
          ?>
        </select>
        <button type="submit" name="submitSearch">Rechercher</button>
      </form>
      <?php
      $dept = new Dept();
      if (isset($_POST["submitSearch"])) {
        $rep = $dept->findDeptById($_POST["filiere"]);
      } else {

        $rep = $dept->showAll();
      }

      while ($line = $rep->fetch()) {
      ?>
        <div class="main_contentV">
          <h1><?php echo $line["filiere"] ?></h1>
          <table>
            <tr class="thead">
              <th>CNE</th>
              <th>NOM</th>
              <th>PRENOM</th>
              <th>CIN</th>
              <th>DATE NAISSANCE</th>
              <th>NOTE</th>
            </tr>
            <?php
            $etud = new Etudiant();
            $rep2 = $etud->findEtudiantsByDept($line["id_dept"]);
            while ($line2 = $rep2->fetch()) {
            ?>
              <tr>
                <td><?php echo $line2["CNE"] ?></td>
                <td><?php echo $line2["nom"] ?></td>
                <td><?php echo $line2["prenom"] ?></td>
                <td><?php echo $line2["CIN"] ?></td>
                <td><?php echo $line2["date_N"] ?></td>
                <td><?php echo $line2["note"] ?></td>
              </tr>
            <?php } ?>
          </table>
        </div>
      <?php } ?>


    </div>
  </div>

</body>

</html>