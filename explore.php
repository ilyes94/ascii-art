<?php require("require/header.php"); ?>
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
                            <li id="liste_ascii" class="list-group-item">
                                <button name="<?=$filename?>" class="btn btn-outline-info">
                                    <?=str_replace('_', ' ',ucfirst($filename))?>
                                </button>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            
            <!--  Utiliser une balise <pre> pour afficher les ASCII -->
            <pre id="affichage"></pre>
        </div>
    </div>

</div>
<!-- JS -->
<?php require("require/js.php"); ?>