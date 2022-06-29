<?php 
    require_once 'views/template/head.php'; 
    require_once 'views/template/nav.php'; // de
    //$n1 = 16;
?>
    
    <main role="main">
        <hr>
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Pedidos a Llevar</h1>
          <p>Clase portales II </p>
          <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
          <?php include 'views/pedidos_llevar/nuevo.php' ?>
        </div>
      </div>
    
      

    </main>

    <?php require_once 'views/template/footer.php'; ?>   