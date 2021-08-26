$(document).ready(function(){

	/**
	 * Interacciones para Gestion de pacientes.
	 * */
	setMaterialDatePicker();

	setDataTablePacientes();

	$("#cell_input").inputmask({
		"mask" : "(9999)-9999999"
	});

	$("#btn-add-paciente").on('click',function(e){
		e.preventDefault();
		agregarNuevoPaciente();
	});

});

function toggleSwitchInputs(){
	document.getElementById('input-male').checked = false;
	document.getElementById('input-female').checked = false;
	$("#input-male").on('change',function(e){
		e.preventDefault();
		if(document.getElementById('input-male').checked == true){
			document.getElementById('input-female').checked = false;
		}
	});
	$("#input-female").on('change',function(e){
		e.preventDefault();
		if(document.getElementById('input-female').checked == true){	
			document.getElementById('input-male').checked = false;
		}
	});
}


function setMaterialDatePicker(){
	$("#fec_nac").bootstrapMaterialDatePicker({
		"format" : "DD/MM/YYYY",
		"time"   : false
	});
	$("#fec_nac").inputmask({
		"mask":"99/99/9999"
	});
}


function getCheckedValue(){
	return document.querySelector('input[type=checkbox]:checked').value;
}

function agregarNuevoPaciente(){
	$.ajax({
		"method" : "POST",
		"url"    : "?op=Pacientes/addPaciente",
		"data"   : {
			"nom"     : $("#nom").val(),
			"ape"     : $("#ape").val(),
			"ced"     : $("#ced_ide").val(),
			"cel"     : $("#cell_input").val(),
			"email"   : $("#email").val(),
			"sex"     : getCheckedValue(),
			"fec_nac" : $("#fec_nac").val(),
			"dir"     : $("#dir").val()
 		},
		success : function(resp){
			if(resp == '1'){
				setBsAlert('al',true,'success','<span class = "bi-check"></span> Operacion Realizada con Exito');
				window.location.href = "?op=Pacientes/Index";
			}else if(resp = "duplicate"){
				setBsAlert('al',true,'warning','<span class = "bi-exclamation"></span> Ya la Persona se Encuentra Registrada en el Sistema.');
			}else{
				setBsAlert('al',true,'danger','<span class = "bi-close"></span> Error al Realizar la Operacion.');
				console.log(resp);
			}
		}
	})
}


let setDataTablePacientes = () => {
	$.ajax({
		"method"   : "POST",
		"url"      : "?op=Pacientes/tablaPacientes",
		BeforeSend : function(){

		},
		success    : function(data){
			$("#datatable-container").html(data);
			$("#pacientes-table").dataTable();
		}
	});
}

let openNewPaciente = () => {
	window.location.href = "?op=Pacientes/nuevo";
}

let openEditarPaciente = (id) => {
	window.location.href = "?op=Pacientes/editar&cod="+id;
}

let eliminarPaciente = (id) => {
	$.post('?op=Pacientes/eliminarPaciente',{"id" : id},function(resp){
		if(resp == "1"){
			swal({
				"type"  : "success",
				"title" : "Listo !",
				"text"  : "Operacion realizada con exito !"
			});
		}else{
			swal({
				"type"  : "error",
				"title" : "Oop´s !",
				"text"  : "Error al realizar operacion."
			});
		}
	});
}