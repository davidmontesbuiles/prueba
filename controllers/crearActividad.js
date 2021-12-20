$(document).ready(function() {
    $("#resp").hide();
    $("#err").hide();
    $("#camp").hide();
});

$("#actividad").click(function() {
    let nombre = document.getElementById("name").value;
    if (nombre == 0) {
        $("#camp").show();
        $("#camp").html("Debe ingresar el nombre de la actividad");
        $("#camp").delay(3000).hide(0);
    } else {
        let ruta = "Nom=" + nombre;
        $.ajax({
                url: "../models/actividad.php",
                type: "POST",
                data: ruta,
            })
            .done(function(res) {
                if (res == "0") {
                    $("#resp").hide();
                    document.getElementById("name").value = "";
                    $("#resp").show();
                    $("#resp").html("La actividad se guardo correctamente");
                    $("#resp").delay(3000).hide(0);
                    window.setTimeout(function() {
                        window.location.href = "actividad";
                    }, 2000);
                } else if (res == "1") {
                    $("#resp").hide();
                    $("#err").show();
                    $("#err").html("El nombre de la actividad ya existe");
                    $("#err").delay(3000).hide(0);
                }
            })
            .fail(function() {
                $("#err").show();
                $("#err").html("Error al guardar la actividad");
                $("#err").delay(3000).hide(0);
            });
    }
});