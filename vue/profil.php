<?= require 'header.php'; 
    require '../model/user.php';
?>
<h3>Profil</h3>
    <div class= 'form'>
        <form action=""method="post">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" value="<?=$_SESSION['user']['pseudo']?>" disabled>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?=$_SESSION['user']['mail']?>">
            <label for="motdepasse">Mot de passe</label>
            <input type="password" name="motdepasse" id="motdepasse" placeholder="Mot de passe">
            <label for="motdepasse2">Confirmation du mot de passe</label>
            <input type="password" name="motdepasse2" id="motdepasse2" placeholder="Confirmation du mot de passe">
            <input type="submit" name="Modifier" value="Modifier">
        </form>
    </div>  
<?php 
    if(isset($_POST['Modifier'])){
        $user = new User();
        $user -> updateuser();
    }
?>

<section class="container">
    <div class="scroll_bloc hover">
        <h3>Vos favoris</h3>
        <article class="scroll_container favoris_film"></article>
    </div>
</section>

<section class="container">
    <div class="scroll_bloc hover">
        <h3>Vos séries favorites</h3>
        <article class="scroll_container favoris_serie"></article>
    </div>
</section>

<?= require 'footer.php'; ?>