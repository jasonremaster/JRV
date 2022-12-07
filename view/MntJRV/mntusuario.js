var tabla;

function init(){
    $("#usuario_form").on("submit",function(e){
        guardaryeditar(e);	
    });
    
}

function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#usuario_form")[0]);
    $.ajax({
        url: "../../controller/jrv.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){   
            var jsonData= JSON.parse(datos);
            if(jsonData.success == true){ 

            console.log(datos);
            $('#usuario_form')[0].reset();
            $("#modalmantenimiento").modal('hide');
            $('#usuario_data').DataTable().ajax.reload();

            swal({
                title: "JRV",
                text: "Completado. "+jsonData.messages,
                type: "success",
                confirmButtonClass: "btn-success"
            });
            }
            else{
                swal({
                    title: "JRV",
                    text: jsonData.messages,
                    type: "error",
                    confirmButtonClass: "btn-danger"
                });
            }
        }
    }); 
}

$(document).ready(function(){
    tabla=$('#usuario_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: '../../controller/JRV.php?op=listar',
            type : "post",
            dataType : "json",						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }     
    }).DataTable();
    
    $.post("../../controller/usuario.php?op=combo_usu",function(data, status){
        $('#jrv_usu').html(data);
    });
});

function editar(jrv_id){
    $('#mdltitulo').html('Editar Registro');

    $.post("../../controller/jrv.php?op=mostrar", {jrv_id : jrv_id}, function (data) {
        data = JSON.parse(data);
        $('#jrv_id').val(data.jrv_id);
        $('#jrv_nom').val(data.jrv_nom);
        $('#jrv_cant').val(data.jrv_cant);
        $('#jrv_usu').val(data.jrv_usu);
        console.log(data.jrv_usu);
        $('#sex_id').val(data.sex_id).trigger('change');
        console.log(data.sex_id)
    }); 

    $('#modalmantenimiento').modal('show');
}

function eliminar(usu_id){
    swal({
        title: "HelpDesk",
        text: "Esta seguro de Eliminar el registro?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {
            $.post("../../controller/jrv.php?op=eliminar", {usu_id : usu_id}, function (data) {

            }); 

            $('#usuario_data').DataTable().ajax.reload();	

            swal({
                title: "HelpDesk!",
                text: "Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

$(document).on("click","#btnnuevo", function(){
    $('#usu_id').val('');
    $('#mdltitulo').html('Nuevo Registro');
    $('#usuario_form')[0].reset();
    $('#modalmantenimiento').modal('show');
});

init();