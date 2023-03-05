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
                        <h2 class="title"><span class="sp">ins</span>cri<span class="sp">vez</span> vo<span class="sp">us</span></h2>
                    </div>
                    <form method="post" action="">
                        <input type="text" name="CNE" placeholder="CNE" required>
                        <input type="text" name="nom" placeholder="PRENOM" required>
                        <input type="text" name="prenom" placeholder="NOM" required>
                        <input type="text" name="email" placeholder="example@example.com" required>
                        <input type="password" name="password" placeholder="password" required>
                        <div class="link">
                        <a href="Login.php">S'identifier</a>   
                        </div>  
                        <button type="submit"  name="submit" class="btn">inscrire</button>
                    </form>
                    <?php
                      require_once("UsersClass.php");
                      if(isset($_POST["submit"])){
                         $user=new Users();
                        $user->setCNE($_POST["CNE"]) ;
                        $user->setnom($_POST["nom"]);
                        $user->setprenom($_POST["prenom"]);
                        $user->setemail($_POST["email"]);
                        $user->setpassword($_POST["password"]);
                        $user->save();
                      }
                      if(isset($_GET["error"])){
                        echo "<p  style='color:red;  text-align:center; font-weight: bold; font-size: 20px;'> cne ou email exist deja !! </p>";
                      }
                    ?>
            </div>
        </div>  
            

    
</body>
</html>