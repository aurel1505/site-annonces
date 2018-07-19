<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php
    if(file_exists('./inc/head.inc.php')) include('./inc/head.inc.php');
?>
</head>
<body>
<div class="container">
    <div class="row">
    <?php
    if(file_exists('./inc/header.inc.php')) include('./inc/header.inc.php');
    if(file_exists('./inc/nav.inc.php')) include('./inc/nav.inc.php');
    if(file_exists('./inc/carousel.inc.php')) include('./inc/carousel.inc.php');
?>
<!-- ZONE ANNONCE -->
<div class="col-12">
    <div class="row">

        <?php
        //1 connexion
        require("./core/connexion.php");
        //2 écriture de la requête
        $sql = "SELECT * FROM annonces WHERE enabled=1 ORDER BY id DESC LIMIT 8";
        //3 execution de la requête
        $req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
    //4 Traitement des données
        if(mysqli_num_rows($req)==0){
            echo "Désolé pas d'annonce";
        }else{
            while($annonce = mysqli_fetch_array($req)){
        //         echo '  <!-- ANNONCE -->
        //     <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        //         <h2>'.trim(stripslashes(ucfirst($annonce['titre']))).'</h2>
        //         <div class="row">
        //             <div class="col-12 col-md-4">
        //                 <img src="./images/'.$annonce['images'].'" alt="" class="img-fluid">
        //             </div>
        //             <div class="col-12 col-md-8">'.trim(stripslashes(ucfirst($annonce['description']))).'</div>
        //         </div>
        //     </div>
        // <!-- FIN ANNONCE -->';
                //file_get_contents lit le contenu d'un fichier et le récupére en chaine de caractères
                $tpl = file_get_contents('./tpl/front-annonce.tpl.html');
                //Avec str_replace (remplacement de sous chaine dans une chaine) on replace des
                //points d'entrées par des contenus de la base.
                //trim -> supprime les espaces en début et fin de chaine.
                //stripslashes supprime les anti-slash ajouté par le service (service-annonce) à l'aide
                //de addslashes
                //ucfirst (upper case first) met le premier caractère en maj
                //strtolower ->  met une chaine en minuscule
                //strtoupper -> met une chaine en maj (!!!! ça ne prend pas les caractères accentués)
                //si on a besoin des caractères accentués voir MB_CONVERT_CASE
                $tpl = str_replace('##titre##',trim(stripslashes(ucfirst($annonce['titre']))), $tpl);
                $tpl = str_replace('##image##',$annonce['images'], $tpl);
                $tpl = str_replace('##desc##',trim(stripslashes(ucfirst($annonce['description']))), $tpl);
                $tpl = str_replace('##id##',$annonce['id'], $tpl);
                //On écrit l'html dans le code
                echo $tpl;
            }
        }
        ?>
    </div>
</div>
<!-- FIN ZONE ANNONCE -->
    <footer class="d-flex justify-content-end w-100">
        <?php if(file_exists("./inc/footer.inc.php")) include("./inc/footer.inc.php"); ?>
    </footer>
    </div>
</div>




<?php
    if(file_exists('./inc/common-js.inc.php')) include('./inc/common-js.inc.php');
?>
<?php
    if(file_exists('./inc/modal-inscription.inc.php')) include('./inc/modal-inscription.inc.php');
    if(file_exists('./inc/modal-connexion.inc.php')) include('./inc/modal-connexion.inc.php');
    if(file_exists('./inc/message.inc.php')) include('./inc/message.inc.php');
?>
</body>
</html>