<?php require_once 'app/views/page/head.php'; ?>
<?php require_once 'app/views/page/header.php'; ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        
      </div>
      <!--contenido-->
      <div class="container-fluid">
        <div class="row clearfix d-flex justify-content-center">
          <div class="col-md-10">
            <div id="al"></div>
            <div class="card shadow rounded-0">
              <div class="card-header bg-primary text-white rounded-0">
                <h4><?php echo $titulo; ?></h4>
              </div>
              <div class="card-body">
               <?php foreach($data as $pac){?>
               <div class="row clearfix d-flex justify-content-center mb-2">
                 <div class="col-md-5">
                   <div class="form-group">
                     <div class="input-group">
                       <label for="" class="input-group-text"><span class="bi-person-fill text-primary"></span></label>
                       <input type="text" id="nom" class="form-control" placeholder="Escriba su Nombre" value="<?php echo $pac->nombre; ?>">
                     </div>
                   </div>
                 </div>
                 <div class="col-md-5">
                   <div class="form-group">
                     <div class="input-group">
                       <label for="" class="input-group-text"><span class="bi-person-fill text-primary"></span></label>
                       <input type="text" id="ape" class="form-control" placeholder="Escriba su Apellido" value="<?php echo $pac->apellido; ?>">
                     </div>
                   </div>
                 </div>
               </div>

               <div class="row clearfix d-flex justify-content-center mb-2">
                 <div class="col-md-10">
                     <div class="form-group">
                       <div class="input-group">
                         <label for="" class="input-group-text"><span class="bi-credit-card-2-front text-primary"></span></label>
                         <input type="text"  id="ced_ide" class="form-control" placeholder="V-XXXXXXXX" value="<?php echo $pac->ced_ide; ?>">
                       </div>
                     </div>
                 </div>
               </div>

               <div class="row clearfix d-flex justify-content-center mb-2">
                 <div class="col-md-5">
                   <div class="form-group">
                     <div class="input-group">
                       <label for="" class="input-group-text">
                         <span class="bi-phone text-primary"></span>
                       </label>
                       <input type="text" id="cell_input" class="form-control" placeholder="(xxxx)-xxxxxxx" value="<?php echo $pac->telefono; ?>">
                     </div>
                   </div>
                 </div>
                 <div class="col-md-5">
                   <div class="form-group">
                     <div class="input-group">
                       <label for="" class="input-group-text">
                         <span class="bi-envelope-fill text-primary"></span>
                       </label>
                       <input type="text" id="email" class="form-control" placeholder="Correo Electronico" value="<?php echo $pac->correo; ?>">
                     </div>
                   </div>
                 </div>
               </div>

               <div class="row clearfix d-flex justify-content-center mb-3 mt-3">
                 <div class="col-md-5">

                   <div class="form-check form-switch mb-3">
                     <input type="checkbox" value = "1" class="form-check-input" id = "input-male">
                     <label class="form-check-label">Masculino </label>
                   </div>

                   <div class="form-check form-switch mb-3">
                     <input type="checkbox" value = "0" class="form-check-input" id = "input-female">
                     <label class="form-check-label">Femenino </label>
                   </div>

                 </div>
                 <div class="col-md-5">
                   <div class="form-group">
                     <div class="input-group">
                       <label for="" class="input-group-text"><span class="bi-calendar-fill text-primary"></span></label>
                       <input type="text" id="fec_nac" class="form-control" placeholder="XX/XX/XXXX" value="<?php echo sqlToLabel($pac->fec_nac); ?>">
                     </div>
                   </div>
                 </div>
               </div>

               <div class="row clearfix d-flex justify-content-center mb-2">
                 <div class="col-md-10">
                     <div class="form-group">
                       <div class="input-group">
                         <label for="" class="input-group-text text-primary"><span class="bi-geo-alt-fill"></span></label>
                         <textarea placeholder = "Direccion" id = "dir" class="form-control" cols = "3" rows = "3"></textarea>
                       </div>
                     </div>
                 </div>
               </div>

               <div class="row clearfix d-flex justify-content-center mb-3 mt-3">
                  <div class="col-md-5">
                      <button  onclick = "openPacientes();" class="btn btn-primary rounded-0 w-100">
                        <span class="bi-home"></span> Ir al Pacientes
                      </button>
                  </div>

                  <div class="col-md-5">
                      <button onclick="editarPaciente(<?php echo $_GET['cod'];?>);"  class="btn btn-warning rounded-0 w-100">
                        <span class="bi-pencil-square"></span> Editar
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
    <script src="assets/system/jsPacientes.js"></script>

    <script>
      var sexo = '<?php echo $pac->sexo;?>';
      if(sexo == '1'){

        document.getElementById('input-male').checked = true;
      }else if(sexo == '0'){

        document.getElementById('input-female').checked = true;
      }
      toggleSwitchInputs();
      document.getElementById('dir').value = "<?php echo $pac->direccion; ?>";
    </script>
  </body>
  <?php } ?>
</html>

