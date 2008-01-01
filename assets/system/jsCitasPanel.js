$(document).ready(function(){

	setTableCitas();
	setFormAddCita();
	form_editar_cita();

	$("#add-modal-btn").on('click',function(e){
		e.preventDefault();
		set_visible_modal('modal-add-cita',true);

	});

	$("#btn-add").on('click',function(e){
		e.preventDefault();
		registrarNuevaCita();
	});


});

let delCita = (id) => {
	/**
	  * Funcion para eliminar una cita de la base de datos
	  */
	$.post('?op=Citas/dropCita',{"id" : id},function(data){
		if(data == '1'){
			swal({
				"type" : "success",
				"title" : "Listo !",
				"text" : "Operacion Realizada con Exito !"
			});
			setTableCitas();
		}else{
			swal({
				"type" : "error",
				"title" : "Oop´s",
				"text" : "Error al Realizar la Operacion."
			});
		}
	});
}

let form_editar_cita = () => {
	let motivo_cod    = sectionInput('edt_motivo_cod');
	let fec_hor       = sectionInput('edt_fec_hor');
	let status        = sectionInput('edt_status');
	let med_pac       = sectionInput('edt_med_pac');
	let sections      = [motivo_cod,fec_hor,status,med_pac];

	formInit('edit_cita_container','edit_cita',sections);

	addCols('edt_motivo_cod',function(){
		return '<div class = "col-md-5">'+
			setInputText({
				"icon"   : "play-circle-fill",
				"type"   : "text",
				"id"     : "edt_cod",
				"holder" : "Codico de la Cita"
			})
		+'</div>'+
		'<div class = "col-md-5">'+
			setInputText({
				"icon"   : "textarea-resize",
				"type"   : "text",
				"id"     : "edt_mot",
				"holder" : "Indique el Motivo de la Cita"
			})
		+'</div>';
	});

	addCols('edt_fec_hor',function(){
		return '<div class = "col-md-5">'+
			setInputText({
				"icon"   : "calendar-fill",
				"type"   : "text",
				"id"     : "edt_fec_cta",
				"holder" : "Fecha de la Cita"
			})
		+'</div>'+
		'<div class = "col-md-5">'+
			setInputText({
				"icon"   : "clock-fill",
				"type"   : "text",
				"id"     : "edt_hor_cta",
				"holder" : "Hora de la Cita"
			})
		+'</div>';
	});

	addCols('edt_med_pac',function(){
		return '<div class = "col-md-5">'+"<select class = 'form-control' id = 'edt_select_pacientes'></select>"+'</div>'+
			   '<div class = "col-md-5">'+"<select class = 'form-control' id = 'edt_select_medico'></select>"+'</div>';
	});

	$("#edt_hor_cta").inputmask({
		"mask" : "99:99:99"
	});

	$("#edt_fec_cta").inputmask({
		"mask" : "99/99/9999"
	});

	 $("#edt_fec_cta").bootstrapMaterialDatePicker({
	      "format"     : "DD/MM/YYYY",
	      "time"       : false,
	      "clearButton": false,
	      "cancelText" : " ",
	      "okText"     : "Aceptar",
	      "monthPicker" : false
	  });

	 $("#edt_hor_cta").bootstrapMaterialDatePicker({
	      "format"     : "HH:MM:00",
	      "date"       : false,
	      "clearButton": false,
	      "cancelText" : "atras",
	      "okText"     : "Aceptar",
	      "monthPicker" : false
	  });

	$("#edt_cod").inputmask({
		"mask" : "CT-9999999"
	});
}

let dateLabel = (date) =>{
	let label = date.split('-');
	return label[2]+"/"+label[1]+"/"+label[0]; 
}
	
let editCita = (id) => {
	/**
	  * Funcion para desplegar el formulario de editar cita
	  * en una ventana modal.
	  */
	

	set_visible_modal('modal-edit-cita',true);
	edt_select_pacientes(id);
	edt_select_medicos(id);
	$.post('?op=Citas/formEdit',{"id":id},function(json){
		json = $.parseJSON(json);
		console.log(json);

		$.each(json,function(i, obj){
			$("#edt_cod").val(obj.cod_cita);
			$("#edt_mot").val(obj.motivo);
			$("#edt_fec_cta").val(dateLabel(obj.fec_cita));
			$("#edt_hor_cta").val(obj.hor_cita);
			$("#btn-edit").attr('onclick','sedDataEdit('+obj.id+');');
		});
	
	});

}

let openDetalleCita = () => {
	window.location.href = "?op=Citas/verDetalleCita&cod="+id;
}

let sedDataEdit = (id) =>{
	let data = {
		"id"            : id,
		"edt_cod" 		: $("#edt_cod").val(),
		"edt_mot" 		: $("#edt_mot").val(),
		"edt_fec_cita"  : $("#edt_fec_cta").val(),
		"edt_hor_cita"  : $("#edt_hor_cta").val()
	};
	$.post('?op=Cita/updateCita', data, function(resp){
		if(resp == '1'){
			swal({
				"type" : "success",
				"title" : "Listo !",
				"text": "Operacion realizada con exito !"
			});
		}else if(resp == '0'){
			swal({
				"type" : "error",
				"title" : "Oop´s",
				"text": "Error al realizar operacion."
			});
		}else{
			console.log(resp);
		}
	});
}

