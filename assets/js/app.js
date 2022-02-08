let dateDiff={
  inDays: function (d1, d2){
    let t1= d1.getTime();
    let t2= d2.getTime();
    return Math.floor((t2-t1)/(24*3600*1000))
  },
  inWeeks: function (d1, d2){
    let t1= d1.getTime();
    let t2= d2.getTime();
    return parseInt((t2-t1)/(24*3600*1000*7))

  },
  inMonths: function (d1, d2){
    let d1Y= d1.getFullYear();
    let d2Y= d2.getFullYear();

    let d1M= d1.getMonth();
    let d2M= d2.getMonth();

    return (d2M+12*d2Y)-(d1M+12*d1Y)

  },
  inYears: function (d1, d2){

    return d2.getFullYear()- d1.getFullYear()

  }
}

let formatNumber={
  asEuro:function(val){
    return new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format(val)
  }
}
let plafondRessourceHorsIleFrance={
  foyerFiscale: [1, 2, 3, 4, 5, 'more'],
  bleu: [15262, 22320, 26844, 31359, 35894, 4526 ],
  jaune: [19565, 28614, 34411, 40201, 46015, 5797],
  violet: [29148, 42848, 51592, 60336, 69081, 8744],
  rose: [29148, 42848, 51592, 60336, 69091, 8744]
}

let plafondRessourceEnIleFrance={
  foyerFiscale: [1, 2, 3, 4, 5, 'more'],
  bleu: [21123, 31003, 37232, 43472, 49736, 6096],
  jaune: [25714, 37739, 45326, 52925, 60546, 7613],
  violet: [38184, 56130, 67585, 79041, 90496, 11455],
  rose: [38184, 56130, 67585, 79041, 90496, 11455]
}


let coupDePouceHorsIleFrance={
  foyerFiscale: [1, 2, 3, 4, 5, 'more'],
  bleu: [15262, 22320, 26844, 31359, 35894, 4526 ],
  jaune: [19565, 28614, 34411, 40201, 46015, 5797],
  violet: [19566, 28615, 34412, 40202, 46016, 5797],
}

let coupDePouceEnIleFrance={
  foyerFiscale: [1, 2, 3, 4, 5, 'more'],
  bleu: [21123, 31003, 37232, 43472, 49736, 6096],
  jaune: [25714, 37739, 45326, 52925, 60546, 7613],
  violet: [25715, 37740, 45327, 52926, 60547, 7613],
}

let subventionsPacAiEau={
  bleu: 4000,
  jaune: 3000,
  violet: 2000,
  rose: 0
}
let subventionsChauffeEau={
  bleu: 1200,
  jaune: 800,
  violet: 400,
  rose: 0
}

let coupDePoucePompeBonus={
  bleu: 5000, 
  jaune: 4000,
  violet: 2500,
  rose: 2500
}

let coupDePouceChauffageBonus={
  bleu: 90, 
  jaune: 85,
  violet: 85,
  rose: 2500
}

let produits=[
  {
    title: 'Clim’Up EMSM – De Dietrich',
    avantage: ['Mono split mural', 'Monophasé et Triphasé', 'Fluide frigorigène R32', 'SCOP 4,0 à 4,3'],
    categorie: 'Pompes à chaleur air-air',
    fiche_technique_url: 'https://bit.ly/3IX7YUr',
    img_url: './assets/images/pompe_Dietrich.png'
  },
  {
    title: 'Clim’Up Muse unité extérieure - De Dietrich',
    avantage: ['Multisplit', 'SCOP de 4,1 à 4,2', 'Fluide frigorigène R32', 'SEER de 6,18 à 6,5'],
    categorie: 'Pompes à chaleur air-air',
    fiche_technique_url: 'https://bit.ly/3IX7YUr',
    img_url: './assets/images/pompe_Dietrich_2.png'
  },
  {
    title: 'Clim’up SMART unité interieur – De Dietrich',
    avantage: ['Pompe de relevage des condensats', 'Fixation murale', 'De 2,05 à 5,30 kW', 'Monophasé'],
    categorie: 'Pompes à chaleur aieau',
    fiche_technique_url:  'https://bit.ly/34r8yLd',
    img_url: './assets/images/pompe_Dietrich_4.png'
  },
  {
    title: 'Perfera - Daikin',
    avantage: ['Fluide frigorigène R32', 'Label énergétique', 'Purificateur d\'air et anti-allergènes', 'Amplification de chauffage'],
    categorie: 'Pompes à chaleur air-air',
    fiche_technique_url: 'https://bit.ly/3rmpFqB',
    img_url: './assets/images/pompe_Dietrich_3.png'
  },
  {
    title: 'Altherma 60° - Daikin',
    avantage: ['Fluide frigorigène R32', 'Label énergétique', 'Compresseur Inverter DC', 'Compacte'],
    categorie: 'Pompes à chaleur air-eau',
    fiche_technique_url: 'https://bit.ly/32Tgcxv',
    img_url: './assets/images/pompe_air_eau.png'
  },
  {
    title: 'Altherma 70° 3H HT - Daikin',
    avantage: ['Seulement 32 dB(A)', 'Fluide frigorigène R32', 'Pression max 56 bar', 'Commande intuitive'],
    categorie: 'Pompes à chaleur air-eau',
    fiche_technique_url: 'https://bit.ly/3okCYWC',
    img_url: './assets/images/pompe_air_eau_2.png'
  },
  {
    title: 'Altherma 80° R HT - Daikin',
    avantage: ['Sortie d’eau 80°C', 'COP entre 3 et 5', '100 % thermodynamique', 'Thermostat d’ambiance'],
    categorie: 'Pompes à chaleur air-eau',
    fiche_technique_url: 'https://bit.ly/3IWbbUi',
    img_url: './assets/images/pompe__air_eau_3.png'
  },
  {
    title: 'Arianext plus S - Chaffoteaux',
    avantage: ['Sonde extérieure filaire', 'Appoint électrique intégré, 4kW ou 6kW', 'COP jusqu’à 5,25', 'Compresseur Inverter DC'],
    categorie: 'Pompes à chaleur air-eau',
    fiche_technique_url: 'https://bit.ly/3Grlkqm',
    img_url: './assets/images/pompe_air_eau_4.png'
  },
  {
    title: 'EHS - SAMSUNG ',
    avantage: ['Label énergétique', 'Eau jusqu’à 65°C', 'Ballon disponible', 'Disponible en 4 / 6 / 9 kW'],
    categorie: 'Pompes à chaleur air-eau',
    fiche_technique_url: 'https://bit.ly/3Grlkqm',
    img_url: './assets/images/pompe__air__eau__5.jpg'
  },
  {
    title: 'Alezio S – De Dietrich',
    avantage: ['Jusqu\'à 70% d\'économies', 'Rapide à installer', 'Solution connectée', 'Simple d’utilisation'],
    categorie: 'Pompes à chaleur air-eau',
    fiche_technique_url: 'https://bit.ly/3L6PGSq',
    img_url: './assets/images/pompe_air_eau_5.png'
  },
  {
    title: 'Alezio  V200 - De Dietrich',
    avantage: ['Solution compacte', '4,5 kW à 16 kW', 'Thermostat connecté', 'Fluide frigorigène R410A'],
    categorie: 'Pompes à chaleur air-eau',
    fiche_technique_url: 'https://bit.ly/3GqEc8S',
    img_url: './assets/images/pompe_air_eau_6.png'
  },
  {
    title: 'HPI Evolution - De Dietrich',
    avantage: ['Option hybride', 'Compatible multi-énergies', 'Bouteille de découplage intégrée', 'COP de 5,11'],
    categorie: 'Pompes à chaleur air-eau',
    fiche_technique_url:  'https://bit.ly/35xUOPh',
    img_url: './assets/images/pompe_air_eau_7.png'
  },
  {
    title: 'Hydrosplit - LG',
    avantage: ['Fluide frigorigène R32', 'Label énergétique', 'Réfrigérant écologique', 'Contrôle intelligent du chauffage'],
    categorie: 'Pompes à chaleur air-eau',
    fiche_technique_url:  'https://bit.ly/3oGcDmf',
    img_url: './assets/images/pompe_air_eau_8.png'
  },
  {
    title: 'Hydrosplit DUO - LG',
    avantage: ['Fluide frigorigène R32', 'Label énergétique', 'Réfrigérant écologique', 'Contrôle intelligent du chauffage'],
    categorie: 'Pompes à chaleur air-eau',
    fiche_technique_url:  'https://bit.ly/3oGcDmf',
    img_url: './assets/images/pompe_air_eau_9.png'
  },
  {
    title: 'Nuos Primos – Ariston',
    avantage: ['Temps de chauffe < 8h', 'COP de 2,86', '4 modes d’utilisations', '200L à 240L'],
    categorie: 'Chauffe-eau Thermodynamique',
    fiche_technique_url: 'https://bit.ly/3uhDetj',
    img_url: './assets/images/pompe_air_eau_10.png',
    width: '30%'
  },
  {
    title: 'Aquanext Split - Chaffoteaux',
    avantage: ['Temps de chauffe < 6h', 'Technologie Inverter', 'Condenseur avec profile D', 'Connexion HP/HC'],
    categorie: 'Chauffe-eau Thermodynamique',
    fiche_technique_url: 'Pompes à chaleur air-eau',
    img_url: './assets/images/pompe_air_eau_11.png'
  },
  {
    title: 'Kaliko - De Dietrich',
    avantage: ['Ecran digital déportable', 'Résistance de 1550 W', '34 à 35,2 dB(A)', 'Fluide frigorigène R 134 A'],
    categorie: 'Chauffe-eau Thermodynamique',
    fiche_technique_url: 'https://bit.ly/3r8NrGz',
    img_url: './assets/images/pompe_air_eau_12.png',
    width: '40%'
  },
  {
    title: 'Essentiel – De Dietrich',
    avantage: ['Classe énergétique A+', 'Puissance PAC 1750W', 'Pression acoustique 42dB(A)', 'Temps de chauffe < 6h'],
    categorie: 'Chauffe-eau Thermodynamique',
    fiche_technique_url: 'https://bit.ly/3u93JBc',
    img_url: './assets/images/pompe_air_eau_13.png',
    width: '30%'
  },
  {
    title: 'Kaliko Split – De Dietrich',
    avantage: ['ECS jusqu’à 65°', 'Puissance PAC', '230v Monophasé', 'Maxi 1 300m3/hh'],
    categorie: 'Chauffe-eau Thermodynamique',
    fiche_technique_url:  'https://bit.ly/3o8JAY1',
    img_url: './assets/images/pompe_air_eau_13.png',
    width: '30%'
  },
  {
    title: 'Therma V - LG',
    avantage: ['Classe énergétique A+', 'Télécommande intuitive', 'Contrôle via l\'application LG ThinQ', 'Monophasée'],
    categorie: 'Pompes à chaleur air-eau',
    fiche_technique_url: 'https://bit.ly/3GjiG5X',
    img_url: './assets/images/pompe__chauff_thermo_new_1.jpg'
  },
  {
    title: 'Gamme Dojo – Atlantic',
    avantage: ['Confort acoustique : 20 dB', 'Classe énergétique A+', 'Mono split mural', 'Mode pleine puissance'],
    categorie: 'Pompes à chaleur air-air',
    fiche_technique_url: 'https://bit.ly/3sc8kQn',
    img_url: './assets/images/pompe__chauff_thermo_new_2.jpg'
  },
  {
    title: 'Performer – Thaleos',
    avantage: ['Fonction Smart Control', '75% d’économies D’énergie ', 'Système ACI Hybrid', 'Plage de fonctionnement (-5 à +43°c)'],
    categorie: 'Chauffe-eau Thermodynamique',
    fiche_technique_url: 'https://bit.ly/3Hi11Nn',
    img_url: './assets/images/pompe__chauff_thermo_new_3.jpg'
  },
  {
    title: 'Alféa Excellia – Atlantic',
    avantage: ['Certifié, Heat Pump, Keymark', 'Application, Atlantic, Cozytouch', 'Monophasé et Triphasé', 'Classe énergétique A++ & A+'],
    categorie: 'Pompes à chaleur air-eau',
    fiche_technique_url: 'https://bit.ly/35LOmo7',
    img_url: './assets/images/pompe__chauff_thermo_new_4.jpg'
  },
  
]

var franceAddresses=[
  {
    delta: -4,
    departement: ['29', '22', '56', '50', '14', '76', '27', '61', '53', '60', '02', '77', '45', '78', '28', '72', '49', '79', '86', '36', '18', '37', '41', '33', '40', '32', '64', '65', '47', '24', '16', '17', '12']
  },
  {
    delta: -5,
    departement: ['35', '44', '85','31', '82', '09', '81', '30',  '11', '66', '34', '13', '75', '92', '93', '94']
  },
  {
    delta: -9,
    departement: ['62', '59', '80']
  },
  {
    delta: -15,
    departement: ['57', '67', '54', '88', '68', '90']
  },
  {
    delta: -12,
    departement: ['55', '52', '70', '25']
  },
  {
    delta: -10,
    departement: ['08', '51', '10', '89', '21', '58', '71', '39', '42', '69', '01', '38', '74', '73', '05']
  },
  {
    delta: -8,
    departement: ['04', '06', '87', '23', '03', '63', '19', '63', '15', '43','48']
  },
  {
    delta: -2,
    departement: ['83', '28', '2A']
  },
  {
    delta: -6,
    departement: ['07', '26', '84', '46']
  },
  {
    delta: 9,
    departement: ['62', '59', '60']
  }
]

