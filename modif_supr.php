<?php
    // -----------------------Recuperation des variables------------------------------
    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    if(!isset($_POST['action'])){
        $action = "";
    }
    if(isset($_POST['ascii'])){
        $ascii = $_POST['ascii'];
    }
            
    $directory = "./ascii_art";

    // -----------------------Modification du nom-------------------------------------
    if (isset($_POST['newname'])) {
        $newName = strtolower($_POST['newname']) . '.txt';
        $filePath = "./ascii_art/" . $newName;

        if (file_exists("./ascii_art/$ascii.txt")) {
            rename("./ascii_art/$ascii.txt", $filePath);
        }                       
    } 
    // ---------------------Affichage de l'ASCII -------------------------------------
    if ($action === 'modif') {
        $filePath = $directory . '/' . $nom = (isset($_POST['newname'])) ? $newName: $ascii . '.txt';
        $f = fopen($filePath, 'r');
        
        if ($f === false) {
            exit('Fichier non ouvrable !');
        }
        $content = fread($f, 10000);
        
        if ($content === false) {
            exit('Lecture du fichier impossible !');
        }
        fclose($f);
    }
    // ---------------------Modification de l'ASCII -------------------------------------
    if (isset($_POST['newascii'])) {
        $newAscii = $_POST['newascii'];
        $filePath = $directory. '/' . $newName;
        
        $f = fopen($filePath, 'w');
        
        if ($f === false) {
            exit("Modification du fichier impossible !");
        }
        fwrite($f, $newAscii);
        fclose($f);
    } 
    // ---------------------Suppresion de l'ASCII -------------------------------------
    if ($action === 'del') {
        $filePath = $directory . '/' . $ascii. '.txt';
        unlink($filePath);
    }
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
            <h1 class="mt-4">Modifier/Supprimer</h1>
            <p>Modifier ou supprimer des ASCII-Art</p>
            <form method="POST">
                <button class="btn btn-primary mx-2" type="submit" name="action" value="modif"><i class="fa fa-edit"></i> Modifier</button>
                <button class="btn btn-danger mx-2" type="submit" name="action" value="del"><i class="fa fa-trash"></i> Supprimer</button>
                <div class="my-2">
                    <select class="custom-select" name="ascii">
                    <option value="<?=$asciiEnModif = (isset($_POST['ascii'])) ? $ascii: ''?>" selected>
                    <?=ucfirst($asciiEnModif = (isset($_POST['ascii'])) ? $ascii: "Choix de l'ASCII")?></option>
                        <?php
                        $files = scandir($directory);
                        foreach ($files as $file) {
                            if ($file[0] !== '.') { // ne pas traiter le dossier courrant "." et le dossier parent ".."
                                //permet d'afficher sans le .txt
                            $fileName = substr($file, 0, strlen($file) - 4);
                        ?>
                            <option value="<?=$fileName?>">
                            <?=ucfirst($fileName)?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <?php
                    if($action === 'modif'){
                ?>
                <div class="form-group">
                    <input class="form-control" type="text" name="newname" placeholder="Nouveau nom" required>
                </div>
                <label>Modifier l'ASCII</label>
                <div class="form-group">
                    <textarea rows="15" class="form-control" name="newascii" placeholder="">
<?=$newContent = (isset($_POST['newascii'])) ? $newAscii: $content?>
                    </textarea>
                </div>
                
                <?php } ?>
            </form>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- JS -->
<?php include("include/js.php"); ?>
</body>

</html>