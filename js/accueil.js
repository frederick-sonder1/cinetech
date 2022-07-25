window.addEventListener('DOMContentLoaded',(event) => {

    let apiKey = '679e036bc06c2d9a5a82a79f1f745d8b';
    let api_base_url = 'https://api.themoviedb.org/3/';
    let image_base_url =  'https://image.tmdb.org/t/p/w1280';

/*------------------------ Récupération du container d'affichage ------------------------- */
/*------------------------ Récupération du container d'affichage ------------------------- */
/*------------------------ Récupération du container d'affichage ------------------------- */
/*------------------------ Récupération du container d'affichage ------------------------- */
/*------------------------ Récupération du container d'affichage ------------------------- */
    
    //  pour les top_rated_movie 
    var top_movie_container = document.querySelector('.top_rated_movie')
    // pour les top_rated_serie 
    var top_serie_container = document.querySelector('.top_rated_serie')
    //  pour les popular_movie
    var popular_movie_container = document.querySelector('.popular_movie') 
    // pour les popular_serie
    var popular_serie_container = document.querySelector('.popular_serie')

/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
    function App(){
        popular_movie()
        popular_serie()
        top_rated_movie()
        top_rated_serie()
        // popular_person()
    }
    App()
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
                    var film = document.createElement('div')
                    film.className = "scroll_card"
                    film.innerHTML = `<a href="vue/detail.php?movie=${top_movie[i].id}"><img src="${image_base_url + top_movie[i].poster_path}" class="img-fluid" >
                    <span class="head_card">${top_movie[i].release_date}</span><span> Avis : ${top_movie[i].vote_average}</span></a>`
                    top_movie_container.appendChild(film)
                }
            }
        })    
    }
/*----------------------------- top_rated_series ------------------------------- */
/*----------------------------- top_rated_series ------------------------------- */
/*----------------------------- top_rated_series ------------------------------- */
/*----------------------------- top_rated_series ------------------------------- */
   async function top_rated_serie(){
       let data = []

       fetch(api_base_url + 'tv/top_rated?api_key=' + apiKey + '&language=fr-FR')
           .then(response =>  response.json()) //recupere le json
           .then(data => {
           
           var top_serie = data.results;
           for (let i = 0; i < 20; i++) {
               if(top_serie[i].poster_path != null){
                   var serie = document.createElement('div')
                   serie.className = "scroll_card"
                   serie.innerHTML = `<a href="vue/detail.php?tv=${top_serie[i].id}"><img src="${image_base_url + top_serie[i].poster_path}" class="img-fluid" >
                   <span>Avis : ${top_serie[i].vote_average}</span></a>`
                   top_serie_container.appendChild(serie)
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
                   film2.innerHTML = `<a href="vue/detail.php?movie=${ movie2[i].id}"><img src="${image_base_url +  movie2[i].poster_path}" class="img-fluid" >
                   <span class="head_card">${ movie2[i].release_date}</span><span>Avis : ${ movie2[i].vote_average}</span></a>`
                   popular_movie_container.appendChild(film2)
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
            
            var  pop_serie = data.results;
            
            for (let i = 0; i < 20; i++) {
                if( pop_serie[i].poster_path != null){
                    var series2 = document.createElement('div')
                    series2.className = "scroll_card"
                    series2.innerHTML = `<a href="vue/detail.php?tv=${ pop_serie[i].id}"><img src="${image_base_url +  pop_serie[i].poster_path}" class="img-fluid" >
                    <span>Avis : ${ pop_serie[i].vote_average}</span></a>`
                    popular_serie_container.appendChild(series2)
                }
            }
        })    
    }
})