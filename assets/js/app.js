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

var inputsCountersValues={
    nombre_d_habitants: 0,
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
    votre_conso_actuel: 0,
    votre_conso_sur_x_annee: 0,
    moyenne_conso_sur_x_annee: 0,
    hauteur_sous_plafond: 0,
    hauteur_sous_plafond_moyenne: 1, 
    hauteur_sous_plafond_m:0, //pompoe a chaleur air eau
    temperature_de_confort: 17,
    gisolation:0,
    surface_au_sol: 0,
    departement_address:0,
    altitude: 0,
    delta: 0,
    pompe_a_chaleur_air_eau_value: 0

}

jQuery(function($){
    $(document).ready(function(){
      //initialize all modals           
      $('.modal').modal({
        // dismissible:false
        preventScrolling: false
    });

      //or by click on trigger
      $('#chauffageModalButton').click(function(e){
        $('#modal1').modal('open');

      })
      
      $('#eauSanitaireModalButton').click(function(e){
          $('#modal2').modal('open');
      })
      
      $('#appareilElecModalButton').click(function(e){
        $('#modal3').modal('open');
      })
      
      $('#eclairageModalButton').click(function(e){
        $('#modal4').modal('open');
      })

      $('#pompeChaleurButton').click(function(e){
        $('#modal5').modal('open');
      })
      // $('.modal-trigger').modal();

      // var elems = document.querySelectorAll('select');
      // var instances = M.FormSelect.init(elems);
      $('select').formSelect();

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
        e.preventDefault();
      });
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
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='temperature_de_confort' && inputsCountersValues.temperature_de_confort >=25)return;
        //hauteur_sous_plafond_moyenne
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='hauteur_sous_plafond_moyenne'){
          const result=inputsCountersValues.hauteur_sous_plafond_moyenne +0.2;
          inputsCountersValues.hauteur_sous_plafond_moyenne = Math.round(result*100)/100
          $($($(this).parent().children('.counter__value'))[0]).text(inputsCountersValues.hauteur_sous_plafond_moyenne);  
          return
        }
        
        //temperature de confort
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='temperature_de_confort'){
        // console.log($('select[name=hauteur_sous_plafond_moyenne]').val())
        // console.log($('select[name=gisolation]').val())
        // console.log($('#inputSurfaceSol').val)
        // console.log( inputsCountersValues.temperature_de_confort);

          const result=inputsCountersValues.temperature_de_confort +0.5;
          inputsCountersValues.temperature_de_confort = Math.round(result*100)/100
          $($($(this).parent().children('.counter__value'))[0]).text(inputsCountersValues.temperature_de_confort);  
          calculatePompeAChaleurAirEau();
          return
        }

        //Nombre d'unite pac air air
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='pompe_a_chaleur_air_air_nombre_unite'){
          inputsCountersValues.pompe_a_chaleur_air_air_nombre_unite++;
          $($($(this).parent().children('.counter__value'))[0]).text(inputsCountersValues.pompe_a_chaleur_air_air_nombre_unite);  
          const inputItem=`<div class="pieces__item" id="pieces__item${inputsCountersValues.pompe_a_chaleur_air_air_nombre_unite}">
          <label for="inputPompeAChaleurSurfaceTotal${inputsCountersValues.pompe_a_chaleur_air_air_nombre_unite}" class="pompeAChaleurAirAir${inputsCountersValues.pompe_a_chaleur_air_air_nombre_unite}">Piece N° <span>${inputsCountersValues.pompe_a_chaleur_air_air_nombre_unite}</span></label>
          <input id="inputPompeAChaleurSurfaceTotal${inputsCountersValues.pompe_a_chaleur_air_air_nombre_unite}" name="pompe_a_chaleur_air_air_surface_total" type="number" name="eau_chaude_sanitaire_envisage_source_energie_ballon_eau_chau${inputsCountersValues.pompe_a_chaleur_air_air_nombre_unite}" class="pompeAChaleurAirAirInput" min="0"> 
          Surface en (m2)
          </div>`;
          $('#piecesId').append(inputItem)
          return
        }

        inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]=parseInt(inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')])+1
        inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]=inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')];


        //Champ calcule
        $($($(this).parent().children('.counter__value'))[0]).text(inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]);
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond'){
          $('#inputVolumeHabitation').val(parseInt($('#inputSurfaceSol').val()) * inputsCountersValues.eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond);
        }

        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='consommation_annuelle_fioul' || $($($(this).parent().children('.counter__value'))[0]).attr('name')==='consommation_annuelle_gaz'){
          $('#inputTotalConso20ans').val(((inputsCountersValues.consommation_annuelle_fioul+inputsCountersValues.consommation_annuelle_gaz)* parseInt($('#inputConsoAnIndex').val())));
          $('#inputMoyennConso').val((((inputsCountersValues.consommation_annuelle_fioul+inputsCountersValues.consommation_annuelle_gaz)* parseInt($('#inputConsoAnIndex').val()))/parseInt($('#inputConsoAnIndex').val())));
        }
      });

      $('.counter__decrement').click(function(e){
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='temperature_de_confort' && inputsCountersValues.temperature_de_confort <= 17)return;
          
        if(parseInt(inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')])===0) return;
        
        //hauteur_sous_plafond_moyenne
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='hauteur_sous_plafond_moyenne' && inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]===1) return 
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='hauteur_sous_plafond_moyenne'){
          const result=inputsCountersValues.hauteur_sous_plafond_moyenne -0.2;
          inputsCountersValues.hauteur_sous_plafond_moyenne = Math.round(result*100)/100
          $($($(this).parent().children('.counter__value'))[0]).text(inputsCountersValues.hauteur_sous_plafond_moyenne);  
          return
        }
        
        //temperature de confort
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='temperature_de_confort' && inputsCountersValues.temperature_de_confort > 17){
          const result=inputsCountersValues.temperature_de_confort -0.5;
          inputsCountersValues.temperature_de_confort = Math.round(result*100)/100
          $($($(this).parent().children('.counter__value'))[0]).text(inputsCountersValues.temperature_de_confort);  
          calculatePompeAChaleurAirEau();
          return
        }

        //Nombre d'unite pac air air
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='pompe_a_chaleur_air_air_nombre_unite'){
          $('#pieces__item'+inputsCountersValues.pompe_a_chaleur_air_air_nombre_unite).remove()
          inputsCountersValues.pompe_a_chaleur_air_air_nombre_unite--;
          $($($(this).parent().children('.counter__value'))[0]).text(inputsCountersValues.pompe_a_chaleur_air_air_nombre_unite);  
          return
        }

        inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]=parseInt(inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')])-1
        inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]=inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')];
        
        $($($(this).parent().children('.counter__value'))[0]).text(inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]);
        
        //champ calcule
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond'){
          $('#inputVolumeHabitation').val(parseInt($('#inputSurfaceSol').val()) * inputsCountersValues.eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond)
        }

        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='consommation_annuelle_fioul' || $($($(this).parent().children('.counter__value'))[0]).attr('name')==='consommation_annuelle_gaz'){
          $('#inputTotalConso20ans').val(((inputsCountersValues.consommation_annuelle_fioul+inputsCountersValues.consommation_annuelle_gaz)* parseInt($('#inputConsoAnIndex').val())));
          $('#inputMoyennConso').val((((inputsCountersValues.consommation_annuelle_fioul+inputsCountersValues.consommation_annuelle_gaz)* parseInt($('#inputConsoAnIndex').val()))/parseInt($('#inputConsoAnIndex').val())));
        }
        
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
        let timeout= current >1 && current<25 ? 200 : 0;
        setTimeout(()=>{
            $('.page .page__content #regiration_form').css("transform"," translateX(50px)" );
            $('.page .page__content #regiration_form').css("transition", "none" );

            previousStep=parseInt($(this).attr('skipStep')) ? current:  null;
            current= $(this).attr('skipStep') ? parseInt($(this).attr('skipStep')) : current;
            
            current_step =  $('.step-'+current);
            next_step=++current;
            next_step_form =  $('.step-'+next_step);
            
            if (current >=1 && current<11){ 
              $('.page .previous').css('visibility', 'visible');
            }else{
                $('.page .previous').css('visibility', 'hidden');
            }
            
            if(current>10){
              $('.main-cta').css('visibility', 'hidden');
            }else{
              $('.main-cta').css('visibility', 'visible');
            }

            
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


            
            next_step_form.fadeTo('slow', 1, function(){
              setProgressBar(next_step);
              next_step_form.show();
              stepVisited.push(next_step);
            });

        }, timeout);
          
      });

      $(".previous").click(function(){
        let timeout= current>1 && current<25 ? 200 : 0;  
        
        $('.page .page__content #regiration_form').css("transform"," translateX(50px)" );
        $('.page .page__content #regiration_form').css("transition", "none" );

        current_step = $('.step-'+stepVisited[stepVisited.length-1]);

        next_step=stepVisited[stepVisited.length-2];
        current=next_step;
        
        next_step_form = $('.step-'+next_step);
        
        if (current >1 && current<11){ 
          $('.page .previous').css('visibility', 'visible')
        }else{
          $('.page .previous').css('visibility', 'hidden');

        }
  
        if(current>10){
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

          next_step_form.fadeTo('slow', 1, function(){
            setProgressBar(next_step);
            next_step_form.show();
          });
          stepVisited.pop();
      });

      $('.navigationButton').click(function(){
        for(let i=0; i<17; i++){
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
            
            if (current >=1 && current<11){ 
              $('.page .previous').css('visibility', 'visible');
            }else{
                $('.page .previous').css('visibility', 'hidden');
            }

            if(current>10){
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
              stepVisited.push(next_step);
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
            
            if (current >=1 && current<11){ 
              $('.page .previous').css('visibility', 'visible');
            }else{
                $('.page .previous').css('visibility', 'hidden');
            }

            if(current>10){
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
              stepVisited.push(next_step);
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
            
            if (current >=1 && current<11){ 
              $('.page .previous').css('visibility', 'visible');
            }else{
                $('.page .previous').css('visibility', 'hidden');
            }
            
            if(current>10){
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
              stepVisited.push(next_step);
            });
        } if($(this).attr('aria-selected')==='part-4'){
          $('.step-'+1).css('display', 'none');
          current=10;
          $('.page .page__content #regiration_form').css("transform"," translateX(50px)" );
          $('.page .page__content #regiration_form').css("transition", "none" );

          previousStep=parseInt($(this).attr('skipStep')) ? current:  null;
          current= $(this).attr('skipStep') ? parseInt($(this).attr('skipStep')) : current;
          
          current_step =  $('.step-'+current);
          next_step=++current;
          next_step_form =  $('.step-'+next_step);
          
          if (current >=1 && current<11){ 
            $('.page .previous').css('visibility', 'visible');
          }else{
              $('.page .previous').css('visibility', 'hidden');
          }
          
          if(current>9){
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
            stepVisited.push(next_step);
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
          
          if (current >=1 && current<11){ 
            $('.page .previous').css('visibility', 'visible');
          }else{
              $('.page .previous').css('visibility', 'hidden');
          }
          
          if(current>10){
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
            stepVisited.push(next_step);
          });

        }
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
        if(!$("#part-2").hasClass('step-list-item-active')){
          $("#part-2").addClass('step-list-item-active')
        }
        $("#part-2 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');

        if(!$("#part-1 h5").hasClass('step-list-item-disabled')){
          $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-3 h5").hasClass('step-list-item-disabled')){
          $("#part-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-3").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-4 h5").hasClass('step-list-item-disabled')){
          $("#part-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-4").removeClass('step-list-item-active',1000, 'easeInBack');

        if(!$("#part-5 h5").hasClass('step-list-item-disabled')){
          $("#part-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-5").removeClass('step-list-item-active',1000, 'easeInBack');
      } else if(current<=1){
        if(!$("#part-1").hasClass('step-list-item-active')){
          $("#part-1").addClass('step-list-item-active')
        }
        $("#part-1 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');

        if(!$("#part-2 h5").hasClass('step-list-item-disabled')){
          $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-3 h5").hasClass('step-list-item-disabled')){
          $("#part-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-3").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-4 h5").hasClass('step-list-item-disabled')){
          $("#part-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-4").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-5 h5").hasClass('step-list-item-disabled')){
          $("#part-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-5").removeClass('step-list-item-active',1000, 'easeInBack');
      }else if(current==11){
        if(!$("#part-4").hasClass('step-list-item-active')){
          $("#part-4").addClass('step-list-item-active')
        }
        $("#part-4 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');

        if(!$("#part-2 h5").hasClass('step-list-item-disabled')){
          $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-3 h5").hasClass('step-list-item-disabled')){
          $("#part-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-3").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-1 h5").hasClass('step-list-item-disabled')){
          $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-5 h5").hasClass('step-list-item-disabled')){
          $("#part-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-5").removeClass('step-list-item-active',1000, 'easeInBack');
      }else if(current==16){
        if(!$("#part-5").hasClass('step-list-item-active')){
          $("#part-5").addClass('step-list-item-active')
        }
        $("#part-5 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');

        if(!$("#part-2 h5").hasClass('step-list-item-disabled')){
          $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-3 h5").hasClass('step-list-item-disabled')){
          $("#part-3 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-3").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-4 h5").hasClass('step-list-item-disabled')){
          $("#part-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-4").removeClass('step-list-item-active',1000, 'easeInBack');

        if(!$("#part-1 h5").hasClass('step-list-item-disabled')){
          $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
      } else {
        if(!$("#part-3").hasClass('step-list-item-active')){
          $("#part-3").addClass('step-list-item-active')
        }
        $("#part-3 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');

        if(!$("#part-2 h5").hasClass('step-list-item-disabled')){
          $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');

        if(!$("#part-1 h5").hasClass('step-list-item-disabled')){
          $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');

        if(!$("#part-4 h5").hasClass('step-list-item-disabled')){
          $("#part-4 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-4").removeClass('step-list-item-active',1000, 'easeInBack');
        
        if(!$("#part-5 h5").hasClass('step-list-item-disabled')){
          $("#part-5 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
        }
        $("#part-5").removeClass('step-list-item-active',1000, 'easeInBack');
      }
    }

    //CHECKBOX
    $(".chk-moyenne-conso").change(function() {
        $(".chk-moyenne-conso").prop('checked', false);
        $(this).prop('checked', true);
    });

    $(".chk-elec-ampoule").change(function() {
        $(".chk-elec-ampoule").prop('checked', false);
        $(this).prop('checked', true);
    });


    //CHAMPS CALCULER 
      //= inputVolumeHabitation inputSurfaceSol * inputsCountersValues('eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond')
    $('#inputSurfaceSol').change(function(){
      $('#inputVolumeHabitation').val(parseInt($(this).val())* inputsCountersValues.eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond);

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

    $('#inputEstimFactChauff').change(function(e){
      inputsCountersValues.votre_conso_actuel=parseFloat($(this).val());
      $('#votre_conso_actuel').text($(this).val() +' €');
      if(!isNaN(parseInt($('select[name=type_de_chaufface_nombre_d_annee_a_indexer]').val()))){
        let sumTotal=inputsCountersValues.votre_conso_actuel;
        for(let i=0; i< parseInt($('select[name=type_de_chaufface_nombre_d_annee_a_indexer]').val()); i++){
          sumTotal +=((sumTotal * (parseFloat($('#inputEvol25Annee').val())/100)))
        }
        inputsCountersValues.votre_conso_sur_x_annee=sumTotal.toFixed(2);
        
        inputsCountersValues.moyenne_conso_sur_x_annee=inputsCountersValues.votre_conso_sur_x_annee / parseInt($('select[name=type_de_chaufface_nombre_d_annee_a_indexer]').val() || 0);
      }
      $('#votre_conso_sur_x_annee').text(inputsCountersValues.votre_conso_sur_x_annee +' €');
      $('#moyenne_conso_sur_x_annee').text((inputsCountersValues.moyenne_conso_sur_x_annee).toFixed(2) +' €');
    })

      $('select[name=type_de_chaufface_nombre_d_annee_a_indexer]').change(function(e){
        //label en x annee
        $("#votre_conso_sur_x_annee_value").text($(this).val());
        $("#moyenne_conso_sur_x_annee_value").text($(this).val());

      inputsCountersValues.votre_conso_actuel= parseFloat($('#inputEstimFactChauff').val()||0);
      $('#votre_conso_actuel').text(inputsCountersValues.votre_conso_actuel +' €');
      if(!isNaN(parseInt($('select[name=type_de_chaufface_nombre_d_annee_a_indexer]').val()))){
        let sumTotal=inputsCountersValues.votre_conso_actuel;
        for(let i=0; i< parseInt($($(this)).val()); i++){
          sumTotal +=((sumTotal * (parseFloat($('#inputEvol25Annee').val())/100)))
        }

        inputsCountersValues.votre_conso_sur_x_annee=sumTotal.toFixed(2);;
        inputsCountersValues.moyenne_conso_sur_x_annee=inputsCountersValues.votre_conso_sur_x_annee / parseInt($('select[name=type_de_chaufface_nombre_d_annee_a_indexer]').val());
      }
      $('#votre_conso_sur_x_annee').text(inputsCountersValues.votre_conso_sur_x_annee +' €');
      $('#moyenne_conso_sur_x_annee').text(inputsCountersValues.moyenne_conso_sur_x_annee.toFixed(2) +' €');
    })

    $('#inputEvol25Annee').change(function(){
      inputsCountersValues.votre_conso_actuel= parseFloat($('#inputEstimFactChauff').val());
      $('#votre_conso_actuel').text(inputsCountersValues.votre_conso_actuel +' €');
      if(!isNaN(parseInt($('select[name=type_de_chaufface_nombre_d_annee_a_indexer]').val()))){
        let sumTotal=inputsCountersValues.votre_conso_actuel;
        for(let i=0; i< parseInt($('select[name=type_de_chaufface_nombre_d_annee_a_indexer]').val()); i++){
          sumTotal +=((sumTotal * (parseFloat($(this).val())/100)))
        }
        inputsCountersValues.votre_conso_sur_x_annee=sumTotal.toFixed(2);
        inputsCountersValues.moyenne_conso_sur_x_annee=inputsCountersValues.votre_conso_sur_x_annee / parseInt($('select[name=type_de_chaufface_nombre_d_annee_a_indexer]').val());
        
      }
      $('#votre_conso_sur_x_annee').text(inputsCountersValues.votre_conso_sur_x_annee +' €');
      $('#moyenne_conso_sur_x_annee').text(inputsCountersValues.moyenne_conso_sur_x_annee.toFixed(2) +' €');
    });

    //gisolation
    $('select[name=gisolation]').change(function(){
      inputsCountersValues.gisolation=parseFloat($(this).val());
      calculatePompeAChaleurAirEau()
      // console.log($('#inputSurfaceSol').val())
      // console.log($('select[name=hauteur_sous_plafond_moyenne]').val())
      // console.log( inputsCountersValues.temperature_de_confort);
      // console.log($('#inputAddress').val())

    })
    //surface au sol
    $('#inputSurfaceSol').change(function(){
      inputsCountersValues.surface_au_sol=parseFloat($(this).val())
      calculatePompeAChaleurAirEau();

      // console.log($('select[name=gisolation]').val())
      // console.log($('select[name=hauteur_sous_plafond_moyenne]').val())
      // console.log( inputsCountersValues.temperature_de_confort);
      // console.log($('#inputAddress').val())

    })

    //hauteur sous plafond_moyenne
    $('select[name=hauteur_sous_plafond_moyenne').change(function(){
      inputsCountersValues.hauteur_sous_plafond_m=parseFloat($(this).val());
      calculatePompeAChaleurAirEau();

      // console.log($('select[name=gisolation]').val())
      // console.log($('#inputSurfaceSol').val())
      // console.log( inputsCountersValues.temperature_de_confort);
      // console.log($('#inputAddress').val())

    })
    
    $('#inputAddress').keyup(function(){
      calculatePompeAChaleurAirEau();
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
      if($('#inputPrixElec').val()!==''){
          $('#consump-info1').attr('style', 'opacity:1; display: block;')
          // $('#consump-info1').css('opacity:','1')
          // $('#consump-info1').css('display', 'block')
          $('#consumpt-val1').text($('#inputPrixElec').val()+'€')
      }
    })

    
    $('#modal2Button').click(function(){
      if($('#inputEstimFactEauChaude').val()!==''){
        $('#consump-info2').attr('style', 'opacity:1; display: block;');
        $('#consumpt-val2').text($('#inputEstimFactEauChaude').val()+'€');
        $('#eauChaudeSanitaireLeftPart').css('width', '130px');
      }
    })
    
    $('#modal3Button').click(function(){
      if($('#inputEstimFactAppareilElec').val()!==''){
        $('#consump-info3').attr('style', 'opacity:1; display: block;')
        $('#consumpt-val3').text($('#inputEstimFactAppareilElec').val()+'€')
        $('#appareilElecLeftPart').css('width', '80px');
      }
    })

    $('#modal4Button').click(function(){
      if($('#inputEstimFactEclairage').val()!==''){
        $('#consump-info4').attr('style', 'opacity:1; display: block;')
        $('#consumpt-val4').text($('#inputEstimFactEclairage').val()+'€')
        
      }
    })
    
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

      // Let's disable the inputs for the duration of the Ajax request.
      // Note: we disable elements AFTER the form data has been serialized.
      // Disabled form elements will not be serialized.
      $inputs.prop("disabled", true);
        request = $.ajax({
          url: "mail.php",
          type: "post",
          data: serializedData
      });

      // Callback handler that will be called on success
      request.done(function (response, textStatus, jqXHR){
          // Log a message to the console
          console.log("Mail sent", response);
      });

      // Callback handler that will be called on failure
      request.fail(function (jqXHR, textStatus, errorThrown){
          // Log the error to the console
          console.error(
              "The following error occurred: "+
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