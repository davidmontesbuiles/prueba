$(document).ready(function() {
    $("#resp1").hide();
    $("#err1").hide();
    $("#camp1").hide();
});

$("#btnLogin").click(function() {
    $("#resp1").hide();
    $("#resp1").show();
    $("#resp1").html("Validando...");
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    if (username.length == 0 || password.length == 0) {
        $("#resp1").hide();
        $("#camp1").show();
        $("#camp1").html("Debe llenar todos los campos");
        $("#camp1").delay(2000).hide(0);
    } else {
        let ruta = "User=" + username + "&Pass=" + password;
        $.ajax({
                url: "../models/login.php",
                type: "POST",
                data: ruta,
            })
            .done(function(res) {
                if (res == "0") {
                    $("#resp1").hide();
                    document.getElementById("username").value = "";
                    document.getElementById("password").value = "";
                    $("#resp1").show();
                    $("#resp1").html("Ingresando...");
                    $("#resp1").delay(3000).hide(0);
                    window.location.href = "index";
                } else if (res == "1") {
                    $("#resp1").hide();
                    $("#err1").show();
                    $("#err1").html("El usuario o contraseña ingresada estan incorrectos.");
                    $("#err1").delay(3000).hide(0);
                }
            })
            .fail(function() {
                $("#resp1").hide();
                $("#err1").show();
                $("#err1").html("Error al ingresar");
                $("#err1").delay(3000).hide(0);
            });
    }
});