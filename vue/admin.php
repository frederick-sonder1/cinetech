<?= require 'header.php'; 
    require '../model/commentaire.php';


    if(isset($_SESSION['user']) && $_SESSION['user']['droit_id'] == 1){
        
        $com = new Commentaire(); 
        $commentaires = $com->getAllComments();

    }
    else{
        header("Location: ../index.php");
        exit;
    }
    ?>
    <div class="container">
    <table>
        <thead>
            <th>ID commentaire</th>
            <th>Pseudo</th>
            <th>Id utilisateur</th>
            <th>Commentaire</th>
            <th>support_id</th>
            <th>type</th>
        </thead>
        <tbody>
            <?php foreach($commentaires as $commentaire): ?>
                <tr>
                    <td><?= $commentaire['id']?></td>
                    <td><?= $commentaire['pseudo'] ?></td>
                    <td><?= $commentaire['user_id'] ?></td>
                    <td><?= $commentaire['commentaire'] ?></td>
                    <td><?= $commentaire['support_id'] ?></td>
                    <td><?= $commentaire['type'] ?></td>
                    <td>
                        <button>
                            <a href="../model/deletcom.php?id=<?= $commentaire['id']?>">Supprimer</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>  
<?= require 'footer.php'; ?>   
