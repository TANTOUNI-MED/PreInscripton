<?php
 session_start();
 if (!isset($_SESSION["loginA"])) {
    header("location:Login.php");
  }
     require_once("DeptClass.php");
   
if (isset($_POST["submitModif"])) {
    $dp = new Dept();
    $dp->setid_dept($_POST["id_dept"]);
    $dp->setnom($_POST["filiere"]);
    $dp->update();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filiere</title>
    <link rel="stylesheet" a href="css/style.css">
</head>

<body class="page2">
    <div class="wrapper ">
        <?php require_once('navbar.php'); ?>
        <div class="filiere">
            <form method="post" action="#" style="width: 70% ;" class="filiere-ajout">
                <input type="text" name="filiere" placeholder="ajouter une filiere">
                <button type="submit" name="submitAdd">Ajouter</button>
            </form>
            <?php 
             if(isset($_POST["submitAdd"])){
                $dept = new Dept();
                $dept->setnom($_POST["filiere"]);
                $dept->save();
             }
            $dept = new Dept();
            $rep = $dept->showAll();
            while ($line = $rep->fetch()) {
            ?>
                <div class="main_contentH filiereH">
                    <div class="main_contentV">
                        <h1><?php echo $line["filiere"] ?></h1>
                        <?php if (isset($_GET["modifid"]) && $_GET["modifid"] == $line["id_dept"]) {
                        ?>
                            <form method="post" action="#">
                                <input type="hidden" name="id_dept" value="<?php echo $_GET["modifid"]; ?>">
                                <input type="text" name="filiere" value="<?php echo $_GET["filiere"]; ?>">
                                <button type="submit" name="submitModif">Modifier</button>
                            </form>
                        <?php
                        } else {

                        ?>
                            <a href="Filiere.php?modifid=<?php echo $line["id_dept"]; ?>&filiere=<?php echo $line["filiere"]; ?>">modifier</a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>