<?= require 'header.php'; ?>
<h3>Connexion</h3>
<div class="form">
    <form action="" method="post">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">  
        <label for="motdepasse">Mot de passe</label>
        <input type="password" name="motdepasse" id="motdepasse" placeholder="Mot de passe">
        <input type="submit" value="Se connecter">
    </form>
</div>
<?php       
    if(isset($_SESSION['user'])){
        header('Location: ../index.php');
        exit();
    }
    elseif(!empty($_POST)){ 
        require '../model/user.php';
        $user = new User();
        $user->connexion();
    }
?>
<?= require 'footer.php'; ?>   
