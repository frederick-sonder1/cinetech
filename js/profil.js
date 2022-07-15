window.addEventListener('DOMContentLoaded',(event) => {

    let apiKey = '679e036bc06c2d9a5a82a79f1f745d8b';
    let api_base_url = 'https://api.themoviedb.org/3/';
    let image_base_url =  'https://image.tmdb.org/t/p/w1280';

    let total = document.querySelector('._info');
    
    let key = '';  // recupere la clé php en bdd
    let value = ''; // recupere la valeur php en bdd

    let jsonbazurl = "http://localhost/cinetech/"

    fetch(jsonbazurl +'model/favoris.php')  //recupere les donnéesde la bdd encodée en json
        .then(response =>  response.json()) //recupere le json
        .then(data => {

            data.forEach(element => {

                key = element.type;     // recupere la clé (tv ou movie) en bdd
                value = element.support_id; // recupere la valeur (id du film ou serie) en bdd
                if(key === 'movie'){
                    fetch(api_base_url + 'movie/' + value + '?api_key=' + apiKey + '&language=fr-FR')
                        .then(response =>  response.json()) //recupere le json
                        .then(data2 => {
                            const imgsrc = `<img src="${image_base_url + data2.poster_path}" class="img-fluid">`
                            const infosrc =  `<h5>${data2.original_title }</h5>
                                <p><strong>language:</strong> ${data2.original_language}</p>
                                <p><strong>Date de sortie:</strong> ${data2.release_date}</p>`
                            const html = `<a href="detail.php?movie=${data2.id}"><div class="detail_film_img2">
                                                ${imgsrc}
                                            </div>
                                            <div class="info">
                                                ${infosrc}
                                            </div></a>`
                            div = document.createElement('div');
                            div.innerHTML = html;
                            total.appendChild(div);
                    })
                }
                else if (key === 'tv'){
                    fetch(api_base_url + 'tv/' + value + '?api_key=' + apiKey + '&language=fr-FR')
                        .then(response =>  response.json()) //recupere le json
                        .then(data2 => {
                        
                            const imgsrc = `<img src="${image_base_url + data2.poster_path}" class="img-fluid">`
                            const infosrc2 =  `<h5>${data2.original_name}</h5>
                                <p><strong>language:</strong> ${data2.original_language}</p>
                                <p><strong>Premiere sortie:</strong> ${data2.first_air_date}</p>
                                <p><strong>Nombre de saisons:</strong> ${data2.number_of_seasons}</p>` 
                            const html = `<a href="detail.php?tv=${data2.id}">
                                            <div class="detail_film_img2">
                                                ${imgsrc}
                                            </div>
                                            <div class="info">
                                                ${infosrc2}
                                            </div></a>`
                            div = document.createElement('div');
                                            div.innerHTML = html;
                                            total.appendChild(div);
                        })
                }    
            })
        })
})