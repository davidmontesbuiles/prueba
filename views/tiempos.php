<?php
include_once('../models/consultas.php');
?>
<!doctype html>
<head>
    <?php 
        include 'includes/css.php';
    ?>
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
</head>
<body>
    <aside id="left-panel" class="left-panel">
    <?php 
        include 'includes/menuLateral.php';
    ?>
    </aside>
    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
        <?php 
            include 'includes/header.php';
        ?>
        </header>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Tiempos</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Inicio</a></li>
                                    <li><a href="#">Tiempos</a></li>
                                    <li class="active">Ver Tiempos</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Actividades</strong>
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#staticModal">Agregar Tiempo</button>
                                <table id="tiempos" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre de la actividad</th>
                                            <th>Fecha en la cual se desarollo</th>
                                            <th>Tiempo gastado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?= consultas::cargar_tiempos() ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Agregar Tiempo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <input type="text" placeholder="Nombre de la actividad" class="form-control" id="name" name="name">
                            </div>
                            <br>
                            <div class="field_wrapper">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <input type="date" class="form-control" id="field_date" name="field_date[]">
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control" min="0" max="8" placeholder="Horas" id="field_horas" name="field_horas[]">
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="javascript:void(0);" class="add_button" title="Añadir campo"><img src="../images/mas.png" alt="mas"></a>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <br>
                            <center>
                                <div class="alert alert-success" role="alert" id="resp2"></div>
                            </center>
                            <center>
                                <div class="alert alert-danger" role="alert" id="err2"></div>
                            </center>
                            <center>
                                <div class="alert alert-danger" role="alert" id="camp2"></div>
                            </center>
                       </div>
                       <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="tiempo" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <footer class="site-footer">
        <?php 
            include 'includes/footer.php'
        ?>
        </footer>

    </div>
    <?php 
        include 'includes/script.php'
    ?>
    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>
    <script>
        $(document).ready(function() {
            var maxField = 8;
            var addButton = $('.add_button');
            var wrapper = $('.field_wrapper');
            var fieldHTML = '<div><div class="row"><div class="col-lg-5"><input type="date" class="form-control" name="field_date[]"></div><div class="col-lg-5"><input type="number" class="form-control" placeholder="Horas" min="0" max="8" name="field_horas[]"></div><a href="javascript:void(0);" class="remove_button" title="Eliminar campo"><img src="../images/menos.png" alt="menos"></a></div><br></div>';
            var x = 1;
            $(addButton).click(function(){
                if(x < maxField){
                    x++;
                    $(wrapper).append(fieldHTML);
                }
            });
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        })
    </script>
    <script src="../controllers/crearTiempo.js"></script>
    <script>
    $(document).ready(function() {
        $('#tiempos').DataTable({
            "scrollX": true,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>
</body>
</html>
