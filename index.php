<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link href="https://fonts.googleapis.com/css2?family=Muli:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/materialize.min2.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/nouislider.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1EXRWkpnVufW7zY3VUrTjaJiz4Lmj5wU&libraries=places&callback=initMap">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.1.4/jspdf.plugin.autotable.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script> -->
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <!-- Pdf-lib -->
    <script src="https://unpkg.com/pdf-lib@1.17.1/dist/pdf-lib.min.js"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@1.1.1/dist/fontkit.umd.min.js"></script>
        
    <script async>
        function getAbsoluteDelta(){
            if(isNaN(formPageValues.departement_address)) return 0;
            const deltaVal=[]            
            franceAddresses.forEach(franceAd=>{
                franceAd.departement.filter(depart=>{
                    if(depart===formPageValues.departement_address){
                        deltaVal.push(franceAd.delta);
                    }   
                });
            });
            return deltaVal[0];
        }
        
        function calculatePompeAChaleurAirEau(){
            $('.maskEverything').show()
            let finalResult=0;
            if(!$('#source_energie_2_chauffage').is(':checked') && !$('#source_energie_5_chauffage').is(':checked')){
            $('.maskEverything').hide()
                let volumeIsolationResult= formPageValues.gisolation * (formPageValues.surface_au_sol * formPageValues.hauteur_sous_plafond_m)
                while (formPageValues.altitude> 200){
                    formPageValues.delta--;
                    formPageValues.altitude -=200;
                }
                finalResult= ((volumeIsolationResult * (formPageValues.temperature_de_confort + Math.abs(formPageValues.delta)))/1.2)/1000; 
            }
            
            document.getElementById('pompe_a_chaleur_air_eau_value').innerText=finalResult.toFixed(2) +'KW';
            formPageValues.pompe_a_chaleur_air_eau_value=finalResult.toFixed(2);
        }

        function getElevation(location) {
            let elevator = new google.maps.ElevationService();
            // Initiate the location request
            elevator
                .getElevationForLocations({
                locations: [location],
                })
                .then(({ results }) => {
                // Retrieve the first result
                if (results[0]) {
                    formPageValues.altitude=results[0].elevation;
                    calculatePompeAChaleurAirEau()
                } else {
                    console.log("No results found");
                }
                })
                .catch((e) =>
                    console.log("Elevation service failed due to: " + e)
                );
        }
        
        function geocodingPlaceID(placeId){            
            const geocoder = new google.maps.Geocoder();
            return new Promise((resolve, reject) => {
                geocoder.geocode(
                {
                    placeId
                },
                (results, status) => {
                    resolve(results[0]);
                }
                );
            });
        }

        function initMap(){
            const center = { lat: 50.064192, lng: -130.605469 };
            // Create a bounding box with sides ~10km away from the center point
            const defaultBounds = {
                north: center.lat + 0.1,
                south: center.lat - 0.1,
                east: center.lng + 0.1,
                west: center.lng - 0.1,
            };
            const input = document.getElementById("inputAddress");
            const options = {
                bounds: defaultBounds,
                componentRestrictions: { country: "fr" },
                fields: ["address_components", "geometry", "name", "place_id"],
                strictBounds: false,
                types: ["geocode"],
            };
            const autocomplete = new google.maps.places.Autocomplete(input, options);
            
            autocomplete.addListener('place_changed', function(e){
                let place= autocomplete.getPlace();
                formPageValues.departement_address=place.address_components[place.address_components.length-1].long_name.substring(0, 2);
                // document.getElementById('inputZipcode').value=place.address_components[place.address_components.length-1].long_name;
                // document.getElementById('inputCity').value=place.name;
                formPageValues.delta=getAbsoluteDelta();
                const location={lat: place.geometry.location.lat(), lng: place.geometry.location.lng()};
                getElevation(location);

                geocodingPlaceID('ChIJF4ymA8Th5UcRcCWLaMOCCwE').then(response=>{
                    bonusCalcul.dansIleDeFrance=response.geometry.bounds.contains(location);                    
                })
            })
        }
    </script>
        
    <title>Étude personnalisée de l’habitat | Groupe Transition Energie</title>
