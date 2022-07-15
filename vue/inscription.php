<?= require 'header.php'; ?>

<h3>Inscription</h3>
<div class = 'form'>
    <form action="" method="post">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">  
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email">
        <label for="motdepasse">Mot de passe</label>
        <input type="password" name="motdepasse" id="motdepasse" placeholder="Mot de passe">
        <label for="motdepasse2">Confirmation du mot de passe</label>
        <input type="password" name="motdepasse2" id="motdepasse2" placeholder="Confirmation du mot de passe">
        <input type="submit" value="S'inscrire">
    </form>
</div>
<?php  
    if(isset($_SESSION['user'])){
        header('Location: profil.php');
        exit();
    }
    elseif(!empty($_POST)){ 
        $pseudo = strip_tags($_POST['pseudo']);
        $email = strip_tags($_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $motdepasse = strip_tags($_POST['motdepasse']);
        $motdepasse2 = strip_tags($_POST['motdepasse2']);

        if (isset($pseudo,$email,$motdepasse,$motdepasse2) && !empty($pseudo) && !empty($email) && !empty($motdepasse) && !empty($motdepasse2) && $motdepasse == $motdepasse2){
            require '../model/user.php';
            $user = new User();
            $user->inscription();
        }
        else{
            echo 'un champ est vide, veuillez recommencer';
        }    
    }
?>
<?= require 'header.php'; ?> 
