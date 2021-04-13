
$(()=>{

    // initialisons le state
    let state = {
        point: 0,
        epreuve:0,
        reusit: 0,
        niv: 1

    }

    let part_id = 0 ;
    let niv_id = 0

    
    // creons une fonction de verification des reponses fournir
    function verifieur(reponse,reponse_fournir){
        //on a deux parametre. ou nous allons chercher la reponse dans la question
       let match = new RegExp(reponse,'gi')
        if (match.test(reponse_fournir)){
            return 1
        }else{
            return match.test(reponse_fournir)
        }
    }
    
    // on va afficher le chargement
    $('#ajax_load').css('display','block');

    // on va recuperer le path qui conduit vers le controlleur qui permet de renvoyer la liste des niveau de la partie choisir
    const path_partie_choisir = $('#partie_choisir').val();
    //on recupere l'id du langage choisir
    const id_lang_choisir = $('#lang_id').val();
    // recuperons l'utilisateur en cours 
    const curent_user = $('#curent_user').val()

    //  les elements a affichecher...
    const element =  '<div class="" pull-right>'+
    '<div class="alert alert-primary alert-border alert-dismissible fade in" role="alert">'+
        '<h2>'+
        '<h2> Test d\'évaluation en '+$('#langue').val()+'. bonne chance <b>'+curent_user+'</b>  </h2>'+
            '<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
        '</h2>'+
        '<h4> Vous devez passer tout les 5 étapes a tour de rôle. Vous pouvez toujours a tout moment consulter le cours pour reviser  </h4>'+
        'et n\'oubliez pas d\'enregistrer votre progression avant de quitté la partie'+
        '</p>'+
        '</div>'+
        '</div>'

        const element2 =  '<div class="" pull-right>'+
        '<div class="alert alert-danger alert-border alert-dismissible fade in" role="alert">'+
            '<h2>'+
            '<h2> <b> TIME OUT</b>: Echec épreuve  </h2>'+
                '<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
            '</h2>'+
            '<h4> Vous avez laissé le temps vous rattraper.<b>'+curent_user+'</b>, Si vous êtes bloqué, vous pouvez toujours consulter le cours avant de revenir  </h4>'+
            '</p>'+
            '</div>'+
            '</div>'

        const element3 =  '<div class="" pull-right>'+
            '<div class="alert alert-danger alert-border alert-dismissible fade in" role="alert">'+
                '<h2>'+
                '<h2> <b> MOVAISE NOTE</b>: Echec épreuve  </h2>'+
                    '<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
                '</h2>'+
                '<h4> Vous n\'avez pas valider l\'epreuve.<b>'+curent_user+'</b>, vous devez avoir 10/10 pour passer a la prochaine epreuve.<br /> Si vous êtes bloqué, vous pouvez toujours consulter le cours avant de revenir <br /><hr /> <a href="" class="btn btn-primary btn-lg" id="reload">Relancer l\'epreuve</a>  </h4>'+
                '</p>'+
                '</div>'+
                '</div>'
    // fin element a afficher

     // faisons une requetes ajax pour recuperer les partie qui existent en fonction du langage choisir par le joueur
     $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: path_partie_choisir+'?langage_id='+id_lang_choisir,
        timeout: 30000,
     success: function(data) {
        var e = '<div></div>';
        $('#root').html(element).hide().show('slow')

        let epreve_num = state.epreuve+=1 //la nous precisons que nous passons a la premiere epreuve

        for(i=0; i<=data.length; i++){
             langages = data[i];

            //  on recupere l'id de la partie
             part_id = langages['id'];

             //on cache l'ajax loader
             $('#ajax_load').css('display','none')

            //  on recupere le path de chargement pour la page de progression
            const path_playing = $('#path_play').val();
            // recuperons le temps de la partie
            
            //  $('#root').append(
            //      ''
            //  );

            //  debut ajax pour charger les niveaux
 // faisons une requetes ajax pour recuperer les exos des chapitres trouver
            const path_exo1 = $('#path_exo1').val()
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: path_exo1+'?exo_id='+langages['langage_id'],
        timeout: 30000,
     success: function(data) {
        var e = '<div></div>';
        
        $('#root_exo').html('').hide().show('slow')
        for(i=0; i<=data.length; i++){
             langage = data[i];

            
             //on cache l'ajax loader
             $('#ajax_load').css('display','none')

             //recuperon l'id du niveau
                let niv_id = langage['id'];
            //  on recupere le path de chargement pour la page de progression
            const path_playing = $('#path_play').val();

            // on affiche le quantieme epreuve
            $('.epreuve').html(epreve_num)
            
             $('#root_exo').append(
              '<div id="content_q" class="container">'+


                '<div class="form-group form-animate-text" style="margin-top:40px !important;">'+
                '<input type="text" class="form-text" id="q1" name="password2" required>'+
                '<span class="bar1">'+langage['rep1']+'</span>'+
                '<label>'+langage['exo1']+'</label>'+
               '</div>'+

               '<div class="form-group form-animate-text" style="margin-top:40px !important;">'+
                '<input type="text" class="form-text" id="q2" name="password2" required>'+
                '<span class="bar2">'+langage['rep2']+'</span>'+
                '<label>'+langage['exo2']+'</label>'+
               '</div>'+

               '<div class="form-group form-animate-text" style="margin-top:40px !important;">'+
                '<input type="text" class="form-text" id="q3" name="password2" required>'+
                '<span class="bar3"></span>'+
                '<label>'+langage['exo3']+'</label>'+
               '</div>'+

               '<div class="form-group form-animate-text" style="margin-top:40px !important;">'+
                '<input type="text" class="form-text" id="q4" name="password2" required>'+
                '<span class="bar4"></span>'+
                '<label>'+langage['exo4']+'</label>'+
               '</div>'+

               '<div class="form-group form-animate-text" style="margin-top:40px !important;">'+
                '<input type="text" class="form-text" id="q5" name="password2" required>'+
                '<span class="bar5"></span>'+
                '<label>'+langage['exo5']+'</label>'+
               '</div>'+

               '<div class="form-group form-animate-text" style="margin-top:40px !important;">'+
                '<input type="text" class="form-text" id="q6" name="password2" required>'+
                '<span class="bar6"></span>'+
                '<label>'+langage['exo6']+'</label>'+
               '</div>'+

               '<div class="form-group form-animate-text" style="margin-top:40px !important;">'+
                '<input type="text" class="form-text" id="q7" name="password2" required>'+
                '<span class="bar7"></span>'+
                '<label>'+langage['exo7']+'</label>'+
               '</div>'+

               '<div class="form-group form-animate-text" style="margin-top:40px !important;">'+
                '<input type="text" class="form-text" id="q8" name="password2" required>'+
                '<span class="bar8"></span>'+
                '<label>'+langage['exo8']+'</label>'+
               '</div>'+

               '<div class="form-group form-animate-text" style="margin-top:40px !important;">'+
                '<input type="text" class="form-text" id="q9" name="password2" required>'+
                '<span class="bar9"></span>'+
                '<label>'+langage['exo9']+'</label>'+
               '</div>'+

               '<div class="form-group form-animate-text" style="margin-top:40px !important;">'+
                '<input type="text" class="form-text" id="q10" name="password2" required>'+
                '<span class="bar10"></span>'+
                '<label>'+langage['exo10']+'</label>'+
               '</div>'+

               '<button id="validation" class="btn btn-primary">Valider <span class="fa fa-check"></span></button>'+
            
              '</div>'

             ).hide().show('slow');

             const rep1 = langage['rep1']
             const rep2 = langage['rep2']
             const rep3 = langage['rep3']
             const rep4 = langage['rep4']
             const rep5 = langage['rep5']
             const rep6 = langage['rep6']
             const rep7 = langage['rep7']
             const rep8 = langage['rep8']
             const rep9 = langage['rep9']
             const rep10 = langage['rep10']
             
              // recuperons la solution de l'etudiant
              const rep1_fournir = $('#q1').val() 


             //Entrons dans les evenements
             $('#validation').click(()=>{  
                let note = 0 
               //verifions la validiter de la reponse
               // verification 1     
                if( verifieur(rep1,$('#q1').val()) ){
                    // on affiche le message de success
                    $('.bar1').html('Bravo, vous avez trouvé').css('color','lime').hide().show('slow')
                    // on ajoute 1 sur les point
                    
                     note = state.point += 1
                    
                }else{
                    $('.bar1').html('Non vous n\'avez pas trouver').css('color','red').hide().show('slow')
                    
                }

                // verification 2     
                if( verifieur(rep2,$('#q2').val()) ){
                    // on affiche le message de success
                    $('.bar2').html('Bravo, vous avez trouvé').css('color','lime').hide().show('slow')
                    // on ajoute 1 sur les point
                     note = state.point += 1 
                    
                }else{
                    $('.bar2').html('Non vous n\'avez pas trouver').css('color','red').hide().show('slow')
                    note -= 1
                }

                 // verification 3   
                 if( verifieur(rep3,$('#q3').val()) ){
                    // on affiche le message de success
                    $('.bar3').html('Bravo, vous avez trouvé').css('color','lime').hide().show('slow')
                    // on ajoute 1 sur les point
                     note = state.point += 1 
                    
                }else{
                    $('.bar3').html('Non vous n\'avez pas trouver').css('color','red').hide().show('slow')
                    
                }

                 // verification 4
                 if( verifieur(rep4,$('#q4').val()) ){
                    // on affiche le message de success
                    $('.bar4').html('Bravo, vous avez trouvé').css('color','lime').hide().show('slow')
                    // on ajoute 1 sur les point
                     note = state.point += 1 
                    

                }else{
                    $('.bar4').html('Non vous n\'avez pas trouver').css('color','red').hide().show('slow')
                    
                }

                 // verification 5  
                 if( verifieur(rep5,$('#q5').val()) ){
                    // on affiche le message de success
                    $('.bar5').html('Bravo, vous avez trouvé').css('color','lime').hide().show('slow')
                    // on ajoute 1 sur les point
                     note = state.point += 1 
                   
                }else{
                    $('.bar5').html('Non vous n\'avez pas trouver').css('color','red').hide().show('slow')
                    
                }

                 // verification 6   
                 if( verifieur(rep6,$('#q6').val()) ){
                    // on affiche le message de success
                    $('.bar6').html('Bravo, vous avez trouvé').css('color','lime').hide().show('slow')
                    // on ajoute 1 sur les point
                     note = state.point += 1 
                    
                }else{
                    $('.bar6').html('Non vous n\'avez pas trouver').css('color','red').hide().show('slow')
                    
                }

                 // verification 7  
                 if( verifieur(rep7,$('#q7').val()) ){
                    // on affiche le message de success
                    $('.bar7').html('Bravo, vous avez trouvé').css('color','lime').hide().show('slow')
                    // on ajoute 1 sur les point
                     note = state.point += 1 
                    
                }else{
                    $('.bar7').html('Non vous n\'avez pas trouver').css('color','red').hide().show('slow')
                
                }

                 // verification 8    
                 if( verifieur(rep8,$('#q8').val()) ){
                    // on affiche le message de success
                    $('.bar8').html('Bravo, vous avez trouvé').css('color','lime').hide().show('slow')
                    // on ajoute 1 sur les point
                     note = state.point += 1 
                    
                }else{
                    $('.bar8').html('Non vous n\'avez pas trouver').css('color','red').hide().show('slow')
                    
                }

                 // verification 9  
                 if( verifieur(rep9,$('#q9').val()) ){
                    // on affiche le message de success
                    $('.bar9').html('Bravo, vous avez trouvé').css('color','lime').hide().show('slow')
                    // on ajoute 1 sur les point
                    note = state.point += 1 
                   
                }else{
                    $('.bar9').html('Non vous n\'avez pas trouver').css('color','red').hide().show('slow')
        
                }

                 // verification 10    
                 if( verifieur(rep10,$('#q10').val()) ){
                    // on affiche le message de success
                    $('.bar10').html('Bravo, vous avez trouvé').css('color','lime').hide().show('slow')
                    // on ajoute 1 sur les point
                     note = state.point += 1 
                    

                }else{
                    $('.bar10').html('Non vous n\'avez pas trouver').css('color','red').hide().show('slow')
                
                }


                //gerons la note si la partie n'est pas valider
                if(note < 10 && note > 0){
                    $('.point').html(note)

                    
                    //validons la copie
                    
                        let valid = $('#validation')
                        // on desactive le bouton 
                        alert('vous n\'avez pas passer cette etape. \n vous avez eu que '+note)
                        note = note;  
                    
                }

                // gerons la note si la partie est valider
                if(note == 10){
                    clearInterval(compteur);

                    //on va enregistrer la progression avant de le faire passer a la prochaine etape
                    // pour se fait, on va afficher un message et une barre de progression pour le faire patienter le temps qu'on enregistre et charge la prochaine etape
                   
                    // on affiche un message
                    $('#root').html(
                        '<div class="" pull-right>'+
                        '<div class="alert alert-success alert-border alert-dismissible fade in" role="alert">'+
                            '<h2>'+
                            '<h2> <b> EPREUVE VALIDER</b>: Bravo vous avez valider cette épreuve  </h2>'+
                                '<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
                            '</h2>'+
                            '<h3>Vous êtes prêt pour la prochaine épreuve</h3>'+
                            '</p>'+
                            '</div>'+
                            '</div>'
                    ).hide().show('slow');

                    //on retire la copie
                    $('#root_exo').html(
                        '<div style="background:black; color:white; opacity:0.9; padding:2%;">'+
                        '<progress value="0" style="width: 50%;" max="100" id="progress_val"></progress>'+
                        '&nbsp;&nbsp;<span id="pro"></span> /100%'+
                        '<br /> <b>chargement...</b>'+
                        '</div>'
                    ).hide().show('slow');

                    // gerons la barre de progression pour indiquer le chargement
                    let temps = 0;
                    let compter = setInterval(()=>{
                        let barre = document.getElementById('progress_val');
                        let max = barre.max;
                        barre.value = ++temps;
                        $('#pro').html(temps);

                        // surveillons l'evolution du chargement
                        if(temps == max){
                            // on arrete le chargement
                            clearInterval(compter);
                            // on redirige maintenant vers la deuxieme epreuve

                            // cree le lien
                            const path = $('#save_progress').val();
                            let ni = parseInt(state.niv)
                            // recuperons l'id de la partie
                            const partie_id = $('#part_id').val();

                            let links = path + '?lang_id='+id_lang_choisir+'&partie_id='+part_id+'&niv_id='+niv_id;
                            location.href =links;
                        }

                    },300);


                }

                //gerons le comportement au cas ou la partie n'est pas valide
                if(note > 10){

                    // on affiche un message
                    $('#root').html(element3).hide().show('slow');

                    //on retire la copie
                    $('#root_exo').html('').hide().show('slow');

                    // on stope le temps
                    clearInterval(compteur);
                }

                








             })
            

        }
    },
     error: function() {
                         
                          //on cache l'ajax loader
                          $('#ajax_load').css('display','none')

                          $('#root').html(
                              '<h2 class="alert alert-danger"><b><span class="fa fa-warning"></span> Erreur de chargement du niveau</h2>'
                              
                          )
                    }
                });
            // fin ajax pour charger les niveaux

    }
 },
     error: function() {
                         
                          //on cache l'ajax loader
                          $('#ajax_load').css('display','none')

                          $('#root').html(
                              '<h2 class="alert alert-danger"><b><span class="fa fa-warning"></span> Une Erreur</b> <br /> s\'est produit lors du chargement</h2>'
                              
                          )
         }
});//fin ajax

    // on recupere la duree
    let temps = $('#duree').val()

    let heure = parseInt(temps/3600)
   
    let minutes = parseInt((temps-(heure*3600))/60)
    let seconds = Math.floor((temps-((heure*3600)+(minutes*60))))

    let compteur = setInterval(()=>{

        let zeroS = ''; // cette variable va nous dire si il faudrait metre un zero ans le chiffre
        let zeroM = ''

        // condition pour savoir si cest imferieur ou superieur a 11
        if(seconds < 10){
           zeroS = '0'
        }

        if(minutes <10){
            zeroM = '0'
         }
        
         // verifions le nombre de seconde pour extraire les minutes
         if(seconds <= 0 && minutes > 0){ 
            seconds = 60
            minutes-=1;

         }

         

        // reduisons les secondes
        $('.sec').html(zeroS+ --seconds)
        $('.min').html(zeroM+ minutes)
        --temps
        

        
        

        if(temps == 0){ // si le temps termine
             clearInterval(compteur); //on arrete de compter

             $('#root').html(element2).hide().show('slow') // on afficher le message d'echec
             $('#root_exo').html('').hide().show('slow') //on retire la copie
        }

    },1000);

    
})