<!DOCTYPE html>
<html lang="en">
<head>
<?php
if(file_exists('./inc/head.inc.php')) include('./inc/head.inc.php');
?>
</head>
<body>
<div class="container">
    <div class="row">
        <header></header>
        <div class="col-12">
        <?php
        //Vérification de l'existence de la variable action
        if(empty($_GET['action'])) header('Location:dashboard.php');
        //On gère le contenu de la page au regard de la valeur de la
        //variable passée en GET nommée action.
            switch($_GET['action']){
                case 'gerer':
                include('inc/list-annonces.inc.php');
                break;
                case 'ajouter':
                include('inc/form-add-annonce.inc.php');
                break;
                default:
                header('Location:dashboard.php');
            }
        ?>
        </div>
    </div>
</div>
</body>
</html>
