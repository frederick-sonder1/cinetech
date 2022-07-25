window.addEventListener('DOMContentLoaded',(event) => {
    let apiKey = '679e036bc06c2d9a5a82a79f1f745d8b';
    let api_base_url = 'https://api.themoviedb.org/3/';
    let image_base_url =  'https://image.tmdb.org/t/p/w1280';

    var upcoming_movie_container = document.querySelector('.upcoming_movie');
    var top_movie_container = document.querySelector('.top_rated_movie');
    var popular_movie_container = document.querySelector('.popular_movie');
    var now_playing_movie_container = document.querySelector('.now_playing_movie');
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
    function App(){
        upcoming_films()
        top_rated_movie()
        popular_movie()
        now_playing_movie()
    }
    App()
/*----------------------------- upcoming_movie ------------------------------- */
/*----------------------------- upcoming_movie ------------------------------- */
/*----------------------------- upcoming_movie ------------------------------- */
/*----------------------------- upcoming_movie ------------------------------- */
/*----------------------------- upcoming_movie ------------------------------- */
    function upcoming_films(){
        fetch(api_base_url + 'movie/upcoming?api_key=' + apiKey + '&language=fr-FR&page=1')
            .then(response =>  response.json()) //recupere le json
            .then(data => {
                var upcoming_movie = data.results;
            
                for (let i = 0; i < 20; i++) {
                    if(upcoming_movie[i].poster_path != null){
                        var film = document.createElement('div')
                        film.className = "scroll_card"
                        film.innerHTML = `<a href="detail.php?movie=${upcoming_movie[i].id}"><img src="${image_base_url + upcoming_movie[i].poster_path}" class="img-fluid" >
                        <span class="head_card">${upcoming_movie[i].release_date}</span><span> Avis : ${upcoming_movie[i].vote_average}</span></a>`
                        upcoming_movie_container.appendChild(film)
                    }
                }
            })
    }
/*----------------------------- top_rated_movie ------------------------------- */
/*----------------------------- top_rated_movie ------------------------------- */
/*----------------------------- top_rated_movie ------------------------------- */
/*----------------------------- top_rated_movie ------------------------------- */
    async function top_rated_movie(){
        let data = []

        fetch(api_base_url + 'movie/top_rated?api_key=' + apiKey + '&language=fr-FR')
            .then(response =>  response.json()) //recupere le json
            .then(data => {
            
            var top_movie = data.results;
            
            for (let i = 0; i < 20; i++) {
                if(top_movie[i].poster_path != null){
                    var film1 = document.createElement('div')
                    film1.className = "scroll_card"
                    film1.innerHTML = `<a href="detail.php?movie=${top_movie[i].id}"><img src="${image_base_url + top_movie[i].poster_path}" class="img-fluid" >
                    <span class="head_card">${top_movie[i].release_date}</span><span> Avis : ${top_movie[i].vote_average}</span></a>`
                    top_movie_container.appendChild(film1)
                }
            }
        })    
    }
/*----------------------------- popular_movie ------------------------------- */
/*----------------------------- popular_movie ------------------------------- */
/*----------------------------- popular_movie ------------------------------- */
/*----------------------------- popular_movie ------------------------------- */ 
    async function popular_movie(){
    let data = []

        fetch(api_base_url + 'movie/popular?api_key=' + apiKey + '&language=fr-FR')
            .then(response =>  response.json()) //recupere le json
            .then(data => {

            var  movie2 = data.results;
            
            for (let i = 0; i < 20; i++) {
                if( movie2[i].poster_path != null){
                    var film2 = document.createElement('div')
                    film2.className = "scroll_card"
                    film2.innerHTML = `<a href="detail.php?movie=${ movie2[i].id}"><img src="${image_base_url +  movie2[i].poster_path}" class="img-fluid" >
                    <span class="head_card">${ movie2[i].release_date}</span><span>Avis : ${ movie2[i].vote_average}</span></a>`
                    popular_movie_container.appendChild(film2)
                }
            }
        })    
    }
/*----------------------------- now_playing_movie ------------------------------- */ 
/*----------------------------- now_playing_movie ------------------------------- */ 
/*----------------------------- now_playing_movie ------------------------------- */ 
/*----------------------------- now_playing_movie ------------------------------- */ 
/*----------------------------- now_playing_movie ------------------------------- */ 
async function now_playing_movie(){
    let data = []

        fetch(api_base_url + 'movie/now_playing?api_key=' + apiKey + '&language=fr-FR&page=1')
            .then(response =>  response.json()) //recupere le json
            .then(data => {
                
            var  movie2 = data.results;
                
            for (let i = 0; i < 20; i++) {
                
                if( movie2[i].poster_path != null){
                    var film3 = document.createElement('div')
                    film3.className = "scroll_card"
                    film3.innerHTML = `<a href="detail.php?movie=${ movie2[i].id}"><img src="${image_base_url +  movie2[i].poster_path}" class="img-fluid" >
                    <span class="head_card">${ movie2[i].release_date}</span><span>Avis : ${ movie2[i].vote_average}</span></a>`
                    now_playing_movie_container.appendChild(film3)
                }
            }
        })    
    }
    
})