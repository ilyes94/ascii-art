<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASCII Art</title>

    <?php include("include/css.php"); ?>

</head>

<body>

<div class="d-flex" id="wrapper">
    <!-- Menu -->
    <?php include("include/menus.php"); ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle"><i id="icon-toggle" class="fa fa-chevron-left"></i></button>
        </nav>

        <div class="container-fluid">
            <h1 class="mt-4">Bienvenue sur le site de l'ASCII Art !</h1>
            <p>Visualisez et créez en utilisant des caractères ASCII.</p>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<?php include("include/js.php"); ?>

</body>

</html>