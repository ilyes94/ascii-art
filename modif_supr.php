<?php
// -----------------------Recuperation des variables------------------------------
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}
if (!isset($_POST['action'])) {
    $action = "";
}
if (isset($_POST['ascii'])) {
    $ascii = $_POST['ascii'];
}

$directory = "./ascii_art";

// -----------------------Modification du nom-------------------------------------
if (isset($_POST['newname'])) {
    $newName = preg_replace('/\s+/', '_', strtolower($_POST['newname'])) . '.txt';
    $filePath = "./ascii_art/" . $newName;

    if (file_exists("./ascii_art/$ascii.txt")) {
        rename("./ascii_art/$ascii.txt", $filePath);
    }
}
// ---------------------Modification de l'ASCII -------------------------------------
if (isset($_POST['newascii'])) {
    $newAscii = $_POST['newascii'];
    $newName = preg_replace('/\s+/', '_', strtolower($_POST['newname'])) . '.txt';
    $filePath = $directory . '/' . $newName;

    $f = fopen($filePath, 'w');

    if ($f === false) {
        exit("Modification du fichier impossible !");
    }
    fwrite($f, $newAscii);
    fclose($f);
}
// ---------------------Suppresion de l'ASCII -------------------------------------
if ($action === 'del') {
    $filePath = $directory . '/' . $ascii . '.txt';
    unlink($filePath);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASCII Art</title>

    <?php require("require/css.php"); ?>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Menu -->
        <?php require("require/menus.php"); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle"><i id="icon-toggle" class="fa fa-chevron-left"></i></button>
            </nav>

            <div class="container-fluid">
                <h1 class="mt-4">Modifier/Supprimer</h1>
                <p>Modifier ou supprimer des ASCII-Art</p>
                <form method="POST">
                    <button class="btn btn-primary mx-2" type="submit" name="action" value="modif"><i class="fa fa-edit"></i> Modifier</button>
                    <button class="btn btn-danger mx-2" type="submit" name="action" value="del"><i class="fa fa-trash"></i> Supprimer</button>
                    <div class="my-2">
                        <select id="liste_modif" class="custom-select" name="ascii">
                            <option value="<?= $asciiEnModif = (isset($_POST['ascii'])) ? $ascii : '' ?>" selected>
                                <?= ucfirst($asciiEnModif = (isset($_POST['ascii'])) ? str_replace('_', ' ',ucfirst($ascii)) : "Choix de l'ASCII") ?></option>
                            <?php
                            $files = scandir($directory);
                            foreach ($files as $file) {
                                if ($file[0] !== '.') { // ne pas traiter le dossier courrant "." et le dossier parent ".."
                                    //permet d'afficher sans le .txt
                                    $filename = substr($file, 0, strlen($file) - 4);
                            ?>
                                    <option value="<?= $filename ?>">
                                        <?= str_replace('_', ' ',ucfirst($filename)) ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div id="ascii_modif">
                    
                    </div>        
                </form>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- JS -->
        <?php require("require/js.php"); ?>
</body>

</html>