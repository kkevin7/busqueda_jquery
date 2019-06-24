$(document).on('keyup','#caja_busqueda',function () {

    var valor =$(this).val();
    if(valor != ""){
        buscar_datos(valor);
        volver_original();
    }else {
        buscar_datos();
    }
});

$(buscar_datos());

function buscar_datos(consulta) {
    $.ajax({
        url: 'app/buscar.php',
        type: 'POST',
        dataType: 'html',
        data:{consulta:consulta},

    })
        .done(function (respuesta) {
            console.log(respuesta);
            texto = "Ahh perro traes omnitrix";
            n = respuesta.search(texto);
            if(n > 0){
                cambiar_fondo();
            }
            $('#datos').html(respuesta);
        })
        .fail(function () {
            console.log("Error al cargar los datos")
        })
}

function cambiar_fondo() {
    $('#content').css({'background': 'url("./img/omnitrix.jpg")', 'background-repeat': 'no-repeat', 'background-size':'cover'});
}
function volver_original() {
    $('#content').css("background", "#EBF5FB");
}