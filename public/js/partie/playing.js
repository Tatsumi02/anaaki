$(()=>{
    
    // on va afficher le chargement
    $('#ajax_load').css('display','block');

    // on va recuperer le path qui conduit vers le controlleur qui permet de renvoyer la liste des niveau de la partie choisir
    const path_partie_choisir = $('#partie_choisir').val();
    //on recupere l'id du langage choisir
    const id_lang_choisir = $('#lang_id').val();
    // recuperons l'utilisateur en cours 
    const curent_user = $('#curent_user').val()

    //  element a affichecher...
    const element =  '<div class="" pull-right>'+
    '<div class="alert alert-primary alert-border alert-dismissible fade in" role="alert">'+
        '<h2>'+
        '<h2> votre partie est lancer et en cours. bonne chance <b>'+curent_user+'</b>  </h2>'+
            '<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
        '</h2>'+
        '<h4> Vous devez passer tout les 5 étapes a tour de rôle. Vous pouvez toujours a tout moment consulter le cours pour reviser  </h4>'+
        'et n\'oubliez pas d\'enregistrer votre progression avant de quitté la partie'+
        '</p>'+
        '</div>'+
        '</div>'

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

             $('#root_exo').append(
                 '<input type="text" class="form-control" placeholder="'+langage['exo1']+'">'+
                 '<br><br>'+
                 '<input type="text" class="form-control" placeholder="'+langage['exo2']+'">'
             ).hide().show('slow');

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
        

        
        

        if(temps == 0) clearInterval(compteur);

    },1000);

    
})