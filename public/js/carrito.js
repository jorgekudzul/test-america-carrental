function upDown(signal, input) {
    if (signal == '-' && input.val() == 1)
        return;

    if (signal == '-')
        input.val(parseInt(input.val()) - 1);

    if (signal == '+')
        input.val(parseInt(input.val()) + 1);
    
    $("#btnUpdate"+input.attr('data-id-row')).removeAttr("disabled");
    
    if ( input.val() == input.attr('data-initial-value') ) {
        $("#btnUpdate"+input.attr('data-id-row')).attr("disabled", "disabled");
    }

    return; 
}

function update(input) {
    url = window.location.href + "carrito/update/"+input.attr('data-id-row')+"/"+input.val()

    $.ajax({
        url: url,
        type:'GET',
        success:  function (response) {
            $('#modal-carrito-content').html(response);

            $('#modal-alert').modal('show');
            $('#modal-alert .modal-header').first().addClass('btn-warning');
            $('#modal-alert .modal-body').first().html("<h5> Se actualizó <h5>");
            return true;
        },
        statusCode: statusCode,
        error: function(x,xs,xt){
            window.open(JSON.stringify(x));
        },
    });
}

function trash() {
    $.ajax({
        url: 'carrito/trash',
        type:'GET',
        success:  function(response) {
            $("#main-container").html(response);
            $("#modal-carrito").modal('hide');

            $('#modal-alert').modal('show');
            $('#modal-alert .modal-header').first().addClass('btn-danger');
            $('#modal-alert .modal-body').first().html("<h5> Se limpió el carrito <h5>");
        },
        statusCode: statusCode,
        error: function(x,xs,xt){
            window.open(JSON.stringify(x));
        },
    });
}

function deleteItem(id) {
    $.ajax({
        url: 'carrito/delete/'+id,
        type:'GET',
        success:  function(response) {
            $("#main-container").html(response.main);
            $('#modal-carrito-content').html(response.carrito);

            $('#modal-alert').modal('show');
            $('#modal-alert .modal-header').first().addClass('btn-danger');
            $('#modal-alert .modal-body').first().html("<h5> Se eliminó <h5>");
            return true;
        },
        statusCode: statusCode,
        error: function(x,xs,xt){
            window.open(JSON.stringify(x));
        },
    });
}