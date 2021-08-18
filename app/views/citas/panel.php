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

              <div class="mt-3 mb-3" id = "cards-container"></div>
          
              <div class="card-body">
                <!--navbar boton para agregar-->
                <nav class = "nav justify-content-end mb-3">
                  <li class="nav-item"><a href="#" id = "add-modal-btn" class=" btn btn-primary rounded-circle btn-sm"> <span class="bi-plus"></span></a></li>
                </nav>

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

    <!-- Modal -->
    <div class="modal rounded-0 fade" id="modal-add-cita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-primary text-center rounded-0">
            <h5 class="modal-title  text-white" id="exampleModalLabel">Registrar Nueva Cita</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id = 'new-cita-container'></div>

            <div class="row clearfix d-flex justify-content-center">
              <div class="col-md-10">
                <button class="btn btn-primary rounded-0 w-100 mt-3" id = "btn-add"><span class="bi-plus"></span> Guardar</button>    
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/system/jsCitasPanel.js"></script>
  </body>
</html>
