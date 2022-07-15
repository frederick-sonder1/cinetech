window.addEventListener('DOMContentLoaded',(event) => {
    let apiKey = '679e036bc06c2d9a5a82a79f1f745d8b';
    let api_base_url = 'https://api.themoviedb.org/3/';
    let image_base_url =  'https://image.tmdb.org/t/p/w1280';

    var upcoming_serie_container = document.querySelector('.upcoming_serie');
    var top_serie_container = document.querySelector('.top_rated_serie');
    var popular_serie_container = document.querySelector('.popular_serie');
    var now_playing_serie_container = document.querySelector('.now_playing_serie');
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
    function App(){
        upcoming_films()
        top_rated_serie()
        popular_serie()
        now_playing_serie()
    }
    App()
/*----------------------------- on-the-air_serie ------------------------------- */
/*----------------------------- on-the-air_serie ------------------------------- */
/*----------------------------- on-the-air_serie ------------------------------- */
/*----------------------------- on-the-air_serie ------------------------------- */
/*----------------------------- on-the-air_serie ------------------------------- */
    function upcoming_films(){
        fetch(api_base_url + 'tv/on_the_air?api_key=' + apiKey + '&language=fr-FR&page=1')
            .then(response =>  response.json()) //recupere le json
            .then(data => {
                var upcoming_serie = data.results;
            
                for (let i = 0; i < 20; i++) {
                    if(upcoming_serie[i].poster_path != null){
                        var film = document.createElement('div')
                        film.className = "scroll_card"
                        film.innerHTML = `<a href="detail.php?tv=${upcoming_serie[i].id}"><img src="${image_base_url + upcoming_serie[i].poster_path}" class="img-fluid" >
                        <span class="head_card">${upcoming_serie[i].first_air_date}</span><span> Avis : ${upcoming_serie[i].vote_average}</span></a>`
                        upcoming_serie_container.appendChild(film)
                    }
                }
            })
    }
/*----------------------------- top_rated_serie ------------------------------- */
/*----------------------------- top_rated_serie ------------------------------- */
/*----------------------------- top_rated_serie ------------------------------- */
/*----------------------------- top_rated_serie ------------------------------- */
    async function top_rated_serie(){
        let data = []

        fetch(api_base_url + 'tv/top_rated?api_key=' + apiKey + '&language=fr-FR')
            .then(response =>  response.json()) //recupere le json
            .then(data => {
            
            var top_serie = data.results;
            
            for (let i = 0; i < 20; i++) {
                if(top_serie[i].poster_path != null){
                    var film1 = document.createElement('div')
                    film1.className = "scroll_card"
                    film1.innerHTML = `<a href="detail.php?tv=${top_serie[i].id}"><img src="${image_base_url + top_serie[i].poster_path}" class="img-fluid" >
                    <span class="head_card">${top_serie[i].first_air_date}</span><span> Avis : ${top_serie[i].vote_average}</span></a>`
                    top_serie_container.appendChild(film1)
                }
            }
        })    
    }
/*----------------------------- popular_serie ------------------------------- */
/*----------------------------- popular_serie ------------------------------- */
/*----------------------------- popular_serie ------------------------------- */
/*----------------------------- popular_serie ------------------------------- */ 
    async function popular_serie(){
    let data = []

        fetch(api_base_url + 'tv/popular?api_key=' + apiKey + '&language=fr-FR')
            .then(response =>  response.json()) //recupere le json
            .then(data => {

            var  serie2 = data.results;
            
            for (let i = 0; i < 20; i++) {
                if( serie2[i].poster_path != null){
                    var film2 = document.createElement('div')
                    film2.className = "scroll_card"
                    film2.innerHTML = `<a href="detail.php?tv=${ serie2[i].id}"><img src="${image_base_url +  serie2[i].poster_path}" class="img-fluid" >
                    <span class="head_card">${ serie2[i].first_air_date}</span><span>Avis : ${ serie2[i].vote_average}</span></a>`
                    popular_serie_container.appendChild(film2)
                }
            }
        })    
    }
/*----------------------------- now_playing_serie ------------------------------- */ 
/*----------------------------- now_playing_serie ------------------------------- */ 
/*----------------------------- now_playing_serie ------------------------------- */ 
/*----------------------------- now_playing_serie ------------------------------- */ 
/*----------------------------- now_playing_serie ------------------------------- */ 
async function now_playing_serie(){
    let data = []

        fetch(api_base_url + 'tv/airing_today?api_key=' + apiKey + '&language=fr-FR&page=1')
            .then(response =>  response.json()) //recupere le json
            .then(data => {
               
            var  serie2 = data.results;
              
            for (let i = 0; i < 20; i++) {
               
                if( serie2[i].poster_path != null){
                    var film3 = document.createElement('div')
                    film3.className = "scroll_card"
                    film3.innerHTML = `<a href="detail.php?serie=${ serie2[i].id}"><img src="${image_base_url +  serie2[i].poster_path}" class="img-fluid" >
                    <span class="head_card">${ serie2[i].first_air_date}</span><span>Avis : ${ serie2[i].vote_average}</span></a>`
                    now_playing_serie_container.appendChild(film3)
                }
            }
        })    
    }  
})