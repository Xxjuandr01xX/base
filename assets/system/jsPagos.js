$(document).ready(function(){
	setDataTablePagos();
});

function setDataTablePagos(){
	$.post("?op=Pagos/listadoPagos",function(data){
		$("#pagos-container").html(data);
		$("#pagos-dataTable").dataTable();
	});
}