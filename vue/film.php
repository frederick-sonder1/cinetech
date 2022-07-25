<?= require 'header.php' ?>
    <ul classe="genres"></ul>
    <section class="container">

        <div class="scroll_bloc hover">
            <h3>Films à venir</h3>
            <article class="scroll_container upcoming_movie"></article>
        </div>

        <div class="scroll_bloc hover">
            <h3>Films les mieux notés</h3>
            <article class="scroll_container top_rated_movie"></article>
        </div>

        <div class="scroll_bloc hover">
            <h3>Films populaires</h3>
            <article class="scroll_container popular_movie"></article>
        </div>

        <div class="scroll_bloc hover">
            <h3>Films récents</h3>
            <article class="scroll_container now_playing_movie"></article>
        </div>
        
    </section>
<?= require 'footer.php' ?>
