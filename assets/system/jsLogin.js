$(document).ready(function(){

	setLoginForm('form-container');

	$("#btnSubmit").on('click',function(e){
		/**
		 * Funcion para realizar proceso de inicio de session.
		 * */
		e.preventDefault();
		sendDataLogin();
	});

});


let setLoginForm = (continer_form) => {
	// funcion para desplagar el formulariode inicio de session
	let user = sectionInput('nombreUsuario');
	let pswd = sectionInput('contraseña');
	formInit(continer_form,'loginForm',[user,pswd]);
	addCols('nombreUsuario',function(){
		return '<div class = "col-md-8>"'+
			setInputText({
				"id"     : 'userName',
				"type"   : 'text',
				"icon"   : 'person-circle',
				"holder" : 'Nombre de Usuario'
			})
		+'</div>';
	});
	addCols('contraseña',function(){
		return '<div class = "col-md-8>"'+
			setInputText({
				"id"     : 'pswd',
				"type"   : 'password',
				"icon"   : 'lock',
				"holder" : 'contraseña'
			})
		+'</div>';
	});  
}

let sendDataLogin = () => {
	let username = $("#userName").val();
	let password = $("#pswd").val();
	if(username == '' || username.length == 0){
		$("#userName").focus();
		$("#userName").val("");
		setAlertToast('alert-container',true,{
			"color"   : "warning",
			"icon"    : "exclamation-diamond-fill",
			"mensaje" : "Asegurece de Llenar el campo Nombre de Usuario Correctamente !"
		});
	}else if(password == '' || password.length == 0){
		$("#pswd").focus();
		$("#pswd").val("");
		setAlertToast('alert-container',true,{
			"color"   : "warning",
			"icon"    : "exclamation-diamond-fill",
			"mensaje" : "Asegurece de Llenar el campo Contraseña Correctamente !"
		});
	}else{
		$.ajax({
			"url"    : "?op=Login/procesar",
			"method" : "POST",
			"data"   : {
				"user" : $("#userName").val(),
				"pass" : $("#pswd").val()
			},
			success : function(data){
				if(data == "1"){
					window.location.href = "?op=Citas/index";
				}else if(data == "0"){
					swal({
						"type" : "error",
						"title" : "Oop´s",
						"text"  : "Verifique su Usuario y Contraseña y Vuelva a Intentar !"
					});
				}else{
					console.log(data);
				}
			}
		});
	}

}

