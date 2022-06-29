<?php include 'vistas/plantilla/encabezado.php'; ?>
<div class="wrapper">
    <?php 
        require 'vistas/plantilla/nav.php'; 
        require 'vistas/plantilla/menulateral.php';
        require 'vistas/plantilla/contenidotitulo.php';
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>
        
        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Página no encontrada.</h3>

          <p>
            El servidor no pudo encontrar el contenido solicitado.
            Puede retornar a la pagina de inicio <a href="/inicio">Inicio</a>
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
<?php include 'vistas/plantilla/pie.php'; ?>
<!-- Aqui agregar script adicionales -->
<?php include 'vistas/plantilla/script.php'; ?>