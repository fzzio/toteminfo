function llenarTablas(arrF, arrM){



    /*
    <tr>
        <th scope="row">1</th>
        <td>cedula</td>
        <td>apellidos</td>
        <td>nombres</td>
        <td>sexo</td>
        <td>estado_civil</td>
        <td>fecha_nacimiento</td>
        <td>nacionalidad</td>
        <td>email</td>
        <td>direccion</td>
        <td>celular</td>
        <td>otros_telefonos</td>
        <td>contaco_emergencia</td>
        <td>telefono_emergencia</td>
        <td>tipo_sangre</td>
        <td>talla_camiseta</td>
        <td>alias</td>
        <td>fecha_ingresototem</td>
        <td>estado</td>
    </tr>
    */

}


function getTotemsPorSede(idSede){

    var parametros = {
        idSede: idSede
    }

    $.ajax({
        url: js_site_url('site/getTotemsPorSede'),
        type: 'POST',
        async: true,
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
            

            if (respuesta.codigo == 1) {
                $("#sede-nom").text( respuesta.data.dataSede.nombre );
                $("#sede-hor").text( respuesta.data.dataSede.hora_entrenamiento );
                $("#sede-dir").text( respuesta.data.dataSede.direccion );
                $("#sede-fec").text( respuesta.data.dataSede.fecha_fundacion );

                var nacionalidad = "";

                var htmlF = "";
                for (var i = 0; i < respuesta.data.dataTotemsF.length; i++) {

                    switch(respuesta.data.dataTotemsF[i].nacionalidad){
                        case 'ec':  nacionalidad = "Ecuatoriano/a";
                                    break;
                        case 'co':  nacionalidad = "Colombiano/a";
                                    break;
                        case 'pe':  nacionalidad = "Peruano/a";
                                    break;
                        case 'mx':  nacionalidad = "Mexicano/a";
                                    break;
                        case 'ar':  nacionalidad = "Argentino/a";
                                    break;
                        case 'uy':  nacionalidad = "Uruguayo/a";
                                    break;
                        case 'py':  nacionalidad = "Paraguayo/a";
                                    break;
                        case 'us':  nacionalidad = "Estadounidense/a";
                                    break;
                    }

                    htmlF += "<tr>";
                        htmlF += "<th scope='row'>" + (i+1) + "</th>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].cedula + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].apellidos + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].nombres + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].estado_civil + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].fecha_nacimiento + "</td>";
                        htmlF += "<td>" + nacionalidad + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].email + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].direccion + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].celular + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].otros_telefonos + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].contaco_emergencia + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].telefono_emergencia + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].tipo_sangre + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].talla_camiseta + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].alias + "</td>";
                        htmlF += "<td>" + respuesta.data.dataTotemsF[i].fecha_ingresototem + "</td>";
                    htmlF += "</tr>";
                };
                $("#tbodyf").html( htmlF );


                var nacionalidad = "";
                var htmlM = "";
                for (var i = 0; i < respuesta.data.dataTotemsM.length; i++) {
                    switch(respuesta.data.dataTotemsM[i].nacionalidad){
                        case 'ec':  nacionalidad = "Ecuatoriano/a";
                                    break;
                        case 'co':  nacionalidad = "Colombiano/a";
                                    break;
                        case 'pe':  nacionalidad = "Peruano/a";
                                    break;
                        case 'mx':  nacionalidad = "Mexicano/a";
                                    break;
                        case 'ar':  nacionalidad = "Argentino/a";
                                    break;
                        case 'uy':  nacionalidad = "Uruguayo/a";
                                    break;
                        case 'py':  nacionalidad = "Paraguayo/a";
                                    break;
                        case 'us':  nacionalidad = "Estadounidense/a";
                                    break;
                    }

                    htmlM += "<tr>";
                        htmlM += "<th scope='row'>" + (i+1) + "</th>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].cedula + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].apellidos + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].nombres + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].estado_civil + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].fecha_nacimiento + "</td>";
                        htmlM += "<td>" + nacionalidad + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].email + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].direccion + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].celular + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].otros_telefonos + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].contaco_emergencia + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].telefono_emergencia + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].tipo_sangre + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].talla_camiseta + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].alias + "</td>";
                        htmlM += "<td>" + respuesta.data.dataTotemsM[i].fecha_ingresototem + "</td>";
                    htmlM += "</tr>";
                };
                $("#tbodym").html( htmlM );

               

                //console.log(respuesta.data.dataSede);
                //console.log(respuesta.data.dataTotemsF.length );
                //console.log(respuesta.data.dataTotemsM.length );




            }else if (respuesta.codigo == 2) {
                $("#sede-nom").text( respuesta.data.dataSede.nombre );
                $("#sede-hor").text( respuesta.data.dataSede.hora_entrenamiento );
                $("#sede-dir").text( respuesta.data.dataSede.direccion );
                $("#sede-fec").text( respuesta.data.dataSede.fecha_fundacion );
                
                $("#tbodyf").html("");
                $("#tbodym").html("");
            }else if(respuesta.codigo == -1){
                console.log("ERROR SERVER: " + respuesta.mensaje);

                $("#tbodyf").html("");
                $("#tbodym").html("");
            }else{
                console.log("ERROR: " + respuesta.mensaje);
            }
        }, 
        error: function (error) {
            console.log("ERROR: " + error);
        }
    });
}

////////////////////////////////////////////////////////////////

$(document).ready(function() {

    getTotemsPorSede(   $("#selectSede option:selected").val()    );


    $("#selectSede").change(function (event) {
        //alert("You have Selected  :: "+$(this).val());

        getTotemsPorSede( $(this).val()  );
    });

});