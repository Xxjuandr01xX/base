$(document).ready(function(){
	const sec_username = sectionInput('user');
	const sec_password = sectionInput('pwd');
	const sec_submit   = sectionInput('logIn');
	const secciones    = [sec_username,sec_password,sec_submit];
	formInit('login-form-container','login-form', secciones);

	addCols('user',function(){
		return '<div class = "col-md-8">'+
			setInputText({
				"id" : "nom_user",
				"type" : "text",
				"icon" : "person-fill",
				"holder" : "Nombre de Usuario"
			})
		+'</div>';
	});

	addCols('pwd',function(){
		return '<div class = "col-md-8">'+
			setInputText({
				"id" : "pwd_user",
				"type" : "password",
				"icon" : "lock-fill",
				"holder" : "Contraseña"
			})
		+'</div>';
	});

	addCols('logIn',function(){
		return '<div class = "col-md-10">'+
			setBtnSubmit('btn-logIn', {
				'color' : "primary",
				"text"  : "Inicar Session"
			})
		+'</div>';
	});

	$('#btn-logIn').on('click',function(e){
		e.preventDefault();
		let user = $('#nom_user').val();
		if(user == '' || user.length == 0){
			setAlertToast('toast-container',true,{
				"color"   : "warning",
				"icon"    : "exclamation-octagon-fill",
				"mensaje" : "Ingrese su nombre de usuario porfavor." 
			});
		}
	});
});