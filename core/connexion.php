<?php
$server = "localhost";
$user = "root";
$password = "azerty";
$bdd ="site_annonces";
//Connexion au serveur
$connexion = mysqli_connect($server, $user, $password) or die('Erreur de connexion au serveur');
$db = mysqli_select_db($connexion, $bdd);
//On s'assure de transactions au format utf-8
mysqli_set_charset($connexion,"utf8");
?>