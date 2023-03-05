<?php 
session_start();
if (!isset($_SESSION["loginA"])) {
  header("location:Login.php");
}
require_once("DateInscriClass.php");

if (isset($_POST["submitModifD"])) {
    $dtInsc = new Date_inscri();
    $dtInsc->setdate_debut($_POST["date_debut"]);
    $dtInsc->updateDebut($_POST["id_date"]);
} elseif (isset($_POST["submitModifF"])) {
    $dtInsc = new Date_inscri();
    $dtInsc->setdate_fin($_POST["date_fin"]);
    $dtInsc->updateFin($_POST["id_date"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>date inscriptiion</title>
    <link rel="stylesheet" a href="css/style.css">
</head>

<body class="page2">
    <div class="wrapper ">
        <?php require_once('navbar.php'); ?>
        <div class="filiere">
            <?php
            $dtInsc = new Date_inscri();
            $rep = $dtInsc->showAll();
            $line = $rep->fetch()
            ?>
            <div class="main_contentH filiereH">
                <div class="main_contentV">
                    <h1><?php echo "DEBUT : " . $line["date_debut"] ?></h1>
                    <?php if (isset($_GET["modifid"]) && isset($_GET["dateDebut"])) {
                    ?>
                        <form method="post" action="#">
                            <input type="hidden" name="id_date" value="<?php echo $_GET["modifid"]; ?>">
                            <input type="date" name="date_debut" value="<?php echo $_GET["dateDebut"]; ?>">
                            <button type="submit" name="submitModifD">Modifier</button>
                        </form>
                    <?php
                    } else {

                    ?>
                        <a href="DateInscri.php?modifid=<?php echo $line["id_date"] ?>&dateDebut=<?php echo $line["date_debut"] ?>">modifier</a>
                    <?php } ?>

                </div>
            </div>
            <div class="main_contentH filiereH">
                <div class="main_contentV">
                    <h1><?php echo "FIN : " . $line["date_fin"] ?></h1>
                    <?php if (isset($_GET["modifid"]) && isset($_GET["dateFin"])) {
                    ?>
                        <form method="post" action="#">
                            <input type="hidden" name="id_date" value="<?php echo $_GET["modifid"]; ?>">
                            <input type="date" name="date_fin" value="<?php echo $_GET["dateFin"]; ?>">
                            <button type="submit" name="submitModifF">Modifier</button>
                        </form>
                    <?php
                    } else {

                    ?>
                        <a href="DateInscri.php?modifid=<?php echo $line["id_date"] ?>&dateFin=<?php echo $line["date_fin"] ?>">modifier</a>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>

</body>

</html>