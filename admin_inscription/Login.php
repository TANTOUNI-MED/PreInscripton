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
                    <input type="text"  name="login" placeholder="Login">
                    <input type="password"  name="password" placeholder="pass">
                    <button type="submit"  name="submit" class="btn">connexion</button>
                    
                </form>
                <?php
                    
                    if(isset($_POST["submit"])){
                        require_once("adminClass.php");
                        $user=new Admin();
                        $user->setlogin($_POST["login"]);
                        $user->setpassword($_POST["password"]);
                         $rep=$user->testLogin(); 
                         if($line=$rep->fetch()){
                            session_start();
                            $_SESSION["loginA"]=$_POST["login"];
                            $_SESSION["nomA"]=$line["nom"];
                            $_SESSION["prenomA"]=$line["prenom"];
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