let setTableCitas = () => {
	$.ajax({
		"url"    : "?op=Citas/tableCitas",
		"method" : "POST",
		BeforeSend : function(){
			setSpinnerLoader({
				"color"	    : "primary",
				"component" : "datatable-container"
			});
		},
		success  : function(data){
			$("#datatable-container").html(data);
			$("#citas-table").dataTable();
		}
	});
}

let setFormAddCita = () =>{
	let motivo_cod    = sectionInput('motivo_cod');
	let fec_hor       = sectionInput('fec_hor');
	let status        = sectionInput('status');
	let med_pac       = sectionInput('med_pac');

	let sections      = [motivo_cod,fec_hor,status,med_pac];

	formInit('new-cita-container','newCita',sections);

	addCols('motivo_cod',function(){
		return '<div class = "col-md-5">'+
			setInputText({
				"icon"   : "play-circle-fill",
				"type"   : "text",
				"id"     : "cod",
				"holder" : "Codico de la Cita"
			})
		+'</div>'+
		'<div class = "col-md-5">'+
			setInputText({
				"icon"   : "textarea-resize",
				"type"   : "text",
				"id"     : "mot",
				"holder" : "Indique el Motivo de la Cita"
			})
		+'</div>';
	});

	addCols('fec_hor',function(){
		return '<div class = "col-md-5">'+
			setInputText({
				"icon"   : "calendar-fill",
				"type"   : "text",
				"id"     : "fec_cta",
				"holder" : "Fecha de la Cita"
			})
		+'</div>'+
		'<div class = "col-md-5">'+
			setInputText({
				"icon"   : "clock-fill",
				"type"   : "text",
				"id"     : "hor_cta",
				"holder" : "Hora de la Cita"
			})
		+'</div>';
	});


	addCols('med_pac',function(){
		return '<div class = "col-md-5">'+selectPacientes()+'</div>'+
			   '<div class = "col-md-5">'+selectMedicos()+'</div>';
	});

	$("#hor_cta").inputmask({
		"mask" : "99:99:99"
	});

	$("#fec_cta").inputmask({
		"mask" : "99/99/9999"
	});

	 $("#fec_cta").bootstrapMaterialDatePicker({
	      "format"     : "DD/MM/YYYY",
	      "time"       : false,
	      "clearButton": false,
	      "cancelText" : " ",
	      "okText"     : "Aceptar",
	      "monthPicker" : false
	  });

	 $("#hor_cta").bootstrapMaterialDatePicker({
	      "format"     : "HH:MM:00",
	      "date"       : false,
	      "clearButton": false,
	      "cancelText" : "atras",
	      "okText"     : "Aceptar",
	      "monthPicker" : false
	  });

	$("#cod").inputmask({
		"mask" : "CT-9999999"
	})
}

let registrarNuevaCita = () => {
	let codigo 			= $("#cod").val();
	let motivo 			= $("#mot").val();
	let fecha  			= $("#fec_cta").val();
	let hora   			= $("#hor_cta").val();
	let selectPacientes = $("#selectPacientes").val();
	let selectMedicos   = $("#medicosSelect").val();


	let data = {
		"codigo"			: codigo,
		"motivo"			: motivo,
		"fecha"				: fecha,
		"hora"				: hora,
		"selectPacientes"	: selectPacientes,
		"selectMedicos"		: selectMedicos
	};

	$.post('?op=Citas/addCita', data, function(resp){
		console.log(resp);
		if(resp == '1'){
			swal({
				"title" : 'Listo!',
				"type"  : 'success',
				"text"  : 'Operacion Realizada con Exito !'
			});
			setTableCitas();
		}else if(resp == '0'){
			swal({
				"title" : 'Oop´s',
				"type"  : 'error',
				"text"  : 'Error al Realizar Operacion !'
			});
		}else if(resp == 'duplicate'){
			swal({
				"title" : 'Oop´s',
				"type"  : 'warning',
				"text"  : 'Codigo de Cita Duplicado'
			});
		}else{
			console.log(resp);
		}
	});
}

let selectPacientes = () =>{
	let select = '<select id = "selectPacientes" class = "form-control"><option value = "0">- SELECCIONE PACIENTE -</option></select>';
	$.post('?op=Citas/getPacientesList',function(data){
		$("#selectPacientes").append(data);
	});
	return select;
}

let selectMedicos = () =>{
	let select = '<select id = "medicosSelect" class = "form-control"><option value = "0">- SELECCIONE MEDICO -</option></select>';
	$.post('?op=Citas/getMedicosList',function(data){
		$("#medicosSelect").append(data);
	});
	return select;
}

let edt_select_pacientes = (id) =>{
	$.post('?op=Citas/citaPacientes',{"id":id},function(data){
		$("#edt_select_pacientes").html(data);
	});
}
let edt_select_medicos = (id) => {
	$.post('?op=Citas/citaMedicos',{"id":id},function(data){
		$("#edt_select_medico").html(data);
	});
}