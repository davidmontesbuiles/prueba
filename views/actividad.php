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
                                <h1>Ver Actividades</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Inicio</a></li>
                                    <li><a href="#">Actividades</a></li>
                                    <li class="active">Ver Actividad</li>
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
                            <button type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#staticModal">Agregar Actividad</button>
                                <table id="actividades" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre de la actividad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?= consultas::cargar_actividades() ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Crear Actividad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="form-group">
                                    <input type="text" id="name" name="name" placeholder="Nombre de la Actividad" class="form-control">
                                </div>
                                <center>
                                <div class="alert alert-success" role="alert" id="resp"></div>
                            </center>
                            <center>
                                <div class="alert alert-danger" role="alert" id="err"></div>
                            </center>
                            <center>
                                <div class="alert alert-danger" role="alert" id="camp"></div>
                            </center>
                       </div>
                       <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="actividad" class="btn btn-success">Guardar</button>
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
    <script src="../controllers/crearActividad.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
    </script>
    <script>
    $(document).ready(function() {
        $('#actividades').DataTable({
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
