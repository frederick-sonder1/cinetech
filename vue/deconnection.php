<?php 
session_start();
session_destroy();
?>
<?php require 'header.php'; ?>
<p>vous êtes deconnecté</p>
<a href="../index.php">Retour a l'acceuil</a>
<?php require 'footer.php'; ?>  