<!-- MODAL CONNEXION -->
<div class="modal" tabindex="-1" role="dialog" id="modal2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ooops</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12">
        <form action="./core/service-user.php?action=loguser" method="post">
            <div class="form-group">
                <label>Pseudo :</label>
                <input type="text" name="pseudo" class="form-control">
            </div>
            <div class="form-group">
                <label>Password :</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit">Connexion</button>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL CONNEXION -->