<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-primary text-light" href="#"> 
    <span class="bi-lightning-charge"></span> <strong>A</strong>dministrador</a>
  <hr>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
</header>

<!--tipos de menus-->

<?php
  
  if($_SESSION['rol'] == '1'){

    require_once 'app/views/page/menuAdministrador.php';

  }else{

  }

?>
