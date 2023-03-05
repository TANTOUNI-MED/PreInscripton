<?php
session_start();
if (!isset($_SESSION["CNE"])) {
    header("location:Login.php");
}
require_once("Inscrire.php");
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

<body style="background-color:#ecc103">
    <?php require 'navBar.php'; ?>
    <?php
    $insc = new Inscrire();
    if ($insc->testIfExistEtud($_SESSION["CNE"])!=0) {
    $rep = $insc->findDeptsForEtud($_SESSION["CNE"]);
    
        while ($line = $rep->fetch()) {
    ?>

            <div class="container">
                <div class="title">demande d'inscription en "<?php echo $line["filiere"] ?>"</div>
                <?php if ($insc->findIfEtudAdmi($_SESSION["CNE"], $line["id_dept"]) == 0) { ?><div class="status">Demander</div>
                <?php } else { ?> <div class="status" style="background-color:lawngreen;">Admi</div> <?php } ?>
            </div>

        <?php }
    } else { ?>
        <div class="container">
            <div class="title">vous avez aucune demande d'inscription !!!</div>
        </div>
    <?php } ?>


</body>

</html>