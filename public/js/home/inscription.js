$(()=>{


    const elemt = '<center><br /><div style="color:white;"><span id="pourcentage">0</span>% </div><br />'+
    '<progress value="0" style="width:100%" max="100" id="progresse"></progress><br/><span style="color:white">Chargement... </center>';
 
    $('#root').html(elemt);
 
     let t = 0
     let compteur = setInterval(()=>{
         ++t
         document.querySelector('#pourcentage').innerHTML=t
         document.querySelector('#progresse').value=t
 
     if(t==document.getElementById('progresse').max){
         clearInterval(compteur);
       $('.cv').css('display','block');
       $('#root').html('')
     }

     },100);

     $('#submit').click(()=>{

        //cachons le formulaire
        $('.cv').css('display','none')
        // mettons l'ajax loader

        $('#ajax_load').css('display','block');

        // recuperons les donnees du formulaire
        const nom = $('#nom').val(),prenom = $('#prenom').val(),username = $('#username').val(),pass1 = $('#password1').val(),pass2 = $('#password2').val(), email = $('#email').val()
        
        // nous allons cree un object pour contenir instantanemant les valeurs des champs de formulaire 
        let state = { message:'' }

        //verifions dabords la presense des valeur avant la soumission
        if(!nom || !prenom || !username || !pass1 || !pass2 || !email){
            //faisons apparaitre le formulaire
            $('.cv').css('display','block')
            //cachon l'ajax loader
            $('#ajax_load').css('display','none');
            //ecrivons le message qui cause probleme
            state.message = 'un ou plusieurs champs sont manquants'
            //affichons le message
            $('.notif').css('display','inline').html(state.message).hide().show('slow')
        
        }

        // si les deux mots de passe sont differents
        else if(pass1 != pass2){
             //faisons apparaitre le formulaire
             $('.cv').css('display','block')
             //cachon l'ajax loader
            $('#ajax_load').css('display','none');
            //ecrivons le message qui cause probleme
            state.message = 'Attention les deux mots de passes sont differents'
            $('.notif').css('display','inline').html(state.message).hide().show('slow')
        
        }else{

            const element =  '<div class="" pull-right>'+
            '<div class="alert alert-primary alert-border alert-dismissible fade in" role="alert">'+
                '<h2><b>'+nom+' '+prenom+'</b> votre Compte est creer et actif'+
                    '<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
                '</h2>'+
                '<h4>Choisir ton langage de programmation</h4>'+
                '</p>'+
            '</div>'+
        '</div>' 

        //envoyons les donnees au serveur avec ajax
           const path = $('#path').val() //on recupere le chemin de notre controleur ajax

           $.ajax({
            type: 'POST',
            dataType: 'json',
            async: true,
            url: path+'?nom='+nom+'&prenom='+prenom+'&username='+username+'&pass='+pass2+'&email='+email,
            timeout: 30000,
         success: function(data) {
            var e = '<div></div>';
            $('#root').html(element).hide().show('slow')
            for(i=0; i<=data.length; i++){
                 langages = data[i];

                 //on cache l'ajax loader
                 $('#ajax_load').css('display','none')

                //  on recupere le path de chargement pour la page de progression
                const progress_path = $('#pathp').val();

                 $('#root').append(
                     '<center>'+
                       '<a href="'+ progress_path +'?langage='+ langages['nom'] +'"><div id="langes" class="alert alert-dark alert-border alert-dismissible fade in col-md-5 pull-rigth">'+
                         '<h1>'+ langages['nom'] +'</h1>'+
                         '<p>'+langages['description']+'</p>'+
                       '</div></a>'+
                     '</center>'
                 );

            }
        },
         error: function() {
                             
                              //on cache l'ajax loader
                              $('#ajax_load').css('display','none')

                              $('#root').html(
                                  '<h2 class="alert alert-danger"><b><span class="fa fa-warning"></span> Une Erreur</b> <br /> s\'est produit lors de votre enregistrement</h2>'+
                                  '<div class="alert alert-warning"><h1>Cette erreur est une erreur technique</h1>'+
                                  'Generalement, cette erreur est du au fait que vous essayer de creer un nouveau compte contenant un nom d\'utilisateur qu\'un compte deja enregistre utilise avant.<br />'+
                                  'rassurez vous que le nom d\'urilisateur que vous essayer d\'utiliser n\'est pas encore utiliser'+
                                  '<br /><br />dans le cas contraire, vous devez nous contacter au plus vite pour resoudre</div>'
                              )
             }
    });

 }

        return false;
     });


})