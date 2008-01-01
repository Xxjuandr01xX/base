<?php require_once 'app/views/page/head.php'; ?>
<?php require_once 'app/views/page/header.php'; ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">

        
      </div>
      <!--contenido-->
      <div class="container-fluid">
        
        <div class="row clearfix d-flex justify-content-center">

          <div class="col-md-10">
        
            <div class="card shadow rounded-0">
              <div class="card-header bg-primary text-white rounded-0">
                <h4><?php echo $titulo; ?></h4>
              </div>

              <nav class="nav d-flex justify-content-end">
                <li class="nav-item">
                  <a href="?op=Medicos/nuevo" class="rounded-pill btn btn-primary btn-sm mt-3 ml-4">
                    <strong> <span class="bi-plus"></span> </strong>
                    REGISTRAR
                  </a>
                </li>
              </nav>

              <div class="card-body">
                <!--dataTable-proyectos-->
                <div id = "datatable-container" class="table-responsive text-center"></div>
              </div>


            </div>
          </div>
        </div>
      </div>
      <!--contenido-->
    </main>
  </div>
</div>
    <div id="alert-container"></div>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/system/jsMedicos.js"></script>
  </body>
</html>