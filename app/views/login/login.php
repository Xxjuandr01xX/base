<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestion de Proyectos</title>
	<!--Bootstrap&jquery-->
	<link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dist/css/estilos.css">
	<script type="text/javascript" src = "assets/dist/js/jquery.min.js"></script>
	<script type="text/javascript" src = "assets/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="assets/plugins/icons/font/bootstrap-icons.css">
	<!--SWAL-->
	<link  rel="stylesheet" href="assets/plugins/sweetalert/sweetalert/sweetalert2.min.css" />
	<script type = "text/javascript" src = "assets/plugins/sweetalert/sweetalert/sweetalert2.all.min.js"></script>
</head>
<body>

	<div class="container-fluid">
		<div class="row clearfix d-flex justify-content-center">
			<div class="col-sm-4 col-md-8 col-lg-4">
				<div class="card shadow mt-5">
					<div class="card-body p-5">

						<h2 class="text-center text-primary"><span class = "bi-sthetoscopio"></span><?php echo $titulo; ?></h2>
						<h5 class="text-center text-primary">Iniciar Session</h5>
						<!--contenedor donde se inicializa el formulario -->
						<div id = "form-container"></div>
						<!---->
						<button id = "btnSubmit" class="btn btn-primary w-100 rounded-0 p-3 mt-4">Ingresar</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id = "alert-container"></div>

	<!--jsLogin-->
	<script type="text/javascript" src = "assets/dash/funciones.js"></script>
	<script type = "text/javascript" src="assets/system/jsLogin.js"></script>
</body>
</html>