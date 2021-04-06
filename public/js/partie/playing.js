$(()=>{

    // initialisons le state
    let state = {
        point: 0,
        point_dispo: 5,
        epreuve:0
    }

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
                '<span class="bar2"></span>'+
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
              // recuperons la solution de l'etudiant
              const rep1_fournir = $('#q1').val() 

              

             //Entrons dans les evenements
             $('#validation').click(()=>{  
            
               //verifions la validiter de la reponse
                 if(verifieur(rep1,rep1_fournir) === 1){ 
                   alert('question1 trouver') 
                 }else{
                     alert(verifieur(rep1,rep1_fournir))
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