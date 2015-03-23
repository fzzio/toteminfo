/*
function resetearVidas(){
    $.ajax({
        url: js_site_url('user/resetearVidas'),
        type: 'POST',
        async: false,
        dataType: "json",
        success: function (respuesta) {
            var txtHtml = "";
            var urlImgLife = js_site_url('../public/img/life_icon.png');
            var urlImgLifeDie = js_site_url('../public/img/life_icon-die.png');
            for (var i = 0; i < (respuesta.vidasxjuego - respuesta.vidasperdidas) ; i++) {
                txtHtml += "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center'>"
                            + "<img src='" + urlImgLife + "' alt='' class='img-responsive obj-centrar' />"
                            + "</div>";
            };
            for (var i = 0; i < (respuesta.vidasperdidas) ; i++) {
                txtHtml += "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center'>"
                            + "<img src='" + urlImgLifeDie + "' alt='' class='img-responsive obj-centrar' />"
                            + "</div>";
            };

            $("#div-vidas").html(txtHtml);
            console.log("Respuesta: " + respuesta);
        }, 
        error: function (error) {
            console.log("ERROR: " + error);
        }
    });
}
*/
////////////////////////////////////////////////////////////////

$(document).ready(function() {


});