var formPageValues={
    maPrimeRenovSum: 0,
    nombre_d_habitants: 1,
    chaufface_envisage_source_energie_nbr_unite: 0,
    eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond: 0,
    source_energie_nombre: 0,
    consommation_annuelle_elec: 0,
    consommation_annuelle_gaz: 0,
    consommation_annuelle_gpl: 0,
    consommation_annuelle_fioul: 0,
    consommation_annuelle_bois: 0,
    consommation_annuelle_autre:0,
    pompe_a_chaleur_air_air_nombre_unite: 0,
    evol_sur_25_annee: 4,
    votre_conso_actuel: 0,
    votre_conso_sur_x_annee: 0,
    moyenne_conso_sur_x_annee: 0,
    hauteur_sous_plafond: 0,
    hauteur_sous_plafond_moyenne: 1, 
    hauteur_sous_plafond_m:2.5, //pompoe a chaleur air eau
    temperature_de_confort: 17,
    gisolation:0.80,
    surface_au_sol: 0,
    departement_address:0,
    altitude: 0,
    delta: 0,
    pompe_a_chaleur_air_eau_value: 0,
    eligibility_nbr_enfant_a_charge: 0,
    eligibility_nbr_part_fiscal: 0,
    annee_contruction: 0,
    produits_ajoutees: Array.apply(null, Array(produits.length)).map(function(){}), //new Array(produits.length)
    snapshot:{
      fieldName: '',
    }
}

let bonusCalcul={
  maprimenov: {
    pacAirEau: 0,
    chauffeEauthermo: 0
  },
  coupDePouce: {
    pacAirEau: 0,
    chauffeEauthermo: 0
  },
  ecologique: 0,
  totalBonus: 0,
  dansIleDeFrance: false
}

