<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Muli:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/materialize.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    </script>
    <title>Trouvez votre métier idéal | Groupe Transition Energie</title>
</head>
<body>
    <main>
        <div class="topbar">
            <div class="topbar__logo">
                <img src="./assets/images/logo_groupe_transition_energie.png" alt="Logo - Groupe Transition Energie">
            </div>
            <div class="topbar__infos">
            Étude personnalisée de l’habitat
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
                <div class="previous">
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
               
                <form id="regiration_form" method="post" novalidate>
                    <fieldset class="step-1">
                        <!-- <h1>Étude personnalisée de l’habitat</h1> -->
                        <h2>Informations personnelles</h2>
                        <div class="step-1__content">
                            <div class="inputs">
                                <div class="input-item">
                                    <label for="inputNom">Nom</label>
                                    <input id="inputNom" type="text" name="nom" class=""  placeholder="Votre nom">
                                    <span class="step-1__content__notice">Nom requis </span>
                                </div>
                                <div class="input-item lastname">
                                    <label for="inputPrenom">Prénom</label>
                                    <input id="inputPrenom" type="text" name="prenom" class="" placeholder="Votre prénom">
                                    <span class="step-1__content__notice">Prénom requis </span>
                                </div>
                            </div>

                            <div class="inputs">
                                <div class="input-item">
                                    <label for="inputTelephone">Téléphone</label>
                                    <input id="inputTelephone" type="text" name="telephone" class=""  placeholder="Ex: 06 31 77 82 83">
                                    <span class="step-1__content__notice">Téléphone requis </span>
                                </div>  
                                <div class="input-item">
                                    <label for="inputMail">Email</label>
                                    <input id="inputMail" type="email" name="mail" class="" placeholder="Ex: mail@gmail.com">
                                    <span class="step-1__content__notice">Email requis </span>
                                </div>
                            </div>
                            
                            <div class="inputs">
                                <div class="input-item nopr20">
                                    <label for="inputAddress">Adresse</label>
                                    <input id="inputAddress" type="text" name="address" class=""  placeholder="Votre adresse">
                                    <span class="step-1__content__notice">Adresse requis </span>
                                </div>  
                            </div>
                            <div class="inputs">
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
                            </div>
                        </div>
                        
                    </fieldset>
                    <fieldset class="step-2">
                        <h2>Type d’occupation</h2>
                        <div class="step-2__content">
                            <div class="step-2__content optionWithImages">
                                <label for="type_occupation_1" class="select-item btn step-2__link image image4">
                                    <input type="radio" name="type_d_occupation" id="type_occupation_1" value="Propriétaire occupant">
                                    <span class="img-wrapper">
                                        <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_Proprietaire-occupant.svg" alt="Photo - Carrée/rectangulaire">
                                    </span>
                                    Propriétaire occupant
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>

                                <label for="type_occupation_2" class="select-item btn step-2__link image image4">
                                    <input type="radio" name="type_d_occupation" id="type_occupation_2" value="
                                    Propriétaire d’une résidence secondaire">
                                    <span class="img-wrapper">
                                        <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_proprietaire-maison-secondaire.svg" alt="Photo - Propriétaire d’une résidence secondaire">
                                    </span>
                                    Propriétaire d’une résidence secondaire
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>

                                <label for="type_occupation_3" class="select-item btn step-2__link image image4">
                                    <input type="radio" name="type_d_occupation" id="type_occupation_3" value="Propriétaire bailleur">
                                    <span class="img-wrapper">
                                        <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_proprietaire-bailleur.svg" alt="Photo - Propriétaire bailleur">
                                    </span>
                                    Propriétaire bailleur
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>

                                <label for="type_occupation_4" class="select-item btn step-2__link image image4">
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
                                            <span class="counter__value" name="nombre_d_habitants">0</span>
                                            <button class="counter__increment" type="button">
                                                +
                                            </button>
                                        </div>
                                        <span class="step-1__content__notice">Nombre d’habitants requis </span>

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
                                    <select name="annee_contruction" id="">
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
                                        <option value="1995">1993</option>
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
                                    <input id="inputSurfaceSol" type="number" name="surface_au_sol" class="" min="0">
                                    <span class="step-1__content__notice">Surface au sol (m 2) requis </span>
                                </div>
                            </div>
                            
                            <h2>Type d’installation électrique :</h2>
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
                                    <span class="step-1__content__notice">Puissance du compteur (Kwa) requis </span>
                                </div>  
                            </div>
                    </fieldset>
                    <fieldset class="step-4">
                        <h2>Forme de la maison</h2>
                        <!-- <h4 class="subtitle">Y compris CDI, CDD, intérim et alternance</h4> -->
                        <div class="step-4__content optionWithImages">
                            <label for="inptutCarreeRect" class="next btn step-4__link image">
                                <input type="radio" name="forme_maison" id="inptutCarreeRect" value="Carrée/rectangulaire">
                                <img class="step-1__img" src="./assets/images/picto_gte/carree_rectangulaire.png" alt="Photo - Carrée/rectangulaire">
                                Carrée/rectangulaire
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="inputAllongee" class="next btn step-4__link image">
                                <input type="radio" name="forme_maison" id="inputAllongee" value="Allongée">
                                <img class="step-1__img" src="./assets/images/picto_gte/allongee.png" alt="Photo - Allongée">
                                Allongée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                            
                            <label for="inputDeveloppe" class="next btn step-4__link image">
                                <input type="radio" name="forme_maison" id="inputDeveloppe" value="Développée">
                                <img class="step-1__img" src="./assets/images/picto_gte/developpee.png" alt="Photo - Développée">
                                Développée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="step-5">
                        <h2>Nombre de niveau</h2>
                        <div class="step-5__content optionWithImages">
                            <label for="inputNiveau1" class="select-item btn step-5__link image">
                                <input type="radio" name="nombre_de_niveau" id="inputNiveau1" value="Niveau 1">
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_1niveau.svg" alt="Photo - Niveau 1">     
                                </span>
                                1                           
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="inputNiveau2" class="select-item btn step-5__link image">
                                <input type="radio" name="nombre_de_niveau" id="inputNiveau2" value="Niveau 2">
                                
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_2niveaux.svg" alt="Photo - Niveau 2">
                                </span>
                                2
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="inputNiveau3" class="select-item btn step-5__link image">
                                <input type="radio" name="nombre_de_niveau" id="inputNiveau3" value="Niveau 3">
                                <span class="img-wrapper">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_3niveaux.svg" alt="Photo - Niveau 3" >
                                </span>
                                3
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                            
                        <label for="hauteur_sous_plafond_moyenne">Hauteur sous plafond</label>  
                        <select id="hauteur_sous_plafond_moyenne" name="hauteur_sous_plafond_moyenne" style="width: 100%;">
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
                        <div class="inputs"> 
                            <div class="input-item nopr20">
                                <label for="inputVolumeHabitation">Volume habitation (m 3 hauteur x surface )</label>
                                <input id="inputVolumeHabitation" type="number" name="volume_habitation" class="" min="0">
                                <span class="step-1__content__notice">Volume habitation (m 3 hauteur x surface ) requis </span>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="step-6">
                        <h2>Type de sous-sol</h2>
                        <div class="step-6__content optionWithImages">
                            <label for="inputCaveSousSol" class="select-item btn step-6__link image">
                                <input type="radio" name="type_de_sous_sol" id="inputCaveSousSol" value="Cave/sous-sol">
                                <img class="step-1__img" src="./assets/images/picto_gte/sous_sol.png" alt="Photo - cave/sous-sol">
                                Cave/sous-sol
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="inputTerrePlein" class="select-item btn step-6__link image">
                                <input type="radio" name="type_de_sous_sol" id="inputTerrePlein" value="Terre-plein">
                                <img class="step-1__img" src="./assets/images/picto_gte/terre_plein.png" alt="Photo - Terre-plein">
                                Terre-plein
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                            
                            <label for="inputVideSanitaire" class="select-item btn step-6__link image">
                                <input type="radio" name="type_de_sous_sol" id="inputVideSanitaire" value="Vide sanitaire">
                                <img class="step-1__img" src="./assets/images/picto_gte/vide_sanitaire.png" alt="Photo - Vide sanitaire">
                                Vide sanitaire
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                        </div>
                            <h2>Type de murs </h2>
                        <div class="step-6__content optionWithImages">
                            <label for="inputPierre" class="select-item btn step-6__link image four-item-image">
                                <input type="radio" name="type_de_mur" id="inputPierre" value="Pierre">
                                <img class="step-1__img" src="./assets/images/picto_gte/pierre.png" alt="Photo - Pierre">
                                Pierre
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="inputBeton" class="select-item btn step-6__link image four-item-image">
                                <input type="radio" name="type_de_mur" id="inputBeton" value="Béton">
                                <img class="step-1__img" src="./assets/images/picto_gte/beton.png" alt="Photo - Béton">
                                Béton                                
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                            
                            <label for="inputBrique" class="select-item btn step-6__link image four-item-image">
                                <input type="radio" name="type_de_mur" id="inputBrique" value="Brique">
                                <img class="step-1__img" src="./assets/images/picto_gte/brique.png" alt="Photo - Brique">
                                Brique
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                            <label for="inputBois" class="select-item btn step-6__link image four-item-image">
                                <input type="radio" name="type_de_mur" id="inputBois" value="Bois">
                                <img class="step-1__img" src="./assets/images/picto_gte/bois.png" alt="Photo - Bois">
                                Bois
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                        </div>    
                    </fieldset>
                    
                    <fieldset class="step-7">
                        <h2>Type de combles  </h2>                        
                        <div class="step-7__content">
                            <div class="step-7__content optionWithImages">
                                <label for="inputCombleAmenage" class="select-item btn step-7__link image">
                                    <input type="radio" name="type_de_comble" id="inputCombleAmenage" value="Combles aménagés">
                                    <img class="step-1__img" src="./assets/images/picto_gte/comble_amenage.png" alt="Photo - Combles aménagés">
                                    Combles aménagés
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="inputComblePerdue" class="select-item btn step-7__link image">
                                    <input type="radio" name="type_de_comble" id="inputComblePerdue" value="Combles perdues">
                                    <img class="step-1__img" src="./assets/images/picto_gte/comble_perdue.png" alt="Photo - Combles perdues">
                                    Combles perdues
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                                </label>
                                
                                <label for="inputPasDeComble" class="select-item btn step-7__link image">
                                    <input type="radio" name="type_de_comble" id="inputPasDeComble" value="Pas de combles">
                                    <img class="step-1__img" src="./assets/images/picto_gte/pas_de_comble.png" alt="Photo - Pas de combles">
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
                                    <input type="radio" name="comble_isole"  id="type_installation_electrique_2" value="Je ne sais pas">
                                    <span>Je ne sais pas</span>
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox not-absolute">
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="step-8">
                        <h2>Type de vitrages  </h2>
                        <div class="step-10__content optionWithImages">
                            <label for="type_de_vitrage_1" class="next btn step-8__link image">                        
                                <input type="radio" name="type_de_vitrage" id="type_de_vitrage_1" value="Simple">
                                <img class="step-1__img" src="./assets/images/picto_gte/vitrage_simple.png" alt="Photo - Vitrage simple">
                                Simple
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="type_de_vitrage_2" class="next btn step-8__link image">                          
                                <input type="radio" name="type_de_vitrage"  id="type_de_vitrage_2" value="Double">
                                <img class="step-1__img" src="./assets/images/picto_gte/vitrage_double.png" alt="Photo - Vitrage double">
                                Double
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="type_de_vitrage_3" class="next btn step-8__link image">               
                                <input type="radio" name="type_de_vitrage"  id="type_de_vitrage_3" value="Double renforcé">
                                <img class="step-1__img" src="./assets/images/picto_gte/vitrage_double_renforce.png" alt="Photo - Vitrage renforcé">
                                Double renforcé
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">

                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="step-9">
                        <h2>Type de ventilation</h2>
                        <div class="step-9__content optionWithImages">
                            <label for="type_de_ventilation_1" class="next btn step-9__link image">                        
                                <input type="radio" name="type_de_ventilation" id="type_de_ventilation_1" value="Naturelle">
                                <img class="step-1__img" src="./assets/images/picto_gte/ventilation_naturelle.png" alt="Photo - Ventilation naturelle">
                                Naturelle
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="type_de_ventilation_2" class="next btn step-9__link image">             
                                <input type="radio" name="type_de_ventilation"  id="type_de_ventilation_2" value="Simple">
                                <img class="step-1__img" src="./assets/images/picto_gte/ventilation_double.png" alt="Photo - Ventilation Simple">
                                Simple
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="type_de_ventilation_3" class="next btn step-9__link image">        
                                <input type="radio" name="type_de_ventilation"  id="type_de_ventilation_3" value="Double f lux">
                                <img class="step-1__img" src="./assets/images/picto_gte/ventilation_double_flux.png" alt="Photo - Ventilation double flux">
                                Double flux
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>                        
                        <label for="inputTempConfort">Coefficient d’isolation G</label>
                        <select id="visolation" style="width: 100%;" name="coefficient_d_isolation">
                            <option value="3.00">G = 3.00 : véranda ancienne</option>
                            <option value="2.50">G = 2.50 : véranda récente</option>
                            <option value="2.00">G = 2.00 : ancien très mal isolé</option>
                            <option value="1.80">G = 1.80 : bâtiment années 1950</option>
                            <option value="1.70">G = 1.70 : ancien isolé sur dalle</option>
                            <option value="1.60">G = 1.60 : bâtiment années 1960</option>
                            <option value="1.60">G = 1.60 : ancien mur épais pas isolé</option>
                            <option value="1.40">G = 1.40 : entre 1974-1982</option>
                            <option value="1.30">G = 1.30 : immeuble années 1980</option>
                            <option value="1.10">G = 1.10 : maison années 1980</option>
                            <option value="1.00">G = 1.00 : entre 1990-2000</option>
                            <option value="0.92">G = 0.92 : isolation norme RT2005 Gaz</option>
                            <option value="0.90">G = 0.90 : maison RT2000</option>
                            <option value="0.87">G = 0.87 : HPE rénovation 2009</option>
                            <option selected="selected" value="0.80">G = 0.80 : entre 2001-2005</option>
                            <option value="0.80">G = 0.80 : isolation norme RT2000</option>
                            <option value="0.80">G = 0.80 : maison RT2005</option>
                            <option value="0.73">G = 0.73 : bâtiment après 2005</option>
                            <option value="0.65">G = 0.65 : isolation norme RT2005</option>
                            <option value="0.58">G = 0.58 : isolation norme RT2005 Elec</option>
                            <option value="0.47">G = 0.47 : BBC rénovation 2009</option>
                            <option value="0.30">G = 0.30 : isolation norme RT2012</option>
                        </select>
                    </fieldset>
                    
                    <fieldset class="step-10">
                        
                    <h2>Vos consommations<br>poste par poste</h2>                     
                        <!-- <h3 class="text-center mb-4">Vos consommations
                            <br>poste par poste</h3>    -->
                        <div class="step-10__content optionWithImages" style="justify-content: center;">
                            <div class="vos-consommations__consumption-list">
                                <a class="vos-consommations__consumption-item chauffage-item" data-target="modal1" class="btn chauffage-modal-trigger" id="chauffageModalButton">
                                    <div class="left-part">
                                        <div class="img-wrapper"><img alt="" src="./assets/images/picto_gte/chauffee-small-icon.svg">
                                        </div>
                                        <div class="name-caption">Chauffage</div>
                                    </div>

                                    <div class="consump-info">
                                        <div class="consumpt-val">-€</div>
                                        <div class="consumpt-caption">-</div>
                                    </div>
                                </a>
                                
                                <a class="vos-consommations__consumption-item ecs-item" data-target="modal2" class="btn chauffage-modal-trigger" id="eauSanitaireModalButton">
                                    <div class="left-part">
                                        <div class="img-wrapper"><img alt="" src="./assets/images/picto_gte/ecs-white-icon.svg">
                                        </div>
                                        <div class="name-caption">Eau chaude sanitaire (ECS)</div>
                                    </div>

                                    <div class="consump-info">
                                        <div class="consumpt-val">-€</div>
                                        <div class="consumpt-caption">-</div>
                                    </div>
                                </a>
                                
                                <a class="vos-consommations__consumption-item taches-item" data-target="modal3" class="btn chauffage-modal-trigger" id="appareilElecModalButton">
                                    <div class="left-part">
                                        <div class="img-wrapper"><img alt="" src="./assets/images/picto_gte/taches-menageres-white-icon.png"></div>
                                        <div class="name-caption">Appareils électriques</div>
                                    </div>

                                    <div class="consump-info">
                                        <div class="consumpt-val">-€</div>
                                        <div class="consumpt-caption">-</div>
                                    </div>
                                </a>
                                
                                <a class="vos-consommations__consumption-item eclairage-item" data-target="modal4" class="btn chauffage-modal-trigger" id="eclairageModalButton">
                                    <div class="left-part">
                                        <div class="img-wrapper"><img alt="" src="./assets/images/picto_gte/electricite-white-icon.svg"></div>
                                        <div class="name-caption">Éclairage</div>
                                    </div>

                                    <div class="consump-info">
                                        <div class="consumpt-val">-€</div>
                                        <div class="consumpt-caption">-</div>

                                    </div>
                                </a>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="step-11">
                        <h1>Consommation et équipements</h1>
                        <h2>CONSOMMATION ANNUELLE</h2>
                        <div class="step-10__content optionWithImages">
                            <label for="consommation_annuelle_1" class="multi-select-item btn step-11__link image">                        
                                <input type="radio" name="consommation_annuelle" id="consommation_annuelle_1" value="Electricité">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_électricité.svg" alt="Photo - Electricité">
                                <div class="inputs">
                                    <div class="input-item">
                                        <label for="inputConsoElec">Electricité (€)</label>
                                        <input id="inputConsoElec" type="number" name="consommation_annuelle_elec" class="" min="0">
                                    </div>  
                                </div>
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="consommation_annuelle_2" class="multi-select-item btn step-11__link image">             
                                <input type="radio" name="consommation_annuelle"  id="consommation_annuelle_2" value="Gaz naturel">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_gaz naturel.svg" alt="Photo - Gaz naturel">
                                <div class="inputs">
                                    <div class="input-item">
                                        <label for="inputConsoGaz">Gaz naturel (€)</label>
                                        <input id="inputConsoGaz" type="number" name="consommation_annuelle_gaz" value="0" min="0">
                                    </div>  
                                </div>
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="consommation_annuelle_3" class="multi-select-item btn step-11__link image" style="margin-top: 10px;">        
                                <input type="radio" name="consommation_annuelle"  id="consommation_annuelle_3" value="GPL">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_GPL.svg" alt="Photo - GPL">
                                <div class="inputs">
                                    <div class="input-item">
                                        <label for="inputConsoGpl">GPL (€)</label>
                                        <input id="inputConsoGpl" type="number" name="consommation_annuelle_gpl" class="" min="0">
                                    </div>  
                                </div>
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="consommation_annuelle_4" class="multi-select-item btn step-11__link image">             
                                <input type="radio" name="consommation_annuelle"  id="consommation_annuelle_4" value="FIOUL">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_fioul.svg" alt="Photo - FIOUL">
                                <div class="inputs">
                                    <div class="input-item">
                                        <label for="inputConsoFioul">FIOUL (€)</label>
                                        <input id="inputConsoFioul" type="number" name="consommation_annuelle_fioul" value="0" min="0">
                                    </div>  
                                </div>
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="consommation_annuelle_5" class="multi-select-item btn step-11__link image">        
                                <input type="radio" name="consommation_annuelle"  id="consommation_annuelle_5" value="Bois">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_bois.svg" alt="Photo - Bois">
                                <div class="inputs">
                                    <div class="input-item">
                                        <label for="inputConsoBois">Bois (€)</label>
                                        <input id="inputConsoBois" type="number" name="consommation_annuelle_bois" class="" min="0">
                                    </div>  
                                </div>
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="consommation_annuelle_6" class="multi-select-item btn step-11__link image">        
                                <input type="radio" name="consommation_annuelle"  id="consommation_annuelle_6" value="Autre">
                                <div class="inputs" style="margin-top: 70px;">
                                    <div class="input-item">
                                        <label for="inputConsoAutre">Autre (€)</label>
                                        <input id="inputConsoAutre" type="number" name="consommation_annuelle_autre" class="" min="0">
                                    </div>  
                                </div>
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="step-12">
                        <h2>CONSOMMATION ANNUELLE</h2>
                        <div class="inputs">
                            <div class="input-item nopr20">
                                <label for="inputConsoAnIndex">INDEXATION</label>
                                <input id="inputConsoAnIndex" type="number" name="conso_indexation" class="" min="0" value="20">
                                <span class="step-1__content__notice">Hauteur sous plafond moyenne (m) requis </span>
                            </div>  
                        </div>
                        <div class="inputs">
                            <div class="input-item nopr20">
                                <label for="inputTotalConso20ans">TOTAL CONSOMMATION SUR 20 ANS</label>
                                <input id="inputTotalConso20ans" type="number" name="conso_moyenne_conso" class="" min="0" style="background: #ae391c78; color: #fff;" >
                                <span class="step-1__content__notice">MOYENNE DE CONSOMMATION SUR 20 ANS requis </span>
                            </div>
                        </div>
                        <div class="inputs">
                            <div class="input-item nopr20">
                                <label for="inputMoyennConso">MOYENNE DE CONSOMMATION SUR 20 ANS</label>
                                <input id="inputMoyennConso" type="number" name="conso_moyenne_conso" class="" min="0" style="background: #f6dc12;">
                                <span class="step-1__content__notice">MOYENNE DE CONSOMMATION SUR 20 ANS requis </span>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="step-13">
                        <h1>Chauffage actuel</h1>
                        <h2>Source d’énergie</h2>
                        <div class="step-13__content optionWithImages">
                            <label for="source_energie_1" class="next btn step-13__link image">                        
                                <input type="radio" name="source_energie" id="source_energie_1" value="Electricité">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_électricité.svg" alt="Photo - Electricité">
                                Electricité
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_2" class="next btn step-13__link image">             
                                <input type="radio" name="source_energie"  id="source_energie_2" value="Gaz naturel">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_gaz naturel.svg" alt="Photo - Gaz naturel">
                                Gaz naturel
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_3" class="next btn step-13__link image">        
                                <input type="radio" name="source_energie"  id="source_energie_3" value="GPL">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_GPL.svg" alt="Photo - GPL">
                               GPL
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="source_energie_4" class="next btn step-13__link image">             
                                <input type="radio" name="source_energie"  id="source_energie_4" value="FIOUL">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_fioul.svg" alt="Photo - FIOUL">
                                FIOUL
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_5" class="next btn step-13__link image">        
                                <input type="radio" name="source_energie"  id="source_energie_5" value="Bois">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_bois.svg" alt="Photo - Bois">
                                Bois
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                    </fieldset>
                    
                    <fieldset class="step-14">
                        <h2>Source d’énergie</h2>
                        <div class="step-14__content">
                            <div class="inputs">
                                <div class="input-item nopr20">
                                    <label for="inputConsoChauffage">Consommation de chauffage (€/an)</label>
                                    <input id="inputConsoChauffage" type="number" name="source_energie_chaufface" class="" min="0">
                                    <span class="step-1__content__notice">Consommation de chauffage (€/an) (m) requis </span>
                                </div>  
                            </div>
                            <div class="inputs">
                                <div class="input-item">
                                    <label for="inputAnneeInstall">Année d’installation</label> 
                                    <select name="annee_install_source_energie" id="">
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
                                        <option value="1995">1993</option>
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
                            
                            <h2>Type de chauffage</h2>
                            <div class="noImageSelection">
                                <label for="inputRadiateurFonte" class="select-item btn step-14__link no-image" style="width:200px;">                                       
                                    <input type="radio" name="source_energie_no_image" id="inputRadiateurFonte" value="Radiateur fonte">
                                    <span>Radiateur fonte</span>
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox not-absolute">
                                </label>

                                <label for="inputRadiateurAlu" class="select-item btn step-14__link no-image">                                       
                                    <input type="radio" name="source_energie_no_image"  id="inputRadiateurAlu" value="Radiateur alluminium">
                                    <span>Radiateur alluminium</span>
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox not-absolute">
                                </label>

                                <label for="inputRadiateurPlan" class="select-item btn step-14__link no-image" style="width:235px;">                                       
                                    <input type="radio" name="source_energie_no_image" id="inputRadiateurPlan" value="Plancher chauffant">
                                    <span>Plancher chauffant</span>
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox not-absolute">
                                </label>
                            </div>

                            
                            <div class="input-counter">
                                <div class="counter">
                                    <div class="counter__fields">
                                        <div class="counter__title">Nombre </div>
                                    </div>
                                    <div class="counter_buttons">
                                        <button class="counter__decrement" type="button">
                                            -
                                        </button>
                                        <span class="counter__value" name="source_energie_nombre">0</span>
                                        <button class="counter__increment" type="button">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>  

                        </div>
                    </fieldset>
                    
                    <fieldset class="step-15">
                        <h1>Eau chaude sanitaire actuelle</h1>
                        <h2>Source d’énergie</h2>
                        <div class="step-15__content optionWithImages">
                            <label for="source_energie_eau_chaude_1" class="select-item btn step-15__link image">                        
                                <input type="radio" name="source_energie_eau_chaude" id="source_energie_eau_chaude_1" value="Electricité">
                                <img class="step-1__img" src="./assets/images/picto_gte/conso_elec.png" alt="Photo - Electricité">
                                Electricité
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_eau_chaude_2" class="select-item btn step-15__link image">             
                                <input type="radio" name="source_energie_eau_chaude"  id="source_energie_eau_chaude_2" value="Gaz naturel">
                                <img class="step-1__img" src="./assets/images/picto_gte/conso_gaz.png" alt="Photo - Gaz naturel">
                                Gaz naturel
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_eau_chaude_3" class="select-item btn step-15__link image">        
                                <input type="radio" name="source_energie_eau_chaude"  id="source_energie_eau_chaude_3" value="GPL">
                                <img class="step-1__img" src="./assets/images/picto_gte/conso_gpl.png" alt="Photo - GPL">
                               GPL
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="source_energie_eau_chaude_4" class="select-item btn step-15__link image">             
                                <input type="radio" name="source_energie_eau_chaude"  id="source_energie_eau_chaude_4" value="FIOUL">
                                <img class="step-1__img" src="./assets/images/picto_gte/conso_fioul.png" alt="Photo - FIOUL">
                                FIOUL
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_eau_chaude_5" class="select-item btn step-15__link image">        
                                <input type="radio" name="source_energie_eau_chaude"  id="source_energie_eau_chaude_5" value="Bois">
                                <img class="step-1__img" src="./assets/images/picto_gte/conso_bois.png" alt="Photo - Bois">
                                Bois
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                        
                        <div class="inputs">
                            <div class="input-item nopr20">
                                <label for="inputSourceEnergieEauSani">Consommation d’eau chaude sanitaire (€/an)</label>
                                <input id="inputSourceEnergieEauSani" type="number" name="source_energie_eau_chaude_conso_eau_sani" class="" min="0">
                                <span class="step-1__content__notice">Consommation d’eau chaude sanitaire (€/an) requis </span>
                            </div>  
                        </div>
                        
                        <div class="inputs">
                            <div class="input-item nopr20">
                                <label for="inputSourceEnergieTypeSystem">Type de système</label>
                                <input id="inputSourceEnergieTypeSystem" type="number" name="source_energie_eau_chaude_conso_type_systeme" class="" min="0">
                                <span class="step-1__content__notice">Type de système requis </span>
                            </div>  
                        </div>
                        
                        <div class="inputs">
                            <div class="input-item nopr20">
                                <label for="inputSourceEnergieAnneInstal">Année d’installation</label>
                                <select name="annee_contruction_eau_chaude_conso" id="">
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
                                    <option value="1995">1993</option>
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
                    </fieldset>

                    <fieldset class="step-16">
                        <h1>Eclairage actuelle</h1>
                        <h2>Source d’énergie</h2>
                        <div class="step-16__content optionWithImages">
                            <label for="source_energie_eclairage_1" class="next btn step-16__link image">                        
                                <input type="radio" name="source_energie_eclairage" id="source_energie_eclairage_1" value="Electricité ampoules classique">
                                <img class="step-1__img" src="./assets/images/picto_gte/conso_elec.png" alt="Photo - Electricité ampoules classique">
                                Electricité ampoules classique
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                
                            </label>
                        </div>
                    </fieldset>
                    
                    <fieldset class="step-17">
                        <h1>Chauffage envisagé</h1>
                        <h2>Source d’énergie</h2>
                        <div class="step-17__content optionWithImages">
                            <label for="chaufface_envisage_source_energie_1" class="select-item btn step-17__link image" style="height:auto;">                        
                                <input type="radio" name="chaufface_envisage_source_energie" id="chaufface_envisage_source_energie_1" value="Pac air/air">
                                <img class="step-1__img" src="./assets/images/picto_gte/pac_air_air.png" alt="Photo - Pac air/air">
                                Pac air/air 
                                <div class="input-counter">
                                    <!-- <div class="counter"> -->
                                        <div class="counter__fields">
                                            <div class="counter__title">Nombre d’unité </div>
                                            <!-- <div class="counter__subtitle">Nombre d’habitants </div> -->
                                        </div>
                                        <div class="counter_buttons">
                                            <button class="counter__decrement" type="button">
                                                -
                                            </button>
                                            <span class="counter__value" name="chaufface_envisage_source_energie_nbr_unite">0</span>
                                            <button class="counter__increment" type="button">
                                                +
                                            </button>
                                        </div>
                                        <span class="step-1__content__notice">Nombre d’unité requis </span>

                                    <!-- </div> -->
                                </div>  
                                <!-- <div class="inputs" style="margin: 0;">
                                    <div class="input-item nopr20">
                                        <label for="inputChauffEnvisageNombreUni">Nombre d’unité</label>
                                        <input id="inputChauffEnvisageNombreUni" type="number" name="chaufface_envisage_source_energie_nbr_unite" class="" min="0">
                                        <span class="step-1__content__notice">Nombre d’unité requis </span>
                                    </div>  
                                </div>          -->
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="chaufface_envisage_source_energie_2" class="select-item btn step-17__link image" style="height:auto;">                        
                                <input type="radio" name="chaufface_envisage_source_energie" id="chaufface_envisage_source_energie_2" value="Pac air/eau">
                                <img class="step-1__img" src="./assets/images/picto_gte/pair_air_eau.png" alt="Photo - Pac air/eau">
                                Pac air/eau 
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                <div class="inputs" style="margin: 0;">
                                    <div class="input-item nopr20">
                                        <label for="inputChauffEnvisageNombreUni">G-isolation X</label>
                                        <input id="inputChauffEnvisageNombreUni" type="number" name="chaufface_envisage_source_energie_nbr_unite" class="" min="0">
                                        <span class="step-1__content__notice">G-isolation X requis </span>
                                    </div> 
                                </div>   
                                <div class="inputs" style="margin: 0;">
                                    <div class="input-item nopr20">
                                        <label for="inputChauffEnvisageNombreUni">Volume m 3 T°∆</label>
                                        <input id="inputChauffEnvisageNombreUni" type="number" name="chaufface_envisage_source_energie_nbr_unite" class="" min="0">
                                        <span class="step-1__content__notice">Volume m 3 T°∆ requis </span>
                                    </div>  
                                </div>    
                            </label>
                             
                            <div class="inputs">
                                <div class="input-item nopr20">
                                    <label for="inputChauffEnvisagePuissancePac">Puissance estimée pac</label>
                                    <input id="inputChauffEnvisagePuissancePac" type="number" name="chaufface_envisage_source_energie_puissance_pac" class="" min="0">
                                    <span class="step-1__content__notice">Puissance estimée pac requis </span>
                                </div>  
                            </div>    
                        </div>
                    </fieldset>
                    
                    <fieldset class="step-18">
                        <h1>Eau chaude sanitaire envisagée</h1>
                        <h2>Source d’énergie</h2>
                        <div class="step-18__content optionWithImages">
                            <label for="eau_chaude_sanitaire_envisage_source_energie_1" class="select-item btn step-18__link image" style="height:auto;">                        
                                <input type="radio" name="eau_chaude_sanitaire_envisage_source_energie" id="eau_chaude_sanitaire_envisage_source_energie_1" value="Chauffe-eau thermodynamique">
                                <img class="step-1__img" src="./assets/images/picto_gte/chauffe_eau_thermo.png" alt="Photo - Chauffe-eau thermodynamique">
                                Chauffe-eau thermodynamique
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                        <div class="input-counter">
                            <div class="counter">
                                <div class="counter__fields">
                                    <div class="counter__title">Hauteur sous plafond </div>
                                </div>
                                <div class="counter_buttons" style="margin-top:10px">
                                    <button class="counter__decrement" type="button">
                                        -
                                    </button>
                                    <span class="counter__value" name="eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond" id="eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond">0</span>
                                    <button class="counter__increment" type="button">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>  
                        <div class="inputs" >
                            <div class="input-item">
                                <label for="inputEauSaniEnvisageBallEauChau">Ballon d’eau chaude</label>
                                <input id="inputEauSaniEnvisageBallEauChau" type="number" name="eau_chaude_sanitaire_envisage_source_energie_ballon_eau_chau" class="" min="0">
                                <span class="step-1__content__notice">Ballon d’eau chaude requis </span>
                            </div>  
                        </div>
                        
                        <div class="noImageSelection">
                            <label for="eau_chaude_sanitaire_envisage_source_energie_no_image_1" class="select-item btn step-18__link no-image" >                                       
                                <input type="radio" name="eau_chaude_sanitaire_envisage_source_energie_no_image" id="eau_chaude_sanitaire_envisage_source_energie_no_image_1" value="200L">
                                <span>200L</span>
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox not-absolute">
                            </label>

                            <label for="eau_chaude_sanitaire_envisage_source_energie_no_image_2" class="select-item btn step-18__link no-image">                                       
                                <input type="radio" name="eau_chaude_sanitaire_envisage_source_energie_no_image"  id="eau_chaude_sanitaire_envisage_source_energie_no_image_2" value="270L">
                                <span>270L</span>
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox not-absolute">
                            </label>

                        </div>
                    </fieldset>
                    
                    <fieldset class="step-19">
                        <h1>Eclairage envisagé</h1>
                        <h2>Source d’énergie</h2>
                        <div class="step-19__content optionWithImages">
                            <label for="eclairage_envisage_source_energie_1" class="select-item btn step-19__link image" style="height:auto;">                        
                                <input type="radio" name="eclairage_envisage_source_energie" id="eclairage_envisage_source_energie_1" value="Electricité ampoules led">
                                <img class="step-1__img" src="./assets/images/picto_gte/chauffe_eau_thermo.png" alt="Photo - Electricité ampoules led">
                                Electricité ampoules led
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                    </fieldset>
                </form>

                <div class="nextButtonControl">
                    <input type="button" class="next btn btn-info main-cta" value="Suivant" />
                </div>
            </div>
        </div>
        <div class="modalContainer">
            <!-- Modal Structure -->
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <h4 style="color: #50249f;">Chauffage </h4>
                    <fieldset class="step-13">
                        <h2>Source d’énergie</h2>
                        <div class="step-13__content optionWithImages">
                            <label for="source_energie_1_chauffage" class="select-item btn step-13__link image">                        
                                <input type="radio" name="source_energie" id="source_energie_1_chauffage" value="Electricité">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_électricité.svg" alt="Photo - Electricité">
                                Electricité
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_2_chauffage" class="select-item btn step-13__link image">             
                                <input type="radio" name="source_energie"  id="source_energie_2_chauffage" value="Gaz naturel">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_gaz naturel.svg" alt="Photo - Gaz naturel">
                                Gaz naturel
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_3_chauffage" class="select-item btn step-13__link image">        
                                <input type="radio" name="source_energie"  id="source_energie_3_chauffage" value="GPL">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_GPL.svg" alt="Photo - GPL">
                                GPL
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="source_energie_4_chauffage" class="select-item btn step-13__link image">             
                                <input type="radio" name="source_energie"  id="source_energie_4_chauffage" value="FIOUL">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_fioul.svg" alt="Photo - FIOUL">
                                FIOUL
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_5_chauffage" class="select-item btn step-13__link image">        
                                <input type="radio" name="source_energie"  id="source_energie_5_chauffage" value="Bois">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_bois.svg" alt="Photo - Bois">
                                Bois
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                    </fieldset>
                    
                    <fieldset class="step-14">
                        <h2>Type de chauffage</h2>
                        <div id="source_energie_type_elec" style="display: none;">
                            <div class="step-14__content optionWithImages" style="max-width: 615px;">
                                <label for="type_de_chaufface_convecteur_elec" class="select-item btn step-14__link image image5">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chaufface_convecteur_elec" value="Convecteur électrique">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_convecteur electrique.svg" alt="Photo - Convecteur électrique">
                                    Convecteur électrique
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_plancher_chauffant" class="select-item btn step-14__link image image5">             
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_plancher_chauffant" value="Plancher chauffant électrique">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_plancher-chauffant.svg" alt="Photo - Plancher chauffant électrique">
                                    Plancher chauffant électrique
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_radiateur_elec" class="select-item btn step-14__link image image5">        
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_radiateur_elec" value="Radiateur électrique à inertie">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_radiateur-inertie.svg" alt="Photo - Radiateur électrique à inertie">
                                    Radiateur électrique à inertie
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                            
                            <div class="step-14__content optionWithImages" style="max-width: 615px;">
                                <label for="type_de_chaufface_chaudiere_elec" class="select-item btn step-14__link image image5">             
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_chaudiere_elec" value="Chaudière électrique">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_chaudiere-electrique.svg" alt="Photo - Chaudière électrique">
                                    Chaudière électrique
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_pompe_a_chaleur" class="select-item btn step-14__link image image5">        
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_pompe_a_chaleur" value="Pompe à chaleur">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_pompe à chaleur.svg" alt="Photo - Pompe à chaleur">
                                    Pompe à chaleur
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_chudiere_eau_solaire" class="select-item btn step-14__link image image5">        
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_chudiere_eau_solaire" value="Chauffe eau solaire">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_chauffage-solaire.svg" alt="Photo - Chauffe eau solaire">
                                    Chauffe eau solaire
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                        </div>
                        
                        <div id="source_energie_type_gaz_naturel" style="display: none;">
                            <div class="step-14__content optionWithImages" style="max-width: 415px;">
                                <label for="type_de_chaufface_chaudierer_gaz_natur_hors_condensa" class="select-item btn step-14__link image image5">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chaufface_chaudierer_gaz_natur_hors_condensa" value="Chaudière Gaz naturel hors condensation">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_chaudiere-gaz-basse-temperature.svg" alt="Photo - Chaudière Gaz naturel hors condensation">
                                    Chaudière Gaz naturel hors condensation
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_chaudiere_gaz_natur_condensa" class="select-item btn step-14__link image image5">             
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_chaudiere_gaz_natur_condensa" value="Chaudière Gaz naturel à condensation">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_chaudiere-gaz-condensation.svg" alt="Photo - Chaudière Gaz naturel à condensation">
                                    Chaudière Gaz naturel à condensation
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>

                        </div>
                        
                        <div id="source_energie_type_gpl" style="display: none;">
                            <div class="step-14__content optionWithImages" style="max-width: 620px;">
                                <label for="type_de_chaufface_chaudiere_gpl_condensation" class="select-item btn step-14__link image image5">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chaufface_chaudiere_gpl_condensation" value="Chaudière GPL à condensation">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_chaudiere-GPL-condensation.svg" alt="Photo - Chaudière GPL à condensation">
                                    Chaudière GPL à condensation
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_chaudiere_gpn_hor_condensation" class="select-item btn step-14__link image image5">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chaufface_chaudiere_gpn_chor_ondensation" value="Chaudière GPL hors condensation">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_chaudiere-GPL-basse-temperature.svg" alt="Photo - Chaudière GPL hors condensation">
                                    Chaudière GPL hors condensation
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_poele_gpl" class="select-item btn step-14__link image image5">             
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_poele_gpl" value="Poêle GPL">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_poele-GPL.svg" alt="Photo - Poêle GPL">
                                    Poêle GPL
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                        </div>
                        
                        
                        <div id="source_energie_type_fioul" style="display: none;">
                            <div class="step-14__content optionWithImages" style="max-width: 620px;">
                                <label for="type_de_chauffage_chaudiere_fioul" class="select-item btn step-14__link image image5">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chauffage_chaudiere_fioul" value="Chaudière Fioul">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_chaudiere-fioul-condensation.svg" alt="Photo - Chaudière Fioul">
                                    Chaudière Fioul
                                                    
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_chaudiere_hors_condensation" class="select-item btn step-14__link image image5">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chaufface_chaudiere_hors_condensation" value="Chaudière Fioul hors condensation">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_chaudiere-fioul-basse-temperature.svg" alt="Photo - Chaudière Fioul hors condensation">
                                    Chaudière Fioul hors condensation
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chaufface_poele_fioul" class="select-item btn step-14__link image image5">             
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chaufface_poele_fioul" value="Poêle GPL">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_poele-fioul.svg" alt="Photo - Poêle GPL">
                                    Poêle Fioul
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                        </div>
                        
                        
                        <div id="source_energie_type_bois" style="display: none;">
                            <div class="step-14__content optionWithImages" style="max-width: 620px;">
                                <label for="type_de_chaufface_chaudiere_bois" class="select-item btn step-14__link image image5">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chaufface_chaudiere_bois" value="Chaudière Bois">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_chaudiere-bois.svg" alt="Photo - Chaudière Bois">
                                    Chaudière Bois
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chauffage_poele" class="select-item btn step-14__link image image5">                        
                                    <input type="radio" name="type_de_chaufface" id="type_de_chauffage_poele" value="Poêle à buches classiques">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_poele-bois.svg" alt="Photo - Poêle à buches classiques">
                                    Poêle à buches classiques
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_de_chauffage_cheminee" class="select-item btn step-14__link image image5">             
                                    <input type="radio" name="type_de_chaufface"  id="type_de_chauffage_cheminee" value="Cheminée">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_Cheminee.svg" alt="Photo - Cheminée">
                                    Cheminée
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                        </div>
                        

                        <div class="inputs">
                            <div class="input-item">
                                <label for="inputAnneeInstall">Année d’installation</label>
                                <select name="annee_contruction_chauffage" id="">
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
                                        <option value="1995">1993</option>
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
                                    <span class="step-1__content__notice">Nombre d’habitants requis </span>
                                </div>
                            </div>  
                        </div>
                            
                        <div class="inputs">
                            <div class="input-item">
                                <label for="type_de_chaufface_nombre_d_annee_a_indexer">Nombre d'année à indexer</label>
                                <select name="type_de_chaufface_nombre_d_annee_a_indexer" id="">
                                    <option disabled selected>Choisir</option>
                                    <option value="05">05</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>

                        <div class="inputs">    
                            <div class="input-item">
                                <label for="inputEstimFactChauff">Estimation de la facture de chauffage (€/an)</label>
                                <input id="inputEstimFactChauff" type="number" name="estimation_de_facture_de_chauffage" class="" min="0">
                                <span class="step-1__content__notice">Estimation de la facture de chauffage requis </span>
                            </div>
                        </div>
                          
                        <div class="inputs" id="source_energie_1_chauffage_pric_Elect" style="display: block;">
                            <div class="input-item">
                                <label for="inputPrixElec">Prix de l'électricité (€/kWh)</label>
                                <input id="inputPrixElec" type="number" name="prix_de_l_electricite" class="" min="0">
                                <span class="step-1__content__notice">Estimation de la facture de chauffage requis </span>
                            </div>
                        </div>
                        
                        <div class="inputs">
                            <div class="input-item">
                                <label for="inputEvol25Annee">Évolution du <span>prix du fioul </span> <!--sur les 25 prochaines années (%)--> </label>
                                <div class="input-item-range">
                                    <span class="rangeMin"> 0%</span>
                                        <p class="range-field">
                                            <input type="range" id="inputEvol25Annee" name="evoluion_sur_les_23_prochaine_annees" min="0" max="7" />
                                        </p>
                                    <span class="rangeMax">7%</span>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </div>
                <div class="modal-footer">
                    <div style="margin-right: 75px;">
                        <a href="#!" class="modal-close callToAction">VALIDER</a>
                    </div>
                </div>
            </div>

             <!-- Modal Structure -->
             <div id="modal2" class="modal">
                <div class="modal-content">
                    <h4 style="color:#0288d1;">Eau chaude sanitaire </h4>
                        <h2>Source d’énergie</h2>
                        <div class="step-13__content optionWithImages" style="max-width: 83%;">
                            <label for="source_energie_eau_chaude_elec_1" class="select-item btn step-13__link image">                        
                                <input type="radio" name="source_energie_eau_chaude" id="source_energie_eau_chaude_elec_1" value="Electricité">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_électricité.svg" alt="Photo - Electricité">
                                Electricité
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_eau_chaude_gaz_natur_2" class="select-item btn step-13__link image">             
                                <input type="radio" name="source_energie_eau_chaude"  id="source_energie_eau_chaude_gaz_natur_2" value="Gaz naturel">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_gaz naturel.svg" alt="Photo - Gaz naturel">
                                Gaz naturel
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_eau_chaude_gpl_3" class="select-item btn step-13__link image">        
                                <input type="radio" name="source_energie_eau_chaude"  id="source_energie_eau_chaude_gpl_3" value="GPL">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_GPL.svg" alt="Photo - GPL">
                                GPL
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="source_energie_eau_chaude_fioul_4" class="select-item btn step-13__link image">             
                                <input type="radio" name="source_energie_eau_chaude"  id="source_energie_eau_chaude_fioul_4" value="FIOUL">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-selectionnee_fioul.svg" alt="Photo - FIOUL">
                                FIOUL
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="source_energie_eau_chaude_bois_5" class="select-item btn step-13__link image">        
                                <input type="radio" name="source_energie_eau_chaude"  id="source_energie_eau_chaude_bois_5" value="Bois">
                                <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_bois.svg" alt="Photo - Bois">
                                Bois
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                        <div id="source_energie_eau_chaude_Elect" style="display:none;">
                            <h2 style="margin-top: 40px!important;margin-bottom:25px;">Type d'eau chaude sanitaire</h2>
                            <div class="step-14__content optionWithImages" style="max-width: 400px;">
                                <label for="type_de_chaufface_1" class="select-item btn step-14__link image" style="width: 190px!important;">                        
                                    <input type="radio" name="type_d_eau_chaude" id="type_d_eau_chaude_1" value="Chauffe-eau électrique">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_chauffe-eau-electrique.svg" alt="Photo - Chauffe-eau électrique">
                                    Chauffe-eau électrique
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                                
                                <label for="type_d_eau_chaude_2" class="select-item btn step-14__link image" style="width: 190px!important;">             
                                    <input type="radio" name="type_d_eau_chaude"  id="type_d_eau_chaude_2" value="Chauffe-eau thermodynamique">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_chauffe-eau-thermodynamique.svg" alt="Photo - Chauffe-eau thermodynamique">
                                    Chauffe-eau thermodynamique
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                            <div class="step-14__content optionWithImages" style="max-width: 400px;">
                                <label for="type_d_eau_chaude_3" class="select-item btn step-14__link image" style="width: 190px!important;">        
                                    <input type="radio" name="type_d_eau_chaude"  id="type_d_eau_chaude_3" value="Module ECS intégré à PAC">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_ECS-et-PAC.svg" alt="Photo - Module ECS intégré à PAC">
                                    Module ECS intégré à PAC
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>

                                <label for="type_d_eau_chaude_4" class="select-item btn step-14__link image" style="width: 190px!important;">             
                                    <input type="radio" name="type_d_eau_chaude"  id="type_d_eau_chaude_4" value="Chauffe eau solaire">
                                    <img class="step-1__img" src="./assets/images/picto_gte/icones-normal_chauffage-solaire_.svg" alt="Photo - Chauffe eau solaire">
                                    Chauffe eau solaire
                                    <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                                </label>
                            </div>
                        </div>

                        <div class="inputs">
                            <div class="input-item">
                                <label for="inputAnneeInstall">Année d’installation</label>
                                <select name="annee_contruction_eau_chaude_sani" id="">
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
                                    <option value="1995">1993</option>
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
                        <div class="step-14__content optionWithImagesColumn" >
                            <label for="capacite_de_stockage_eau_chaude_1" class="select-item btn step-14__link image">                        
                                <input type="radio" name="capacite_de_stockage_eau_chaude" id="capacite_de_stockage_eau_chaude_1" value="Pas de stockage">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_pas-de-stockage.svg" alt="Photo - Pas de stockage">
                                Pas de stockage
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="capacite_de_stockage_eau_chaude_2" class="select-item btn step-14__link image">             
                                <input type="radio" name="capacite_de_stockage_eau_chaude"  id="capacite_de_stockage_eau_chaude_2" value="150 litres">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_capacite-100-150L.svg" alt="Photo - 150 litres">
                                150 litres
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="capacite_de_stockage_eau_chaude_3" class="select-item btn step-14__link image">        
                                <input type="radio" name="capacite_de_stockage_eau_chaude"  id="capacite_de_stockage_eau_chaude_3" value="200 litres">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_capacite-150-200L.svg" alt="Photo - 200 litres">
                                200 litres
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="capacite_de_stockage_eau_chaude_4" class="select-item btn step-14__link image">             
                                <input type="radio" name="capacite_de_stockage_eau_chaude"  id="capacite_de_stockage_eau_chaude_4" value="250 litres">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_capacite-200-300L.svg" alt="Photo - 250 litres">
                                250 litres
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="capacite_de_stockage_eau_chaude_5" class="select-item btn step-14__link image">             
                                <input type="radio" name="capacite_de_stockage_eau_chaude"  id="capacite_de_stockage_eau_chaude_5" value="300 litres et plus">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_capacite-superieure300L.svg" alt="Photo - 300 litres et plus">
                                300 litres et plus
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>

                        <h2 style="margin-top: 40px!important;margin-bottom:25px;">Utilisation de l'eau chaude sanitaire</h2>
                        <div class="step-14__content optionWithImagesColumn">
                            <label for="utilisation_eau_chaude_1" class="select-item btn step-14__link image">                        
                                <input type="radio" name="utilisation_eau_chaude" id="utilisation_eau_chaude_1" value="Sobre">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_ECS-sobre.svg" alt="Photo - Sobre">
                                Sobre
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_eau_chaude_2" class="select-item btn step-14__link image">             
                                <input type="radio" name="utilisation_eau_chaude"  id="utilisation_eau_chaude_2" value="Modérée">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_ECS-modere.svg" alt="Photo - Modérée">
                                Modérée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_eau_chaude_3" class="select-item btn step-14__link image">        
                                <input type="radio" name="utilisation_eau_chaude"  id="utilisation_eau_chaude_3" value="Normale">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_ECS-normal.svg" alt="Photo - Normale">
                                Normale
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="utilisation_eau_chaude_4" class="select-item btn step-14__link image">             
                                <input type="radio" name="utilisation_eau_chaude"  id="utilisation_eau_chaude_4" value="Intensive">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_ECS_intensif.svg" alt="Photo - Intensive">
                                Intensive
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_eau_chaude_5" class="select-item btn step-14__link image">             
                                <input type="radio" name="utilisation_eau_chaude"  id="utilisation_eau_chaude_5" value="Balnéo">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_ECS-balneo.svg" alt="Photo - Balnéo">
                                Balnéo
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                        
                        <div class="inputs">    
                            <div class="input-item">
                                <label for="inputEstimFactEauChaude">Estimation de la facture d'eau chaude sanitaire (€/an)</label>
                                <input id="inputEstimFactEauChaude" type="number" name="estimation_de_facture_d_eacu_chaude" class="" min="0">
                                <span class="step-1__content__notice">Estimation de la facture d'eau chaude sanitaire requis </span>
                            </div>
                        </div>
                    </fieldset>
                </div>
                
                <div class="modal-footer">
                    <div style="margin-right: 75px;">
                        <a href="#!" class="modal-close callToAction">VALIDER</a>
                    </div>
                </div>
            </div>
            
             <!-- Modal Structure -->
             <div id="modal3" class="modal">
                <div class="modal-content">
                    <h4 style="color:#d81159;margin-bottom:0;">Appareils électriques </h4>
                    <h5 style="color:#d81159;margin-bottom:40px; text-align:center;">(Appareils et équipements électriques)</h5>
                        <h2>Utilisation de vos appareils et équipements électriques</h2>
                        <div class="step-13__content optionWithImagesColumn" >
                            <label for="utilisation_appareil_equip_electrique_1" class="select-item btn step-13__link image">                        
                                <input type="radio" name="utilisation_appareil_equip_electrique" id="utilisation_appareil_equip_electrique_1" value="Sobre">
                                <img class="step-left__img" src="./assets/images/picto_gte/icone_tache-menagere-sobre.svg" alt="Photo - Sobre">
                                Sobre
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_appareil_equip_electrique_2" class="select-item btn step-13__link image">             
                                <input type="radio" name="utilisation_appareil_equip_electrique"  id="utilisation_appareil_equip_electrique_2" value="Modérée">
                                <img class="step-left__img" src="./assets/images/picto_gte/icone_tache-menagere-moderee.svg" alt="Photo - Modérée">
                                Modérée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_appareil_equip_electrique_3" class="select-item btn step-13__link image">        
                                <input type="radio" name="utilisation_appareil_equip_electrique"  id="utilisation_appareil_equip_electrique_3" value="Normale">
                                <img class="step-left__img" src="./assets/images/picto_gte/icone_tache-menagere-elevee.svg" alt="Photo - Normale">
                                Normale
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>

                            <label for="utilisation_appareil_equip_electrique_4" class="select-item btn step-13__link image">             
                                <input type="radio" name="utilisation_appareil_equip_electrique"  id="source_energie_eau_chaude_4" value="Élevée">
                                <img class="step-left__img" src="./assets/images/picto_gte/icone_tache-menagere-elevee.svg" alt="Photo - Élevée">
                                Élevée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_appareil_equip_electrique_5" class="select-item btn step-13__link image">        
                                <input type="radio" name="utilisation_appareil_equip_electrique"  id="utilisation_appareil_equip_electrique_5" value="Très élevée">
                                <img class="step-left__img" src="./assets/images/picto_gte/icone_tache-menagere-tres-elevee.svg" alt="Photo - Très élevée">
                                Très élevée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>

                        
                        <div class="inputs">    
                            <div class="input-item">
                                <label for="inputEstimFactEauChaude">Estimation de la facture d'eau chaude sanitaire (€/an)</label>
                                <input id="inputEstimFactEauChaude" type="number" name="estimation_de_facture_d_eacu_chaude" class="" min="0">
                                <span class="step-1__content__notice">Estimation de la facture d'eau chaude sanitaire requis </span>
                            </div>
                        </div>
                        
                    </fieldset>
                </div>
                
                <div class="modal-footer">
                    <div style="margin-right: 75px;">
                        <a href="#!" class="modal-close callToAction">VALIDER</a>
                    </div>
                </div>
            </div>

            
             <!-- Modal Structure -->
             <div id="modal4" class="modal">
                <div class="modal-content">
                    <h4 style="color: #71b051;">Éclairage </h4>
                        <h2>Type d'ampoules</h2>
                        <div class="step-13__content optionWithImages" style="max-width: 63%;">
                            <label for="type_d_ampoule_eclairage_1" class="select-item btn step-13__link image" style="width:190px!important;">                        
                                <input type="radio" name="type_d_ampoule_eclairage" id="type_d_ampoule_eclairage_1" value="Ampoules incandescentes">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_ampoules-incandescentes.svg" alt="Photo - Ampoules incandescentes">
                                Ampoules incandescentes
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="type_d_ampoule_eclairage_2" class="select-item btn step-13__link image" style="width:190px!important;">             
                                <input type="radio" name="type_d_ampoule_eclairage"  id="type_d_ampoule_eclairage_2" value="Ampoules LED">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_ampoules-LED.svg" alt="Photo - Ampoules LED">
                                Ampoules LED
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="type_d_ampoule_eclairage_3" class="select-item btn step-13__link image" style="width:190px!important;">        
                                <input type="radio" name="type_d_ampoule_eclairage"  id="type_d_ampoule_eclairage_3" value="Mixte">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_ampoules-mixtes.svg" alt="Photo - Mixte">
                                Mixte
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>
                        
                        <h2 style="margin-top: 40px!important;margin-bottom:25px;">Utilisation moyenne de l'éclairage par jour</h2>
                        <div class="step-13__content optionWithImagesColumn">
                            <label for="utilisation_moyenne_eclairage_1" class="select-item btn step-13__link image">                        
                                <input type="radio" name="utilisation_moyenne_eclairage" id="utilisation_moyenne_eclairage_1" value="Sobre">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_Eclairage-sobre.svg" alt="Photo - Sobre">
                                Sobre
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_moyenne_eclairage_2" class="select-item btn step-13__link image">             
                                <input type="radio" name="utilisation_moyenne_eclairage"  id="utilisation_moyenne_eclairage_2" value="Modérée">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_Eclairage-modere.svg" alt="Photo - Modérée">
                                Modérée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_moyenne_eclairage_3" class="select-item btn step-13__link image">        
                                <input type="radio" name="utilisation_moyenne_eclairage"  id="utilisation_moyenne_eclairage_3" value="Moyenne">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_Eclairage-normal.svg" alt="Photo - Moyenne">
                                Moyenne
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_moyenne_eclairage_4" class="select-item btn step-13__link image">        
                                <input type="radio" name="utilisation_moyenne_eclairage"  id="utilisation_moyenne_eclairage_4" value="Élevée">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-normal_Eclairage-eleve.svg" alt="Photo - Élevée">
                                Élevée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                            
                            <label for="utilisation_moyenne_eclairage_5" class="select-item btn step-13__link image">        
                                <input type="radio" name="utilisation_moyenne_eclairage"  id="utilisation_moyenne_eclairage_5" value="Très élevée">
                                <img class="step-left__img" src="./assets/images/picto_gte/icones-selectionnee_Eclairage-tres-eleve.svg" alt="Photo - Très élevée">
                                Très élevée
                                <img src="./assets/images/uncheck.png" alt="" class="image-checkbox">
                            </label>
                        </div>

                        <div class="inputs">    
                            <div class="input-item">
                                <label for="inputEstimFactEclairage">Estimation de la facture d'éclairage (€/an)</label>
                                <input id="inputEstimFactEclairage" type="number" name="estimation_de_eclairage_par_an" class="" min="0">
                                <span class="step-1__content__notice">Estimation de la facture d'éclairage requis </span>
                            </div>
                        </div>  
                    </fieldset>
                </div>
                
                <div class="modal-footer">
                    <div style="margin-right: 75px;">
                        <a href="#!" class="modal-close callToAction">VALIDER</a>
                    </div>
                </div>
            </div>
            <!-- end -->
        </div>
    </main>
    <script src="./assets/js/jquery-1.6.3.min.js"></script>
    <script src="./assets/js/materialize.min.js"></script>
    <script src="./assets/js/app.js" ></script>
</body>
</html>