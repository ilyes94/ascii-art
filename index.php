<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASCII Art</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- See https://fontawesome.com/v4.7.0/icons/ for more informations -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous"
    >
    <link rel="stylesheet" href="css/master.css">

</head>

<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"> <i class="fa fa-paint-brush"></i> Ascii Art </div>
        <div class="list-group list-group-flush">
            <a href="index.php" class="list-group-item list-group-item-action list-group-item-primary bg-light"><i class="fa fa-home"></i> Accueil</a>
            <a href="explore.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-search"></i> Explorer</a>
            <a href="create.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-plus"></i> Créer</a>
            <a href="modif_supr.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-edit"></i> Modifier/Supprimer</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

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
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();

        if ($('#icon-toggle').hasClass("fa-chevron-left")) {
            $('#icon-toggle')
                .removeClass("fa-chevron-left")
                .addClass("fa-chevron-right")
            ;
        } else {
            $('#icon-toggle')
                .removeClass("fa-chevron-right")
                .addClass("fa-chevron-left")
            ;
        }

        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>