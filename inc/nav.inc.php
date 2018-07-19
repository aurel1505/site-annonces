<nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Annonces</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Galerie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <?php
          if(!empty($_SESSION['user']['id'])){
            echo '<a class="nav-link btn btn-primary" href="publier.php" id="publish">Publier</a>';
          }else{
            echo '<button class="btn btn-primary" data-toggle="modal" data-target="#modal">Publier</button>';
          }
        ?>
      </li>
      <li class="nav-item">
      <?php
          if(!empty($_SESSION['user']['id'])){
        echo '<a href="./core/service-user.php?action=unlog" class="btn btn-danger">Se déconnecter</a>';
          }else{
      echo '<button class="btn btn-primary ml-2" data-toggle="modal" data-target="#modal2">Se connecter</button>';
    }
      ?>
      </li>
    </ul>
  </div>
</nav>
