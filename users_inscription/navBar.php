
<nav>
    <div class="navUser">
        <img src="img/avatar.png" />
   
        <div class="userName"> <a href="Home.php" style="background-color: #2c2b2b ;"><?php echo "Hi! ".$_SESSION["nom"]." ".$_SESSION["prenom"];?></a></div>
    </div>
    
    <ul>
        <li><a href="condidature.php">suivi votre demande</a></li>
        
    </ul>
    <a href="Login.php?deconnecter" class="deconnexion">deconnexion</a> 
</nav>