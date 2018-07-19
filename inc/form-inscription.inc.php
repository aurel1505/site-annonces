<div class="col-12">
<h1>S'inscrire</h1>
<form action="./core/service-user.php" method="post">
    <input type="hidden" name="action" value="add">
<div class="form-group">
<label>Nom :</label>
<input type="text" name="nom" class="form-control" required="required">
</div>
<div class="form-group">
<label>Prenom :</label>
<input type="text" name="prenom" class="form-control" required="required">
</div><div class="form-group">
<label>Pseudo :</label>
<input type="text" name="pseudo" class="form-control" required="required">
</div><div class="form-group">
<label>Password :</label>
<input type="password" id="password" name="password" class="form-control" required="required">
</div><div class="form-group">
<label>Confirm password :</label>
<input type="password" id="confirm" name="confirm" class="form-control" required="required">
</div>
<button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>