window.addEventListener('DOMContentLoaded',(event) => {

    let apiKey = '679e036bc06c2d9a5a82a79f1f745d8b';
    let api_base_url = 'https://api.themoviedb.org/3/';
    let image_base_url =  'https://image.tmdb.org/t/p/w1280';
    let window_url = (' href => ' + window.location.href);

    let paramString = window_url.split('?')[1];
    let queryString = new URLSearchParams(paramString);   

    var similar_film_container = document.querySelector('.similar_film');
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
/*----------------------------- Lancement des méthodes ------------------------------- */
    function App(){
        detail_film()
    }
    App()
/*----------------------------- similar_movie ------------------------------- */
/*----------------------------- similar_movie ------------------------------- */
/*----------------------------- similar_movie ------------------------------- */
/*----------------------------- similar_movie ------------------------------- */ 
    function similar_movie(){
        var key='';
        var value = '';  
        for (let pair of queryString.entries()) {
            key = pair[0];
            value = pair[1];
        }
        
        var similar_film_container = document.querySelector('.similar_film');

        if(key == 'movie'){
            fetch(api_base_url + 'movie/' + value + '/similar?api_key=' + apiKey + '&language=fr-FR')
                .then(response =>  response.json()) //recupere le json
                .then(data => {

                    var  movie2 = data.results;
                    
                    for (let i = 0; i < 20; i++) {
                        if( movie2[i].poster_path != null){
                            var sim_film = document.createElement('div')
                            sim_film.className = "scroll_card"
                            sim_film.innerHTML = `<a href="detail.php?movie=${ movie2[i].id}"><img src="${image_base_url +  movie2[i].poster_path}" class="img-fluid" >
                            <span class="head_card">${ movie2[i].release_date}</span><span>Avis : ${ movie2[i].vote_average}</span></a>`
                            similar_film_container.appendChild(sim_film)
                        }
                    }
                })
        }
        else if(key == 'tv'){
            fetch(api_base_url + 'tv/' + value + '/similar?api_key=' + apiKey + '&language=fr-FR&page=1')
                .then(response =>  response.json()) //recupere le json
                .then(data => {

                    var  movie2 = data.results;
                    
                    for (let i = 0; i < 20; i++) {
                        if( movie2[i].poster_path != null){
                            var sim_film = document.createElement('div')
                            sim_film.className = "scroll_card"
                            sim_film.innerHTML = `<a href="detail.php?tv=${ movie2[i].id}"><img src="${image_base_url +  movie2[i].poster_path}" class="img-fluid" >
                            <span class="head_card">${ movie2[i].first_air_date}</span><span>Avis : ${ movie2[i].vote_average}</span></a>`
                            similar_film_container.appendChild(sim_film)
                        }
                    }
                })
        }
    }
/*----------------------------- Récuperation des détails ------------------------------- */
/*----------------------------- Récuperation des détails ------------------------------- */
/*----------------------------- Récuperation des détails ------------------------------- */
/*----------------------------- Récuperation des détails ------------------------------- */
/*----------------------------- Récuperation des détails ------------------------------- */
    function detail_film(){
        var key='';
        var value = '';  
        for (let pair of queryString.entries()) {
            key = pair[0];
            value = pair[1];
        }

        fetch(api_base_url + key + '/' + value + '?api_key=' + apiKey + '&language=fr-FR')
            .then(response =>  response.json()) //recupere le json
            .then(data => {
                var film = data;
                var detail_film = document.querySelector('.detail_film_img');
                var detail_film2 = document.querySelector('.detail_film_info');

                const prod = film.production_companies;
                var prod_comp = '';

                for (let i = 0; i < prod.length; i++) {
                    prod_comp += prod[i].name + '<br>'
                }

                const prod_country = film.production_countries;
                var prod_count = '';

                for (let i = 0; i < prod_country.length; i++) {
                    prod_count += prod_country[i].name + '<br>'
                }

                const genres = film.genres;
                var genre = '';

                for (let i = 0; i < genres.length; i++) {
                    genre += genres[i].name + '<br>'
                }

                if(key == 'movie'){

                    detail_film.innerHTML = `<img src="${image_base_url + film.poster_path}" class="img-fluid">` 
                    detail_film2.innerHTML = `<h1>${film.original_title }</h1>
                        <h2>${film.title}</h2>
                        <p><strong>Date de sortie:</strong> ${film.release_date}</p>
                        <p><strong>Résumé:</strong> ${film.overview}</p>
                        <p><strong>Genre:</strong> ${genre}</p>
                        <p><strong>Durée:</strong> ${film.runtime} minutes</p>
                        <p><strong>Note des utilisateurs:</strong> ${film.vote_average}</p>
                        <p><strong>Compagnie de production:</strong> ${prod_comp}</p>
                        <p><strong>Pays de production:</strong> ${prod_count}</p>`

                    similar_movie()

                }
                else if(key == 'tv'){                

                    detail_film.innerHTML = `<img src="${image_base_url + film.poster_path}" class="img-fluid">` 
                    detail_film2.innerHTML = `<h1>${film.original_name }</h1>
                        <p><strong>Résumé:</strong> ${film.overview}</p>
                        <p><strong>Genre:</strong> ${genre}</p>
                        <p><strong>Nombre de saisons:</strong> ${film.number_of_seasons}</p>
                        <p><strong>Nombre d'épisodes:</strong> ${film.number_of_episodes}</p>
                        <p><strong>Note des utilisateurs:</strong> ${film.vote_average}</p>
                        <p><strong>Compagnie de production:</strong> ${prod_comp}</p>
                        <p><strong>Pays de production:</strong> ${prod_count}</p>`

                    similar_movie()
                }   
            })
    }
})