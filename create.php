<?php require("require/header.php"); ?>
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle"><i id="icon-toggle" class="fa fa-chevron-left"></i></button>
        </nav>

        <div class="container-fluid">
            <h1 class="mt-4">Créez votre ASCII-Art</h1>
            <small>Soyez créatif !</small>

            <?php
            // Création d'un fichier ASCII si les paramètres POST "name" et "ascii" sont fournis
            if (isset($_POST['name'], $_POST['ascii'])) {
                $filename = preg_replace('/\s+/', '_',strtolower($_POST['name'])) . '.txt';
                $filePath = "./ascii_art/" . $filename;

                $f = fopen($filePath, 'w');

                if ($f === false) {
                    exit("Création du fichier impossible !");
                }

                fwrite($f, $_POST['ascii']);
                fclose($f);
                header('Location: explore.php');
            }
            //verification du fichier
            elseif (isset($_POST['name'], $_FILES['ascii'])) {
                $filename = strtolower($_POST['name']) . '.txt';

                $allowedMimeTypes = ['text/plain'];
                $maxSize = 10000;
                if (in_array($_FILES['ascii']['type'], $allowedMimeTypes) === false) {
                    exit("Il faut utiliser un fichier texte");
                }
                if ($_FILES['ascii']['size'] > $maxSize) {
                    exit("Le fichier est trop lourd. Merci de ne pas dépasser 10 Ko");
                }
                if (move_uploaded_file($_FILES['ascii']['tmp_name'], "./ascii_art/$filename") === false) {
                    exit("Une erreur est survenu");
                }
            }
            ?>

            <div>
                <form method="POST">
                    <button type="submit" class="btn btn-success btn-sm mb-3 pull-right"><i class="fa fa-plus"></i> Créer</button>

                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Libellé" required>
                    </div>

                    <div class="form-group">
                        <textarea rows="15" class="form-control" name="ascii" placeholder="Votre ASCII-Art"></textarea>
                    </div>
                </form>
                <h3>Ou importez votre propre ASCII-art</h3>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Libellé" required>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                        <input type="file" name="ascii" class="form-control-file">
                    </div>

                    <button type="submit" class="btn btn-success btn-sm mb-3 pull-right"><i class="fa fa-plus"></i> Importez</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- JS -->
<?php require("require/js.php"); ?>