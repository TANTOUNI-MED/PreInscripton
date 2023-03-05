<?php
   if(isset($_GET["deconnecter"])){
        session_start();
        session_destroy();
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" a href="css/style.css">
    
</head>
<body class="page1">
    
        <div class="div">
        <div class="img">
                <img src="img/side.png" alt="">
        </div>
         <div class="login">
                <div class="img2">
                    <img src="img/avatar.png">
                    <h2 class="title"><span class="sp">con</span>nec<span class="sp">ter</span> vo<span class="sp">us</span></h2>
                </div>
                <form method="post" action="">
                    <input type="text"  name="CNE" placeholder="Login">
                    <input type="password"  name="password" placeholder="pass">
                    <div class="link">
                      <a href="AjoutEtudiant.php">S'inscrire</a>   
                    </div>  
                    <button type="submit"  name="submit" class="btn">connexion</button>
                    
                </form>
                <?php
                    
                    if(isset($_POST["submit"])){
                        require_once("UsersClass.php");
                        $user=new Users();
                        $user->setCNE($_POST["CNE"]);
                        $user->setpassword($_POST["password"]);
                         $rep=$user->testLogin(); 
                         if($line=$rep->fetch()){
                            session_start();
                            $_SESSION["CNE"]=$_POST["CNE"];
                            $_SESSION["nom"]=$line["nom"];
                            $_SESSION["prenom"]=$line["prenom"];
                            $_SESSION["email"]=$line["email"];
                            header("location:Home.php");
                         }else{
                            echo "<p  style='color:red; text-align:center; font-weight: bold; font-size: 20px;'> accès interdit !! </p>";
                         }
        
                    }
                    
                  ?>
         </div>
        </div>   
            

    
</body>
</html>