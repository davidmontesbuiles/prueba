<?php
session_start();
?>
<!doctype html>
<head>
    <?php
        include 'includes/css.php'
    ?>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="content">
                <center>
                <div class="col-lg-4"  style="margin-top:10%;">
                    <div class="card">
                        <div class="card-body card-block">
                            <p>Prueba Técnica</p>
                            <form id="frmLogin" action="#" method="post" class="">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-user"></span>
                                    </div>
                                    <input type="text" id="username" name="username" placeholder="Usuario" class="form-control">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-lock"></span>
                                    </div>
                                    <input type="password" id="password" name="password" placeholder="Contraseña" class="form-control">
                                </div>
                                <div class="form-actions form-group">
                                    <button type="button" id="btnLogin" class="btn btn-success btn-block">Ingresar</button>
                                </div>
                            </form>
                            <center>
                                <div class="alert alert-success" role="alert" id="resp1"></div>
                            </center>
                            <center>
                                <div class="alert alert-danger" role="alert" id="err1"></div>
                            </center>
                            <center>
                                <div class="alert alert-danger" role="alert" id="camp1"></div>
                            </center>
                        </div>
                    </div>
                </div>
                </center>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="../controllers/login.js"></script>
    <script>
        $(document).ready(function() {
            $('#frmLogin').validate({
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    username: 'Este campo es obligatorio',
                    password: 'Este campo es obligatorio'
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

        });
        </script>
</body>
</html>
