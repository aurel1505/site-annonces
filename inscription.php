<?php
session_start();
?><!DOCTYPE html>
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
    if(file_exists("./inc/form-inscription.inc.php")) include("./inc/form-inscription.inc.php");
    ?>
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
?>
<?php
    if(file_exists('./inc/modal-inscription.inc.php')) include('./inc/modal-inscription.inc.php');
    if(file_exists('./inc/modal-connexion.inc.php')) include('./inc/modal-connexion.inc.php');
?>
</body>
</html>