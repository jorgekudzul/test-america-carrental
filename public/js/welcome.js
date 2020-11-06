function show() {
    $('#modal-carrito').modal('show');
    $.ajax({
        url:'carrito/show',
        data:{'name':"luis"},
        type:'post',
        success:  function (response) {
            $('#modal-carrito-content').html(response);
        },
        error: function(x,xs,xt){
            window.open(JSON.stringify(x));
        },
        statusCode: statusCode,
    });
}

function AddRemove( accion, id ) {
    $('#modal-alert .modal-header').first().removeClass('btn-success btn-danger');
    let classCss = accion == "add" ? 'btn-success' : 'btn-danger';
    let message = accion == "add" ? 'Agregó' : 'Eliminó';

    $.ajax({
        url:'carrito/'+accion+'/'+id,
        type:'GET',
        success:  function (response) {
            $("#main-container").html(response);
            $('#modal-alert').modal('show');
            $('#modal-alert .modal-header').first().addClass(classCss);
            $('#modal-alert .modal-body').first().html("<h5> Se "+message+"<h5>");
            return true;
        },
        statusCode: {
            404: function() {
                alert('web not found');
            }
        },
        error:function(x,xs,xt){
            window.open(JSON.stringify(x));
        }
    });
}