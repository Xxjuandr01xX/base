$(document).ready(function(){

	setTableCitas();
	setFormAddCita();


	$("#add-modal-btn").on('click',function(e){
		e.preventDefault();
		set_visible_modal('modal-add-cita',true);

	});

	$("#btn-add").on('click',function(e){
		e.preventDefault();
		registrarNuevaCita();
	});


});


let setTableCitas = () => {
	$.ajax({
		"url"    : "?op=Citas/tableCitas",
		"method" : "POST",
		BeforeSend : function(){
			setSpinnerLoader({
				"color"	    : "primary",
				"coponente" : "datatable-container"
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
	      "format"     : "HH:MM:SS",
	      "date"       : false,
	      "clearButton": false,
	      "cancelText" : " ",
	      "okText"     : "Aceptar",
	      "monthPicker" : false
	  });

	$("#cod").inputmask({
		"mask" : "CT-999999"
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

