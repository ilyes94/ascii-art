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
                    <h1 class="mt-4"><i class="fa fa-search"></i> Explorer</h1>
                    <small>Explorer les ASCII-Art !</small>

                    <div>
                        <ul class="list-group">
                            <?php
                                $directory = "./ascii_art";
                                $files = scandir($directory);

                                foreach ($files as $file) {
                                    if ($file[0] !== '.') { // ne pas traiter le dossier courrant "." et le dossier parent ".."
                                        $filename = substr($file, 0, strlen($file) - 4);
                            ?>
                                    <li class="list-group-item">
                                        <a href="explore.php?open=<?=$file?>"><?=ucfirst($filename)?></a>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>

                    <?php
                    // Lecture du fichier si la variable GET "open" existe
                    if (isset($_GET['open'])) {
                        $filePath = $directory . '/' . $_GET['open'];
                        $f = fopen($filePath, 'r');

                        if ($f === false) {
                            exit('Fichier non ouvrable !');
                        }

                        $content = fread($f, 10000);

                        if ($content === false) {
                            exit('Lecture du fichier impossible !');
                        }

                        fclose($f);
                    ?>
                        <div>
                        <!-- Utiliser une balise <pre> pour afficher les ASCII -->
                            <pre>
<!-- Ne pas indenter le code car il ajoute une tabulation dans le rendu -->
<?=$content?>
                            </pre>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

    <!-- JS -->
    <?php include("include/js.php"); ?>
    </body>

</html>