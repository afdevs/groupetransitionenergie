const inputsCountersValues={
    nombre_d_habitants: 0,
    hauteur_sous_plafond: 0,
    hauteur_sous_plafond_moyenne: 1,
    chaufface_envisage_source_energie_nbr_unite: 0,
    eau_chaude_sanitaire_envisage_source_energie_hauteur_plafond: 0,
    source_energie_nombre: 0,
    consommation_annuelle_elec: 0,
    consommation_annuelle_gaz: 0,
    consommation_annuelle_gpl: 0,
    consommation_annuelle_fioul: 0,
    consommation_annuelle_bois: 0,
    consommation_annuelle_autre:0
}

jQuery(function($){
    $(document).ready(function(){
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems);

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
      
      $('select').formSelect();

      //Rese all radios inputs to uncheck
      function resetAllRadioInput(){
        $('#regiration_form', function(){
          $($(this).children('input[type=radio]')[0]).prop('checked', false);
          
          $($(this).children('input[type=text]')[0]).val('');
        })

      }

      resetAllRadioInput();

      $('.counter__increment').click(function(e){
        //hauteur_sous_plafond_moyenne
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='hauteur_sous_plafond_moyenne'){
          const result=inputsCountersValues.hauteur_sous_plafond_moyenne +0.2;
          inputsCountersValues.hauteur_sous_plafond_moyenne = Math.round(result*100)/100
          $($($(this).parent().children('.counter__value'))[0]).text(inputsCountersValues.hauteur_sous_plafond_moyenne);  
          return
        }

        inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]=parseInt(inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')])+1
        inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]=inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')];


        //champ calcule
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
        if(parseInt(inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')])===0) return;
        
        //hauteur_sous_plafond_moyenne
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='hauteur_sous_plafond_moyenne' && inputsCountersValues[$($($(this).parent().children('.counter__value'))[0]).attr('name')]===1) return 
        if($($($(this).parent().children('.counter__value'))[0]).attr('name')==='hauteur_sous_plafond_moyenne'){
          const result=inputsCountersValues.hauteur_sous_plafond_moyenne -0.2;
          inputsCountersValues.hauteur_sous_plafond_moyenne = Math.round(result*100)/100
          $($($(this).parent().children('.counter__value'))[0]).text(inputsCountersValues.hauteur_sous_plafond_moyenne);  
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
            
            if (current >=1 && current<=25){ 
              $('.page .previous').css('visibility', 'visible');
            }else{
                $('.page .previous').css('visibility', 'hidden');
            }

            if(current>1 && current< 10){
              if(!$("#part-2").hasClass('step-list-item-active')){
                $("#part-2").addClass('step-list-item-active')
              }
              $("#part-2 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
    
              if(!$("#part-1 h5").hasClass('step-list-item-disabled')){
                $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
              }
              $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
    
            }else{
              if(!$("#part-1").hasClass('step-list-item-active')){
                $("#part-1").addClass('step-list-item-active')
              }
              $("#part-1 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
    
              if(!$("#part-2 h5").hasClass('step-list-item-disabled')){
                $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
              }
              $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
            }
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
        
        if (current >1 && current<=25){ 
          $('.page .previous').css('visibility', 'visible')
        }else{
          $('.page .previous').css('visibility', 'hidden');

        }

        if(current>1 && current< 10){
          if(!$("#part-2").hasClass('step-list-item-active')){
            $("#part-2").addClass('step-list-item-active')
          }
          $("#part-2 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');

          if(!$("#part-1 h5").hasClass('step-list-item-disabled')){
            $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          }
          $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');

        }else{
          if(!$("#part-1").hasClass('step-list-item-active')){
            $("#part-1").addClass('step-list-item-active')
          }
          $("#part-1 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');

          if(!$("#part-2 h5").hasClass('step-list-item-disabled')){
            $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
          }
          $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
        }
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
        
        for(let i=0; i<19; i++){
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
            
            if (current >=1 && current<=25){ 
              $('.page .previous').css('visibility', 'visible');
            }else{
                $('.page .previous').css('visibility', 'hidden');
            }

            if(current>1 && current< 10){
              if(!$("#part-2").hasClass('step-list-item-active')){
                $("#part-2").addClass('step-list-item-active')
              }
              $("#part-2 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
    
              if(!$("#part-1 h5").hasClass('step-list-item-disabled')){
                $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
              }
              $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
    
            }else{
              if(!$("#part-1").hasClass('step-list-item-active')){
                $("#part-1").addClass('step-list-item-active')
              }
              $("#part-1 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
    
              if(!$("#part-2 h5").hasClass('step-list-item-disabled')){
                $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
              }
              $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
            }

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
              
              if (current >=1 && current<=25){ 
                $('.page .previous').css('visibility', 'visible');
              }else{
                  $('.page .previous').css('visibility', 'hidden');
              }
  
              if(current>1 && current< 10){
                if(!$("#part-2").hasClass('step-list-item-active')){
                  $("#part-2").addClass('step-list-item-active')
                }
                $("#part-2 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
      
                if(!$("#part-1 h5").hasClass('step-list-item-disabled')){
                  $("#part-1 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
                }
                $("#part-1").removeClass('step-list-item-active',1000, 'easeInBack');
      
              }else{
                if(!$("#part-1").hasClass('step-list-item-active')){
                  $("#part-1").addClass('step-list-item-active')
                }
                $("#part-1 h5").removeClass('step-list-item-disabled',1000, 'easeInBack');
      
                if(!$("#part-2 h5").hasClass('step-list-item-disabled')){
                  $("#part-2 h5").addClass('step-list-item-disabled',1000, 'easeInBack');
                }
                $("#part-2").removeClass('step-list-item-active',1000, 'easeInBack');
              }
  
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