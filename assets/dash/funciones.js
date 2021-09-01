function set_visible_modal(id,boolean){
    let myModal = new bootstrap.Modal(document.getElementById(id),{
        'backdrop' : true
    });
    if (boolean == true){
        myModal.show();
    }else{
        myModal.hide();
    }
}


function setBsAlert(id,boolean,color,mensaje){
    const bs_alert = '<div class = " alert rounded-0 shadow alert-' + color + '" role = "alert">' + mensaje+'  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> <div>';
    if(boolean == true){
        $("#" + id).html(bs_alert);
    }else{
        $("#" + id).html(bs_alert);
    }
}

function setAlertToast(container,booblean,text){
    const myToast = '<div aria-live="polite" aria-atomic="true" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">'+
                        '<div id = "toastEl" class="toast align-items-center text-white bg-'+text.color+' border-0" role="alert" aria-live="assertive" aria-atomic="true">'+
                            '<div class="d-flex">'+
                                '<div class="toast-body">'+
                                    '<i class = "bi-'+text.icon+'"></i> '+
                                    text.mensaje
                                '</div>'+
                                '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>'+
                            '</div>'+
                        '</div>'+
                    '</div>';

    $("#"+container).html(myToast);
    const toastEl = document.getElementById('toastEl');
    const ts      = new bootstrap.Toast(toastEl,{
        'autohide' : true,
        'animation': true,
        'delay'    : 3000
    });
    if (booblean == true) {
        ts.show();
    }else{
        ts.hide();
    }
}

function setAlertModal(container, boolean,text){
    const myModal = '<div class="modal rounded-0 fade" id="modalEl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog ">'+
                            '<div class="modal-content">'+
                                '<div class="modal-body text-center">'+
                                '<h1><span class = "bi-' + text.icon + ' text-' + text.color +'"></span></h1></br>'+
                                '<h5>'+text.mensaje+'</h5></br>'+
                                '<button onclick = "'+text.event+'()" class = "btn btn-'+text.color+' w-100 p-2 mt-2 mb-2 rounded-0 shadow">'+text.btn+'</button>'
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
    $("#"+container).html(myModal);

    let objModal = new bootstrap.Modal(document.getElementById('modalEl'),{
        "backdrop" : true
    });

    if (boolean == true) {
        objModal.show();
    }else{
        objModal.hide();
    }
}


function setSpinnerLoader(options){
    const component = '<div class="spinner-border text-'+options.color+'" role="status">'+
                        '<span class="visually-hidden">Loading...</span>'+
                    '</div>';
    $("#"+options.container).html(component);
}

function setGrowingLoader(options){
    const component = '<div class="spinner-grow text-'+options.color+'" role="status">'+
                        '<span class="visually-hidden">Loading...</span>'+
                    '</div>';
    $("#" + options.container).html(component);
    $("#" + options.container).css({
        "display": 'none'
    });
    if (options.booblean == true) {
        $("#" + options.container).css({
            "display": 'block'
        });
    } else {
        $("#" + options.container).css({
            "display": 'none'
        });
    }
}

function setDropdown(container, title, li){
    /**
     * Funcion para crear un dropdown de bootstrap
     */
    let component = '<div class = "btn-group">'+
                    '<div class="dropdown">'+
                        '<button class="btn btn-secondary btn-sm dropdown-toggle rounded-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">'+
                            title+
                        '</button>'+
                        '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
    component += li()+'</ul></div></div>';

    $("#"+container).html(component);
}

function setInputText(options){
    return '<div class = "form-group ">'+
                '<div class = "input-group mb-2 mt-2">'+
                    '<label For="" class = "input-group-text"><i class = "bi-'+options.icon+'"></i></label>'+
                    '<input id = "'+options.id+'" type="'+options.type+'" class = "form-control" placeholder = "'+options.holder+'" />'+
                '</div>'+
            '</div>';
}

function sectionInput(idSection){
    return '<div class = "row clearfix mb-2 mt-2 d-flex justify-content-center" id = "'+idSection+'"></div>';
}

function addCols(section, html){
    $("#"+section).append(html());
}

function formInit(container,id, sections){
    $("#"+container).append('<form id = "'+id+'"></form>');
    for(let i = 0; i < sections.length; i++){
        $("#"+id).append(sections[i]);
    }
}

function inputValid(id, mensaje){
    const input = $("#"+id).val();
    if(input == "" || input.length == 0){
        $("#"+id).addClass('isInvalid');
        $("#"+id).attr('placeholder',mensaje);
        $("#"+id).val("");
    }else{
        return $("#"+id).val();
    }
}

function setBtnSubmit(id,options){
    return '<button id = "'+id+'" class = "btn btn-'+options.color+' w-100 ronded-0">'+options.text+'</button>';
}


///////Tablas de contanido//////
function setTable(container,id,options) {
    /**
     * container => elemento contenedor de la tabla.
     * id        => id de la tabla generada.
     * options   => {
     *      header => "hedader de la tabla con las columnas a mostrar",
     *      rows   => "body  de la tabla con el contenido de esta"
     * }
     */
    $("#"+container).attr('class','table-responsive');
    let myTable = '<table id = "'+id+'" class = "table table-stripped table-hover table-bordered w-100 rounded-0 shadows">'+
                        '<thead class = "bg-'+options.bg+' text-'+options.color+'"><tr>';
    for (let i = 0; i < options.thead.length; i++) {
        myTable += '<td>'+options.thead[i]+'</td>';
    }
    myTable += '</tr></thead>';
    myTable += '<tbody>'+options.rows()+'</tbody></table>';
    $("#"+container).html(myTable);
    $("#"+id).dataTable();
}

//////listas asincronas////////

function ajaxModalList(id, rows, head){
    let table = '<table class = "table table-stripped table-hover table-bordered w-100" id = "'+id+'">'+
                    '<thead>'+
                        '<tr>';
    for(let i = 0; i < head.length; i++){
        table += '<td>'+head[i]+'</td>';
    }
    table += "</tr></thead><tbody>"+rows+"</tbody>";
    return table;
}

function switch_on_off(idOn, idOff){
    //document.getElementById('input-male').checked = false;
    //document.getElementById('input-female').checked = false;
    $("#"+ idOn).on('change',function(e){
        e.preventDefault();
        if(document.getElementById(idOn).checked == true){
            document.getElementById(idOff).checked = false;
        }
    });
    $("#"+ idOff).on('change',function(e){
        e.preventDefault();
        if(document.getElementById(idOff).checked == true){    
            document.getElementById(idOn).checked = false;
        }
    });
}


