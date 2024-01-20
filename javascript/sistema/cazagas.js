
$(function() {

    eventosPkm();

});

var eventosPkm = function(){

    $('#idPokemon').on('keypress' , function(){
        $('#idPokemon-error').hide();
    })

    $('#searchPkm').on('click' , function(){
        var idPkm = $('#idPokemon').val();
        console.log(idPkm);
        if( idPkm == '' ){
            $('#idPokemon-error').show();
            return
        }
        $('#div_card_pokemon .card .card-body').empty();
        var data = {
            'function' : 'getPokemon',
            'idPkm' : idPkm,
        }
        
        $.ajax({
            data: data,
            type: "POST",
            dataType:'json',
            url: "../service/pokemon.php",
          }).done(function(response) {

            
            if( $.isEmptyObject(response) ){
                $('#div_card_pokemon').hide();
            }else{
                $('#div_card_pokemon').show();
            }
            var data = response.data;
            var imagenes = data.sprites;
            var imagenesString = '';
            var imagenesBtn = '';
            var numImg = 0;
            $.each( imagenes , function( index , imagen ){
                if( imagen !== null && typeof imagen == 'string' ){
                    
                    var activeImg = '';
                    var activeDiv = '';
                    if( numImg == 0){
                        activeImg = 'class="active" aria-current="true"';
                        activeDiv = ' active';
                    }
                    
                    imagenesString += '<div class="carousel-item'+activeDiv+'"><img src="'+imagen+'" class="d-block w-100 imgPkm"></div>';
                    imagenesBtn += '<button type="button" data-bs-target="#carouselPkm" data-bs-slide-to="'+numImg+'"  aria-label="Slide '+ (numImg + 1) +'"></button>';
                    numImg++;
                }
            });
           
            if ( imagenesString != '' ){
                var imagenesAppend = '<div id="carouselPkm" class="carousel slide" data-bs-ride="carousel">\
                                        <div class="carousel-inner">'
                                            +imagenesString+
                                        '</div>\
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPkm" data-bs-slide="prev">\
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>\
                                            <span class="visually-hidden">Previous</span>\
                                        </button>\
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselPkm" data-bs-slide="next">\
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>\
                                            <span class="visually-hidden">Next</span>\
                                        </button>\
                                    </div><hr>\
                                    <div>\
                                        <span><b>Nombre:</b></span>\
                                        <span>'
                                        +capitalLetter(data.name)+
                                        '</span>\
                                    </div>';
            }
            
            $('#div_card_pokemon .cardImg .card-body').append(imagenesAppend);
            
          });

    });




}
