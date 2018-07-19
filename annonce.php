<?php
session_start();
?>
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
    <?php
    if(file_exists('./inc/header.inc.php')) include('./inc/header.inc.php');
    if(file_exists('./inc/nav.inc.php')) include('./inc/nav.inc.php');
    //Récupération de l'annonce
    //1 connexion
    require('./core/connexion.php');
    //2 écriture de la requête
    $sql = 'SELECT * FROM annonces AS a JOIN users AS u ON a.author=u.id WHERE a.id='.$_GET['id'];
    //3 execution de la requête
    $req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
    //4 traitement.
    $annonce = mysqli_fetch_array($req);
    //
    $sql ='SELECT * FROM users WHERE id='.$annonce['author'];
    ?>
    <div class="d-flex">
        <div class="col-12 col-lg-4">
            <img src="./images/<?php echo $annonce['images']; ?>" alt="" class="img-fluid">
        </div>
        <div class="col-12 col-lg-8">
            <h1 class="d-flex justify-content-between">
                <span><?php echo $annonce['titre']; ?></span>
                <div><a href="pdf.php?id=<?php echo $_GET['id']; ?>"><image src="images/pdfcreator_icon.png" alt=""></a></div>
            </h1>
            <div><?php echo $annonce['texte']; ?></div>
            <h2>Auteur : <?php echo $annonce['nom'].' '.$annonce['prenom']; ?></h2>
        </div>
    </div>
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