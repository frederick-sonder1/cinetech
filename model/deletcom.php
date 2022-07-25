<?php
 require '../model/commentaire.php';
    $com = new Commentaire(); 
    $commentaires = $com->getAllComments();
    
    $id = (int)$_GET['id'];

    $com2 = new Commentaire;
    $deletcom = $com2->deletcom($id);
    header('location: ../vue/admin.php');
?>  