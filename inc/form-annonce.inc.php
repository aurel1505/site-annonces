<div class="col-12">
<h1>Ajouter une annonce</h1>
<form action="./core/service-annonce.php?action=add" method="post" enctype="multipart/form-data">
    <input type="hidden" name="author" value="<?php echo $_SESSION['user']['id']; ?>">
    <div class="form-group">
        <label for="titre-add">Titre :</label>
        <input class="form-control" id="titre-add" name="titre" type="text" placeholder="Entrez un titre">
    </div>
    <div class="form-group">
        <label for="desc">Description :</label>
        <textarea class="form-control" id="desc" name="desc" placeholder="Entrez une description"></textarea>
    </div>
    <div class="form-group">
        <label for="txt-plus">Texte complémentaire :</label>
        <textarea class="form-control" id="txt-plus" name="txt-plus" placeholder="Entrez un texte complémentaire"></textarea>
    </div>
    <div class="form-group">
        <label for="img">Image :</label>
        <input id="img" name="img" type="file">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>