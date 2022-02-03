<?php
require __DIR__. "/../config.php";
require PHP_DIR."class/Autoloader.php" ;
Autoloader::register();

use magic\Template ;
use magic\Cart;
session_start() ;
ob_start();// Démarrage du buffering
//$logged = isset($_SESSION['nickname']);


$addTo = new  Cart();



if (isset($_POST['add'])){

    $response = $_POST['add'] ;
    $addTo->add($response);
   // var_dump($response);
}



$content = ob_get_clean();//Récupère le contenu du buffer (et le vide)
Template::render($content); // Utilisation du contenu bufferisé

header("Location: cart.php ");
exit();

