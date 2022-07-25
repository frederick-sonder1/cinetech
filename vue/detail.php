<?= include 'header.php';
    require '../model/commentaire.php';
    require '../model/user.php'?>
    <section class="container">
        <div class="detail_film">  
            <div class="detail_film_img"></div>
            <div class="detail_film_info"></div>
        </div>
        <form action="" method="post">
            <label for="checkbox">
                <input type="submit" name="checkbox" value="Ajouter au favoris" id="checkbox">
            </label>
            <label for="">
                <input type="submit" name="checkbox_delete" value="Supprimer du favoris" id="checkbox">
            </label>
        </form>
        <?php if(isset($_POST['checkbox'])){

                 
                $user = new User; 
                $user->add_Fav();
            }
            elseif(isset($_POST['checkbox_delete'])){

                $user = new User; 
                $user->delet_fav();
            } 
            
        ?>
    </section>
    <section class="container">
        <div class="scroll_bloc hover">
            <h3>film similaire</h3>
            <article class="scroll_container similar_film"></article>
        </div>
    </section>
    <section>
        <div class="commentaires">
            <form action="" method="post">
                <textarea name="commentaire" cols="30" rows="10"></textarea>
                <input type="submit" value="submit">
            </form>
        </div>
        <?php
        if(!empty($_POST)){ 
            
            $comm = new Commentaire();
            $comm->commentaire();
        }
        ?>
        <div>
            <?php
                
                $com = new Commentaire();
                $commentaires = $com->get_commentaires();
            ?>
            <h3>commentaires</h3>
            <div class="commentaires_container">
                <?php foreach($commentaires as $commentaire): ?>
                    <div class="commentaire">
                        <?php  
                            $user = new User(); 
                            $id = $user->getPseudo((int)$commentaire['user_id']);
                        ?>
                        <p><?= $commentaire['commentaire']; ?></p>
                        <p class="id">By: <?= $id; ?></p>
                    </div>
                <?php endforeach ;?>
            </div>
        </div>
    </section>
<?= include 'footer.php'; ?>