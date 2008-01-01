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
              <div class="card-body">

                <?php foreach($cita as $cta){?>
                <!--dataTable-proyectos-->
                <div class="row clearfix d-flex justify-content-center">
                  <div class="col-md-5">
                    <p>
                      <span class = "text-primary bi-"></span>
                      <?php echo $cta->cod_cita; ?>
                    </p>
                  </div>
                  <div class="col-md-5">
                    <p>
                      <span class = "text-primary bi-"></span>
                      <?php echo $cta->motivo; ?>
                    </p>
                  </div>
                </div>

                <div class="row clearfix d-flex justify-content-center">
                  <div class="col-md-5">
                    <p>
                      <span class="bi"></span>
                      <?php echo $cta->fec_cita; ?>
                    </p>
                  </div>
                  <div class="col-md-5">
                    <p>
                      <span class="bi"></span>
                      <?php echo $cta->hor_cita;?>
                    </p>
                  </div>
                </div>

                <div class="row clearfix d-flex justify-content-center">
                  <div class="col-md-5">
                    <p>
                      <span class = " text-primary bi-person"></span>
                      <?php echo  $per->getNombreById($cta->id_paciente_fk)?>
                    </p>
                  </div>
                  <div class="col-md-5">
                    <p>
                      <span class = " text-primary bi-person"></span>
                      <?php echo  $per->getNombreById($cta->id_medico_fk)?>  
                    </p>
                  </div>
                </div>
              <?php } ?>

              <?php foreach($hist as $cta_hist){ ?>
                <div class="row clearfix d-flex justify-content-center">
                  <div class="col-md-10">
                    <?php if($cta_hist->id_estatus_fk == 1){ ?>
                      <p class="text-warning">
                        <span class="bi-clock"></span> PROGRAMADA
                      </p>
                    <?php }else if($cta_hist->id_estatus_fk == 2){ ?>
                      <p class="text-success">
                        <span class="bi-checked"></span> CULMINADA
                      </p>
                    <?php }else{ ?>
                      <p class="text-danger">
                        <span class="bi-exclamation"></span> SIN CULMINAR
                      </p>
                    <?php } ?>
                  </div>
                 <?php } ?>
                </div>

                <div class="row clearfix d-flex justify-content-center">
                  <div class="col-md-10"></div>
                </div>

                <!--BOTONES DE ACCIONES-->
                <div class="row clearfix d-flex justify-content-center">
                  <div class="col-md-5">
                    <button onclick = "" class="btn btn-primary rounded-0">
                      <span class="bi-print"></span>
                      Imprimir
                    </button>
                  </div>
                  <div class="col-md-5">
                    <button onclick = "" class="btn btn-primary rounded-0">
                      <span class="bi-home"></span>
                      Ir a Citas
                    </button>
                  </div>
                </div>                
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
    <script type="text/javascript">
      $(document).ready(function(){

      });
    </script>
  </body>
</html>
