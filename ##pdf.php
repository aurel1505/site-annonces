<?php
session_start();
//Accès à la librairie de génération des pdf
require_once('core/vendor/autoload.php');
//I) Récupérer les données
//1
require("./core/connexion.php");
//2
$sql = "SELECT * FROM annonces AS a JOIN users AS u ON a.author=u.id WHERE a.id=".$_GET['id'];
//echo $sql;
//3
$req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
//4
$annonce = mysqli_fetch_array($req);
//II) récup template
list($width, $height) = getimagesize('images/'.$annonce["images"]);
// $ratio = (105*3.78)/$width;
// $w = $width*$ratio;
// $h = $height*$ratio;
$tpl = file_get_contents('./tpl/annonce.print.html');
$tpl = str_replace("##TITLE##", $annonce['titre'], $tpl);
$tpl = str_replace("##IMG##", $annonce['images'], $tpl);
$tpl = str_replace("##w##", $width."px", $tpl);
$tpl = str_replace("##h##", $height."px", $tpl);
$tpl = str_replace("##TEXT##", $annonce['texte'], $tpl);
$tpl = str_replace("##AUTHOR##", $annonce['prenom'].' '.$annonce['nom'], $tpl);
//Déclaration d'une zone d'objet
ob_start();
echo $tpl;
$content = ob_get_clean();
//Mise en place du pdf
$html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P', array(297,210), 'fr', 'true', 'UTF-8', array(0,0,0,0));
$html2pdf->writeHTML($content);
$html2pdf->Output();








?>