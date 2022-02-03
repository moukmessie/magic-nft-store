<?php
namespace view;

class Template
{
    static function render($params){?>
        <!doctype html>
        <html lang="fr">
        <head>
        <!--include head -->
           <?php include "partials/_head.php"?>

        </head>
        <body>
        <!-- include nav -->
        <?php include "partials/_nav.php"?>
        <!--  Inclusion du module à afficher -->
        <?php include "modules/" . $params["module"]; ?>

        <!--  Include footer -->
        <?php include "partials/_footer.php" ?>
        </body>
        </html>

   <?php }

}