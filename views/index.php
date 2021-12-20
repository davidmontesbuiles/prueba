<?php
include('../controllers/session.php');
?>
<!doctype html>
<head>
    <?php 
        include 'includes/css.php';
    ?>
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
        <div class="content">
            <div class="animated fadeIn">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <h1>Prueba Técnica</h1>
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
</body>
</html>
