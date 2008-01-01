<?php require_once 'app/views/page/head.php'; ?>
<?php require_once 'app/views/page/header.php'; ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        
      </div>
      <!--contenido-->
      <div class="container-fluid">
        <div class="row clearfix d-flex justify-content-center">
          <!--contenedor para las alertas del sistema-->
          <div id="al"></div>

          <div class="col-md-7">
            <div class="card shadow rounded-0">
              <div class="card-header bg-primary text-white rounded-0"><h4><?php echo $titulo; ?></h4></div>
              <div class="card-body">

                <div class="row d-flex justify-content-center mb-5">
                  <div class="col-md-10">
                    <button class="btn btn-primary w-100 p-3" id = "btn-paciente">
                      <span class="bi-person-circle"></span> - Seleccionar Paciente -
                    </button>
                  </div>
                </div>

                <div class="row d-flex justify-content-center mb-5">
                  <div class="col-md-5">
                    <div class="form-group">
                      <div class="input-group">
                        <label for="" class="input-group-text"><span class="bi-calendar-fill text-primary"></span></label>
                        <input type="text" id="fecha" placeholder = "Fecha de Pago" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <div class="input-group">
                        <label for="" class="input-group-text"><span class="bi-clock-fill text-primary"></span></label>
                        <input type="text" id="hora" placeholder = "Hora de" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix d-flex justify-content-center mb-5">
                  <div class="col-md-5">
                    <div class="form-group">
                      <div class="input-group">
                        <label for="" class="input-group-text"><span class="bi-chat-left-text-fill text-primary"></span></label>
                        <input type="text" id="motivo" class="form-control" placeholder="Motivo del Pago">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="form-group">
                      <div class="input-group">
                        <label for="" class="input-group-text"><span class="bi-cash text-primary"></span></label>
                        <input type="number" id="monto" class="form-control" placeholder="Monto de Pago">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix d-flex justify-content-center">
                  <div class="col-md-10">
                    <button class="btn btn-primary w-100 p-3">
                      <span class="bi-save"></span> Registrar Pago
                    </button>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card rounded-0 shadow">
              <div class="card-header rounded-0 bg-primary text-white"><h4>Listado de Pagos</h4></div>
              <div class="card-body">
                <div class="table-responsive" id="pagos-container"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!--contenido-->
    </main>
  </div>
</div>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/system/jsPagos.js"></script>
  </body>
</html>