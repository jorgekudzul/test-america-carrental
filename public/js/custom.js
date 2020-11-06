$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
    }
});

function errorAjax(x,xs,xt){
    window.open(JSON.stringify(x));
}

let statusCode = {
    400: function() {
        alert('Bad Request');
    },
    401: function() {
        alert('Unauthorized 401');
    },
    404: function() {
        alert('web not found');
    },
    404: function() {
        alert('Internal Error 500');
    }
};