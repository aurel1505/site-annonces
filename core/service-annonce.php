<?php
session_start();

switch($_GET['action']){
    case 'add':
    addAnnonce();
    break;
    default:
    header('Location:'.$_SERVER["HTTP_REFERER"]);
}
//Methodes du services
function addAnnonce(){
    //1 connexion au serveur
    require('connexion.php');
    //2 écriture de la requête
    $sql = 'INSERT INTO image (nom, image, ID, date, author) VALUES ("'.addslashes($_POST['nom']).'","'.addslashes($_POST['image']).'","'.addslashes($_POST['id']).'", "'.date("Y-m-d").'", '.$_POST['author'].')';
    //3 execution de la requête
    mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
    //Prise en charge de l'image
    $id = mysqli_insert_id($connexion);
    //On extrait l'extension du nom d'origine du fichier à l'aide de méthodes native
    echo $_FILES['img']['name'].'<br>';
    $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
    echo $ext;
    //On reconstruit un nom d'image en utilisant l'id et l'extension extraite
    $name="annonce_".$id.'.'.$ext;
    //Mise à jour de la BDD
    $sql = 'UPDATE annonces SET images="'.$name.'" WHERE id='.$id;
        //3 execution de la requête
        mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
    //Déplacement et renommage de l'image
    move_uploaded_file($_FILES["img"]["tmp_name"], '../images/'.$name);
    //4 Message et redirection
    $_SESSION['message']="Annonce bien ajoutée";
    header('Location:'.$_SERVER["HTTP_REFERER"]);
}


?>