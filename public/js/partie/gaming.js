/* date achat du gaze: 03/04/2021 */

$(()=>{
   
    // metons l'ajax loader en jeu
    $('#ajax_load').css('display','block');

    //nous allons recuperer le path qui mene vers le controlleur qui va envoyer la liste
    const path_liste = $('#path_liste_parties').val();
    //recuperons l'id du langage
    const lang_id = $('#langage_id').val();
    // langage
    const langage = $('#lange').val();

    //l'element a aficher
    const element =  '<div class="" pull-right>'+
            '<div class="alert alert-primary alert-border alert-dismissible fade in" role="alert">'+
                '<h2>'+
                '<h2>Liste des parties disponible pour <b>'+langage+'</b></h2>'+
                    '<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
                '</h2>'+
                '<h4>Choisir la partie que tu aimerais amélioré en '+ langage +' </h4>'+
                '</p>'+
            '</div>'+
        '</div>' 

    // faisons une requetes ajax pour recuperer les partie qui existent en fonction du langage choisir par le joueur
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: path_liste+'?langage_id='+lang_id,
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

             $('#root').append(
                 '<center>'+
                   '<a href="'+path_playing+'?id_lang='+lang_id+'" id="letGo"><div id="langes" class="alert alert-dark alert-border alert-dismissible fade in col-md-5 pull-rigth">'+
                     '<h1><span class="icon-cup"></span> '+ langages['nom'] +'</h1>'+
                     '<p>'+langages['description']+'</p>'+
                   '</div></a>'+
                 '</center>'
             );

             $('#letGo').click(()=>{
                         //  metons notre ajax loader apres avoir cliquer
                    $('#ajax_load').css('display','block')
                      // masquons le root
                    $('#root').css('display','none')

             })
           

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






})