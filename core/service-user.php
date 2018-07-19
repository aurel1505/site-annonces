<?php
session_start();
//
$action;
if(isset($_GET['action'])){
    $action = $_GET['action'];
}elseif(isset($_POST['action'])){
    $action = $_POST['action'];
}else{
    header('Location:'.$_SERVER['HTTP_REFERER']);
}
switch($action){
    case 'add':
    addUser();
    break;
    case 'loguser':
    logUser();
    break;
    case 'unlog':
    unLog();
    default:
    header('Location:'.$_SERVER["HTTP_REFERER"]);
}
// Méthodes
function unLog(){
    unset($_SESSION['user']);
    session_destroy();
    session_start();
    $_SESSION['message'] = 'Vous êtes maintenant déconnécté!';
    header('Location:'.$_SERVER["HTTP_REFERER"]);
}
function logUser(){
    //1 connexion
    require('connexion.php');
    //2 écriture de la requête
    $option = [
        'salt'=> 'aaaaaaaaaaaaaaaaaaaaaaa'
    ];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT, $option);
    $sql = 'SELECT * FROM users WHERE pseudo="'.$_POST['pseudo'].'" AND password="'.$pass.'"';
    //3 exexution de la requête
    $req= mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
    //4 traitement des données
    if(mysqli_num_rows($req)>0){
        $user = mysqli_fetch_array($req);
        $_SESSION['user']['id']=$user['id'];
        $_SESSION['user']['pseudo'] = $user["pseudo"];
        $_SESSION['user']['role'] = $user['role'];
        $_SESSION['message'] = $user["prenom"].', vous êtes maintenant bien connecté!';
    }else{
        $_SESSION['message'] = 'Erreur de login et/ou password';
    }
    header("Location:".$_SERVER['HTTP_REFERER']);
}
function addUser(){
    //1
    require('connexion.php');
    //2
    $nom = htmlentities(addslashes(ucfirst(strtolower(trim($_POST['nom'])))));
    $prenom = htmlentities(addslashes(ucfirst(trim($_POST['prenom']))));
    $pseudo = htmlentities(addslashes(trim($_POST['pseudo'])));
    //$pass = md5($_POST['password'])
    $option = [
        'salt'=> 'aaaaaaaaaaaaaaaaaaaaaaa' //AAAAAtention 22 caractères!!!
    ];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT ,$option);
    $sql ='INSERT INTO users (nom, prenom, pseudo, password) VALUES ("'.$nom.'", "'.$prenom.'","'.$pseudo.'","'.$pass.'")';
    //3
    mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
    //4 redirection
    $_SESSION["message"] = "Inscription ok";
    header("Location:../index.php");
}
?>