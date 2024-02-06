$(function() {

    listeners();
    getTable();

})

var listeners = function(){

    $('#save_cte').on( 'click' , function(e){
        e.preventDefault();
        var nameCte = $('#nameCte').val();

        if( nameCte != '' ){
            createCte(nameCte);
        }

    });


    $('#updateName').on( 'click' , function(e){
        e.preventDefault();
        var nameCte = $('#newNameCte').val();

        if( nameCte != '' ){
            updateCte();
        }

    });

}

var createCte = function(name){

    $.ajax({
        url: "service/clientes.php",
        type: "POST",
        data: {
            'function' : 'create',
            'name' : name
        },
      }).done(function(response) {
            var obj = JSON.parse(response);
            $('#tableCtes').DataTable().ajax.reload(null,false);
      });
}

var getTable = function(){

    $('#tableCtes').DataTable({
        "ajax" : {
            "url" : "service/clientes.php",
            "type" : "POST",
            "data" : {"function" : "getCtes"},
            "dataSrc": "",
        },
        "columns" :[
            {"data" : 0},
            {"data" : 1},
            {"data" : 2, "render" : function(data, row, full, meta){
                let cadena = '';
                if(data == 1)
                cadena = '<span class="badge rounded-pill text-bg-success">Correcto</span>';
                return cadena;
            }},
            {"data" : 0, "render" : function(data, row, full, meta){
                let cadena = '<a href="javascript:void(0)" onclick="dataUpdate('+"'"+full[1]+"'"+' , '+data+')" ><i class="bi bi-pencil"></i></a> <a href="javascript:void(0)" onclick="deleteCte('+data+') " ><i class="bi bi-trash3 deleteIcon"></i></a>';
                return cadena;
            }},
        ]
    });

}

var deleteCte = function(idCte){

     $.ajax({
         url: "service/clientes.php",
         type: "POST",
         data: {
             'function' : 'delete',
             'idCte' : idCte
         },
       }).done(function(response) {
            var obj = JSON.parse(response);
            $('#tableCtes').DataTable().ajax.reload(null,false);
       });

}

var dataUpdate = function(name , id){


    $('#modalUpdateCteTittle').text(name);

    $('#modalUpdateCte').attr( 'data-id' , id);

    $('#modalUpdateCte').modal('show');


}

var updateCte = function(){

    var name = $('#newNameCte').val();
    var idCte = $('#modalUpdateCte').attr( 'data-id');

    $.ajax({
        url: "service/clientes.php",
        type: "POST",
        data: {
            'function' : 'update',
            'idCte' : idCte,
            'name' : name,
        },
      }).done(function(response) {
        var obj = JSON.parse(response);
        $('#newNameCte').val('');
        $('#modalUpdateCte').modal('hide');
        $('#tableCtes').DataTable().ajax.reload(null,false);
      });

}