jQuery(function($){
    $(document).ready(function(){
      //initialize all modals           
      //   $('.modal').modal({
      //     // dismissible:false
      //     preventScrolling: false
      // });

      $('.modal-trigger').leanModal({
        dismissible: false
      });
      
      $('.main-carousel').flickity({
        // options
        // cellAlign: 'center',
        draggable: '>1',
        contain: true,
        pageDots: false
      });
            

      //or by click on trigger
      $('#chauffageModalButton').click(function(e){
        $('.step-11').removeAttr('style');
        $('#modal1').openModal('open');

      })
      
      $('#eauSanitaireModalButton').click(function(e){
          $('#modal2').openModal('open');
      })
      
      $('#appareilElecModalButton').click(function(e){
        $('#modal3').openModal('open');
      })
      
      $('#eclairageModalButton').click(function(e){
        $('#modal4').openModal('open');
      })

      $('#pompeChaleurButton').click(function(e){
        $('#modal5').openModal('open');
      })
      
      $('#facade_maison').click(function(e){
        formPageValues.snapshot.fieldName='facade_maison';
        $('#modal6').openModal('open');
      })
      $('#facade_maison_select').click(function(e){
        formPageValues.snapshot.fieldName='facade_maison';
        $('#upload_photo').click();
      })

      $('#compteur_actuel').click(function(e){
        formPageValues.snapshot.fieldName='compteur_actuel';
        $('#modal6').openModal('open');
      })
      $('#compteur_actuel_select').click(function(e){
        formPageValues.snapshot.fieldName='compteur_actuel';
        $('#upload_photo').click();
      })
      
      $('#chaudiere_actuel').click(function(e){
        formPageValues.snapshot.fieldName='chaudiere_actuel';
        $('#modal6').openModal('open');
      })
      $('#chaudiere_actuel_select').click(function(e){
        formPageValues.snapshot.fieldName='chaudiere_actuel';
        $('#upload_photo').click();
      })
      
      $('#ballon_actuel').click(function(e){
        formPageValues.snapshot.fieldName='ballon_actuel';
        $('#modal6').openModal('open');
      })
      $('#ballon_actuel_select').click(function(e){
        formPageValues.snapshot.fieldName='ballon_actuel';
        $('#upload_photo').click();
      })
      
      $('#emplacement_pompe_a_chaleur').click(function(e){
        formPageValues.snapshot.fieldName='emplacement_pompe_a_chaleur';
        $('#modal6').openModal('open');
      })
      $('#emplacement_pompe_a_chaleur_select').click(function(e){
        formPageValues.snapshot.fieldName='emplacement_pompe_a_chaleur';
        $('#upload_photo').click();
      })
      
      $('#emplacement_des_blocs_exterieurs').click(function(e){
        formPageValues.snapshot.fieldName='emplacement_des_blocs_exterieurs';
        $('#modal6').openModal('open');
      })
      $('#emplacement_des_blocs_exterieurs_select').click(function(e){
        formPageValues.snapshot.fieldName='emplacement_des_blocs_exterieurs';
        $('#upload_photo').click();
      })

      $('#modal6Button').click(function(){
        let image = new Image();
        image.src = canvas.toDataURL()
        if(formPageValues.snapshot.fieldName==='facade_maison'){
          image.id = "pic"+formPageValues.snapshot.fieldName;
          image.alt="Facade Maison";
          $('#facade_maison_img').html('');
          $('#facade_maison_img').append(image);
        }else if(formPageValues.snapshot.fieldName==='compteur_actuel'){
          image.id = "pic"+formPageValues.snapshot.fieldName;
          image.alt="COMPTEUR ACTUEL";
          $('#compteur_actuel_img').html('');
          $('#compteur_actuel_img').append(image);
        }else if(formPageValues.snapshot.fieldName==='chaudiere_actuel'){
          image.id = "pic"+formPageValues.snapshot.fieldName;
          image.alt="CHAUDIÈRE ACTUELLE";
          $('#chaudiere_actuel_img').html('');
          $('#chaudiere_actuel_img').append(image);
        }else if(formPageValues.snapshot.fieldName==='ballon_actuel'){
          image.id = "pic"+formPageValues.snapshot.fieldName;
          image.alt="BALLON ACTUEL";
          $('#ballon_actuel_img').html('');
          $('#ballon_actuel_img').append(image);
        }else if(formPageValues.snapshot.fieldName==='emplacement_pompe_a_chaleur'){
          image.id = "pic"+formPageValues.snapshot.fieldName;
          image.alt="EMPLACEMENT POMPE À CHALEUR";
          $('#emplacement_pompe_a_chaleur_img').html('');
          $('#emplacement_pompe_a_chaleur_img').append(image);
        }else if(formPageValues.snapshot.fieldName==='emplacement_des_blocs_exterieurs'){
          image.id = "pic"+formPageValues.snapshot.fieldName;
          image.alt="EMPLACEMENT DES BLOCS EXTÉRIEURS";
          $('#emplacement_des_blocs_exterieurs_img').html('');
          $('#emplacement_des_blocs_exterieurs_img').append(image);
        }

      })

      function showListProduits(filtreText='all'){
        $('#list_pompes').html('');
        produits.forEach((produit, index)=>{
          if(filtreText!=='all' && produit.categorie.indexOf(filtreText)== -1) return
          let avantages='<div class="pompes__advantages">';
          produit.avantage.forEach(atg=>{
            avantages +='<span>'+atg+'</span>'
          })
          avantages +='</div>';
          const styleValue=produit.width ? "width:"+produit.width?.toString() :"";
          let row='<div class="pompes__item"><div class="pompes__left"><img src="'+ produit.img_url+'" alt="'+produit.title+'" style='+styleValue +'></div><div class="pompes__center"><span class="pompes__title">'+produit.title+'</span>'+avantages+'<div class="pompes__category">'+produit.categorie+'</div></div><div class="pompes__right"><button class="pompes__btn" type="button" value="'+index+'">AJOUTER</button><a class="pompes__btn pompes__btn--show" target="_blank" href="'+ produit.fiche_technique_url +'">FICHE TECHNIQUE</a></div></div>';
          
          $('#list_pompes').append(row);
        })
      }
      showListProduits();
      $('#productsFilterCategory').change(function(){
        showListProduits($(this).val())
      })
      

      // var elems = document.querySelectorAll('select');
      // var instances = M.FormSelect.init(elems);
      // $('select').formSelect();
      
      var selectFields = $('select');
      selectFields.each(function () {
        var selectField = $(this);
        selectField.material_select();
        selectField.on('change.initMaterialSelect', function () {
          // re-init when native field changes
          selectField.material_select();
        });
      }); 

      var current = 1, current_step,next_step,steps;
      steps = $("fieldset").length;
      let stepVisited=[1];
      let previousStep=null;
      
      /* Add the listener */

      // var els = document.querySelectorAll('select');

      // [].forEach.call(els, function(el) {
      //   this.addEventListener('change', function() {
      //     console.log(el.value);
      //     console.log(el.children[el.value].textContent);
      //     alert(el.children[el.value].textContent);
      //   }, false);
      // });
      
      
      $('a').click(function(e){
        if(e.currentTarget.classList[0]!=='pompes__btn'){
          e.preventDefault();
        }
      });

      // updatThumbEvolValue();

    function AnimateRotate(el, angle) {
      // caching the object for performance reasons
      var $elem = el;

      $elem.animate({  trans: angle }, {
        step: function(now,fx) {
          $(this).css('transform','rotateY('+now+'deg)');
        },
        duration:'slow'
      },'linear');
      // we use a pseudo object for the animation
      // (starts from `0` to `angle`), you can name it as you want
      // $({deg: 0}).animate({trans: angle}, {
      //     duration: 2000,
      //     step: function(now) {
      //         // in the step-callback (that is fired each step of the animation),
      //         // you can use the `now` paramter which contains the current
      //         // animation-position (`0` up to `angle`)
      //         $elem.css({
      //             transform: 'rotate(' + now + 'deg)'
      //         });
      //     }
      // });
    }
      $('#list_pompes').on('click', 'button.pompes__btn', function(e){
      // $('button.pompes__btn').click(function(e){
        // $(this).animate({ trans: 60}, 0);
        // console.log('animation')
        AnimateRotate($(this), 90);
        if($($(this)[0]).hasClass('unset')){
          setTimeout(() => {
            $(this).text('Ajouter')
            $($(this)[0]).removeClass('unset');
          }, 1000);
          formPageValues.produits_ajoutees[$(this).val()]=undefined;
          AnimateRotate($(this), 0);
        }else{
          setTimeout(() => {
            $(this).text('Retirer')
            $($(this)[0]).addClass('unset');
          }, 1000);
          formPageValues.produits_ajoutees[$(this).val()]=produits[$(this).val()]
          AnimateRotate($(this), 360)
        };
      })
      // let map = new google.maps.Map(document.getElementById("map"), {});
      // console.log('map', map)

      //Rese all radios inputs to uncheck
      function resetAllRadioInput(){
        $('#regiration_form', function(){
          $($(this).children('input[type=radio]')[0]).prop('checked', false);
          
          $($(this).children('input[type=text]')[0]).val('');
        })

      }

      resetAllRadioInput();

      $('.counter__increment').click(function(e){
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='temperature_de_confort' && formPageValues.temperature_de_confort >=25)return;
        //hauteur_sous_plafond_moyenne
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='hauteur_sous_plafond_moyenne'){
          const result=formPageValues.hauteur_sous_plafond_moyenne +0.2;
          formPageValues.hauteur_sous_plafond_moyenne = Math.round(result*100)/100
          $($($(this).parent().children('.counter__value'))[0]).text(formPageValues.hauteur_sous_plafond_moyenne);  
          return
        }
        
        //temperature de confort
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='temperature_de_confort'){
        // console.log($('select[name=hauteur_sous_plafond_moyenne]').val())
        // console.log($('select[name=gisolation]').val())
        // console.log($('#inputSurfaceSol').val)
        // console.log( formPageValues.temperature_de_confort);

          const result=formPageValues.temperature_de_confort +0.5;
          formPageValues.temperature_de_confort = Math.round(result*100)/100
          $($($(this).parent().children('.counter__value'))[0]).text(formPageValues.temperature_de_confort);  
          calculatePompeAChaleurAirEau();
          return
        }

        //Nombre d'unite pac air air
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='pompe_a_chaleur_air_air_nombre_unite'){
          formPageValues.pompe_a_chaleur_air_air_nombre_unite++;
          $($($(this).parent().children('.counter__value'))[0]).text(formPageValues.pompe_a_chaleur_air_air_nombre_unite);  
          const inputItem=`<div class="pieces__item" id="pieces__item${formPageValues.pompe_a_chaleur_air_air_nombre_unite}"><label for="inputPompeAChaleurSurfaceTotal${formPageValues.pompe_a_chaleur_air_air_nombre_unite}" class="pompeAChaleurAirAir">Piece N° <span>${formPageValues.pompe_a_chaleur_air_air_nombre_unite}</span></label><div class="bottom_part">Surface en (m2)<input id="inputPompeAChaleurSurfaceTotal${formPageValues.pompe_a_chaleur_air_air_nombre_unite}"  name="pompe_a_chaleur_air_air_surface_total${formPageValues. pompe_a_chaleur_air_air_nombre_unite}" type="number" class="pompeAChaleurAirAirInput" value="0" min="0"> <span class="pieces__value">Ow</span></div></div>`;
          $('#piecesId').append(inputItem)
          return
        }

        formPageValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]=parseInt(formPageValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')])+1
        formPageValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]=formPageValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')];


        //Champ calcule
        $($($(this).parent().children('.counter__value'))[0]).text(formPageValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]);
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond'){
          $('#inputVolumeHabitation').val(parseInt($('#inputSurfaceSol').val()) * formPageValues.eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond);
        }


        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='consommation_annuelle_fioul' || $($($(this).parent().children('.counter__value'))[0]).attr('name')==='consommation_annuelle_gaz'){
          $('#inputTotalConso20ans').val(((formPageValues.consommation_annuelle_fioul+formPageValues.consommation_annuelle_gaz)* parseInt($('#inputConsoAnIndex').val())));
          $('#inputMoyennConso').val((((formPageValues.consommation_annuelle_fioul+formPageValues.consommation_annuelle_gaz)* parseInt($('#inputConsoAnIndex').val()))/parseInt($('#inputConsoAnIndex').val())));
        }
        
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='nombre_d_habitants'){
          // formPageValues.nombre_d_habitants -=1
          calculBonus()
        }
        
        // if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='eligibility_nbr_part_fiscal'){
        //   console.log( formPageValues.eligibility_nbr_part_fiscal)

        //   formPageValues.eligibility_nbr_part_fiscal++
        //  }
        
      });

      $('.counter__decrement').click(function(e){
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='temperature_de_confort' && formPageValues.temperature_de_confort <= 17)return;
          
        if(parseInt(formPageValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')])===0) return;
        
        //hauteur_sous_plafond_moyenne
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='hauteur_sous_plafond_moyenne' && formPageValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]===1) return 
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='hauteur_sous_plafond_moyenne'){
          const result=formPageValues.hauteur_sous_plafond_moyenne -0.2;
          formPageValues.hauteur_sous_plafond_moyenne = Math.round(result*100)/100
          $($($(this).parent().children('.counter__value'))[0]).text(formPageValues.hauteur_sous_plafond_moyenne);  
          return
        }
        
        //temperature de confort
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='temperature_de_confort' && formPageValues.temperature_de_confort > 17){
          const result=formPageValues.temperature_de_confort -0.5;
          formPageValues.temperature_de_confort = Math.round(result*100)/100
          $($($(this).parent().children('.counter__value'))[0]).text(formPageValues.temperature_de_confort);  
          calculatePompeAChaleurAirEau();
          return
        }

        //Nombre d'unite pac air air
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='pompe_a_chaleur_air_air_nombre_unite'){
          $('#pieces__item'+formPageValues.pompe_a_chaleur_air_air_nombre_unite).remove()
          formPageValues.pompe_a_chaleur_air_air_nombre_unite--;
          $($($(this).parent().children('.counter__value'))[0]).text(formPageValues.pompe_a_chaleur_air_air_nombre_unite);  
          return
        }

        formPageValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]=parseInt(formPageValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')])-1
        formPageValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]=formPageValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')];
        
        $($($(this).parent().children('.counter__value'))[0]).text(formPageValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]);
        
        //champ calcule
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond'){
          $('#inputVolumeHabitation').val(parseInt($('#inputSurfaceSol').val()) * formPageValues.eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond)
        }

        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='consommation_annuelle_fioul' || $($($(this).parent().children('.counter__value'))[0]).attr('name')==='consommation_annuelle_gaz'){
          $('#inputTotalConso20ans').val(((formPageValues.consommation_annuelle_fioul+formPageValues.consommation_annuelle_gaz)* parseInt($('#inputConsoAnIndex').val())));
          $('#inputMoyennConso').val((((formPageValues.consommation_annuelle_fioul+formPageValues.consommation_annuelle_gaz)* parseInt($('#inputConsoAnIndex').val()))/parseInt($('#inputConsoAnIndex').val())));
        }
        
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='nombre_d_habitants'){
          // formPageValues.nombre_d_hnts -=1
          calculBonus()
        }
         
        // if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='eligibility_nbr_part_fiscal'){
        //   formPageValues.eligibility_nbr_part_fiscal++
        //  }
      });

      $('label.select-item').click(function(e){
        $($(this).parent().children('input[type=radio]')[0]).prop('checked', false);
        $($(this).parent().children('label')).removeClass('answer-selected');
        // console.log($($($(this).parent())[0]).children('img'));
        Array.from($($(this).parent().children('label.no-image'))).forEach(el=>{
          let urlPathCheckbox=$($($(el)[0]).children('img')[0]).attr('src');
          if(urlPathCheckbox){
            let splittedUrl= urlPathCheckbox.split('/');
            let newCheckboxUrl=splittedUrl[0]+'/'+splittedUrl[1]+'/'+splittedUrl[2]+'/uncheck.png';
            $($($(el)[0]).children('img.image-checkbox')[0]).attr('src', newCheckboxUrl);
          }
        })
        Array.from($($(this).parent().children('label.image'))).forEach(el=>{
          let urlPathCheckbox=$($($(el)[0]).children('img')[0]).attr('src');
          if(urlPathCheckbox){
            let splittedUrl= urlPathCheckbox.split('/');
            let newCheckboxUrl=splittedUrl[0]+'/'+splittedUrl[1]+'/'+splittedUrl[2]+'/uncheck.png';
            $($($(el)[0]).children('img.image-checkbox')[0]).attr('src', newCheckboxUrl);
          }
        })
        let checkboxIconPath=$($($($(this)[0])[0]).children('img.image-checkbox')[0]).attr('src');
        if (checkboxIconPath){$($($($(this)[0])[0]).children('img.image-checkbox')[0]).attr('src', checkboxIconPath.replace('check', 'uncheck'));}
        
        $($(this).children('input[type=radio]')[0]).prop('checked',true);
        // if($($(this)[0]).hasClass('image')){
        //   $($(this)[0]).addClass('answer-selected-image');
        //   $($($($(this)[0])[0]).children('img.image-checkbox')[0]).attr('src', checkboxIconPath.replace('uncheck', 'check'));
        // }else{
        //   $($(this)[0]).addClass('answer-selected');
        //   $($($($(this)[0])[0]).children('img.image-checkbox')[0]).attr('src', checkboxIconPath.replace('uncheck', 'check'));
        // }
        
        $($(this)[0]).addClass('answer-selected');
        if(checkboxIconPath){$($($($(this)[0])[0]).children('img.image-checkbox')[0]).attr('src', checkboxIconPath.replace('uncheck', 'check'))};
        return false;
      });

      
      $('label.multi-select-item').click(function(e){
        $($(this).parent().children('input[type=radio]')[0]).prop('checked', false);
        $($(this).parent().children('label')).removeClass('answer-selected');
        // console.log($($($(this).parent())[0]).children('img'));
        // Array.from($($(this).parent().children('label.no-image'))).forEach(el=>{
        //   let urlPathCheckbox=$($($(el)[0]).children('img')[0]).attr('src');
        //   if(urlPathCheckbox){
        //     let splittedUrl= urlPathCheckbox.split('/');
        //     let newCheckboxUrl=splittedUrl[0]+'/'+splittedUrl[1]+'/'+splittedUrl[2]+'/uncheck.png';
        //     $($($(el)[0]).children('img.image-checkbox')[0]).attr('src', newCheckboxUrl);
        //   }
        // })
        // Array.from($($(this).parent().children('label.image'))).forEach(el=>{
        //   let urlPathCheckbox=$($($(el)[0]).children('img')[0]).attr('src');
        //   if(urlPathCheckbox){
        //     let splittedUrl= urlPathCheckbox.split('/');
        //     let newCheckboxUrl=splittedUrl[0]+'/'+splittedUrl[1]+'/'+splittedUrl[2]+'/uncheck.png';
        //     $($($(el)[0]).children('img.image-checkbox')[0]).attr('src', newCheckboxUrl);
        //   }
        // })
        let checkboxIconPath=$($($($(this)[0])[0]).children('img.image-checkbox')[0]).attr('src');
        if (checkboxIconPath){$($($($(this)[0])[0]).children('img.image-checkbox')[0]).attr('src', checkboxIconPath.replace('check', 'uncheck'));}
        
        $($(this).children('input[type=radio]')[0]).prop('checked',true);
        
        $($(this)[0]).addClass('answer-selected');
        if(checkboxIconPath){$($($($(this)[0])[0]).children('img.image-checkbox')[0]).attr('src', checkboxIconPath.replace('uncheck', 'check'))};
        return false;
      });

      
      $('label.next').click(function(e){
        $($(this).parent().children('input[type=radio]')[0]).prop('checked', false);
        $($(this).parent().children('label')).removeClass('answer-selected');
        
        Array.from($($(this).parent().children('label.no-image'))).forEach(el=>{
          let urlPathCheckbox=$($($(el)[0]).children('img')[0]).attr('src');
          if(urlPathCheckbox){
            let splittedUrl= urlPathCheckbox.split('/');
            let newCheckboxUrl=splittedUrl[0]+'/'+splittedUrl[1]+'/'+splittedUrl[2]+'/uncheck.png';
            $($($(el)[0]).children('img.image-checkbox')[0]).attr('src', newCheckboxUrl);
          }
        })
        
        Array.from($($(this).parent().children('label.image'))).forEach(el=>{
          let urlPathCheckbox=$($($(el)[0]).children('img')[0]).attr('src');
          if(urlPathCheckbox){
            let splittedUrl= urlPathCheckbox.split('/');
            let newCheckboxUrl=splittedUrl[0]+'/'+splittedUrl[1]+'/'+splittedUrl[2]+'/uncheck.png';
            $($($(el)[0]).children('img.image-checkbox')[0]).attr('src', newCheckboxUrl);
          }
        })
        
        let checkboxIconPath=$($($($(this)[0])[0]).children('img.image-checkbox')[0]).attr('src');
        if (checkboxIconPath){$($($($(this)[0])[0]).children('img.image-checkbox')[0]).attr('src', checkboxIconPath.replace('check', 'uncheck'));}
        
        $($(this).children('input[type=radio]')[0]).prop('checked',true);
        // if($($(this)[0]).hasClass('image')){
        //   $($(this)[0]).addClass('answer-selected-image');
        //   $($($($(this)[0])[0]).children('img.image-checkbox')[0]).attr('src', checkboxIconPath.replace('uncheck', 'check'));
        // }else{
        //   $($(this)[0]).addClass('answer-selected');
        //   $($($($(this)[0])[0]).children('img.image-checkbox')[0]).attr('src', checkboxIconPath.replace('uncheck', 'check'));
        // }
        
        $($(this)[0]).addClass('answer-selected');
        if(checkboxIconPath){$($($($(this)[0])[0]).children('img.image-checkbox')[0]).attr('src', checkboxIconPath.replace('uncheck', 'check'))};
        return false;
      });
      
      /* ALL ABOUT THE FORM */     
      $(".next").click(function(e){
        if($($(this)[0]).hasClass('flickity-button')) return;
        let timeout= current >1 && current<25 ? 200 : 0;
        setTimeout(()=>{
            $('.page .page__content #regiration_form').css("transform"," translateX(50px)" );
            $('.page .page__content #regiration_form').css("transition", "none" );

            previousStep=parseInt($(this).attr('skipStep')) ? current:  null;
            current= $(this).attr('skipStep') ? parseInt($(this).attr('skipStep')) : current;
            
            if(current===11){
             $('.step-'+current).hide()
              current=15
            }
            current_step =  $('.step-'+current);
            next_step=++current;
            next_step_form =  $('.step-'+next_step);

            if (current >=1 && current<12){ 
              $('.page .previous__link').css('visibility', 'visible');
            }else if(current >15){
              $('.page .previous__link').css('visibility', 'visible');
            }else{
                $('.page .previous__link').css('visibility', 'hidden');
            }
              
            
            if(current>11 && current< 16){
              $('.main-cta').css('visibility', 'hidden');
            }else if(current >19){
              $('.main-cta').css('visibility', 'hidden');
            }else{            
              $('.main-cta').css('visibility', 'visible');
            }
  

            // else if(current>15 && current<18){
            //   $('.main-cta').css('visibility', 'visible');
            // }

            
            handleStepsDesign(current)
            // if(current>5){
            //   setTimeout(() => {
            //     $('.topbar .topbar__progress').css('visibility','hidden');
            //   }, 4000);
            // }

            if (previousStep){ $('.step-'+previousStep).hide()}
          
            // if(next_step===6){
            //   current_step.fadeTo(4000, 1, function(){
            //     current_step.hide();
            //   });
            // }else{
            //   current_step.hide();
            // }
            current_step.hide();

            // $('.page .page__content').animate({transform: "translateY(0px)!important"});
            
            $('.page .page__content #regiration_form').css("transition", ".4s ease-out" );
            $('.page .page__content #regiration_form').css("transform"," translateX(0px)" );
            
            
            // if(current===10){
            //   setTimeout(() => {
            //     next_step_form.fadeTo('slow', 1, function(){
            //       setProgressBar(next_step);
            //       // $('.page .page__content .step-6 h2').css('margin-top', '50px');
            //       next_step_form.show();
            //       stepVisited.push(next_step);
            //     });
            //   }, 4000);
            // }else{
            //   next_step_form.fadeTo('slow', 1, function(){
            //     setProgressBar(next_step);
            //     next_step_form.show();
            //     stepVisited.push(next_step);
            //   });
            // }
            calculatePompeAChaleurAirEau();
            calculBonus()
            next_step_form.fadeTo('slow', 1, function(){
              setProgressBar(next_step);
              next_step_form.show();
              if(!stepVisited.includes(next_step)){
                stepVisited.push(next_step);
              }
              console.log('stepVisited', stepVisited)
            });

        }, timeout);
          
      });

      $(".previous__link").click(function(){
        let timeout= current>1 && current<25 ? 200 : 0;  
        
        $('.page .page__content #regiration_form').css("transform"," translateX(50px)" );
        $('.page .page__content #regiration_form').css("transition", "none" );

        current_step = $('.step-'+stepVisited[stepVisited.length-1]);
        next_step=stepVisited[stepVisited.length-2];
        current=next_step;
        
        next_step_form = $('.step-'+next_step);
        
        if (current >=1 && current<12){ 
          $('.page .previous__link').css('visibility', 'visible');
        } else if(current >15){
          $('.page .previous').css('visibility', 'visible');
        }else{
            $('.page .previous__link').css('visibility', 'hidden');
        }
          
            
        if(current>11 && current< 16){
          $('.main-cta').css('visibility', 'hidden');
        }else if(current >19){
          $('.main-cta').css('visibility', 'hidden');
        }else{            
          $('.main-cta').css('visibility', 'visible');
        }

        
        handleStepsDesign(current)

        current_step.hide();
        
        setTimeout(() => {      
            $('.page .page__content #regiration_form').css("transition", ".4s ease-out" );
            $('.page .page__content #regiration_form').css("transform"," translateX(0px)" );
        }, timeout);   

        calculatePompeAChaleurAirEau();
        calculBonus()

          next_step_form.fadeTo('slow', 1, function(){
            setProgressBar(next_step);
            next_step_form.show();
          });
          stepVisited.pop();
      });

      $('.navigationButton').click(function(){
        for(let i=0; i<21; i++){
          $('.step-'+i).removeAttr('style');
        }

        if($(this).attr('aria-selected')==='part-1'){
          current=0;
            $('.page .page__content #regiration_form').css("transform"," translateX(50px)" );
            $('.page .page__content #regiration_form').css("transition", "none" );

            previousStep=parseInt($(this).attr('skipStep')) ? current:  null;
            current= $(this).attr('skipStep') ? parseInt($(this).attr('skipStep')) : current;
            
            current_step =  $('.step-'+current);
            next_step=++current;
            next_step_form =  $('.step-'+next_step);
            
            if (current >=1 && current<12){ 
              $('.page .previous__link').css('visibility', 'visible');
            }else if(current >15){
              $('.page .previous__link').css('visibility', 'visible');
            }else{
                $('.page .previous__link').css('visibility', 'hidden');
            }
              
              
            
            if(current>11 && current< 16){
              $('.main-cta').css('visibility', 'hidden');
            }else if(current >19){
              $('.main-cta').css('visibility', 'hidden');
            }else{            
              $('.main-cta').css('visibility', 'visible');
            }
  
            handleStepsDesign(current)

            if (previousStep){ $('.step-'+previousStep).hide()}
            current_step.hide();

            $('.page .page__content #regiration_form').css("transition", ".4s ease-out" );
            $('.page .page__content #regiration_form').css("transform"," translateX(0px)" );
            
            
            
            next_step_form.fadeTo('slow', 1, function(){
              setProgressBar(next_step);
              next_step_form.show();
              stepVisited=[]
              for(let i=1; i<=next_step; i++){
                  stepVisited.push(i);
              }
            });
        }else if ($(this).attr('aria-selected')==='part-2'){
            current=1;
            $('.page .page__content #regiration_form').css("transform"," translateX(50px)" );
            $('.page .page__content #regiration_form').css("transition", "none" );

            previousStep=parseInt($(this).attr('skipStep')) ? current:  null;
            current= $(this).attr('skipStep') ? parseInt($(this).attr('skipStep')) : current;
            
            current_step =  $('.step-'+current);
            next_step=++current;
            next_step_form =  $('.step-'+next_step);
            
            if (current >=1 && current<12){ 
              $('.page .previous__link').css('visibility', 'visible');
            }else if(current >15){
              $('.page .previous__link').css('visibility', 'visible');
            }else{
                $('.page .previous__link').css('visibility', 'hidden');
            }
            
            if(current>11 && current< 16){
              $('.main-cta').css('visibility', 'hidden');
            }else if(current >19){
              $('.main-cta').css('visibility', 'hidden');
            }else{            
              $('.main-cta').css('visibility', 'visible');
            }  

            handleStepsDesign(current)

            if (previousStep){ $('.step-'+previousStep).hide()}
            current_step.hide();

            $('.page .page__content #regiration_form').css("transition", ".4s ease-out" );
            $('.page .page__content #regiration_form').css("transform"," translateX(0px)" );
            
            
            
            next_step_form.fadeTo('slow', 1, function(){
              setProgressBar(next_step);
              next_step_form.show();
              stepVisited=[]
              for(let i=1; i<=next_step; i++){
                  stepVisited.push(i);
              }
            });
        }else if ($(this).attr('aria-selected')==='part-3'){
            $('.step-'+1).css('display', 'none');
            current=9;
            
            $('.page .page__content #regiration_form').css("transform"," translateX(50px)" );
            $('.page .page__content #regiration_form').css("transition", "none" );

            previousStep=parseInt($(this).attr('skipStep')) ? current:  null;
            current= $(this).attr('skipStep') ? parseInt($(this).attr('skipStep')) : current;
            
            current_step =  $('.step-'+current);
            next_step=++current;
            next_step_form =  $('.step-'+next_step);
            
            if (current >=1 && current<12){ 
              $('.page .previous__link').css('visibility', 'visible');
            }else if(current >15){
              $('.page .previous__link').css('visibility', 'visible');
            }else{
                $('.page .previous__link').css('visibility', 'hidden');
            }
            
            if(current>11 && current< 16){
              $('.main-cta').css('visibility', 'hidden');
            }else if(current >19){
              $('.main-cta').css('visibility', 'hidden');
            }else{            
              $('.main-cta').css('visibility', 'visible');
            }
  
            handleStepsDesign(current)

            if (previousStep){ $('.step-'+previousStep).hide()}
            current_step.hide();

            $('.page .page__content #regiration_form').css("transition", ".4s ease-out" );
            $('.page .page__content #regiration_form').css("transform"," translateX(0px)" );
            
            next_step_form.fadeTo('slow', 1, function(){
              setProgressBar(next_step);
              next_step_form.show();
              stepVisited=[]
              stepVisited.push(next_step);
              for(let i=1; i<=next_step; i++){
                  stepVisited.push(i);
              }
            });
        } if($(this).attr('aria-selected')==='part-4'){
          $('.step-'+1).css('display', 'none');
          current=10;
          $('.page .page__content #regiration_form').css("transform"," translateX(50px)" );
          $('.page .page__content #regiration_form').css("transition", "none" );

          previousStep=parseInt($(this).attr('skipStep')) || current;
          current= $(this).attr('skipStep') ? parseInt($(this).attr('skipStep')) : current;
          
          current_step =  $('.step-'+current);
          next_step=++current;
          next_step_form =  $('.step-'+next_step);
          
          if (current >=1 && current<12){ 
            $('.page .previous__link').css('visibility', 'visible');
          }else if(current >15){
            $('.page .previous__link').css('visibility', 'visible');
          }else{
              $('.page .previous__link').css('visibility', 'hidden');
          }
            
            
          if(current>11 && current< 16){
            $('.main-cta').css('visibility', 'hidden');
          }else if(current >19){
            $('.main-cta').css('visibility', 'hidden');
          }else{            
            $('.main-cta').css('visibility', 'visible');
          }

          handleStepsDesign(current)

          if (previousStep){ $('.step-'+previousStep).hide()}
          current_step.hide();

          $('.page .page__content #regiration_form').css("transition", ".4s ease-out" );
          $('.page .page__content #regiration_form').css("transform"," translateX(0px)" );
          
         
          next_step_form.fadeTo('slow', 1, function(){
            setProgressBar(next_step);
            next_step_form.show();
            stepVisited=[]
            for(let i=1; i<=next_step; i++){
                stepVisited.push(i);
            }
          });

        } if($(this).attr('aria-selected')==='part-5'){
          $('.step-'+1).css('display', 'none');
          current=15;
          $('.page .page__content #regiration_form').css("transform"," translateX(50px)" );
          $('.page .page__content #regiration_form').css("transition", "none" );

          previousStep=parseInt($(this).attr('skipStep')) ? current:  null;
          current= $(this).attr('skipStep') ? parseInt($(this).attr('skipStep')) : current;
          
          current_step =  $('.step-'+current);
          next_step=++current;
          next_step_form =  $('.step-'+next_step);
          
          if (current >=1 && current<12){ 
            $('.page .previous__link').css('visibility', 'visible');
          }else if(current >15){
            $('.page .previous__link').css('visibility', 'visible');
          }else{
              $('.page .previous__link').css('visibility', 'hidden');
          }
        
            
          if(current>11 && current< 16){
            $('.main-cta').css('visibility', 'hidden');
          }else if(current >19){
            $('.main-cta').css('visibility', 'hidden');
          }else{            
            $('.main-cta').css('visibility', 'visible');
          }

          handleStepsDesign(current)

          if (previousStep){ $('.step-'+previousStep).hide()}
          current_step.hide();

          $('.page .page__content #regiration_form').css("transition", ".4s ease-out" );
          $('.page .page__content #regiration_form').css("transform"," translateX(0px)" );          
          
          next_step_form.fadeTo('slow', 1, function(){
            setProgressBar(next_step);
            next_step_form.show();
            stepVisited=[]
            for(let i=1; i<=next_step; i++){
              if(i<12 || i>15){
                stepVisited.push(i);
              }
            }
          });

        }
        if($(this).attr('aria-selected')==='part-6'){
          $('.step-'+1).css('display', 'none');
          current=16;
          $('.page .page__content #regiration_form').css("transform"," translateX(50px)" );
          $('.page .page__content #regiration_form').css("transition", "none" );

          previousStep=parseInt($(this).attr('skipStep')) ? current:  null;
          current= $(this).attr('skipStep') ? parseInt($(this).attr('skipStep')) : current;
          
          current_step =  $('.step-'+current);
          next_step=++current;
          next_step_form =  $('.step-'+next_step);
          
          if (current >=1 && current<12){ 
            $('.page .previous__link').css('visibility', 'visible');
          }else if(current >15){
            $('.page .previous__link').css('visibility', 'visible');
          }else{
              $('.page .previous__link').css('visibility', 'hidden');
          }
        
            
          if(current>11 && current< 16){
            $('.main-cta').css('visibility', 'hidden');
          }else if(current >19){
            $('.main-cta').css('visibility', 'hidden');
          }else{            
            $('.main-cta').css('visibility', 'visible');
          }

          handleStepsDesign(current)

          if (previousStep){ $('.step-'+previousStep).hide()}
          current_step.hide();

          $('.page .page__content #regiration_form').css("transition", ".4s ease-out" );
          $('.page .page__content #regiration_form').css("transform"," translateX(0px)" );          
          
          next_step_form.fadeTo('slow', 1, function(){
            setProgressBar(next_step);
            next_step_form.show();
            stepVisited=[]
            for(let i=1; i<=next_step; i++){
              if(i<12 || i>15){
                stepVisited.push(i);
              }
            }
          });

        }

        if($(this).attr('aria-selected')==='part-7'){
          $('.step-'+1).css('display', 'none');
          current=17;
          $('.page .page__content #regiration_form').css("transform"," translateX(50px)" );
          $('.page .page__content #regiration_form').css("transition", "none" );

          previousStep=parseInt($(this).attr('skipStep')) ? current:  null;
          current= $(this).attr('skipStep') ? parseInt($(this).attr('skipStep')) : current;
          
          current_step =  $('.step-'+current);
          next_step=++current;
          next_step_form =  $('.step-'+next_step);
          
          if (current >=1 && current<12){ 
            $('.page .previous__link').css('visibility', 'visible');
          }else if(current >15){
            $('.page .previous__link').css('visibility', 'visible');
          }else{
              $('.page .previous__link').css('visibility', 'hidden');
          }
        
          if(current>11 && current< 16){
            $('.main-cta').css('visibility', 'hidden');
          }else if(current >19){
            $('.main-cta').css('visibility', 'hidden');
          }else{            
            $('.main-cta').css('visibility', 'visible');
          }

          handleStepsDesign(current)

          if (previousStep){ $('.step-'+previousStep).hide()}
          current_step.hide();

          $('.page .page__content #regiration_form').css("transition", ".4s ease-out" );
          $('.page .page__content #regiration_form').css("transform"," translateX(0px)" );          
          
          next_step_form.fadeTo('slow', 1, function(){
            setProgressBar(next_step);
            next_step_form.show();
            stepVisited=[]
            for(let i=1; i<=next_step; i++){
              if(i<12 || i>15){
                stepVisited.push(i);
              }
            }
          });

        }
        if($(this).attr('aria-selected')==='part-8'){
          $('.step-'+1).css('display', 'none');
          current=19;
          $('.page .page__content #regiration_form').css("transform"," translateX(50px)" );
          $('.page .page__content #regiration_form').css("transition", "none" );

          previousStep=parseInt($(this).attr('skipStep')) ? current:  null;
          current= $(this).attr('skipStep') ? parseInt($(this).attr('skipStep')) : current;
          
          current_step =  $('.step-'+current);
          next_step=++current;
          next_step_form =  $('.step-'+next_step);
          
          if (current >=1 && current<12){ 
            $('.page .previous__link').css('visibility', 'visible');
          }else if(current >15){
            $('.page .previous__link').css('visibility', 'visible');
          }else{
              $('.page .previous__link').css('visibility', 'hidden');
          }
        
          if(current>11 && current< 16){
            $('.main-cta').css('visibility', 'hidden');
          }else if(current >19){
            $('.main-cta').css('visibility', 'hidden');
          }else{            
            $('.main-cta').css('visibility', 'visible');
          }

          handleStepsDesign(current)

          if (previousStep){ $('.step-'+previousStep).hide()}
          current_step.hide();

          $('.page .page__content #regiration_form').css("transition", ".4s ease-out" );
          $('.page .page__content #regiration_form').css("transform"," translateX(0px)" );          
          
          next_step_form.fadeTo('slow', 1, function(){
            setProgressBar(next_step);
            next_step_form.show();
            stepVisited=[]
            for(let i=1; i<=next_step; i++){
              if(i<12 || i>15){
                stepVisited.push(i);
              }
            }
          });

        }

        calculatePompeAChaleurAirEau();
        
        handlePhotoCaptureButtons();
        //end
      })

      // Change progress bar action
      setProgressBar(current);
      function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
          .css("width",percent+"%")
          //.html(percent+"%");   
      }
    });

    function handleStepsDesign(current){
      if(current>1 && current< 10){
        if(!$("#part-2").hasClass('step-list-item-active') || !$("#part_m-2").hasClass('step-list-item-active')){
          $("#part-2").addClass('step-list-item-active')
          $("#part_m-2").addClass('step-list-item-active')
        }
        $("#part-2 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
        $("#part_m-2 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');

        if(!$("#part-1 h5").hasClass('step-list-item-disabled')|| !$("#part_m-1 h5").hasClass('step-list-item-disabled')){
          $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-1").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-3 h5").hasClass('step-list-item-disabled') || !$("#part_m-3 h5").hasClass('step-list-item-disabled')){
          $("#part-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-3").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-3").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-4 h5").hasClass('step-list-item-disabled') || !$("#part_m-4 h5").hasClass('step-list-item-disabled')){
          $("#part-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-4").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-4").removeClass('step-list-item-active',1000, 'easeInBack');

        if(!$("#part-5 h5").hasClass('step-list-item-disabled') || !$("#part_m-5 h5").hasClass('step-list-item-disabled')){
          $("#part-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-5").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-5").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-6 h5").hasClass('step-list-item-disabled') || !$("#part_m-6 h5").hasClass('step-list-item-disabled')){
          $("#part-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-6").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-6").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-7 h5").hasClass('step-list-item-disabled') || !$("#part_m-7 h5").hasClass('step-list-item-disabled')){
          $("#part-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-7").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-7").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-8 h5").hasClass('step-list-item-disabled') || !$("#part_m-8 h5").hasClass('step-list-item-disabled')){
          $("#part-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-8").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-8").removeClass('step-list-item-active',1000, 'easeInBack');
      } else if(current<=1){
        if(!$("#part-1").hasClass('step-list-item-active') || !$("#part_m-1").hasClass('step-list-item-active')){
          $("#part-1").addClass('step-list-item-active')
          $("#part_m-1").addClass('step-list-item-active')
        }
        $("#part-1 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
        $("#part_m-1 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');

        if(!$("#part-2 h5").hasClass('step-list-item-disabled') || !$("#part_m-2 h5").hasClass('step-list-item-disabled')){
          $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-3 h5").hasClass('step-list-item-disabled') || !$("#part_m-3 h5").hasClass('step-list-item-disabled')){
          $("#part-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-3").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-3").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-4 h5").hasClass('step-list-item-disabled') || !$("#part_m-4 h5").hasClass('step-list-item-disabled')){
          $("#part-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-4").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-4").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-5 h5").hasClass('step-list-item-disabled') || !$("#part_m-5 h5").hasClass('step-list-item-disabled')){
          $("#part-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-5").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-5").removeClass('step-list-item-active',1000, 'easeInBack');        
        
        if(!$("#part-6 h5").hasClass('step-list-item-disabled') || !$("#part_m-6 h5").hasClass('step-list-item-disabled')){
          $("#part-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-6").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-6").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-7 h5").hasClass('step-list-item-disabled') || !$("#part_m-7 h5").hasClass('step-list-item-disabled')){
          $("#part-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-7").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-7").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-8 h5").hasClass('step-list-item-disabled') || !$("#part_m-8 h5").hasClass('step-list-item-disabled')){
          $("#part-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        
        if(!$("#part-8 h5").hasClass('step-list-item-disabled') || !$("#part_m-8 h5").hasClass('step-list-item-disabled')){
          $("#part-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-8").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-8").removeClass('step-list-item-active',1000, 'easeInBack');
      }else if(current==11){
        if(!$("#part-4").hasClass('step-list-item-active') || !$("#part_m-4").hasClass('step-list-item-active')){
          $("#part-4").addClass('step-list-item-active')
          $("#part_m-4").addClass('step-list-item-active')
        }
        $("#part-4 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
        $("#part_m-4 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');

       if(!$("#part-1 h5").hasClass('step-list-item-disabled')|| !$("#part_m-1 h5").hasClass('step-list-item-disabled')){
          $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-1").removeClass('step-list-item-active',1000, 'easeInBack');       
        

        if(!$("#part-2 h5").hasClass('step-list-item-disabled') || !$("#part_m-2 h5").hasClass('step-list-item-disabled')){
          $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-3 h5").hasClass('step-list-item-disabled') || !$("#part_m-3 h5").hasClass('step-list-item-disabled')){
          $("#part-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-3").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-3").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-5 h5").hasClass('step-list-item-disabled') || !$("#part_m-5 h5").hasClass('step-list-item-disabled')){
          $("#part-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-5").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-5").removeClass('step-list-item-active',1000, 'easeInBack');        
        
        if(!$("#part-6 h5").hasClass('step-list-item-disabled') || !$("#part_m-6 h5").hasClass('step-list-item-disabled')){
          $("#part-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-6").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-6").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-7 h5").hasClass('step-list-item-disabled') || !$("#part_m-7 h5").hasClass('step-list-item-disabled')){
          $("#part-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-7").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-7").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-8 h5").hasClass('step-list-item-disabled') || !$("#part_m-8 h5").hasClass('step-list-item-disabled')){
          $("#part-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        
        if(!$("#part-8 h5").hasClass('step-list-item-disabled') || !$("#part_m-8 h5").hasClass('step-list-item-disabled')){
          $("#part-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-8").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-8").removeClass('step-list-item-active',1000, 'easeInBack');
      }else if(current==16){
        if(!$("#part-5").hasClass('step-list-item-active') || !$("#part_m-5").hasClass('step-list-item-active')){
          $("#part-5").addClass('step-list-item-active')
          $("#part_m-5").addClass('step-list-item-active')
        }
        $("#part-5 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
        $("#part_m-5 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');

        if(!$("#part-1 h5").hasClass('step-list-item-disabled')|| !$("#part_m-1 h5").hasClass('step-list-item-disabled')){
          $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-1").removeClass('step-list-item-active',1000, 'easeInBack');

        if(!$("#part-2 h5").hasClass('step-list-item-disabled') || !$("#part_m-2 h5").hasClass('step-list-item-disabled')){
          $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-3 h5").hasClass('step-list-item-disabled') || !$("#part_m-3 h5").hasClass('step-list-item-disabled')){
          $("#part-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-3").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-3").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-4 h5").hasClass('step-list-item-disabled') || !$("#part_m-4 h5").hasClass('step-list-item-disabled')){
          $("#part-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-4").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-4").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-6 h5").hasClass('step-list-item-disabled') || !$("#part_m-6 h5").hasClass('step-list-item-disabled')){
          $("#part-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-6").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-6").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-7 h5").hasClass('step-list-item-disabled') || !$("#part_m-7 h5").hasClass('step-list-item-disabled')){
          $("#part-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-7").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-7").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-8 h5").hasClass('step-list-item-disabled') || !$("#part_m-8 h5").hasClass('step-list-item-disabled')){
          $("#part-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        
        if(!$("#part-8 h5").hasClass('step-list-item-disabled') || !$("#part_m-8 h5").hasClass('step-list-item-disabled')){
          $("#part-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-8").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-8").removeClass('step-list-item-active',1000, 'easeInBack');
      } else if(current==10) {
        if(!$("#part-3").hasClass('step-list-item-active') || !$("#part_m-3").hasClass('step-list-item-active')){
          $("#part-3").addClass('step-list-item-active')
          $("#part_m-3").addClass('step-list-item-active')
        }
        $("#part-3 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
        $("#part_m-3 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
        
        if(!$("#part-1 h5").hasClass('step-list-item-disabled')|| !$("#part_m-1 h5").hasClass('step-list-item-disabled')){
          $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-1").removeClass('step-list-item-active',1000, 'easeInBack');

        if(!$("#part-2 h5").hasClass('step-list-item-disabled') || !$("#part_m-2 h5").hasClass('step-list-item-disabled')){
          $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-2").removeClass('step-list-item-active',1000, 'easeInBack');

        if(!$("#part-4 h5").hasClass('step-list-item-disabled') || !$("#part_m-4 h5").hasClass('step-list-item-disabled')){
          $("#part-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-4").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-4").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-5 h5").hasClass('step-list-item-disabled') || !$("#part_m-5 h5").hasClass('step-list-item-disabled')){
          $("#part-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-5").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-5").removeClass('step-list-item-active',1000, 'easeInBack');        
        
        if(!$("#part-6 h5").hasClass('step-list-item-disabled') || !$("#part_m-6 h5").hasClass('step-list-item-disabled')){
          $("#part-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-6").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-6").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-7 h5").hasClass('step-list-item-disabled') || !$("#part_m-7 h5").hasClass('step-list-item-disabled')){
          $("#part-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-7").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-7").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-8 h5").hasClass('step-list-item-disabled') || !$("#part_m-8 h5").hasClass('step-list-item-disabled')){
          $("#part-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        
        if(!$("#part-8 h5").hasClass('step-list-item-disabled') || !$("#part_m-8 h5").hasClass('step-list-item-disabled')){
          $("#part-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-8").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-8").removeClass('step-list-item-active',1000, 'easeInBack');
      }else if(current==18 || current==19){
        if(!$("#part-7").hasClass('step-list-item-active') || !$("#part_m-7").hasClass('step-list-item-active')){
          $("#part-7").addClass('step-list-item-active')
          $("#part_m-7").addClass('step-list-item-active')
        }
        $("#part-7 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
        $("#part_m-7 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');

        if(!$("#part-1 h5").hasClass('step-list-item-disabled')|| !$("#part_m-1 h5").hasClass('step-list-item-disabled')){
          $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-1").removeClass('step-list-item-active',1000, 'easeInBack');

        if(!$("#part-2 h5").hasClass('step-list-item-disabled') || !$("#part_m-2 h5").hasClass('step-list-item-disabled')){
          $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-3 h5").hasClass('step-list-item-disabled') || !$("#part_m-3 h5").hasClass('step-list-item-disabled')){
          $("#part-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-3").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-3").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-4 h5").hasClass('step-list-item-disabled') || !$("#part_m-4 h5").hasClass('step-list-item-disabled')){
          $("#part-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-4").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-4").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-5 h5").hasClass('step-list-item-disabled') || !$("#part_m-5 h5").hasClass('step-list-item-disabled')){
          $("#part-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-5").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-5").removeClass('step-list-item-active',1000, 'easeInBack');        
        
        if(!$("#part-6 h5").hasClass('step-list-item-disabled') || !$("#part_m-6 h5").hasClass('step-list-item-disabled')){
          $("#part-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-6").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-6").removeClass('step-list-item-active',1000, 'easeInBack');

        if(!$("#part-8 h5").hasClass('step-list-item-disabled') || !$("#part_m-8 h5").hasClass('step-list-item-disabled')){
          $("#part-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }

        $("#part-8").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-8").removeClass('step-list-item-active',1000, 'easeInBack');
      }else if(current==20){
        if(!$("#part-8").hasClass('step-list-item-active') || !$("#part_m-8").hasClass('step-list-item-active')){
          $("#part-8").addClass('step-list-item-active')
          $("#part_m-8").addClass('step-list-item-active')
        }
        $("#part-8 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
        $("#part_m-8 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');

        if(!$("#part-1 h5").hasClass('step-list-item-disabled')|| !$("#part_m-1 h5").hasClass('step-list-item-disabled')){
          $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-1").removeClass('step-list-item-active',1000, 'easeInBack');

        if(!$("#part-2 h5").hasClass('step-list-item-disabled') || !$("#part_m-2 h5").hasClass('step-list-item-disabled')){
          $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-3 h5").hasClass('step-list-item-disabled') || !$("#part_m-3 h5").hasClass('step-list-item-disabled')){
          $("#part-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-3").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-3").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-4 h5").hasClass('step-list-item-disabled') || !$("#part_m-4 h5").hasClass('step-list-item-disabled')){
          $("#part-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-4").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-4").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-5 h5").hasClass('step-list-item-disabled') || !$("#part_m-5 h5").hasClass('step-list-item-disabled')){
          $("#part-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-5").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-5").removeClass('step-list-item-active',1000, 'easeInBack');        
        
        if(!$("#part-6 h5").hasClass('step-list-item-disabled') || !$("#part_m-6 h5").hasClass('step-list-item-disabled')){
          $("#part-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-6").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-6").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-7 h5").hasClass('step-list-item-disabled') || !$("#part_m-7 h5").hasClass('step-list-item-disabled')){
          $("#part-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-7").removeClass('step-list-item-active',1000, 'easeInBack');
        $("#part_m-7").removeClass('step-list-item-active',1000, 'easeInBack');
        

      }else{
        // else if(current==17){
          if(!$("#part-6").hasClass('step-list-item-active') || !$("#part_m-6").hasClass('step-list-item-active')){
            $("#part-6").addClass('step-list-item-active')
            $("#part_m-6").addClass('step-list-item-active')
          }
          $("#part-6 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
          $("#part_m-6 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
  
          if(!$("#part-1 h5").hasClass('step-list-item-disabled')|| !$("#part_m-1 h5").hasClass('step-list-item-disabled')){
            $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
            $("#part_m-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          }
          $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
          $("#part_m-1").removeClass('step-list-item-active',1000, 'easeInBack');
  
          if(!$("#part-2 h5").hasClass('step-list-item-disabled') || !$("#part_m-2 h5").hasClass('step-list-item-disabled')){
            $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
            $("#part_m-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          }
          $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
          $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
          
          if(!$("#part-3 h5").hasClass('step-list-item-disabled') || !$("#part_m-3 h5").hasClass('step-list-item-disabled')){
            $("#part-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
            $("#part_m-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          }
          $("#part-3").removeClass('step-list-item-active',1000, 'easeInBack');
          $("#part_m-3").removeClass('step-list-item-active',1000, 'easeInBack');
          
          if(!$("#part-4 h5").hasClass('step-list-item-disabled') || !$("#part_m-4 h5").hasClass('step-list-item-disabled')){
            $("#part-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
            $("#part_m-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          }
          $("#part-4").removeClass('step-list-item-active',1000, 'easeInBack');
          $("#part_m-4").removeClass('step-list-item-active',1000, 'easeInBack');
          
          if(!$("#part-5 h5").hasClass('step-list-item-disabled') || !$("#part_m-5 h5").hasClass('step-list-item-disabled')){
            $("#part-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
            $("#part_m-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          }
          $("#part-5").removeClass('step-list-item-active',1000, 'easeInBack');
          $("#part_m-5").removeClass('step-list-item-active',1000, 'easeInBack');        
          
          if(!$("#part-7 h5").hasClass('step-list-item-disabled') || !$("#part_m-7 h5").hasClass('step-list-item-disabled')){
            $("#part-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
            $("#part_m-7 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          }
          $("#part-7").removeClass('step-list-item-active',1000, 'easeInBack');
          $("#part_m-7").removeClass('step-list-item-active',1000, 'easeInBack');

          if(!$("#part-8 h5").hasClass('step-list-item-disabled') || !$("#part_m-8 h5").hasClass('step-list-item-disabled')){
            $("#part-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
            $("#part_m-8 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          }
  
          $("#part-8").removeClass('step-list-item-active',1000, 'easeInBack');
          $("#part_m-8").removeClass('step-list-item-active',1000, 'easeInBack');
        // }else if(current==18){
          // if(!$("#part-7").hasClass('step-list-item-active')){
          //   $("#part-7").addClass('step-list-item-active')
          // }
          // $("#part-7 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
  
          // if(!$("#part-2 h5").hasClass('step-list-item-disabled')){
          //   $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          // }
          // $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
          
          // if(!$("#part-3 h5").hasClass('step-list-item-disabled')){
          //   $("#part-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          // }
          // $("#part-3").removeClass('step-list-item-active',1000, 'easeInBack');
          
          // if(!$("#part-4 h5").hasClass('step-list-item-disabled')){
          //   $("#part-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          // }
          // $("#part-4").removeClass('step-list-item-active',1000, 'easeInBack');
  
          // if(!$("#part-1 h5").hasClass('step-list-item-disabled')){
          //   $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          // }
          // $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
          
          // if(!$("#part-5 h5").hasClass('step-list-item-disabled')){
          //   $("#part-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          // }
          // $("#part-5").removeClass('step-list-item-active',1000, 'easeInBack');
          
          // if(!$("#part-6 h5").hasClass('step-list-item-disabled')){
          //   $("#part-6 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          // }
          // $("#part-6").removeClass('step-list-item-active',1000, 'easeInBack');
        // }
      }
    }

    //CHECKBOX
    $(".chk-moyenne-conso").change(function() {      
      // if($(this).is(':checked')){
      //   $(this).prop('checked', false);
      // }else{
      //   $(this).prop('checked', true)
      // }

      // $(this).prop('checked', true);
      if($(this).is(':checked')){
        if($(this).attr('id')==='200l'){
          $('#270l').prop('checked', false);
          $('#230l').prop('checked', false);
          $('#Autres').prop('checked', false);
        }else if($(this).attr('id')==='230l'){
          $('#200l').prop('checked', false);
          $('#270l').prop('checked', false);
          $('#Autres').prop('checked', false);
        }else if($(this).attr('id')==='270l'){
          $('#230l').prop('checked', false);
          $('#Autres').prop('checked', false);
          $('#200l').prop('checked', false);
        }else{
          $('#230l').prop('checked', false);
          $('#200l').prop('checked', false);
          $('#270l').prop('checked', false);
          
        }
      }
    });

    $(".chk-elec-ampoule").change(function() {
      if($(this).is(':checked')){
        if($(this).attr('id')==='elec_ampoule1'){
          $('#elec_ampoule2').prop('checked', false);
        }else{
          $('#elec_ampoule1').prop('checked', false);

        }
      }
    });


    //CHAMPS CALCULER 
      //= inputVolumeHabitation inputSurfaceSol * formPageValues('eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond')
    $('#inputSurfaceSol').change(function(){
      $('#inputVolumeHabitation').val(parseInt($(this).val())* formPageValues.eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond);

    })
    
    $('#inputConsoFioul').change(function(){
      $('#inputTotalConso20ans').val(((parseInt($(this).val())+parseInt($('#inputConsoGaz').val()))* parseInt($('#inputConsoAnIndex').val())));
      $('#inputMoyennConso').val((((parseInt($(this).val())+parseInt($('#inputConsoGaz').val()))* parseInt($(this).val()))/parseInt($(this).val())))
    })

    
    $('#inputConsoGaz').change(function(){
      $('#inputTotalConso20ans').val(((parseInt($('#inputConsoFioul').val()) +parseInt($(this).val()))* parseInt($('#inputConsoAnIndex').val())));
      $('#inputMoyennConso').val((((parseInt($('#inputConsoFioul').val())+parseInt($(this).val()))* parseInt($(this).val()))/parseInt($(this).val())))
    })

    $('#inputConsoAnIndex').change(function(e){
      $('#inputTotalConso20ans').val(((parseInt($('#inputConsoFioul').val())+parseInt($('#inputConsoGaz').val()))* parseInt($(this).val())))
      $('#inputMoyennConso').val((((parseInt($('#inputConsoFioul').val())+parseInt($('#inputConsoGaz').val()))* parseInt($(this).val()))/parseInt($(this).val())))
    })
    function consommationGlobal(){      
      formPageValues.votre_conso_actuel=(Number($('#inputEstimFactChauff').val()) + Number($('#inputEstimFactEauChaude').val())+ Number($('#inputEstimFactAppareilElec').val())+Number($('#inputEstimFactEclairage').val()));
      $('#votre_conso_actuel').text(formatNumber.asEuro(formPageValues.votre_conso_actuel).replace(",00", ""));
      const nombreAnneeAIndexer=parseInt($('select[name=type_de_chaufface_nombre_d_annee_a_indexer]').val()) || 0;
      const evolPrixFioul =parseFloat(formPageValues.evol_sur_25_annee)/100;
      if(!isNaN(nombreAnneeAIndexer)){
        let sumTotal=formPageValues.votre_conso_actuel;
        const allValues=[]
        for(let i=0; i< nombreAnneeAIndexer; i++){
          sumTotal=sumTotal+(sumTotal * evolPrixFioul);
          allValues.push(sumTotal.toFixed(2));
        }
        const result=allValues.reduce((prev, value)=>{
          return prev + parseFloat(value);
        },0)
        const allValuesTotal=result + formPageValues.votre_conso_actuel
        formPageValues.votre_conso_sur_x_annee=allValuesTotal.toFixed(2);
        if(nombreAnneeAIndexer> 0){
          formPageValues.moyenne_conso_sur_x_annee=(formPageValues.votre_conso_sur_x_annee / nombreAnneeAIndexer).toFixed(2);
        }        
      }
      $('#votre_conso_sur_x_annee').text(formatNumber.asEuro(formPageValues.votre_conso_sur_x_annee).replace(",00", ""));
      $('#moyenne_conso_sur_x_annee').text(formatNumber.asEuro(formPageValues.moyenne_conso_sur_x_annee).replace(",00", ""));
    }
    $('#inputEstimFactChauff').change(function(e){
      consommationGlobal()
    })
    $('#inputEstimFactEauChaude').change(function(e){
      consommationGlobal()
    })
    $('#inputEstimFactAppareilElec').change(function(e){
      consommationGlobal()
    })
    $('#inputEstimFactEclairage').change(function(e){
      consommationGlobal()
    })
    //when clicking on the field
    $('#inputEstimFactChauff').click(function(e){
      if(parseInt($(this).val())===0){
        $(this).val('')
      }
    })
    
    
    $('#inputEstimFactEauChaude').click(function(e){
      if(parseInt($(this).val())===0){
        $(this).val('')
      }
    })
    $('#inputEstimFactAppareilElec').click(function(e){
      if(parseInt($(this).val())===0){
        $(this).val('')
      }
    })
    $('#inputEstimFactEclairage').click(function(e){
      if(parseInt($(this).val())===0){
        $(this).val('')
      }
    })

    $('select[name=type_de_chaufface_nombre_d_annee_a_indexer]').change(function(e){
        //label en x annee
        $("#votre_conso_sur_x_annee_value").text($(this).val());
        $("#moyenne_conso_sur_x_annee_value").text($(this).val());
        consommationGlobal();
    })

    // updatThumbEvolValue();

    // $('#inputEvol25Annee').change(function(e){
    //   e.preventDefault();
    //   formPageValues.evol_sur_25_annee=$(this).val();
    //   formPageValues.votre_conso_actuel= parseFloat($('#inputEstimFactChauff').val()||0);
    //   consommationGlobal();
    //   // updatThumbEvolValue();
    //   return
    // });

    // $('#inputEvol25Annee').mouseup(function(){
    //     $($('#inputEvol25Annee + span.thumb')).addClass('active-thumb')
    //     $($('#inputEvol25Annee + span.thumb')).css('left', (13.9 * parseInt($(this).val())))
    //   updatThumbEvolValue();
    // });
    
    // $('#inputEvol25Annee').change(function(){
    //   let circlePos=$('input[type=range]::-webkit-slider-thumb').position()
    //   circlePos = parseFloat(circlePos)-16,999999714
    //   console.log('circlePos', circlePos)
    // })
    // $('#inputEvol25Annee').mouseleave(function(){
    //   console.log('blur')
    //   $($('#inputEvol25Annee + span.thumb')).addClass('active-thumb')
    //   // const inputWidth=$('#inputEvol25Annee').css('width').substring(0, $('#inputEvol25Annee').css('width').length-2);
    //   // const position= parseFloat(inputWidth)*(((parseFloat($(this).val()) *100)/7)/100);
    //   // console.log('position ', position)
    //   console.log($('input[type=range]::-webkit-slider-thumb'));
    //   let circlePos=$('input[type=range]::-webkit-slider-thumb').position();
    //   console.log(circlePos);
    //   circlePos = parseFloat(circlePos)-16,999999714
    //   $($('#inputEvol25Annee + span.thumb')).css('left',circlePos+'px');
    // });
    // function updatThumbEvolValue(){
    //   $('#inputEvol25Annee + span.thumb').text(formPageValues.evol_sur_25_annee)
    // }

    
    var slider = document.getElementById('range-input');
      noUiSlider.create(slider, {
      start: [4],
      connect: [true, false],
      tooltips: [true],
      step: 1,
      range: {
        'min': 0,
        'max': 7
      },
      format: {
        to: function ( value ) {
          return value + '';
        },
        from: function ( value ) {
          return value.replace(',-', '');
        }
      }
    });

    slider.noUiSlider.on('change.one', function (value) { 
      formPageValues.evol_sur_25_annee=parseFloat(value[0]);
      formPageValues.votre_conso_actuel= parseFloat($('#inputEstimFactChauff').val()||0);
      consommationGlobal();
      console.log(value)
    });

    $('#inputDernierRevenuFiscalRef').change(function(){
      calculBonus();
    })
    $('#inputBonusEcologique').change(function(){
      calculBonus();
    })
    $('#270l').click(function(){
      calculBonus()
    })
    
    $('#200l').click(function(){
      calculBonus()
    });
    
    $('#230l').click(function(){
      calculBonus()
    });
    
    $('#Autres').click(function(){
      calculBonus()
    });

    function intBonusData(){
      bonusCalcul.maprimenov.pacAirEau=0;
      bonusCalcul.maprimenov.chauffeEauthermo=0;
      bonusCalcul.coupDePouce.pacAirEau=0;
      bonusCalcul.coupDePouce.chauffeEauthermo=0;
      bonusCalcul.ecologique=0;
      bonusCalcul.totalBonus=0;
    }

    function calculBonus(){
      intBonusData();
      let anneeSelected= $('select[name=annee_contruction]').val();
      let anneeConstruction=0;
      const d1= new Date(anneeSelected)
      const d2 = new Date();
      if(anneeSelected){
        anneeConstruction= dateDiff.inYears(d1, d2);
      }

      let dernierRevenuFisc=parseFloat($('#inputDernierRevenuFiscalRef').val() || 0)
      let nbrFoyerFisciale='more';
      let nbrFoyerFiscialeIndex=0;
      let couleur='none';
      let couleurCDP='none';

      // Année de construction plus de 2 ans
      if(anneeConstruction > 1){
        if(bonusCalcul.dansIleDeFrance){
          plafondRessourceEnIleFrance.foyerFiscale.map((el, index)=>{
            if(el===formPageValues.nombre_d_habitants){
              nbrFoyerFisciale=el;
              nbrFoyerFiscialeIndex=index;
            }
          });
          
          if(dernierRevenuFisc>0){    
            // Couleur ma prime renov en ile de france      
            if(dernierRevenuFisc <= plafondRessourceEnIleFrance.bleu[nbrFoyerFiscialeIndex]){
              couleur='bleu';
            }else if(dernierRevenuFisc <=plafondRessourceEnIleFrance.jaune[nbrFoyerFiscialeIndex]){
              couleur='jaune';
            }else if(dernierRevenuFisc <=plafondRessourceEnIleFrance.violet[nbrFoyerFiscialeIndex]){
              couleur='violet';
            }else{
              couleur= 'none';
            }
  
            // Couleur coup de pouce en ile de france
            if(dernierRevenuFisc <= coupDePouceEnIleFrance.bleu[nbrFoyerFiscialeIndex]){
              couleurCDP='bleu';
            }else if(dernierRevenuFisc <=coupDePouceEnIleFrance.jaune[nbrFoyerFiscialeIndex]){
              couleurCDP='jaune';
            }else {
              couleurCDP='violet';
            }
            // else if(dernierRevenuFisc <=coupDePouceEnIleFrance.violet[nbrFoyerFiscialeIndex]){
            //   couleurCDP='violet';
            // }
            // else{
            //   couleurCDP= 'none';
            // }
            
          }
          
        }else{
          plafondRessourceHorsIleFrance.foyerFiscale.map((el, index)=>{
            if(el===formPageValues.nombre_d_habitants){
                nbrFoyerFisciale=el;
                nbrFoyerFiscialeIndex=index;
              }
          })

          if(dernierRevenuFisc>0){
             // Couleur ma prime renov en ile de france      
            if(dernierRevenuFisc <= plafondRessourceHorsIleFrance.bleu[nbrFoyerFiscialeIndex]){
              couleur='bleu';
            }else if(dernierRevenuFisc <=plafondRessourceHorsIleFrance.jaune[nbrFoyerFiscialeIndex]){
              couleur='jaune';
            }else if(dernierRevenuFisc <=plafondRessourceHorsIleFrance.violet[nbrFoyerFiscialeIndex]){
              couleur='violet';
            }else{
              couleur= 'none';
            }

            // Couleur coup de pouce hors ile de france
            if(dernierRevenuFisc <= coupDePouceHorsIleFrance.bleu[nbrFoyerFiscialeIndex]){
              couleurCDP='bleu';
            }else if(dernierRevenuFisc <=coupDePouceHorsIleFrance.jaune[nbrFoyerFiscialeIndex]){
              couleurCDP='jaune';
            }else{
              couleurCDP='violet';
            }
          }            
      }
        
    }else{
      if(bonusCalcul.dansIleDeFrance){
        plafondRessourceEnIleFrance.foyerFiscale.map((el, index)=>{
          if(el===formPageValues.nombre_d_habitants){
            nbrFoyerFisciale=el;
            nbrFoyerFiscialeIndex=index;
          }
        });
        
        if(dernierRevenuFisc>0){      
          // Couleur coup de pouce en ile de france
          if(dernierRevenuFisc <= coupDePouceEnIleFrance.bleu[nbrFoyerFiscialeIndex]){
            couleurCDP='bleu';
          }else if(dernierRevenuFisc <=coupDePouceEnIleFrance.jaune[nbrFoyerFiscialeIndex]){
            couleurCDP='jaune';
          }else {
            couleurCDP='violet';
          }          
        }
      }else{
        plafondRessourceHorsIleFrance.foyerFiscale.map((el, index)=>{
          if(el===formPageValues.nombre_d_habitants){
            nbrFoyerFisciale=el;
            nbrFoyerFiscialeIndex=index;
          }
        })
        
        if(dernierRevenuFisc>0){     
            // Couleur coup de pouce hors ile de france
            if(dernierRevenuFisc <= coupDePouceHorsIleFrance.bleu[nbrFoyerFiscialeIndex]){
              couleurCDP='bleu';
            }else if(dernierRevenuFisc <=coupDePouceHorsIleFrance.jaune[nbrFoyerFiscialeIndex]){
              couleurCDP='jaune';
            }else{
              couleurCDP='violet';
            }
        }
      }
    }
        
      if($('#source_energie_3_chauffage').is(':checked')){
        if(anneeConstruction > 15){
          getMaPrimeRenovBonus(couleur, bonusCalcul)
        }
      }else{
        getMaPrimeRenovBonus(couleur, bonusCalcul)
      }

      getCoupDePouceBonus(couleurCDP, bonusCalcul)
      
      bonusCalcul.ecologique=parseFloat($('#inputBonusEcologique').val());
      let maPrimeRenovSum=0
      let coupDePouceSm=0;
      
      if($('#270l').is(':checked') || $('#200l').is(':checked') || $('#230l').is(':checked') || $('#Autres').is(':checked')){
        bonusCalcul.totalBonus +=bonusCalcul.maprimenov.chauffeEauthermo;
        maPrimeRenovSum +=bonusCalcul.maprimenov.chauffeEauthermo;

        coupDePouceSm +=bonusCalcul.coupDePouce.chauffeEauthermo
      }
      

      /* !$('#source_energie_2_chauffage').is(':checked') */
      if(formPageValues.pompe_a_chaleur_air_eau_value!=0){
        bonusCalcul.totalBonus=bonusCalcul.maprimenov.pacAirEau;
        maPrimeRenovSum +=bonusCalcul.maprimenov.pacAirEau;
        coupDePouceSm +=bonusCalcul.coupDePouce.pacAirEau;
      }
      // bonusCalcul.totalBonus=(bonusCalcul.maprimenov.pacAirEau + bonusCalcul.maprimenov.chauffeEauthermo) + bonusCalcul.coupDePouce + bonusCalcul.ecologique
      if($('#type_de_chaufface_chaudiere_gaz_natur_condensa').is(':checked')){
        bonusCalcul.coupDePouce.pacAirEau=0
        bonusCalcul.coupDePouce.chauffeEauthermo=0
      }
      
      bonusCalcul.totalBonus= coupDePouceSm + bonusCalcul.ecologique + maPrimeRenovSum
      formPageValues.maPrimeRenovSum= maPrimeRenovSum;

      handlePhotoCaptureButtons();
      $('#maPrimeRenov').text(formatNumber.asEuro(maPrimeRenovSum).replace(",00", ""));
      $('#coupDePouce').text(formatNumber.asEuro(coupDePouceSm).replace(",00", ""));     
      $('#bonusEcologique').text(formatNumber.asEuro(bonusCalcul.ecologique).replace(",00", ""));
      $('#total_bonus').text(formatNumber.asEuro(bonusCalcul.totalBonus).replace(",00", ""))
      $('#bonusEcologique').text(formatNumber.asEuro(bonusCalcul.ecologique).replace(",00", ""));
    }

    function getMaPrimeRenovBonus(couleur, bonusCalcul){      
        //bonus pac air-eau
        switch (couleur) {
          case 'bleu':
            bonusCalcul.maprimenov.pacAirEau=subventionsPacAiEau.bleu
            break;
          case 'jaune':
            bonusCalcul.maprimenov.pacAirEau=subventionsPacAiEau.jaune
            break;
          case 'violet':
            bonusCalcul.maprimenov.pacAirEau=subventionsPacAiEau.violet
            break;
          case 'none':
            bonusCalcul.maprimenov.pacAirEau=0
            break;
        }
        
        //bonus chauffe-eau
        switch (couleur) {
          case 'bleu':
            bonusCalcul.maprimenov.chauffeEauthermo=subventionsChauffeEau.bleu
            break;
          case 'jaune':
            bonusCalcul.maprimenov.chauffeEauthermo=subventionsChauffeEau.jaune
            break;
          case 'violet':
            bonusCalcul.maprimenov.chauffeEauthermo=subventionsChauffeEau.violet
            break;
          case 'none':
            bonusCalcul.maprimenov.chauffeEauthermo=0
            break;
        }
    }

    function getCoupDePouceBonus(couleurCDP, bonusCalcul){
        //bonus coup de pouce// //bonus chauffage
        switch (couleurCDP) {
          case 'bleu':
            bonusCalcul.coupDePouce.pacAirEau =coupDePoucePompeBonus.bleu
            bonusCalcul.coupDePouce.chauffeEauthermo =coupDePouceChauffageBonus.bleu
            break;
          case 'jaune':
            bonusCalcul.coupDePouce.pacAirEau =coupDePoucePompeBonus.jaune
            bonusCalcul.coupDePouce.chauffeEauthermo =coupDePouceChauffageBonus.jaune
            break;
          case 'violet':
            bonusCalcul.coupDePouce.pacAirEau =coupDePoucePompeBonus.violet
            bonusCalcul.coupDePouce.chauffeEauthermo =coupDePouceChauffageBonus.violet
            break;
          case 'none':
            bonusCalcul.coupDePouce.pacAirEau=0
            bonusCalcul.coupDePouce.chauffeEauthermo=0
            break;
        }
        
    }
    
    $('#piecesId').on('change', '.pompeAChaleurAirAirInput', function(e){
      $(this).next().text(getMatchedWhattNumber(parseInt($(this).val()))+ 'W')
    })
    $('#piecesId').on('mouseup', '.pompeAChaleurAirAirInput', function(e){
      if(parseInt($(this).val())===0){
        $(this).val('')
      }
    });
    
    $('#inputSurfaceSol').on('click', function(e){
      if(parseInt($(this).val())===0){
        $(this).val('')
      }
    })
    $('#inputBonusEcologique').on('click', function(e){
      if(parseInt($(this).val())===0){
        $(this).val('')
      }
    })

    function handlePhotoCaptureButtons(){
      if($('#source_energie_3_chauffage').is(':checked') || $('#source_energie_1_chauffage').is(':checked')){
        $('#chaudiere_actuel').removeClass('disabled_photo_btn')
        $('#chaudiere_actuel').prop('disabled', false)
        
        $('#chaudiere_actuel_select').removeClass('disabled_photo_btn')
        $('#chaudiere_actuel_select').prop('disabled', false)        
      }else{
        $('#chaudiere_actuel').addClass('disabled_photo_btn')
        $('#chaudiere_actuel').prop('disabled', true)

        $('#chaudiere_actuel_select').addClass('disabled_photo_btn')
        $('#chaudiere_actuel_select').prop('disabled', true)
        
        
        $('#ballon_actuel').addClass('disabled_photo_btn')
        $('#ballon_actuel').prop('disabled', true)

        $('#ballon_actuel_select').addClass('disabled_photo_btn')
        $('#ballon_actuel_select').prop('disabled', true)
        
      }

      if(formPageValues.pompe_a_chaleur_air_eau_value!=0){
        $('#emplacement_pompe_a_chaleur').removeClass('disabled_photo_btn')
        $('#emplacement_pompe_a_chaleur').prop('disabled', false)
        
        $('#emplacement_pompe_a_chaleur_select').removeClass('disabled_photo_btn')
        $('#emplacement_pompe_a_chaleur_select').prop('disabled', false)
      }else{
        $('#emplacement_pompe_a_chaleur').addClass('disabled_photo_btn')
        $('#emplacement_pompe_a_chaleur').prop('disabled', true)
        
        $('#emplacement_pompe_a_chaleur_select').addClass('disabled_photo_btn')
        $('#emplacement_pompe_a_chaleur_select').prop('disabled', true)
      }
      
      if($('#270l').is(':checked') || $('#200l').is(':checked') || $('#230l').is(':checked') || $('#Autres').is(':checked')){
        $('#ballon_actuel').removeClass('disabled_photo_btn')
        $('#ballon_actuel').prop('disabled', false)
        
        $('#ballon_actuel_select').removeClass('disabled_photo_btn')
        $('#ballon_actuel_select').prop('disabled', false)
      }else{

      }
    }
    
    $('#upload_photo').change(function(e){
      // var context = canvas.getContext("2d");
      const tmpURLImage= URL.createObjectURL(e.target.files[0])

        console.log(`${formPageValues.snapshot.fieldName}`);
        $(`#${formPageValues.snapshot.fieldName}_img`).css('height', 350);
        $(`#${formPageValues.snapshot.fieldName}_img img`).attr('src', tmpURLImage);
        
    })

    function getMatchedWhattNumber(nbr){
      if(nbr===0){
        return 0
      }
      if(nbr>0 && nbr<=10){
        return 1000
      }
      if(nbr>10 && nbr<=15){
        return 2000
      }
      if(nbr>15 && nbr<=20){
        return 2500
      }
      if(nbr>20 && nbr<=30){
        return 3600
      }
      return 5000
    }

    //gisolation
    $('select[name=gisolation]').change(function(){
      formPageValues.gisolation=parseFloat($(this).val());
      calculatePompeAChaleurAirEau()

    })
    //surface au sol
    $('#inputSurfaceSol').change(function(){
      formPageValues.surface_au_sol=parseFloat($(this).val())
      calculatePompeAChaleurAirEau();

    })

    //hauteur sous plafond_moyenne
    $('select[name=hauteur_sous_plafond_moyenne').change(function(){
      formPageValues.hauteur_sous_plafond_m=parseFloat($(this).val());
      calculatePompeAChaleurAirEau();


    })
    
    $('#inputAddress').keyup(function(e){
      e.preventDefault();
      calculatePompeAChaleurAirEau();
      calculBonus();
    })

    //MODAL CONDITIONAL
    $("label[for='source_energie_1_chauffage']").click(function(){
      $('#source_energie_type_gpl').css('display', 'none')
      $('#source_energie_type_fioul').css('display', 'block')
      $('#source_energie_type_bois').css('display', 'none')
      $('#source_energie_type_gaz_naturel').css('display', 'none')
      $('#source_energie_type_elec').css('display', 'none')
      $('#source_energie_1_chauffage_pric_Elect').css('display', 'none')
    })
    
    $("label[for='source_energie_2_chauffage']").click(function(){
      $('#source_energie_type_elec').css('display', 'block')
      $('#source_energie_type_gpl').css('display', 'none')
      $('#source_energie_type_fioul').css('display', 'none')
      $('#source_energie_type_bois').css('display', 'none')
      $('#source_energie_type_gaz_naturel').css('display', 'none')
      $('#source_energie_1_chauffage_pric_Elect').css('display', 'block')
    })
    
    $("label[for='source_energie_3_chauffage']").click(function(){
      $('#source_energie_type_elec').css('display', 'none')
      $('#source_energie_type_gaz_naturel').css('display', 'block')
      $('#source_energie_type_fioul').css('display', 'none')
      $('#source_energie_type_bois').css('display', 'none')
      $('#source_energie_type_gpl').css('display', 'none')
      $('#source_energie_1_chauffage_pric_Elect').css('display', 'none')
    })
    
    $("label[for='source_energie_4_chauffage']").click(function(){
      $('#source_energie_type_elec').css('display', 'none')
      $('#source_energie_type_gaz_naturel').css('display', 'none')
      $('#source_energie_type_fioul').css('display', 'none')
      $('#source_energie_type_bois').css('display', 'block')
      $('#source_energie_type_gpl').css('display', 'none')
      $('#source_energie_1_chauffage_pric_Elect').css('display', 'none')
    })
    
    $("label[for='source_energie_5_chauffage']").click(function(){
      $('#source_energie_type_elec').css('display', 'none')
      $('#source_energie_type_gaz_naturel').css('display', 'none')
      $('#source_energie_type_fioul').css('display', 'none')
      $('#source_energie_type_bois').css('display', 'none')
      $('#source_energie_type_gpl').css('display', 'none')
      $('#source_energie_1_chauffage_pric_Elect').css('display', 'none')
    })
    
    $("label[for='source_energie_eau_chaude_fioul_1']").click(function(){
      $('#source_energie_eau_chaude_Elect').css('display', 'none')
    })
    

    $("label[for='source_energie_eau_chaude_elec_2']").click(function(){
      $('#source_energie_eau_chaude_Elect').css('display', 'block')
    })

    $("label[for='source_energie_eau_chaude_gaz_3']").click(function(){
      $('#source_energie_eau_chaude_Elect').css('display', 'none')
    })
    
    $("label[for='source_energie_eau_chaude_bois_4']").click(function(){
      $('#source_energie_eau_chaude_Elect').css('display', 'none')
    })
    
    $("label[for='source_energie_eau_chaude_pompe_a_chauleur_5']").click(function(){
      $('#source_energie_eau_chaude_Elect').css('display', 'none')
    })
    
    $("label[for='source_energie_eau_chaude_chauffr_charbon_6']").click(function(){
      $('#source_energie_eau_chaude_Elect').css('display', 'none')
    })

    $('#modal1Button').click(function(){
      if($('#inputEstimFactChauff').val()!=='' && parseInt($('#inputEstimFactChauff').val())!==0){
          $('#consump-info1').attr('style', 'opacity:1; display: block;')
          // $('#consump-info1').css('opacity:','1')
          // $('#consump-info1').css('display', 'block')
          $('#consumpt-val1').text($('#inputEstimFactChauff').val()+'€')
      }
    })

    
    $('#modal2Button').click(function(){
      if($('#inputEstimFactEauChaude').val()!=='' && parseInt($('#inputEstimFactEauChaude').val())!==0){
        $('#consump-info2').attr('style', 'opacity:1; display: block;');
        $('#consumpt-val2').text($('#inputEstimFactEauChaude').val()+'€');
        $('#eauChaudeSanitaireLeftPart').css('width', '130px');
      }
    })
    
    $('#modal3Button').click(function(){
      if($('#inputEstimFactAppareilElec').val()!=='' && parseInt($('#inputEstimFactAppareilElec').val())!==0){
        $('#consump-info3').attr('style', 'opacity:1; display: block;')
        $('#consumpt-val3').text($('#inputEstimFactAppareilElec').val()+'€')
        $('#appareilElecLeftPart').css('width', '80px');
      }
    })

    $('#modal4Button').click(function(){
      if($('#inputEstimFactEclairage').val()!=='' && parseInt($('#inputEstimFactEclairage').val())!==0){
        $('#consump-info4').attr('style', 'opacity:1; display: block;')
        $('#consumpt-val4').text($('#inputEstimFactEclairage').val()+'€')
        
      }
    })

    //GENERATING PDF CLICK EVENT
    // $('.generate_pdf_btn').click(function(){
    //   let productValuesCleaned=formPageValues.produits_ajoutees.filter(el=>el!= undefined)
      
    //   alert('Generating PDF')
      

    // })
    
    //-----------------------------------------------------------------------------------------
    //Validation form
    const prenom=$('#inputPrenom');
    const nom=$('#inputNom');
    const email=$('#inputMail');
    const telephone=$('#inputTelephone');
    function inputValidation(){
      formIsCompleted()
    }
    prenom.keyup(inputValidation)
    nom.keyup(inputValidation)
    email.keyup(inputValidation)
    telephone.keyup(inputValidation)

    function formIsCompleted(){
      if(prenom.val()!='' && nom.val() !='' && email.val()!='' && telephone.val()!=''){
        $('#nextFinalForm').removeAttr('disabled');
      }else{
          $('#nextFinalForm').attr('disabled', true);
      }
    }

    $('#nextFinalForm').click(function(e){
      e.preventDefault();
      $('#spinLoader').css('display', 'inline-flex');
    });
    //On focusout
    prenom.focusout(function(e){
      if(prenom.val()===''){
        prenom.addClass('invalide');
        $(prenom.next()).addClass('show');
      }else{
        prenom.removeClass('invalide')
        $(prenom.next()).removeClass('show');
      }
    });
    
    nom.focusout(function(e){
      if(nom.val()===''){
        nom.addClass('invalide')
        $(nom.next()).addClass('show');
      }else{
        nom.removeClass('invalide')
        $(nom.next()).removeClass('show');
      }
    })

    email.focusout(function(e){
      if(email.val()===''){
        email.addClass('invalide')
        $(email.next()).addClass('show');
      }else{
        email.removeClass('invalide')
        $(email.next()).removeClass('show');
      }
    })

    telephone.focusout(function(e){
      if(telephone.val()===''){
        telephone.addClass('invalide')
        $(telephone.next()).add('show');
      }else{
        telephone.removeClass('invalide')
        $(telephone.next()).removeClass('show');
      }
    })

    //On keyup
    prenom.keyup(function(e){
      if(prenom.val()===''){
        prenom.addClass('invalide');
        $(prenom.next()).addClass('show');
      }else{
        prenom.removeClass('invalide')
        $(prenom.next()).removeClass('show');
      }
    });
    
    nom.keyup(function(e){
      if(nom.val()===''){
        nom.addClass('invalide')
        $(nom.next()).addClass('show');
        
      }else{
        nom.removeClass('invalide')
        $(nom.next()).removeClass('show');
      }
    })

    email.keyup(function(e){
      if(email.val()===''){
        email.addClass('invalide')
        $(email.next()).addClass('show');
      }else{
        email.removeClass('invalide')
        $(email.next()).removeClass('show');
      }
    })
    
    telephone.focusout(function(e){
      if(telephone.val()===''){
        telephone.addClass('invalide')
        $(telephone.next()).addClass('show');
      }else{
        telephone.removeClass('invalide')
        $(telephone.next()).removeClass('show');
      }
    })



    /* SUBMIT FORM */
    $("#regiration_form").submit(function (e) { 
      e.preventDefault();
      var $form = $(this);

      // Let's select and cache all the fields
      var $inputs = $form.find("input, select, button, textarea");
      
      // Serialize the data in the form
      var serializedData = $form.serialize();
      //les valeurs que j'ai pas pu les récupérer du form
      serializedData += '&nombre_d_habitants=' + $("[name='nombre_d_habitants']").text().trim().trim();
      serializedData += '&temperature_de_confort=' + $("[name='temperature_de_confort']").text().trim();
      serializedData += '&type_d_occupation=' + $(".step-2__link.answer-selected :input[name='type_d_occupation']").val();
      serializedData += '&forme_maison=' + $(".step-4__link.answer-selected :input[name='forme_maison']").val();
      serializedData += '&nombre_de_niveau=' + $(".step-5__link.answer-selected :input[name='nombre_de_niveau']").val();
      serializedData += '&type_de_sous_sol=' + $(".step-6__link.answer-selected :input[name='type_de_sous_sol']").val();
      serializedData += '&type_de_mur=' + $(".step-6__link.answer-selected :input[name='type_de_mur']").val();
      serializedData += '&type_de_comble=' + $(".step-7__link.answer-selected :input[name='type_de_comble']").val();
      serializedData += '&type_de_ventilation=' + $(".step-9__link.answer-selected :input[name='type_de_ventilation']").val();
      serializedData += '&type_de_vitrage=' + $(".step-8__link.answer-selected input[name='type_de_vitrage']").val();
      serializedData += '&source_chauffage=' + $(".step-11__link.answer-selected :input[name='source_energie']").val();
      serializedData += '&typeChauffage=' + $(".step-11__link.answer-selected :input[name='type_de_chaufface']").val();
      serializedData += '&AnneeInst=' + $("select[name='annee_contruction_chauffage']").val();
      serializedData += '&annee_contruction=' + $("select[ name='annee_contruction']").val();
      serializedData += '&sourceEau=' + $(".step-12__link.answer-selected :input[name='source_energie_eau_chaude']").val();
      serializedData += '&capStock=' + $(".step-12__link.answer-selected :input[name='capacite_de_stockage_eau_chaude']").val();
      serializedData += '&utilisation=' + $(".step-12__link.answer-selected :input[name='utilisation_eau_chaude']").val();
      serializedData += '&appElec=' + $(".step-13__link.answer-selected :input[name='utilisation_appareil_equip_electrique']").val();
      serializedData += '&typeAmpoule=' + $(".step-14__link.answer-selected :input[name='type_d_ampoule_eclairage']").val();
      serializedData += '&electUtil=' + $(".step-14__link.answer-selected :input[name='utilisation_moyenne_eclairage']").val();
      serializedData += '&nbAnnee=' + $("select[name='type_de_chaufface_nombre_d_annee_a_indexer']").val();
      serializedData += '&consoActGlob=' + formPageValues.votre_conso_actuel + ' €';
      serializedData += '&consoXAn=' + formPageValues.votre_conso_sur_x_annee + ' €';
      serializedData += '&moyenneConsoXan=' + formPageValues.moyenne_conso_sur_x_annee + ' €'
      serializedData += '&statutMarital=' + $(".step-18__link.answer-selected :input[name='eligibilite_situation_matrimoniale']").val()
      serializedData += '&nbEnfCharge=' + $("[name='eligibility_nbr_enfant_a_charge']").text().trim();
      serializedData += '&revenus=' + $("#inputDernierRevenuFiscalRef").val();
      serializedData += '&primeRenov=' + formPageValues.maPrimeRenovSum+ ' €';
      serializedData += '&coupDePouce=' + (bonusCalcul.coupDePouce.pacAirEau +  bonusCalcul.coupDePouce.chauffeEauthermo) + ' €';
      serializedData += '&bonusEco=' + bonusCalcul.ecologique+ ' €';
      serializedData += '&aidesCumul=' + bonusCalcul.totalBonus+ ' €';
      serializedData += '&chauffagePrix=' + $("#consumpt-val1").text().trim();
      serializedData += '&eauPrix=' + $("#consumpt-val2").text().trim();
      serializedData += '&appPrix=' + $("#consumpt-val3").text().trim();
      serializedData += '&elecPrix=' + $("#consumpt-val4").text().trim();
      serializedData += '&NbAnnee3=' + $("select[name='type_de_chaufface_nombre_d_annee_a_indexer']").val();
      //solution eau
      serializedData += '&solutionEau='
      var $eau = $(".chk-moyenne-conso:checked");
      if ($eau.length > 0) { serializedData += $eau.val() } else { serializedData += "Non défini"; }

      //donnes du pompe à chaleur air eau
      serializedData += '&pompeKWA=';
      $valKwa = $("#pompe_a_chaleur_air_eau_value").text().trim();
      if ($valKwa != "0.00KW") { serializedData += $valKwa; } else { serializedData += "Non défini"; }
      //donnes pompe à chaleur air air
      serializedData += '&nbUnit=' + $("[name='pompe_a_chaleur_air_air_nombre_unite']").text();
      var pieces = []
      $(".pieces__item").each(function () {
          var str = ""
          str += $(this).children(".pompeAChaleurAirAir").text().replace("N°", "").trim() + " : "
              + $(this).children(".bottom_part").children(".pompeAChaleurAirAirInput").val() + " M² : "
              + $(this).children(".bottom_part").children(".pieces__value").text()
          pieces.push(str);
      });
      var champ1 = "", champ2 = ""
      for (var i = 0; i < pieces.length; i++) {
          if (i < 5) {
              champ1 += pieces[i] + "\n";
          }
          else if (i < 10) {
              champ2 += pieces[i] + "\n";
          }
      }
      serializedData += '&champ1=' + champ1;
      serializedData += '&champ2=' + champ2;

      //les produits selectionnées
      var items = $(".pompes__btn.unset").parents(".pompes__item");
      var columns = ["TYPE", "MODÈLE", "CARACTÉRISTIQUES", "FICHE TECHNIQUE"]
      let productValuesCleaned=formPageValues.produits_ajoutees.filter(el=>{
        console.log(el)
        return el!= undefined
      })
      var rows = [];
      console.log(productValuesCleaned);
      productValuesCleaned.forEach(el=>{
        var type = el.categorie
        var model = el.title
        var cara = el.avantage.join(', ')
        var lien = el.fiche_technique_url
        rows.push([type, model, cara, lien]);
      })
      console.log(rows)
      
      // items.each(function () {
      //     var type = $(this).children(".pompes__center").children(".pompes__category").text().trim()
      //     var model = $(this).children(".pompes__center").children(".pompes__title").text().trim()
      //     var cara = ""
      //     var nbelem = $(this).children(".pompes__center").children(".pompes__advantages").children().length
      //     var i = 1;
      //     $(this).children(".pompes__center").children(".pompes__advantages").children().each(function () {
      //         cara += $(this).text().trim()
      //         if (i != nbelem) { cara += "\n" }
      //         i = i + 1;
      //     });
      //     rows.push([type, model, cara, "vide"]);
      // });

      //cerifier si on a choisi des produits
      // si on a pas choisi on affiche pas la page dans le pdf
      var addProducts = rows.length;

      //pour avoir acces à info dans les documents
      serializedData += '&addProducts=' + addProducts;

      var addSolutions = 0;
      if (pieces.length > 0 || $valKwa != "0.00KW" || $(".chk-moyenne-conso:checked").length > 0) {
          addSolutions = 1;
      }
      serializedData += '&addSolutions=' + addSolutions;
      //ajout de la page des produits selectionnés
      if (addProducts) {
          var doc = new jsPDF();

          //fct de genration du pdf
          var generatePDFWithHeader = function (url, callback) {
              var img = new Image();

              img.onError = function () {
                  alert('Cannot load image: "' + url + '"');
              };
              img.onload = function () {
                  callback(img);
              };
              img.src = url;
          }

          //ajout de header
          var addImage = function (imgData) {
              doc.addImage(imgData, 'JPG', 15, 10, 180, 40, 'headerPDF');

              //generation de la table
              doc.autoTable({
                  head: [columns],
                  body: rows,
                  startY: 50,
                  styles: {
                      theme: 'striped',
                      tableWidth: 'auto',
                      bodyStyles: { valign: 'top' },
                      styles: { overflow: 'linebreak', cellWidth: 'wrap' },
                      // columnStyles: { text: { cellWidth: 'auto' } },
                      margin: {
                          top: 10,
                          bottom: 10,
                          left: 10,
                          right: 10
                      }
                  },
                  headStyles: {
                      fillColor: "#5bb6aa",
                      minCellWidth: 45,
                  },
              });

              // doc.save('/completed/produits_selected.pdf')
              var blob = doc.output('blob');
              
              var formData = new FormData();
              formData.append('pdf', blob);
              //ajout de fichier de produits
              $.ajax('./upload.php',
                  {
                      method: 'POST',
                      data: formData,
                      processData: false,
                      contentType: false,
                      success: function (data) { console.log(data) },
                      error: function (data) { console.log(data) }
                  });
          }
          //appel à la fonction
          generatePDFWithHeader('headerPDF.jpg', addImage);
      }

      //remplissage du formulaire
      $inputs.prop("disabled", true);
      request = $.ajax({
          url: "generate.php",
          type: "post",
          data: serializedData
      });

      // Callback handler that will be called on success
      request.done(function (response, textStatus, jqXHR) {
          // Log a message to the console
          console.log("Document done", response);
          var win = window.open('./completed/recapitulatif.pdf', '_blank');
          if (win) {
              //Browser has allowed it to be opened
              win.focus();
          } else {
              //Browser has blocked it
              alert('Please allow popups for this website');
          }
      });

      // Callback handler that will be called on failure
      request.fail(function (jqXHR, textStatus, errorThrown) {
          // Log the error to the console
          console.error(
              "The following error occurred: " +
              textStatus, errorThrown
          );
      });

      // Callback handler that will be called regardless
      // if the request failed or succeeded
      request.always(function () {
          // Reenable the inputs
          $inputs.prop("disabled", false);
      });
      
    });
})