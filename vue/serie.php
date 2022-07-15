<?= require 'header.php' ?>
    <ul classe="genres"></ul>
    <section class="container">

        <div class="scroll_bloc hover">
            <h3>Séries à l'antenne</h3>
            <article class="scroll_container upcoming_serie"></article>
        </div>

        <div class="scroll_bloc hover">
            <h3>Séries les mieux notées</h3>
            <article class="scroll_container top_rated_serie"></article>
        </div>

        <div class="scroll_bloc hover">
            <h3>Séries populaires</h3>
            <article class="scroll_container popular_serie"></article>
        </div>

        <div class="scroll_bloc hover">
            <h3>Séries en cours de diffusions</h3>
            <article class="scroll_container now_playing_serie"></article>
        </div>
        
    </section>
<?= require 'footer.php' ?>