</head>
<body>
    <main>
    <div id="map"></div>
        <div class="topbar">
            <div class="topbar__logo">
                <img src="./assets/images/image00001-removebg-preview(1).png" alt="Logo - Groupe Transition Energie">
            </div>
            <div class="topbar__infos"> 
            Étude personnalisée de l’habitat
            </div>

            <div class="navigation">
                <div class="navigation__head">
                    <div class="navigation__previous">
                        <svg version="1.1" fill="#003250" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            height="14px" viewBox="0 0 493.578 493.578" style="enable-background:new 0 0 493.578 493.578;"
                                xml:space="preserve">
                            <g>
                                <path d="M487.267,225.981c0-17.365-13.999-31.518-31.518-31.518H194.501L305.35,83.615c12.24-12.24,12.24-32.207,0-44.676
                                    L275.592,9.18c-12.24-12.24-32.207-12.24-44.676,0L15.568,224.527c-6.12,6.12-9.256,14.153-9.256,22.262
                                    c0,8.032,3.136,16.142,9.256,22.262l215.348,215.348c12.24,12.239,32.207,12.239,44.676,0l29.758-29.759
                                    c12.24-12.24,12.24-32.207,0-44.676L194.501,299.498h261.094c17.366,0,31.519-14.153,31.519-31.519L487.267,225.981z"/>
                            </g>
                        </svg>
                        <a href="#" class="previous__button" >RETOUR</a>
                    </div>
                    <div class="logo">
                        <img src="./assets/images/image00001-removebg-preview(1).png" alt="Logo - Groupe Transition Energie" width="200">
                    </div>

                </div>
                <div class="navigation__menus">
                 <button class="prevBtn"><span class="material-icons">chevron_left</span></button> 
                    <ul class="main-carousel">
                    <li class="step-list-item step-list-item-active" id="part_m-1">
                        <button class="navigationButton" aria-selected="part-1">
                            <div class="step-list-item-content">
                            <h5>INFORMATION CLIENT</h5>
                            <!-- <p class="step-description-text">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                            </div>
                        </button>
                    </li>

                    <li class="step-list-item" id="part_m-2">
                        <button class="navigationButton" aria-selected="part-2">
                            <div class="step-list-item-content">
                            <h5 class="step-list-item-disabled">ETUDE DU LOGEMENT</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>
                    
                    <li class="step-list-item" id="part_m-3">
                        <button class="navigationButton" aria-selected="part-3">
                            <div class="step-list-item-content">
                            <h5 class="step-list-item-disabled">VOS CONSOMMATIONS ET EQUIPEMENTS</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>
                    
                    <li class="step-list-item" id="part_m-4">
                        <button class="navigationButton" aria-selected="part-4">
                            <div class="step-list-item-content">
                             <h5 class="step-list-item-disabled">CONSOMMATIONS ET INDEXATION</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>
                    
                    <li class="step-list-item" id="part_m-5">
                        <button class="navigationButton" aria-selected="part-5">
                            <div class="step-list-item-content">
                            <h5 class="step-list-item-disabled">SOLUTIONS PROPOSES</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>
                    
                    <li class="step-list-item" id="part_m-6">
                        <button class="navigationButton" aria-selected="part-6">
                            <div class="step-list-item-content">
                            <h5 class="step-list-item-disabled">CHOIX DU PRODUIT</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>

                    <li class="step-list-item" id="part_m-7">
                        <button class="navigationButton" aria-selected="part-7">
                            <div class="step-list-item-content">
                            <h5 class="step-list-item-disabled">ELIGIBILITE AUX AIDES</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>
                    
                    <li class="step-list-item" id="part_m-8">
                        <button class="navigationButton" aria-selected="part-8">
                            <div class="step-list-item-content">
                            <h5 class="step-list-item-disabled">PRÉVISION DE VOTRE INSTALLATIONS</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>
                    </ul>
                    <button class="nextBtn"><span class="material-icons">chevron_right</span></button> 
                </div>
            </div>
        </div>
        <div class="page">
            <aside class="aside">
                <ul class="step-list">
                    <li class="step-list-item step-list-item-active" id="part-1">
                        <button class="navigationButton" aria-selected="part-1">
                            <div class="step-list-item-content">
                            <h5>INFORMATION CLIENT</h5>
                            <!-- <p class="step-description-text">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                            </div>
                        </button>
                    </li>

                    <li class="step-list-item" id="part-2">
                        <button class="navigationButton" aria-selected="part-2">
                            <div class="step-list-item-content">
                            <h5 class="step-list-item-disabled">ETUDE DU LOGEMENT</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>
                    
                    <li class="step-list-item" id="part-3">
                        <button class="navigationButton" aria-selected="part-3">
                            <div class="step-list-item-content">
                            <h5 class="step-list-item-disabled">VOS CONSOMMATIONS ET EQUIPEMENTS</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>
                    
                    <li class="step-list-item" id="part-4">
                        <button class="navigationButton" aria-selected="part-4">
                            <div class="step-list-item-content">
                             <h5 class="step-list-item-disabled">CONSOMMATIONS ET INDEXATION</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>
                    
                    <li class="step-list-item" id="part-5">
                        <button class="navigationButton" aria-selected="part-5">
                            <div class="step-list-item-content">
                            <h5 class="step-list-item-disabled">SOLUTIONS PROPOSES</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>
                    
                    <li class="step-list-item" id="part-6">
                        <button class="navigationButton" aria-selected="part-6">
                            <div class="step-list-item-content">
                            <h5 class="step-list-item-disabled">CHOIX DU PRODUIT</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>

                    <li class="step-list-item" id="part-7">
                        <button class="navigationButton" aria-selected="part-7">
                            <div class="step-list-item-content">
                            <h5 class="step-list-item-disabled">ELIGIBILITE AUX AIDES</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>
                    
                    <li class="step-list-item" id="part-8">
                        <button class="navigationButton" aria-selected="part-8">
                            <div class="step-list-item-content">
                            <h5 class="step-list-item-disabled">PRÉVISION DE VOTRE INSTALLATIONS</h5>
                            <!-- <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> -->
                        </div>
                        </button>
                    </li>
                    
                    <!-- <li class="step-list-item" id="part-7">
                        <button class="navigationButton" aria-selected="part-7">
                            <div class="step-list-item-content">
                            <h5 class="step-list-item-disabled">CALCUL DE VOS SUBVENTIONS POUR L'INSTLLATION DE VOS SOLUTIONS</h5>
                             <p class="step-description-text step-list-item-disabled">Décrivez votre logement et détaillez votre projet de travaux.</p> 
                        </div>
                        </button>
                    </li> -->
                </ul>
            </aside>
            <div class="page__content">
                <div class="topbar__progress">
                    <div class="progress_bar_container">
                        <div class="progress">
                            <div class="determinate progress-bar" style="width: 7%" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="previous__link">
                <svg version="1.1" fill="#003250" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                   height="14px" viewBox="0 0 493.578 493.578" style="enable-background:new 0 0 493.578 493.578;"
                    xml:space="preserve">
                <g>
                    <path d="M487.267,225.981c0-17.365-13.999-31.518-31.518-31.518H194.501L305.35,83.615c12.24-12.24,12.24-32.207,0-44.676
                        L275.592,9.18c-12.24-12.24-32.207-12.24-44.676,0L15.568,224.527c-6.12,6.12-9.256,14.153-9.256,22.262
                        c0,8.032,3.136,16.142,9.256,22.262l215.348,215.348c12.24,12.239,32.207,12.239,44.676,0l29.758-29.759
                        c12.24-12.24,12.24-32.207,0-44.676L194.501,299.498h261.094c17.366,0,31.519-14.153,31.519-31.519L487.267,225.981z"/>
                </g>
                </svg>
                    <a href="#" class="previous__button" >RETOUR</a>
                </div>

                <div class="alert alert-success hide"></div>
               
                <form id="regiration_form" method="post" autocomplete="off" novalidate>
                    <fieldset class="step-1">
                        <!-- <h1>Étude personnalisée de l’habitat</h1> -->
                        <h2>Informations personnelles</h2>
                        <div class="step-1__content">
                            <div class="inputs">
                                <div class="input-item">
                                    <label for="inputNom">Nom</label>
                                    <input id="inputNom" autocomplete="false" type="text" name="nom" class=""  placeholder="Votre nom">
                                    <!-- <span class="step-1__content__notice">Nom requis </span> -->
                                </div>
                                <div class="input-item lastname">
                                    <label for="inputPrenom">Prénom</label>
                                    <input id="inputPrenom" autocomplete="false" type="text" name="prenom" class="" placeholder="Votre prénom">
                                    <!-- <span class="step-1__content__notice">Prénom requis </span> -->
                                </div>
                            </div>

                            <div class="inputs">
                                <div class="input-item">
                                    <label for="inputTelephone">Téléphone</label>
                                    <input id="inputTelephone" autocomplete="false" type="number" name="telephone" class=""  placeholder="Ex: 06 31 77 82 83">
                                    <!-- <span class="step-1__content__notice">Téléphone requis </span> -->
                                </div>
                                <div class="input-item">
                                    <label for="inputMail">Email</label>
                                    <input id="inputMail" autocomplete="false" type="email" name="email" class="" placeholder="Ex: mail@gmail.com">
                                    <!-- <span class="step-1__content__notice">Email requis </span> -->
                                </div>
                            </div>
                            
                            <div class="inputs">
                                <div class="input-item nopr20">
                                    <label for="inputAddress">Adresse</label>
                                    <input id="inputAddress" autocomplete="false" type="text" name="address" class="" style="height:100px;" placeholder="Votre adresse">
                                    <!-- <span class="step-1__content__notice">Adresse requis </span> -->
                                </div>  
                            </div>
                            <!-- <div class="inputs">
                                <div class="input-item">
                                    <label for="inputZipcode">Code postal</label>
                                    <input id="inputZipcode" type="text" name="zipcode" class=""  placeholder="Votre code postal">
                                    <span class="step-1__content__notice">Code postal requis </span>
                                </div>  
                                <div class="input-item">
                                    <label for="inputCity">Ville</label>
                                    <input id="inputCity" type="text" name="ville" class=""  placeholder="Votre ville">
                                    <span class="step-1__content__notice">Ville requis </span>
                                </div>  
                            </div> -->
                        </div>
                        
                    </fieldset>
                    <fieldset class="step-2">
                        <h2>Type d’occupation</h2>
                        <div class="step-2__content">
                            <div class="step-2__content optionWithImages">
                                <label for="type_occupation_1" class="select-item btn step-2__link image image4 columnStyleInput">
                                    <input type="radio" name="type_d_occupation" id="type_occupation_1" value="Propriétaire occupant">
                                    <span class="img-wrapper">
                                        <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_Proprietaire-occupant.svg" alt="Photo - Carrée/rectangulaire">
                                    </span>
                                    Propriétaire occupant
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>

                                <label for="type_occupation_2" class="select-item btn step-2__link image image4 columnStyleInput">
                                    <input type="radio" name="type_d_occupation" id="type_occupation_2" value="
                                    Résidence secondaire">
                                    <span class="img-wrapper">
                                        <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_proprietaire-maison-secondaire.svg" alt="Photo - Propriétaire d’une résidence secondaire">
                                    </span>
                                    Résidence secondaire
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>

                                <label for="type_occupation_3" class="select-item btn step-2__link image image4 columnStyleInput">
                                    <input type="radio" name="type_d_occupation" id="type_occupation_3" value="Propriétaire bailleur">
                                    <span class="img-wrapper">
                                        <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_proprietaire-bailleur.svg" alt="Photo - Propriétaire bailleur">
                                    </span>
                                    Propriétaire bailleur
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>

                                <label for="type_occupation_4" class="select-item btn step-2__link image image4 columnStyleInput">
                                    <input type="radio" name="type_d_occupation" id="type_occupation_4" value="Locataire">
                                    <span class="img-wrapper">
                                        <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_Locataire.svg" alt="Photo - Locataire">
                                    </span>
                                    Locataire
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                            <div class="inputsCounter">
                                <div class="input-counter">
                                    <div class="counter">
                                        <div class="counter__fields">
                                            <div class="counter__title">Nombre d’habitants </div>
                                            <!-- <div class="counter__subtitle">Nombre d’habitants </div> -->
                                        </div>
                                        <div class="counter_buttons">
                                            <button class="counter__decrement" type="button">
                                                -
                                            </button>
                                            <span class="counter__value" name="nombre_d_habitants">1</span>
                                            <button class="counter__increment" type="button">
                                                +
                                            </button>
                                        </div>
                                        <!-- <span class="step-1__content__notice">Nombre d’habitants requis </span> -->

                                    </div>
                                </div>  
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="step-3">
                        <h2>Architecture</h2>
                        <div class="step-3__content">
                            <div class="inputs">
                                <div class="input-item">
                                    <label for="inputAnneContruct">Année de construction</label>    
                                    <select name="annee_contruction" class="browser-default">
                                        <option disabled selected>Choisir</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                        <option value="1989">1989</option>
                                        <option value="1988">1988</option>
                                        <option value="1987">1987</option>
                                        <option value="1986">1986</option>
                                        <option value="1985">1985</option>
                                        <option value="1984">1984</option>
                                        <option value="1983">1983</option>
                                        <option value="1982">1982</option>
                                        <option value="1981">1981</option>
                                        <option value="1980">1980</option>
                                        <option value="1979">1979</option>
                                        <option value="1978">1978</option>
                                        <option value="1977">1977</option>
                                        <option value="1976">1976</option>
                                        <option value="1975">1975</option>
                                        <option value="Avant 1975"> Avant 1975</option>
                                    </select>
                                    
                                    <!-- <input id="inputAnneContruct" type="number" name="annee_contruction" class="" min="0">
                                    <span class="step-1__content__notice">TAnnée de construction </span> -->
                                </div>  
                                <div class="input-item">
                                    <label for="inputSurfaceSol">Surface au sol (m 2)</label>
                                    <input id="inputSurfaceSol" type="number" name="surface_au_sol" class="" min="0" value="0">
                                    <!-- <span class="step-1__content__notice">Surface au sol (m 2) requis </span> -->
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="input-item">
                                    <label for="inputTempConfort" style="text-align: center;">Coefficient d’isolation G</label>
                                    <select id="gisolation" name="gisolation" style="width: 100%; text-align:center; background-color: #dfdfdf;" name="coefficient_d_isolation" disabled class="browser-default">
                                        <option disabled selected>Choisir</option>
                                        <option value="0.65" >0,65 Norme Année 2005</option>
                                        <option value="1" >1 Norme Année 2000</option>
                                        <option value="1.30" >1.3, Norme Année 1980</option>
                                        <option value="1.60" >1.6, Norme Année 1960</option>
                                    </select>
                                </div>
                            </div>
                            <h2 style="margin-top: 40px;margin-top: 30px;">Type d’installation électrique</h2>
                            <div class="noImageSelection">
                                <label for="type_installation_electrique_1" class="select-item btn step-3__link no-image monophase" style="background: #ae391c78;">                                       
                                    <input type="radio" name="type_installation_electrique" id="type_installation_electrique_1" value="Monophasé">
                                    <span>Monophasé</span>
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox not-absolute">
                                </label>

                                <label for="type_installation_electrique_2" class="select-item btn step-3__link no-image tryphase" style="background: #e9f6fe;">                                       
                                    <input type="radio" name="type_installation_electrique"  id="type_installation_electrique_2" value="Triphasé">
                                    <span>Triphasé</span>
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox not-absolute">
                                </label>
                            </div>
                            <div class="inputs">
                                <div class="input-item nopr20">
                                    <label for="inputPuissanceCompteur">Puissance du compteur (Kwa)</label>
                                    <input id="inputPuissanceCompteur" type="number" name="puissance_compteur" class="" min="0">
                                    <!-- <span class="step-1__content__notice">Puissance du compteur (Kwa) requis </span> -->
                                </div>  
                            </div>
                    </fieldset>
                    <fieldset class="step-4">
                        <h2>Forme de la maison</h2>
                        <!-- <h4 class="subtitle">Y compris CDI, CDD, intérim et alternance</h4> -->
                        <div class="step-4__content optionWithImages">
                            <label for="inptutCarreeRect" class="next btn step-4__link image columnStyleInput">
                                <input type="radio" name="forme_maison" id="inptutCarreeRect" value="Carrée/rectangulaire">
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/carree_rectangulaire.png" alt="Photo - Carrée/rectangulaire">
                                </span>
                                Carrée/rectangulaire
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="inputAllongee" class="next btn step-4__link image columnStyleInput">
                                <input type="radio" name="forme_maison" id="inputAllongee" value="Allongée">
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/allongee.png" alt="Photo - Allongée">
                                </span>
                                Allongée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                            
                            <label for="inputDeveloppe" class="next btn step-4__link image columnStyleInput">
                                <input type="radio" name="forme_maison" id="inputDeveloppe" value="Développée">
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/developpee.png" alt="Photo - Développée">
                                </span>
                                Développée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="step-5">
                        <h2>Nombre de niveau</h2>
                        <div class="step-5__content optionWithImages">
                            <label for="inputNiveau1" class="select-item btn step-5__link image columnStyleInput">
                                <input type="radio" name="nombre_de_niveau" id="inputNiveau1" value="Niveau 1">
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_1niveau.svg" alt="Photo - Niveau 1">     
                                </span>
                                1                            
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="inputNiveau2" class="select-item btn step-5__link image columnStyleInput">
                                <input type="radio" name="nombre_de_niveau" id="inputNiveau2" value="Niveau 2">
                                
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_2niveaux.svg" alt="Photo - Niveau 2">
                                </span>
                                2
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="inputNiveau3" class="select-item btn step-5__link image columnStyleInput">
                                <input type="radio" name="nombre_de_niveau" id="inputNiveau3" value="Niveau 3">
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_3niveaux.svg" alt="Photo - Niveau 3" >
                                </span>
                                3
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                            
                        <label for="hauteur_sous_plafond_moyenne" style="margin-top: 40px;margin-bottom: 16px;">Hauteur sous plafond</label>  
                        <select id="hauteur_sous_plafond_moyenne" name="hauteur_sous_plafond_moyenne" style="width: 100%;" class="browser-default">
                            <option value="1.8">1.80 m</option>
                            <option value="1.9">1.90 m</option>
                            <option value="2.0">2.00 m</option>
                            <option value="2.1">2.10 m</option>
                            <option value="2.2">2.20 m</option>
                            <option value="2.3">2.30 m</option>
                            <option value="2.4">2.40 m</option>
                            <option selected="selected" value="2.5">2.50 m</option>
                            <option value="2.6">2.60 m</option>
                            <option value="2.7">2.70 m</option>
                            <option value="2.8">2.80 m</option>
                            <option value="2.9">2.90 m</option>
                            <option value="3.0">3.00 m</option>
                            <option value="3.1">3.10 m</option>
                            <option value="3.2">3.20 m</option>
                            <option value="3.3">3.30 m</option>
                            <option value="3.4">3.40 m</option>
                            <option value="3.5">3.50 m</option>
                            <option value="3.6">3.60 m</option>
                            <option value="3.7">3.70 m</option>
                            <option value="3.8">3.80 m</option>
                            <option value="3.9">3.90 m</option>
                            <option value="4.0">4.00 m</option>
                        </select>
                        <!-- <div class="inputs"> 
                            <div class="input-item nopr20">
                                <label for="inputVolumeHabitation">Volume habitation (m 3 hauteur x surface )</label>
                                <input id="inputVolumeHabitation" type="number" name="volume_habitation" class="" min="0">
                                <span class="step-1__content__notice">Volume habitation (m 3 hauteur x surface ) requis </span>
                            </div>
                        </div> -->
                    </fieldset>

                    <fieldset class="step-6">
                        <h2>Type de sous-sol</h2>
                        <div class="step-6__content optionWithImages">
                            <label for="inputCaveSousSol" class="select-item btn step-6__link image columnStyleInput">
                                <input type="radio" name="type_de_sous_sol" id="inputCaveSousSol" value="Cave/sous-sol">
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/sous_sol.png" alt="Photo - cave/sous-sol">
                                </span>
                                Cave/sous-sol
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="inputTerrePlein" class="select-item btn step-6__link image columnStyleInput">
                                <input type="radio" name="type_de_sous_sol" id="inputTerrePlein" value="Terre-plein">
                                <span class="img-wrapper">
                                <img class="step-1__img" src="./assets/images/picto_gte/terre_plein.png" alt="Photo - Terre-plein">
                                </span>
                                Terre-plein
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                            
                            <label for="inputVideSanitaire" class="select-item btn step-6__link image columnStyleInput">
                                <input type="radio" name="type_de_sous_sol" id="inputVideSanitaire" value="Vide sanitaire">
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/vide_sanitaire.png" alt="Photo - Vide sanitaire">
                                </span>
                                Vide sanitaire
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                        </div>
                        
                        <h2>Type de murs </h2>
                        <div class="step-6__content optionWithImages">
                            <label for="inputPierre" class="select-item btn step-6__link image four-item-image columnStyleInput">
                                <input type="radio" name="type_de_mur" id="inputPierre" value="Pierre">
                                <span class="img-wrapper img-wrapper-mob">
                                    <img class="step-1__img" src="./assets/images/picto_gte/pierre.png" alt="Photo - Pierre">
                                </span>
                                Pierre
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="inputBeton" class="select-item btn step-6__link image four-item-image columnStyleInput">
                                <input type="radio" name="type_de_mur" id="inputBeton" value="Béton">
                                <span class="img-wrapper img-wrapper-mob">
                                 <img class="step-1__img" src="./assets/images/picto_gte/beton.png" alt="Photo - Béton">
                                </span>
                                Béton                                
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                            
                            <label for="inputBrique" class="select-item btn step-6__link image four-item-image columnStyleInput">
                                <input type="radio" name="type_de_mur" id="inputBrique" value="Brique">
                                <span class="img-wrapper img-wrapper-mob">
                                <img class="step-1__img" src="./assets/images/picto_gte/brique.png" alt="Photo - Brique">
                                </span>
                                Brique
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                            <label for="inputBois" class="select-item btn step-6__link image four-item-image columnStyleInput">
                                <input type="radio" name="type_de_mur" id="inputBois" value="Bois">
                                <span class="img-wrapper img-wrapper-mob">
                                <img class="step-1__img" src="./assets/images/picto_gte/bois.png" alt="Photo - Bois">
                                </span>
                                Bois
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                        </div>    
                    </fieldset>
                    
                    <fieldset class="step-7">
                        <h2>Type de combles  </h2>                        
                        <div class="step-7__content">
                            <div class="step-7__content optionWithImages">
                                <label for="inputCombleAmenage" class="select-item btn step-7__link image columnStyleInput">
                                    <input type="radio" name="type_de_comble" id="inputCombleAmenage" value="Combles aménagés">    
                                    <span class="img-wrapper">
                                        <img class="step-1__img" src="./assets/images/picto_gte/comble_amenage.png" alt="Photo - Combles aménagés">
                                    </span>
                                    Combles aménagés
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="inputComblePerdue" class="select-item btn step-7__link image columnStyleInput">
                                    <input type="radio" name="type_de_comble" id="inputComblePerdue" value="Combles perdues">    
                                    <span class="img-wrapper">
                                        <img class="step-1__img" src="./assets/images/picto_gte/comble_perdue.png" alt="Photo - Combles perdues">
                                    </span>
                                    Combles perdues
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                                </label>
                                
                                <label for="inputPasDeComble" class="select-item btn step-7__link image columnStyleInput">
                                    <input type="radio" name="type_de_comble" id="inputPasDeComble" value="Pas de combles">  
                                    <span class="img-wrapper">
                                        <img class="step-1__img" src="./assets/images/picto_gte/pas_de_comble.png" alt="Photo - Pas de combles">
                                    </span>
                                    Pas de combles
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                                </label>
                            </div>
                        
                            <h2>Combles isolés </h2>
                            <div class="noImageSelection">
                                <label for="comble_isole_1" class="select-item btn step-7__link no-image three-item-no-image">                                       
                                    <input type="radio" name="comble_isole" id="comble_isole_1" value="Oui">
                                    <span>Oui</span>
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox not-absolute">
                                </label>

                                <label for="comble_isole_2" class="select-item btn step-7__link no-image three-item-no-image">                                       
                                    <input type="radio" name="comble_isole"  id="comble_isole_2" value="Non">
                                    <span>Non</span>
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox not-absolute">
                                </label>
                                
                                <label for="comble_isole_3" class="select-item btn step-7__link no-image three-item-no-image">                                       
                                    <input type="radio" name="comble_isole"  id="comble_isole_3" value="Je ne sais pas">
                                    <span>Je ne sais pas</span>
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox not-absolute">
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="step-8">
                        <h2>Type de vitrages  </h2>
                        <div class="step-10__content optionWithImages">
                            <label for="type_de_vitrage_1" class="next btn step-8__link image columnStyleInput">                        
                                <input type="radio" name="type_de_vitrage" id="type_de_vitrage_1" value="simple">
                                <span class="img-wrapper img-wrapper-mob">
                                    <img class="step-1__img" src="./assets/images/picto_gte/vitrage_simple.png" alt="Photo - Vitrage simple">
                                </span>
                                Simple
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="type_de_vitrage_2" class="next btn step-8__link image columnStyleInput">                          
                                <input type="radio" name="type_de_vitrage"  id="type_de_vitrage_2" value="Double">
                                <span class="img-wrapper img-wrapper-mob">
                                    <img class="step-1__img" src="./assets/images/picto_gte/vitrage_double.png" alt="Photo - Vitrage double">
                                </span>
                                Double
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="type_de_vitrage_3" class="next btn step-8__link image columnStyleInput">               
                                <input type="radio" name="type_de_vitrage"  id="type_de_vitrage_3" value="Double renforcé">
                                <span class="img-wrapper img-wrapper-mob">
                                    <img class="step-1__img" src="./assets/images/picto_gte/vitrage_double_renforce.png" alt="Photo - Vitrage renforcé">
                                </span>
                                Double renforcé
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="step-9">
                        <h2>Type de ventilation</h2>
                        <div class="step-9__content optionWithImages">
                            <label for="type_de_ventilation_1" class="select-item btn step-9__link image columnStyleInput">                        
                                <input type="radio" name="type_de_ventilation" id="type_de_ventilation_1" value="Naturelle">
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/ventilation_naturelle.png" alt="Photo - Ventilation naturelle">
                                </span>
                                Naturelle
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="type_de_ventilation_2" class="select-item btn step-9__link image columnStyleInput">             
                                <input type="radio" name="type_de_ventilation"  id="type_de_ventilation_2" value="Simple">
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/ventilation_double.png" alt="Photo - Ventilation Simple">
                                </span>
                                Simple
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="type_de_ventilation_3" class="select-item btn step-9__link image columnStyleInput">        
                                <input type="radio" name="type_de_ventilation"  id="type_de_ventilation_3" value="Double f lux">
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/ventilation_double_flux.png" alt="Photo - Ventilation double flux">
                                </span>
                                Double flux
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>                        
                    </fieldset>
                    
                    <fieldset class="step-10" >                        
                    <h2>Vos consommations<br>poste par poste</h2>                     
                        <!-- <h3 class="text-center mb-4">Vos consommations
                            <br>poste par poste</h3>    -->
                        <div class="step-10__content optionWithImages" style="justify-content: center;">
                            <div class="vos-consommations__consumption-list">
                                <a class="vos-consommations__consumption-item chauffage-item modal-trigger" href="#modal1" class="btn chauffage-modal-trigger" id="chauffageModalButton">
                                    <div class="left-part">
                                        <div class="img-wrapper"><img alt="" src="./assets/images/picto_gte/chauffee-small-icon.svg">
                                        </div>
                                        <div class="name-caption">Chauffage</div>
                                    </div>

                                    <div class="consump-info" id="consump-info1">
                                        <div class="consumpt-val" id="consumpt-val1" >0€</div>
                                    </div>
                                </a>
                                
                                <a class="vos-consommations__consumption-item ecs-item modal-trigger" href="#modal2" class="btn chauffage-modal-trigger" id="eauSanitaireModalButton">
                                    <div class="left-part" id="eauChaudeSanitaireLeftPart">
                                        <div class="img-wrapper"><img alt="" src="./assets/images/picto_gte/ecs-white-icon.svg">
                                        </div>
                                        <div class="name-caption">Eau chaude sanitaire (ECS)</div>
                                    </div>      
                                    
                                    <div class="consump-info" id="consump-info2">
                                        <div class="consumpt-val" id="consumpt-val2" >0€</div>
                                    </div>
                                </a>
                                
                                <a class="vos-consommations__consumption-item taches-item modal-trigger" href="#modal3" class="btn chauffage-modal-trigger" id="appareilElecModalButton">
                                    <div class="left-part" id="appareilElecLeftPart">
                                        <div class="img-wrapper"><img alt="" src="./assets/images/picto_gte/taches-menageres-white-icon.png"></div>
                                        <div class="name-caption">Appareils électriques</div>
                                    </div>
                                    
                                    <div class="consump-info" id="consump-info3">
                                        <div class="consumpt-val" id="consumpt-val3" >0€</div>
                                    </div>
                                </a>
                                
                                <a class="vos-consommations__consumption-item eclairage-item modal-trigger" href="#modal4" class="btn chauffage-modal-trigger" id="eclairageModalButton">
                                    <div class="left-part">
                                        <div class="img-wrapper"><img alt="" src="./assets/images/picto_gte/electricite-white-icon.svg"></div>
                                        <div class="name-caption">Éclairage</div>
                                    </div>
                                    
                                    <div class="consump-info" id="consump-info4">
                                        <div class="consumpt-val" id="consumpt-val4" >0€</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="step-11">
                        <h2>Consommation et indexation</h2>
                        <h3 style="line-height: 30px;">Suite à l'étude de votre habitat réalisé à l'aide voici les prévisions de vos consommations</h3>
                        <div class="step-11__content optionWithImages" style="margin-top: 5%!important;">
                            <label for="type_de_ventilation_1" class="select-item btn step-11__link image result1 conso_indexation_1" >                        
                                <!-- <input id="votre_conso_actuel" type="number" name="type_de_ventilation" id="type_de_ventilation_1" value="Votre consomation actuel"> -->
                                <span class="conso_indexation_title">Votre consommation global actuel</span> 
                                <span id="votre_conso_actuel" style="font-size:30px;position: absolute;bottom: 30px;">0 €</span> 
                                <img src="./assets/images/check_icon.svg" alt="" class="image-checkbox_" style="top: 40px;left: 11px;">
                            </label>
                            
                            <label for="type_de_ventilation_2" class="select-item btn step-11__link image result2 conso_indexation_2">             
                                <!-- <input id="step-15_value2" type="radio" name="type_de_ventilation"  id="type_de_ventilation_2" value="Votre consommation sur X années"> -->
                                <span class="conso_indexation_title">Votre consommation global sur <span id="votre_conso_sur_x_annee_value">X </span> années</span> 
                                <span id="votre_conso_sur_x_annee" style="font-size:30px;position: absolute;bottom: 30px;">0 €</span> 
                                <img src="./assets/images/check_icon.svg" alt="" class="image-checkbox_" style="top: 40px;left: 11px;">
                            </label>
                            
                            <label for="type_de_ventilation_3" class="select-item btn step-11__link image result3 conso_indexation_3">        
                                <!-- <input id="step-15_value3" type="radio" name="type_de_ventilation"  id="type_de_ventilation_3" value="Moyenne de consommation sur X années"> -->
                                <span class="conso_indexation_title">Moyenne de consommation global sur <span id="moyenne_conso_sur_x_annee_value">X </span> années</span> 
                                <span id="moyenne_conso_sur_x_annee" style="font-size:30px;position: absolute;bottom: 30px;">0 €</span> 
                                <img src="./assets/images/check_icon.svg" alt="" class="image-checkbox_" style="top: 40px;left: 11px;">
                            </label>
                        </div>                   
                        
                        <div class="inputs" style="display: flex;flex-direction: column;align-items: center;">
                                <label for="type_de_chaufface_nombre_d_annee_a_indexer" style="margin-bottom: 25px;">Nombre d'année à indexer</label>
                                <select name="type_de_chaufface_nombre_d_annee_a_indexer" class="browser-default">
                                    <option disabled selected>Choisir</option>
                                    <option value="05">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                        </div>
                        
                        <div class="inputs">
                            <div class="input-item">
                                <label for="inputEvol25Annee" style="margin-bottom: 45px !important;">Évolution du <span>prix du fioul </span> <!--sur les 25 prochaines années (%)--> </label>
                                <!-- <div class="input-item-range">
                                    <span class="rangeMin"> 0%</span>   
                                        <p class="range-field">                                            
                                            <input type="range" id="inputEvol25Annee" name="evoluion_sur_les_23_prochaine_annees" min="0" max="7" />
                                        </p>
                                    <span class="rangeMax">7%</span>
                                </div> -->

                                <div class="input-item-range">
                                    <span class="rangeMin"> 0%</span>   
                                            <div id="range-input"></div>
                                    <span class="rangeMax">7%</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="step-16">
                        <div class="step-16__content optionWithImages">
                            <label for="type_de_ventilation_1" id="pompeAChaleurAirEau" class="select-item btn step-16__link image conso_result1 solution_proposee" >       
                                <span class="solution_proposee_big_title">Pompe à chaleur air-eau </span> 
                                <span class="solution_proposee_small_title">Chauffage</span> 
                                <span class="solution_proposee_description">Puissance préconisée</span> 
                                <span id="pompe_a_chaleur_air_eau_value" style="top: 120px;" class="solution_proposee_value">0 KW</span> 
                                <img src="./assets/images/picto_gte/chauffee-small-icon.svg" alt="Pompe à chaleur air-eau" class="conso_result_image">
                            </label>
                            
                            <label for="type_de_ventilation_2" class="select-item btn step-16__link image conso_result2 solution_proposee" >  
                                <span class="solution_proposee_big_title"> Pompe à chaleur air/air </span> 
                                <span class="solution_proposee_small_title">Chauffage</span> 
                                <span class="solution_proposee_description">Puissance à définir, selon le nombre de pièces</span> 
                                <span id="votre_conso_sur_x_annee" class="solution_proposee_value">
                                    <a data-target="modal5" class="callToAction" id="pompeChaleurButton"  rel="noopener noreferrer">Choisir</a>
                                    <!-- <button data-target="modal5" class="callToAction" id="pompeChaleurButton">Choisir</button> -->
                                </span> 


                                <img src="./assets/images/picto_gte/chauffee-small-icon.svg" alt="Pompe à chaleur air-eau" class="conso_result_image">
                            </label>
                            <!-- width: 100% !important;display: 100%;text-align: left;left: 30px; -->

                            <label class="type_de_ventilation_3" class="image conso_result3 solution_proposee" > 
                                <span class="solution_proposee_big_title">Chauffe-eau thermodynamique</span>     
                                <span class="solution_proposee_small_title">Eclairage</span> 
                                <span class="solution_proposee_description">Choisir la capacité</span>                                 
                                <span id="moyenne_conso_sur_x_annee" class="solution_proposee_checkbox_container">
                                    <input type="checkbox" class="filled-in checkbox-white chk-moyenne-conso" id="200l" value="200L" name="moyenne_conso_sur_x_annee_check1" />
                                    <label for="200l" style="color: white;margin-right: 16px;" class="checkbox-label-white">
                                        200 L
                                    </label>
                                    
                                    <input type="checkbox" class="filled-in checkbox-white chk-moyenne-conso" id="270l" value="270L" name="moyenne_conso_sur_x_annee_check2" />
                                    <label for="270l" style="color: white;margin-right: 16px;" class="checkbox-label-white">
                                        270 L
                                    </label>
                                    
                                    <input type="checkbox" class="filled-in checkbox-white chk-moyenne-conso" id="230l" value="230l" name="moyenne_conso_sur_x_annee_check2" />
                                    <label for="230l" style="color: white;margin-right: 16px;" class="checkbox-label-white">
                                        230 L
                                    </label>
                                    
                                    <input type="checkbox" class="filled-in checkbox-white chk-moyenne-conso" id="Autres" value="Autres" name="moyenne_conso_sur_x_annee_check2" />
                                    <label for="Autres" style="color: white;margin-right: 16px;" class="checkbox-label-white">
                                        Autres
                                    </label>
                                </span> 

                                <img src="./assets/images/picto_gte/ecs-white-icon.svg" alt="Chauffe-eau thermodynamique" style="top: 75px;" class="conso_result_image">
                            </label>
                            
                            <label for="type_de_ventilation_4" class="image conso_result4 solution_proposee">  
                                <span class="solution_proposee_big_title">Electricité ampoules led</span> 
                                <span class="solution_proposee_small_title">Eclairage</span>
                                <span id="elec_ampoule_led" class="solution_proposee_checkbox_container">
                                        <input type="checkbox" class="filled-in checkbox-white chk-elec-ampoule" id="elec_ampoule1" value="Oui" name="elec_ampoule_led_chk1" />
                                    <label for="elec_ampoule1" style="color: white;margin-right: 16px;" class="checkbox-label-white">
                                        OUI
                                    </label>
                                        <input type="checkbox" class="filled-in checkbox-white chk-elec-ampoule" id="elec_ampoule2" value="Non" name="elec_ampoule_led_chk2" />
                                    <label for="elec_ampoule2" style="color: white;margin-right: 16px;" class="checkbox-label-white">
                                        NON
                                    </label></span> 
                                    <img src="./assets/images/picto_gte/electricite-white-icon.svg" alt="Pompe à chaleur air-eau" style="top: 60px;" class="conso_result_image">

                            </label>
                        </div>        
                    </fieldset>                    
                    
                    <fieldset class="step-17" style="max-width: 850px;">
                        <h2>FICHE TECHNIQUE PAR CATEGORIE</h2>
                        <div class="step-17__content optionWithImages" style="display: flex;flex-direction:column;">
                        <select id="productsFilterCategory" name="product_category" style="width: 100%;" class="browser-default">
                            <option value="all">Tous les produits</option>
                            <option value="Pompes à chaleur air-eau">Pompes à chaleur air-eau</option>
                            <option value="Chauffe-eau Thermodynamique">Chauffe-eau Thermodynamique</option>
                            <option value="Pompes à chaleur air-air">Pompes à chaleur air-air</option>
                        </select>
                            <div class="pompes" id="list_pompes">

                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="step-18">
                        <div class="step-18__content optionWithImages" style="display: flex;flex-direction:column;">
                            <h2>Situation matrimoniale</h2>
                            <div class="noImageSelection" style="max-width: 395px;margin: 0 auto;">
                                <label for="eligibilite_situation_matrimoniale_1" class="select-item btn step-18__link no-image three-item-no-image step-18_one_item situationMatri">                                       
                                    <input type="radio" name="eligibilite_situation_matrimoniale" id="eligibilite_situation_matrimoniale_1" value="Célibataire">
                                    <span>Célibataire</span>
                                </label>

                                <label for="eligibilite_situation_matrimoniale_2" class="select-item btn step-18__link no-image three-item-no-image step-18_one_item situationMatri">                                       
                                    <input type="radio" name="eligibilite_situation_matrimoniale"  id="eligibilite_situation_matrimoniale_2" value="Marié(e)">
                                    <span>Marié(e)</span>
                                </label>
                                
                                <label for="eligibilite_situation_matrimoniale_4" class="select-item btn step-18__link no-image three-item-no-image step-18_one_item situationMatri">                                       
                                    <input type="radio" name="eligibilite_situation_matrimoniale" id="eligibilite_situation_matrimoniale_4" value="Veuf(ve)">
                                    <span>Veuf(ve)</span>
                                </label>

                                <label for="eligibilite_situation_matrimoniale_5" class="select-item btn step-18__link no-image three-item-no-image step-18_one_item situationMatri">                                       
                                    <input type="radio" name="eligibilite_situation_matrimoniale"  id="eligibilite_situation_matrimoniale_5" value="Divorcé(e)">
                                    <span>Divorcé(e)</span>
                                </label>
                            </div>
                            
                            <h2>Nombre d'enfants à charge</h2>
                            <div class="input-counter">
                                <div class="counter" style="width: 190px;margin: 0 auto;justify-content: center;"> 
                                    <div class="counter_buttons">
                                        <button class="counter__decrement" type="button">
                                            -
                                        </button>
                                        <span class="counter__value" name="eligibility_nbr_enfant_a_charge">0</span>
                                        <button class="counter__increment" type="button">
                                            +
                                        </button>
                                    </div>
                                </div> 
                            </div>

                            <h2>Naissance à venir ou enfant non présent sur la déclaration ?</h2>
                            <div class="noImageSelection"  style="width: 400px;justify-content: space-between;display: flex; margin: 0 auto;">
                                <label for="eligibilite_situation_enfant_1" class="select-item btn step-18__link no-image three-item-no-image step-18_one_item situationEnfant">                                       
                                    <input type="radio" name="eligibilite_situation_enfant" id="eligibilite_situation_enfant_1" value="Oui">
                                    <span>Oui</span>
                                </label>

                                <label for="eligibilite_situation_enfant_2" class="select-item btn step-18__link no-image three-item-no-image step-18_one_item situationEnfant">                                       
                                    <input type="radio" name="eligibilite_situation_enfant"  id="eligibilite_situation_enfant_2" value="Non">
                                    <span>Non</span>
                                </label>
                            </div>
                            
                            <h2>Référence de l'avis d'imposition </h2>
                            <div class="inputs" style="width: 65%;margin: 0 auto;">
                                <div class="input-item nopr20">
                                    <!-- <label for="inputEligibiliteAvisImposition">Référence de l'avis d'imposition </label> -->
                                    <input id="inputEligibiliteAvisImposition" type="text" name="eligibilite_avis_imposition">
                                    <!-- <span class="step-1__content__notice">Référence de l'avis d'imposition requis </span> -->
                                </div>  
                            </div>
                            
                            <h2>Numéro fiscal </h2>
                            <div class="inputs" style="width: 65%;margin: 0 auto;display: flex;justify-content: center;">
                                <div class="input-item nopr20" >
                                    <!-- <label for="inputNumeroFisc">Numéro fiscal </label> -->
                                    <input id="inputNumeroFisc" type="number" name="eligibilite_numéro_fiscal" class="" >
                                    <!-- <span class="step-1__content__notice">Numéro fiscal requis </span> -->
                                </div>  
                            </div>
                            
                            <!-- <h2>Nombre de parts fiscales </h2>
                            <div class="input-counter">
                                <div class="counter"style="width: 190px;margin: 0 auto;display: flex;justify-content: center;"> 
                                    <div class="counter__fields" >
                                         <div class="counter__title">Nombre de parts fiscales </div> 
                                    </div>
                                    <div class="counter_buttons">
                                        <button class="counter__decrement" type="button">
                                            -
                                        </button>
                                        <span class="counter__value" name="eligibility_nbr_part_fiscal">0</span>
                                        <button class="counter__increment" type="button">
                                            +
                                        </button>
                                    </div>
                                </div> 
                            </div> -->
                            
                            <h2>Dernier revenu fiscal de référence </h2>
                            <div class="inputs" style="width: 65%;margin: 0 auto;">
                                <div class="input-item nopr20" style="margin: 0;">
                                    <!-- <label for="inputDernierRevenuFiscalRef">Dernier revenu fiscal de référence </label> -->
                                    <input id="inputDernierRevenuFiscalRef" type="number" name="eligibilite_dernier_revenu_fiscal_reference" class="">
                                    <!-- <span class="step-1__content__notice">Dernier revenu fiscal de référencerequis </span> -->
                                </div>  
                            </div>
                            
                            <h2>Aide bonus écologique </h2>
                            <div class="inputs" style="width: 65%;margin: 0 auto;">
                                <div class="input-item nopr20" style="margin: 0 auto;">
                                    <input id="inputBonusEcologique" type="number" name="aide_bonus_ecologique" value="0" min="0">
                                    <!-- <span class="step-1__content__notice">Aide bonus écologique  </span> -->
                                </div>
                            </div>

                        </div>        
                    </fieldset>                    
                    
                    <fieldset class="step-19" >
                        <h2>CALCUL DE VOS SUBVENTIONS POUR L'INSTLLATION DE VOS SOLUTIONS</h2>
                        <div class="step-19__content optionWithImages" style="display: flex;flex-direction:column;">
                            <div class="results">
                                <div class="results__item">
                                        <div class="results__image">
                                            <img src="./assets/images/image00003.jpeg" alt="Ma prime renov" height="50">
                                        </div>
                                    <span class="results__label">
                                        MaPrimeRénov
                                    </span>
                                    <div class="results__value"id="maPrimeRenov">
                                        0 €
                                    </div>
                                </div>
                                
                                <div class="results__item">
                                    <div class="results__image">
                                        <img class="step-1__img" src="./assets/images/image00005.jpeg" alt="Coup de pouce" height="50">
                                    </div>
                                    <span class="results__label">
                                        Coup de pouce
                                    </span>
                                    <div class="results__value" id="coupDePouce">
                                        0 €
                                    </div>
                                </div>
                                
                                <div class="results__item">
                                    <div class="results__image">
                                        <img class="step-1__img" src="./assets/images/image00002.jpeg" alt="Bonus écologique" height="50">
                                    </div>
                                    <span class="results__label">
                                        Bonus écologique
                                    </span>
                                    <div class="results__value" id="bonusEcologique">
                                        0 €
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="total">
                            <div class="total__item">
                                <span class="total__label">
                                    Total de vos bonus:
                                </span>
                                <div class="total__value" id="total_bonus">
                                    0 €
                                </div>
                            </div>  
                        </div>
                    </fieldset>
                    
                    <fieldset class="step-20" >
                        <h2>PRÉVISION DE VOTRE INSTALLATION</h2>
                        <div class="step-20__content optionWithImages" style="display: flex;flex-direction:column;">
                            <div class="photos">
                                <div class="row">
                                    <div class="col s12 m6">
                                        <h6>FAÇADE MAISON</h6>
                                        <div id="facade_maison_img" class="col_image">
                                            <img src="./assets/images/photo_sample.jpg" alt="Facade Maison" >
                                        </div>

                                        <input type="file" id="upload_photo" accept=".jpg" style="display: none;"/>
                                        <button class="callToAction" id="facade_maison_select" type="button"><span class="material-icons">add_a_photo</span></button>
                                        <!-- <button class="callToAction" id="facade_maison" type="button"><span class="material-icons">add_a_photo</span></button> -->
                                    </div>
                                    <div class="col s12 m6">
                                        <h6>COMPTEUR ACTUEL</h6>
                                        <div id="compteur_actuel_img" class="col_image">
                                            <img src="./assets/images/photo_sample.jpg" alt="COMPTEUR ACTUEL">
                                        </div>
                                        <button class="callToAction" id="compteur_actuel_select" type="button"><span class="material-icons">add_a_photo</span></button>
                                        <!-- <button class="callToAction" id="compteur_actuel" type="button"><span class="material-icons">add_a_photo</span></button> -->
                                    </div>
                                    <div class="col s12 m6">
                                        <h6>CHAUDIÈRE ACTUELLE</h6>
                                        <div id="chaudiere_actuel_img" class="col_image">
                                            <img src="./assets/images/photo_sample_bw.jpeg" alt="CHAUDIÈRE ACTUELLE"> 
                                        </div>
                                        <button class="callToAction" id="chaudiere_actuel_select" type="button"><span class="material-icons">add_a_photo</span></button>
                                        <!-- <button class="callToAction disabled_photo_btn" id="chaudiere_actuel" disabled="true" type="button"><span class="material-icons">add_a_photo</span></button> -->
                                    </div>
                                    <div class="col s12 m6">
                                        <h6>BALLON ACTUEL</h6>
                                        <div id="ballon_actuel_img" class="col_image">
                                            <img src="./assets/images/photo_sample_bw.jpeg" alt="BALLON ACTUEL">
                                        </div>
                                        <button class="callToAction"  disabled="true" id="ballon_actuel_select" type="button"><span class="material-icons">add_a_photo</span></button>
                                        <!-- <button class="callToAction disabled_photo_btn" disabled="true" id="ballon_actuel" type="button"><span class="material-icons">add_a_photo</span></button> -->
                                    </div>
                                    <div class="col s12 m6 ">
                                        <h6>EMPLACEMENT POMPE À CHALEUR</h6>
                                        <div id="emplacement_pompe_a_chaleur_img" class="col_image">
                                            <img src="./assets/images/photo_sample_bw.jpeg" alt="EMPLACEMENT POMPE À CHALEUR"> 
                                        </div>
                                        <button class="callToAction" id="emplacement_pompe_a_chaleur_select" type="button"><span class="material-icons">add_a_photo</span></button>
                                        <!-- <button class="callToAction disabled_photo_btn" disabled="true" id="emplacement_pompe_a_chaleur" type="button"><span class="material-icons">add_a_photo</span></button> -->
                                    </div>
                                    <div class="col s12 m6">
                                        <h6>EMPLACEMENT DES BLOCS EXTÉRIEURS *</h6>
                                        <div id="emplacement_des_blocs_exterieurs_img" class="col_image">
                                            <img src="./assets/images/photo_sample.jpg" alt="EMPLACEMENT DES BLOCS EXTÉRIEURS ">
                                        </div>
                                        <button class="callToAction" id="emplacement_des_blocs_exterieurs_select" type="button"><span class="material-icons">add_a_photo</span></button>
                                        <!-- <button class="callToAction" id="emplacement_des_blocs_exterieurs" type="button"><span class="material-icons">add_a_photo</span></button> -->
                                    </div>
                                </div>
                                    <div class="generate_pdf_container" id="ignore_for_pdf">
                                        <button class="generate_pdf_btn" id="generatePdfButton" type="submit" >   
                                            <!-- <div class="preloader-wrapper small active hidden-preload">
                                                <div class="spinner-layer spinner-green-only">
                                                <div class="circle-clipper left">
                                                    <div class="circle"></div>
                                                </div><div class="gap-patch">
                                                    <div class="circle"></div>
                                                </div><div class="circle-clipper right">
                                                    <div class="circle"></div>
                                                </div>
                                                </div>
                                            </div> -->
                                            GENERER MON PDF
                                        </button>
                                    </div>
                                <!-- <div class="photos__item">

                                <button>
                                    Take Photo
                                </button>
                                </div> -->
                            </div>
                        </div>
                        
                    </fieldset>
                </form>
                <div>
                </div>
                <div class="nextButtonControl">
                    <div class="allErrorMessage invalide show">Renseginer tous les champs s'il vous plait !</div>
                    <input type="button" class="next btn btn-info main-cta" value="Suivant" id="nextStepButton"/>
                </div>
            </div>
        </div>

        <div class="modalContainer">
            <!-- Modal Structure -->
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <h4 style="color: #009482;">Chauffage </h4>
                    <fieldset class="step-11">
                        <h2>Source d’énergie</h2>
                        <div class="step-11__content optionWithImages" style="max-width: 760px;">
                            <label for="source_energie_1_chauffage" class="select-item btn step-11__link image chauff_image_3 columnStyleInput souceEnergieTypeChauffage">                        
                                <input type="radio" name="source_energie" id="source_energie_1_chauffage" value="Chauffage au Fioul ">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/chauffage_au_fioul_crop.png" alt="Photo - Chauffage au Fioul ">
                                 Fioul 
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_2_chauffage" class="select-item btn step-11__link image chauff_image_3 columnStyleInput souceEnergieTypeChauffage">             
                                <input type="radio" name="source_energie"  id="source_energie_2_chauffage" value="Chauffage Électrique">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/chauffage_elec_crop.png" alt="Photo - Chauffage Électrique">
                                 Électrique
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            <label for="source_energie_3_chauffage" class="select-item btn step-11__link image chauff_image_3 columnStyleInput souceEnergieTypeChauffage">        
                                <input type="radio" name="source_energie"  id="source_energie_3_chauffage" value=" Chauffage au Gaz ">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/chuaffage_au_gaz_crop.png" alt="Photo -  Chauffage au Gaz ">
                                 Gaz 
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="source_energie_4_chauffage" class="select-item btn step-11__link image chauff_image_3 columnStyleInput souceEnergieTypeChauffage">             
                                <input type="radio" name="source_energie"  id="source_energie_4_chauffage" value=" Chauffage au Bois">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/chauffage_au_bois_crop.png" alt="Photo -  Chauffage au Bois ">
                                 Bois 
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_5_chauffage" class="select-item btn step-11__link image chauff_image_3 columnStyleInput souceEnergieTypeChauffage">        
                                <input type="radio" name="source_energie"  id="source_energie_5_chauffage" value=" Pompe à Chaleur">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/chauffage_pompe_a_chaleur_crop.png" alt="Photo -  Pompe à Chaleur ">
                                Pompe à Chaleur
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_5_chauffage" class="select-item btn step-11__link image chauff_image_3 columnStyleInput souceEnergieTypeChauffage">        
                                <input type="radio" name="source_energie"  id="source_energie_5_chauffage" value="Chauffage au Charbon ">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/chaffage_au_charbon_crop.png" alt="Photo -  Chauffage au Charbon">
                                 Charbon 
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                        
                        <h2>Type de chauffage</h2>
                        <div id="source_energie_type_elec" style="display: none;">
                            <div class="step-11__content optionWithImages">
                                <label for="type_de_chaufface_convecteur_elec" class="select-item btn step-11__link image image5 columnStyleInput">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chaufface_convecteur_elec" value="Convecteur électrique">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_convecteur electrique.svg" alt="Photo - Convecteur électrique">
                                    Convecteur électrique
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_plancher_chauffant" class="select-item btn step-11__link image image5 columnStyleInput">             
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_plancher_chauffant" value="Plancher chauffant électrique">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_plancher-chauffant.svg" alt="Photo - Plancher chauffant électrique">
                                    Plancher chauffant électrique
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_radiateur_elec" class="select-item btn step-11__link image image5 columnStyleInput">        
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_radiateur_elec" value="Radiateur électrique à inertie">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_radiateur-inertie.svg" alt="Photo - Radiateur électrique à inertie">
                                    Radiateur électrique à inertie
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                            
                            <div class="step-11__content optionWithImages">
                                <label for="type_de_chaufface_chaudiere_elec" class="select-item btn step-11__link image image5 columnStyleInput">             
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_chaudiere_elec" value="Chaudière électrique">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_chaudiere-electrique.svg" alt="Photo - Chaudière électrique">
                                    Chaudière électrique
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_pompe_a_chaleur" class="select-item btn step-11__link image image5 columnStyleInput">        
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_pompe_a_chaleur" value="Pompe à chaleur">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_pompe à chaleur.svg" alt="Photo - Pompe à chaleur">
                                    Pompe à chaleur
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_chudiere_eau_solaire" class="select-item btn step-11__link image image5 columnStyleInput">        
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_chudiere_eau_solaire" value="Chauffe eau solaire">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_chauffage-solaire.svg" alt="Photo - Chauffe eau solaire">
                                    Chauffe eau solaire
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                        </div>
                        
                        <div id="source_energie_type_gaz_naturel" style="display: none;">
                            <div class="step-11__content optionWithImages">
                                <label for="type_de_chaufface_chaudierer_gaz_natur_hors_condensa" class="select-item btn step-11__link image image5 columnStyleInput">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chaufface_chaudierer_gaz_natur_hors_condensa" value="Chaudière Gaz naturel hors condensation">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_chaudiere-gaz-basse-temperature.svg" alt="Photo - Chaudière Gaz naturel hors condensation">
                                    Chaudière Gaz naturel hors condensation
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_chaudiere_gaz_natur_condensa" class="select-item btn step-11__link image image5 columnStyleInput">             
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_chaudiere_gaz_natur_condensa" value="Chaudière Gaz naturel à condensation">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_chaudiere-gaz-condensation.svg" alt="Photo - Chaudière Gaz naturel à condensation">
                                    Chaudière Gaz naturel à condensation
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>

                        </div>
                        
                        <div id="source_energie_type_gpl" style="display: none;">
                            <div class="step-11__content optionWithImages" style="max-width: 620px;">
                                <label for="type_de_chaufface_chaudiere_gpl_condensation" class="select-item btn step-11__link image image5 columnStyleInput">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chaufface_chaudiere_gpl_condensation" value="Chaudière GPL à condensation">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_chaudiere-GPL-condensation.svg" alt="Photo - Chaudière GPL à condensation">
                                    Chaudière GPL à condensation
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_chaudiere_gpn_hor_condensation" class="select-item btn step-11__link image image5 columnStyleInput">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chaufface_chaudiere_gpn_chor_ondensation" value="Chaudière GPL hors condensation">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_chaudiere-GPL-basse-temperature.svg" alt="Photo - Chaudière GPL hors condensation">
                                    Chaudière GPL hors condensation
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_poele_gpl" class="select-item btn step-11__link image image5 columnStyleInput">             
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_poele_gpl" value="Poêle GPL">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_poele-GPL.svg" alt="Photo - Poêle GPL">
                                    Poêle GPL
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                        </div>                        
                        
                        <div id="source_energie_type_fioul" style="display: none;">
                            <div class="step-11__content optionWithImages" style="max-width: 620px;">
                                <label for="type_de_chauffage_chaudiere_fioul" class="select-item btn step-11__link image image5 columnStyleInput">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chauffage_chaudiere_fioul" value="Chaudière Fioul">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_chaudiere-fioul-condensation.svg" alt="Photo - Chaudière Fioul">
                                    Chaudière Fioul
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_chaudiere_hors_condensation" class="select-item btn step-11__link image image5 columnStyleInput">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chaufface_chaudiere_hors_condensation" value="Chaudière Fioul hors condensation">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_chaudiere-fioul-basse-temperature.svg" alt="Photo - Chaudière Fioul hors condensation">
                                    Chaudière Fioul hors condensation
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_poele_fioul" class="select-item btn step-11__link image image5 columnStyleInput">             
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_poele_fioul" value="Poêle GPL">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_poele-fioul.svg" alt="Photo - Poêle GPL">
                                    Poêle Fioul
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                        </div>                        
                        
                        <div id="source_energie_type_bois" style="display: none;">
                            <div class="step-11__content optionWithImages" style="max-width: 620px;">
                                <label for="type_de_chaufface_chaudiere_bois" class="select-item btn step-11__link image image5 columnStyleInput">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chaufface_chaudiere_bois" value="Chaudière Bois">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_chaudiere-bois.svg" alt="Photo - Chaudière Bois">
                                    Chaudière Bois
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chauffage_poele" class="select-item btn step-11__link image image5 columnStyleInput">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chauffage_poele" value="Poêle à buches classiques">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_poele-bois.svg" alt="Photo - Poêle à buches classiques">
                                    Poêle à buches classiques
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chauffage_cheminee" class="select-item btn step-11__link image image5 columnStyleInput">             
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chauffage_cheminee" value="Cheminée">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_Cheminee.svg" alt="Photo - Cheminée">
                                    Cheminée
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                        </div>
                        
                        <div class="inputs">    
                            <div class="input-item">
                                <label for="inputMarqueAncienneChau">Marque de l'ancienne chaudière</label>
                                <input id="inputMarqueAncienneChau" type="text" name="marque_ancienne_chaudiere">
                                <!-- <span class="step-1__content__notice">Marque de l'ancienne chaudière requis </span> -->
                            </div>
                        </div>
                        
                        <div id="chauffage_emplacement" >
                            <div class="step-11__content optionWithImages" style="max-width: 415px;">
                                <label for="inputMarqueAncienneChau">Emplacement de la chaudière</label>

                                <label for="type_de_chaufface_chaudierer_gaz_natur_hors_condensa" class="select-item btn step-11__link image image5 columnStyleInput emplacementChaudiere" style="height: auto!important;">                        
                                    <input type="radio" name="emplacement_chaudiere" id="emplacement_chaudiere_1" value="Mur">
                                    Mur
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_chaudiere_gaz_natur_condensa" class="select-item btn step-11__link image image5 columnStyleInput emplacementChaudiere" style="height: auto!important;">             
                                    <input type="radio" name="emplacement_chaudiere"  id="emplacement_chaudiere_2" value="Sol">
                                    Sol
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                        </div>

                        <div class="inputs">
                            <div class="input-item">
                                <label for="inputAnneeInstall">Année d’installation</label>
                                <select name="annee_contruction_chauffage" class="browser-default">
                                        <option disabled selected>Choisir</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                        <option value="1989">1989</option>
                                        <option value="1988">1988</option>
                                        <option value="1987">1987</option>
                                        <option value="1986">1986</option>
                                        <option value="1985">1985</option>
                                        <option value="1984">1984</option>
                                        <option value="1983">1983</option>
                                        <option value="1982">1982</option>
                                        <option value="1981">1981</option>
                                        <option value="1980">1980</option>
                                        <option value="1979">1979</option>
                                        <option value="1978">1978</option>
                                        <option value="1977">1977</option>
                                        <option value="1976">1976</option>
                                        <option value="1975">1975</option>
                                        <option value="Avant 1975"> Avant 1975</option>
                                    </select>
                            </div>
                        </div>

                        <div class="inputsCounter">
                            <div class="input-counter">
                                <div class="counter">
                                    <div class="counter__fields">
                                        <div class="counter__title">Température de confort (C°) </div>
                                    </div>
                                    <div class="counter_buttons">
                                        <button class="counter__decrement" type="button">
                                            -
                                        </button>
                                        <span class="counter__value" name="temperature_de_confort">17</span>
                                        <button class="counter__increment" type="button">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>  
                        </div>
                            

                        <div class="inputs">    
                            <div class="input-item">
                                <label for="inputEstimFactChauff">Estimation de la facture de chauffage (€/an)</label>
                                <input id="inputEstimFactChauff" type="number" name="estimation_de_facture_de_chauffage" value="0" min="0">
                                <!-- <span class="step-1__content__notice">Estimation de la facture de chauffage requis </span> -->
                            </div>
                        </div>
                        
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <div style="margin-right: 75px;">
                        <a href="#!" class="modal-close callToAction" id="modal1Button">VALIDER</a>
                    </div>
                </div>
            </div>

             <!-- Modal Structure -->
             <div id="modal2" class="modal">
                <div class="modal-content">
                    <h4 style="color:#225c54;">Eau chaude sanitaire </h4>
                    <fieldset class="step-12">
                        <h2>Source d’énergie</h2>
                        <div class="step-12__content optionWithImages">
                            <label for="source_energie_eau_chaude_fioul_1" class="select-item btn step-12__link image chauff_image_3 columnStyleInput souceEnergieEauSanitaire">                        
                                <input type="radio" name="source_energie_eau_chaude" id="source_energie_eau_chaude_fioul_1" value="Chauffage au Fioul ">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/chauffage_au_fioul_crop.png" alt="Photo - Chauffage au Fioul ">
                                Fioul 
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_eau_chaude_elec_2" class="select-item btn step-12__link image chauff_image_3 columnStyleInput souceEnergieEauSanitaire">             
                                <input type="radio" name="source_energie_eau_chaude"  id="source_energie_eau_chaude_elec_2" value="Chauffage Électrique">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/chauffage_elec_crop.png" alt="Photo - Chauffage Électrique">
                                 Électrique
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="source_energie_eau_chaude_gaz_3" class="select-item btn step-12__link image chauff_image_3 columnStyleInput souceEnergieEauSanitaire">        
                                <input type="radio" name="source_energie_eau_chaude"  id="source_energie_eau_chaude_gaz_3" value=" Chauffage au Gaz ">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/chuaffage_au_gaz_crop.png" alt="Photo -  Chauffage au Gaz ">
                                 Gaz 
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="source_energie_eau_chaude_bois_4" class="select-item btn step-12__link image chauff_image_3 columnStyleInput souceEnergieEauSanitaire">             
                                <input type="radio" name="source_energie_eau_chaude"  id="source_energie_eau_chaude_bois_4" value=" Chauffage au Bois">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/chauffage_au_bois_crop.png" alt="Photo -  Chauffage au Bois ">
                                 Bois 
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_eau_chaude_pompe_a_chauleur_5" class="select-item btn step-12__link image chauff_image_3 columnStyleInput souceEnergieEauSanitaire">        
                                <input type="radio" name="source_energie_eau_chaude"  id="source_energie_eau_chaude_pompe_a_chauleur_5" value=" Pompe à Chaleur">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/chauffage_pompe_a_chaleur_crop.png" alt="Photo -  Pompe à Chaleur ">
                                Pompe à Chaleur
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_eau_chaude_chauffr_charbon_6" class="select-item btn step-12__link image chauff_image_3 columnStyleInput souceEnergieEauSanitaire">        
                                <input type="radio" name="source_energie_eau_chaude"  id="source_energie_eau_chaude_chauffr_charbon_6" value="Chauffage au Charbon ">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/chaffage_au_charbon_crop.png" alt="Photo -  Chauffage au Charbon">
                                 Charbon 
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                        
                        <div id="source_energie_eau_chaude_Elect" style="display:none;">
                            <h2 style="margin-top: 40px!important;margin-bottom:25px;">Type d'eau chaude sanitaire</h2>
                            <div class="step-12__content optionWithImages">
                                <label for="type_de_chaufface_1" class="select-item btn step-12__link image chauff_image_2 columnStyleInput" >                        
                                    <input type="radio" name="type_d_eau_chaude" id="type_d_eau_chaude_1" value="Chauffe-eau électrique">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_chauffe-eau-electrique.svg" alt="Photo - Chauffe-eau électrique">
                                    Chauffe-eau électrique
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_d_eau_chaude_2" class="select-item btn step-12__link image chauff_image_2 columnStyleInput" >             
                                    <input type="radio" name="type_d_eau_chaude"  id="type_d_eau_chaude_2" value="Chauffe-eau thermodynamique">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_chauffe-eau-thermodynamique.svg" alt="Photo - Chauffe-eau thermodynamique">
                                    Chauffe-eau thermodynamique
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                            <div class="step-12__content optionWithImages">
                                <label for="type_d_eau_chaude_3" class="select-item btn step-12__link image chauff_image_2 columnStyleInput" >        
                                    <input type="radio" name="type_d_eau_chaude"  id="type_d_eau_chaude_3" value="Module ECS intégré à PAC">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_ECS-et-PAC.svg" alt="Photo - Module ECS intégré à PAC">
                                    Module ECS intégré à PAC
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>

                                <label for="type_d_eau_chaude_4" class="select-item btn step-12__link image chauff_image_2 columnStyleInput" >             
                                    <input type="radio" name="type_d_eau_chaude"  id="type_d_eau_chaude_4" value="Chauffe eau solaire">
                                    <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_chauffage-solaire_.svg" alt="Photo - Chauffe eau solaire">
                                    Chauffe eau solaire
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                        </div>

                        <div class="inputs">
                            <div class="input-item">
                                <label for="inputAnneeInstall">Année d’installation</label>
                                <select name="annee_contruction_eau_chaude_sani" class="browser-default">
                                    <option disabled selected>Choisir</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="Avant 1975"> Avant 1975</option>
                                </select>
                            </div>
                        </div>

                        
                        <h2 style="margin-top: 40px!important;margin-bottom:25px;">Capacité de stockage</h2>
                        <div class="step-12__content optionWithImages" style="max-width: 845px;" > 
                            <!-- optionWithImagesColumn 
                        left__img-->
                            <label for="capacite_de_stockage_eau_chaude_1" class="select-item btn step-12__link image columnStyleInput capaciteStockage">                        
                                <input type="radio" name="capacite_de_stockage_eau_chaude" id="capacite_de_stockage_eau_chaude_1" value="Pas de stockage">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_pas-de-stockage.svg" alt="Photo - Pas de stockage">
                                Pas de stockage
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="capacite_de_stockage_eau_chaude_2" class="select-item btn step-12__link image columnStyleInput capaciteStockage">             
                                <input type="radio" name="capacite_de_stockage_eau_chaude"  id="capacite_de_stockage_eau_chaude_2" value="150 litres">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_capacite-100-150L.svg" alt="Photo - 150 litres">
                                150 litres
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="capacite_de_stockage_eau_chaude_3" class="select-item btn step-12__link image columnStyleInput capaciteStockage">        
                                <input type="radio" name="capacite_de_stockage_eau_chaude"  id="capacite_de_stockage_eau_chaude_3" value="200 litres">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_capacite-150-200L.svg" alt="Photo - 200 litres">
                                200 litres
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="capacite_de_stockage_eau_chaude_4" class="select-item btn step-12__link image columnStyleInput capaciteStockage">             
                                <input type="radio" name="capacite_de_stockage_eau_chaude"  id="capacite_de_stockage_eau_chaude_4" value="250 litres">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_capacite-200-300L.svg" alt="Photo - 250 litres">
                                250 litres
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="capacite_de_stockage_eau_chaude_5" class="select-item btn step-12__link image columnStyleInput capaciteStockage">             
                                <input type="radio" name="capacite_de_stockage_eau_chaude"  id="capacite_de_stockage_eau_chaude_5" value="300 litres et plus">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_capacite-superieure300L.svg" alt="Photo - 300 litres et plus">
                                300 litres et plus
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>

                        <h2 style="margin-top: 40px!important;margin-bottom:25px;">Utilisation de l'eau chaude sanitaire</h2>
                        <div class="step-12__content optionWithImages" style="max-width: 845px;" >
                            <!-- optionWithImagesColumn 
                                left__img    
                            -->
                            <label for="utilisation_eau_chaude_1" class="select-item btn step-12__link image columnStyleInput utilisationEauChaudeSanitaire">                        
                                <input type="radio" name="utilisation_eau_chaude" id="utilisation_eau_chaude_1" value="Sobre">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_ECS-sobre.svg" alt="Photo - Sobre">
                                Sobre
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_eau_chaude_2" class="select-item btn step-12__link image columnStyleInput utilisationEauChaudeSanitaire">             
                                <input type="radio" name="utilisation_eau_chaude"  id="utilisation_eau_chaude_2" value="Modérée">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_ECS-modere.svg" alt="Photo - Modérée">
                                Modérée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_eau_chaude_3" class="select-item btn step-12__link image columnStyleInput utilisationEauChaudeSanitaire">        
                                <input type="radio" name="utilisation_eau_chaude"  id="utilisation_eau_chaude_3" value="Normale">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_ECS-normal.svg" alt="Photo - Normale">
                                Normale
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="utilisation_eau_chaude_4" class="select-item btn step-12__link image columnStyleInput utilisationEauChaudeSanitaire">             
                                <input type="radio" name="utilisation_eau_chaude"  id="utilisation_eau_chaude_4" value="Intensive">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_ECS_intensif.svg" alt="Photo - Intensive">
                                Intensive
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_eau_chaude_5" class="select-item btn step-12__link image columnStyleInput utilisationEauChaudeSanitaire">             
                                <input type="radio" name="utilisation_eau_chaude"  id="utilisation_eau_chaude_5" value="Balnéo">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_ECS-balneo.svg" alt="Photo - Balnéo">
                                Balnéo
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                        
                        <div class="inputs">    
                            <div class="input-item">
                                <label for="inputEstimFactEauChaude">Estimation de la facture d'eau chaude sanitaire (€/an)</label>
                                <input id="inputEstimFactEauChaude" type="number" name="estimation_de_facture_d_eacu_chaude" value="0" min="0">
                            </div>
                        </div>
                    </fieldset>
                </div>
                
                <div class="modal-footer">
                    <div style="margin-right: 75px;">
                        <a href="#!" class="modal-close callToAction" id="modal2Button">VALIDER</a>
                    </div>
                </div>
            </div>
            
             <!-- Modal Structure -->
             <div id="modal3" class="modal">
                <div class="modal-content">
                    <h4 style="color:#7ac6bf;margin-bottom:0;">Appareils électriques </h4>
                    <h5 style="color:#7ac6bf;margin-bottom:40px; text-align:center;">(Appareils et équipements électriques)</h5>
                    <fieldset class="step-13">
                        <h2>Utilisation de vos appareils et équipements électriques</h2>
                        <div class="step-13__content optionWithImages" style="max-width: 830px;">
                        <!-- optionWithImagesColumn 
                    step-left__img -->
                            <label for="utilisation_appareil_equip_electrique_1" class="select-item btn step-13__link image columnStyleInput
                            appareilElectrique">                        
                                <input type="radio" name="utilisation_appareil_equip_electrique" id="utilisation_appareil_equip_electrique_1" value="Sobre">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icone_tache-menagere-sobre.svg" alt="Photo - Sobre">
                                Sobre
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_appareil_equip_electrique_2" class="select-item btn step-13__link image columnStyleInput
                            appareilElectrique">             
                                <input type="radio" name="utilisation_appareil_equip_electrique"  id="utilisation_appareil_equip_electrique_2" value="Modérée">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icone_tache-menagere-moderee.svg" alt="Photo - Modérée">
                                Modérée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_appareil_equip_electrique_3" class="select-item btn step-13__link image columnStyleInput
                            appareilElectrique">        
                                <input type="radio" name="utilisation_appareil_equip_electrique"  id="utilisation_appareil_equip_electrique_3" value="Normale">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icone_tache-menagere-elevee.svg" alt="Photo - Normale">
                                Normale
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="utilisation_appareil_equip_electrique_4" class="select-item btn step-13__link image columnStyleInput
                            appareilElectrique">             
                                <input type="radio" name="utilisation_appareil_equip_electrique"  id="source_energie_eau_chaude_4" value="Élevée">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icone_tache-menagere-elevee.svg" alt="Photo - Élevée">
                                Élevée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_appareil_equip_electrique_5" class="select-item btn step-13__link image columnStyleInput
                            appareilElectrique">        
                                <input type="radio" name="utilisation_appareil_equip_electrique"  id="utilisation_appareil_equip_electrique_5" value="Très élevée">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icone_tache-menagere-tres-elevee.svg" alt="Photo - Très élevée">
                                Très élevée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                        
                        <div class="inputs">    
                            <div class="input-item">
                                <label for="inputEstimFactAppareilElec">Estimation de la facture des appareils électriques (€/an)</label>
                                <input id="inputEstimFactAppareilElec" type="number" name="estimation_de_facture_d_eacu_chaude" value="0" min="0">
                            </div>
                        </div>
                        
                    </fieldset>
                </div>
                
                <div class="modal-footer">
                    <div style="margin-right: 75px;">
                        <a href="#!" class="modal-close callToAction" id="modal3Button">VALIDER</a>
                    </div>
                </div>
            </div>
            
             <!-- Modal Structure -->
             <div id="modal4" class="modal">
                <div class="modal-content">
                    <h4 style="color: #009245;">Éclairage </h4>
                    <fieldset class="step-14">
                        <h2>Type d'ampoules</h2>
                        <div class="step-14__content optionWithImages" style="max-width: 610px;">
                            <label for="type_d_ampoule_eclairage_1" class="select-item btn step-14__link image chauff_image_2 columnStyleInput
                             eclairageType">
                                <input type="radio" name="type_d_ampoule_eclairage" id="type_d_ampoule_eclairage_1" value="Ampoules incandescentes">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_ampoules-incandescentes.svg" alt="Photo - Ampoules incandescentes">
                                Ampoules incandescentes
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="type_d_ampoule_eclairage_2" class="select-item btn step-14__link image columnStyleInput
                            chauff_image_2 eclairageType">             
                                <input type="radio" name="type_d_ampoule_eclairage"  id="type_d_ampoule_eclairage_2" value="Ampoules LED">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_ampoules-LED.svg" alt="Photo - Ampoules LED">
                                Ampoules LED
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="type_d_ampoule_eclairage_3" class="select-item btn step-14__link image columnStyleInput
                            chauff_image_2 eclairageType" >        
                                <input type="radio" name="type_d_ampoule_eclairage"  id="type_d_ampoule_eclairage_3" value="Mixte">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_ampoules-mixtes.svg" alt="Photo - Mixte">
                                Mixte
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                        
                        <h2 style="margin-top: 40px!important;margin-bottom:25px;">Utilisation moyenne de l'éclairage par jour</h2>
                        <div class="step-14__content optionWithImages" style="max-width: 830px;">
                        <!-- optionWithImagesColumn
                    step-left__img -->
                            <label for="utilisation_moyenne_eclairage_1" class="select-item btn step-14__link image columnStyleInput
                            moyenneEclairage">                        
                                <input type="radio" name="utilisation_moyenne_eclairage" id="utilisation_moyenne_eclairage_1" value="Sobre">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_Eclairage-sobre.svg" alt="Photo - Sobre">
                                Sobre
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_moyenne_eclairage_2" class="select-item btn step-14__link image columnStyleInput
                            moyenneEclairage">             
                                <input type="radio" name="utilisation_moyenne_eclairage"  id="utilisation_moyenne_eclairage_2" value="Modérée">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_Eclairage-modere.svg" alt="Photo - Modérée">
                                Modérée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_moyenne_eclairage_3" class="select-item btn step-14__link image columnStyleInput
                            moyenneEclairage">        
                                <input type="radio" name="utilisation_moyenne_eclairage"  id="utilisation_moyenne_eclairage_3" value="Moyenne">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_Eclairage-normal.svg" alt="Photo - Moyenne">
                                Moyenne
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_moyenne_eclairage_4" class="select-item btn step-14__link image columnStyleInput
                            moyenneEclairage">        
                                <input type="radio" name="utilisation_moyenne_eclairage"  id="utilisation_moyenne_eclairage_4" value="Élevée">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-normal_Eclairage-eleve.svg" alt="Photo - Élevée">
                                Élevée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_moyenne_eclairage_5" class="select-item btn step-14__link image columnStyleInput
                            moyenneEclairage">        
                                <input type="radio" name="utilisation_moyenne_eclairage"  id="utilisation_moyenne_eclairage_5" value="Très élevée">
                                <img class="step-chauff__img" src="./assets/images/picto_gte/icones-selectionnee_Eclairage-tres-eleve.svg" alt="Photo - Très élevée">
                                Très élevée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>

                        <div class="inputs">    
                            <div class="input-item">
                                <label for="inputEstimFactEclairage">Estimation de la facture d'éclairage (€/an)</label>
                                <input id="inputEstimFactEclairage" type="number" name="estimation_de_eclairage_par_an" value="0" min="0">
                            </div>
                        </div>  
                    </fieldset>
                </div>
                
                <div class="modal-footer">
                    <div style="margin-right: 75px;">
                        <a href="#!" class="modal-close callToAction" id="modal4Button">VALIDER</a>
                    </div>
                </div>
            </div>
            
            <div id="modal5" class="modal">
                <div class="modal-content">
                    <div class="input-counter">
                        <div class="counter"> 
                            <div class="counter__fields">
                                <div class="counter__title">Nombre de pieces </div>
                            </div>
                            <div class="counter_buttons">
                                <button class="counter__decrement" type="button">
                                    -
                                </button>
                                <span class="counter__value" name="pompe_a_chaleur_air_air_nombre_unite">0</span>
                                <button class="counter__increment" type="button">
                                    +
                                </button>
                            </div>
                        </div> 
                    </div>
                    <div id="piecesId" class="pieces">
                    </div>
                    
                </div>
                <div class="modal-footer"style="margin-top: 25px;text-align:center;margin-bottom: 30px;">
                    <div >
                        <a href="#!" class="modal-close callToAction" >VALIDER</a>
                    </div>
                </div>
            </div>

            
            <div id="modal6" class="modal">
                <div class="modal-content">
                    <div class="container" style="margin-top: 40px;">
                        <div class="col s12">
                            <div class="buttons" style="text-align: center;">
                                <button id="start_camera_button" type="text">Ouvrir la camera</button>
                                <button id="take_picture_button" type="text" disabled>Capturer une photo</button>
                                <button id="clear_picture_button" type="text" disabled>Effacer la photo</button>
                            </div>
                        </div>
                        <div class="row" style="text-align: center;">
                            <div class="col m6 p_rel">
                                <label for="video_camera">Camera vidéo</label><br /> 
                                <!-- <span class="material-icons-outlined">flip_camera_android</span> -->
                                <select id="videoSource" style="width: 100%;">
                                </select>
                                <video id="video_camera" class="responsive-video">Stream vidéo not disponible.
                                </video><br />
                            </div>
                            <div class="col m6">
                                <!-- Canvas -->
                                <label for="canvas">Aperçu photo</label><br />
                                <canvas id="canvas"></canvas><br />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"style="margin-top: 25px;text-align:center;margin-bottom: 30px;">
                    <div >
                        <a href="#!" class="modal-close callToAction" id="modal6Button">VALIDER</a>
                    </div>
                </div>
            </div>
            <!-- end -->
        </div>
    </main>
    <!-- <script src="./assets/js/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="./assets/js/materialize.min2.js"></script>
    <script src="./assets/js/nouislider.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./assets/js/app.js" ></script>
    <!-- <script type="text/javascript" src="node_modules/materialize-css-helper/dist/main.js"></script> --> -->
    <!-- <script src="./node_modules/jslib-html5-camera-photo/build/index.js" ></script> -->
    <!-- <script src="./assets/js/camera.js" ></script> -->
    <!-- <script src="./assets/js/generatePDF.js"></script> -->
</body>
</html>