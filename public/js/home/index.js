
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

        const element =   '<div class="col-md-12 col-sm-12 col-xs-12" id="slid">'+
        '<div class="panel">'+
          '<div class="panel-body">'+
            '<div class="col-md-12 col-sm-12 col-xs-12">'+
              '<div class="col-md-12 padding-0">'+
                '<div>'+
                  '<div class="carousel slide" data-ride="carousel" id="quote-carousel">'+
                    '<ol class="carousel-indicators">'+
                      '<li data-target="#quote-carousel" data-slide-to="0" class="active"></li>'+
                      '<li data-target="#quote-carousel" data-slide-to="1"></li>'+
                      '<li data-target="#quote-carousel" data-slide-to="2"></li>'+
                    '</ol>'+
                    '<div class="carousel-inner">'+
                      '<div class="item active">'+
                        '<blockquote>'+
                          '<div class="col-md-12">'+
                            '<div class="col-sm-3 text-center">'+
                              '<img class="img-circle" src="../img/communication-skill-1.png" style="width: 100px;height:100px;">'+
                            '</div>'+
                            '<div class="col-sm-9">'+
                              '<p>Quand l\'apprentissage du code devient un amusement, l\'evolution est inneluctable</p>'+
                              '<small>Amusons nous toujours</small>'+
                            '</div>'+
                          '</div>'+
                        '</blockquote>'+
                      '</div>'+
                      
                      '<div class="item">'+
                        '<blockquote>'+
                          '<div class="col-md-12">'+
                            '<div class="col-sm-3 text-center">'+
                              '<img class="img-circle" src="../img/poo.png" style="width: 100px;height:100px;">'+
                            '</div>'+
                            '<div class="col-sm-9">'+
                              '<p>Comprendre la programmation oriante objet est capital pour un developpeur.</p>'+
                              '<small>Amusons nous avec la programmation oriante objet</small>'+
                            '</div>'+
                          '</div>'+
                        '</blockquote>'+
                      '</div>'+
                      
                      '<div class="item">'+
                        '<blockquote>'+
                          '<div class="row">'+
                            '<div class="col-sm-3 text-center">'+
                              '<img class="img-circle" src="../img/banner_learn_teach.svg" style="width: 100px;height:100px;">'+
                            '</div>'+
                            '<div class="col-sm-9">'+
                              '<p>Maitriser plusieurs technologie est un grand atout pour beaucoup de developpeurs.</p>'+
                              '<small>Amusons nous avec plusieurs langages de programmation</small>'+
                            '</div>'+
                          '</div>'+
                        '</blockquote>'+
                      '</div>'+
                    '</div>'+

                    
                    '<a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>'+
                    '<a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>'+
                  '</div>'+                          
                '</div>'+
              '</div>'+
            '</div>'+
         ' </div>'+
        '</div>'+
      '</div>'+
      '<br /><br />'+
      '<center><div id="canvas">'+
    
      '</div></center>'+
      '<br /><br />'+
      '<br /><br />'
      
    //   faisons apparaitre le bouton de demarrage

    $('.bt').css('display','block');

        $('#root').html(element)

       
    }

    },100);


})
