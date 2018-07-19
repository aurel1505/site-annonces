<?php
// recuperer les donnees
require("./core/connexion.php");
$sql = "SELECT * FROM annonces AS a JOIN users AS u ON a.author=u.id WHERE a.id=".$_GET['id'];
$req = mysqli_query($connexion,$sql) or die (mysqli_error($connexion));
$annonces = mysqli_fetch_array($req);
list($width, $height) = getimagesize('images/'.$annonces["images"]);
$tpl = file_get_contents('./tpl/annonce.print.html');
$tpl = str_replace("##TITLE##", $annonces['titre'],$tpl);
$tpl = str_replace("##IMG##",$annonces['images'],$tpl);
$tpl = str_replace("##w##",$width."px",$tpl);
$tpl = str_replace("##h##",$height."px",$tpl);
$tpl = str_replace("##TEXT##",$annonces['texte'],$tpl);
$tpl = str_replace("##AUTHOR##",$annonces['prenom'].' ' .$annonces['nom'],$tpl);
// Récuperer le tpl et remplacer les hook
// Déclaration des zone objet
// Acces a la librairie de generation des pdf
require_once(dirname(__FILE__).'/core/vendor/autoload.php');
// déclaration d'une zone d'objet

ob_start();
echo $tpl;
 $content = ob_get_clean();
//  Mise en place du pdf
 $html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P','A4','fr','true','UTF-8');
 $html2pdf->writeHTML($content);
 $html2pdf->Output();
?>