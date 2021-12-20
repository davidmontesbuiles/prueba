$(document).ready(function() {
    $("#resp2").hide();
    $("#err2").hide();
    $("#camp2").hide();
});

$("#tiempo").click(function() {

    let nombre = document.getElementById("name").value;
    let fechas = document.getElementsByName("field_date[]").length;
    let horas = document.getElementsByName("field_horas[]").length;

    let f = document.getElementsByName("field_date[]")[0].value;
    let h = document.getElementsByName("field_horas[]")[0].value;

    if (nombre.length == 0) {
        $("#camp2").show();
        $("#camp2").html("Debe llenar todos los campos.");
        $("#camp2").delay(3000).hide(0);
     }else if (f.length == 0) {
        $("#camp2").show();
        $("#camp2").html("Llena almenos una fecha.");
        $("#camp2").delay(3000).hide(0);
    } else if (h.length == 0) {
        $("#camp2").show();
        $("#camp2").html("Llena almenos una hora.");
        $("#camp2").delay(3000).hide(0);
    } else {
        for (var i = 0; i < fechas; i++) {
            let fecha = document.getElementsByName("field_date[]")[i].value;
            let hora = document.getElementsByName("field_horas[]")[i].value;

            var ruta = "Nom=" + nombre + "&Fec=" + fecha + "&Hor=" + hora;
            let r = ruta;

            $.ajax({
                    url: "../models/tiempo.php",
                    type: "POST",
                    data: r,
                })
                .done(function(res) {
                    if (res == "0") {
                        $("#resp2").hide();
                        document.getElementById("name").value = "";
                        document.getElementsByName("field_date").value = "";
                        document.getElementsByName("field_horas").value = "";
                        $("#resp2").show();
                        $("#resp2").html("Los tiempos se guardaron correctamente");
                        $("#resp2").delay(3000).hide(0);
                        window.setTimeout(function() {
                            window.location.href = "tiempos";
                        }, 2000);
                    } else if (res == "1") {
                        $("#resp2").hide();
                        $("#err2").show();
                        $("#err2").html("El nombre de la actividad no existe");
                        $("#err2").delay(3000).hide(0);
                    }
                })
                .fail(function() {
                    $("#err2").show();
                    $("#err2").html("Error al guardar la actividad");
                    $("#err2").delay(3000).hide(0);
                });
                
        } 
    }
});