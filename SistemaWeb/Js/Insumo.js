var tableinsumo;

function listar_insumo() {
    tableinsumo = $("#tabla_insumo").DataTable({
        "ordering": false,
        "bLengthChange": false,
        "searching": { "regex": false },
        "lenghtMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "ALL"]],
        "pageLenght": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../Controlador/insumo/controlador_insumo_listar.php",
            type: 'POST'
        },
        "order": [[1, 'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "Name" }, //-------En el video es insumo_nombre-------//
            { "data": "Cant" }, //-------En el video es insumo_stock-------//
            { "data": "TypeItemName" }, //-------Aca podemos poner el nombre del IdTypeItem-------//
            {
                "data": "Status", //-------En el video es insumo_estatus-------//
                render: function (data, type, row) {
                    if (data == 'ACTIVO') {
                        return "<span class='label label-success'>" + data + "</span>";
                    }
                    if (data == 'INACTIVO') {
                        return "<span class='label label-danger'>" + data + "</span>";
                    }
                    if (data == 'AGOTADO') {
                        return "<span class='label label-black' style='background:black'>" + data + "</span>";
                    }
                }
            },
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>" }
        ],
        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_insumo_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
    tableinsumo.on('draw.dt', function () {
        var PageInfo = $('#tabla_insumo').DataTable().page.info();
        tableinsumo.column(0, { page: 'current' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });
}

$('#tabla_insumo').on('click', '.editar', function () {
    var data = tableinsumo.row($(this).parents('tr')).data();//deteccion de fila al hacer click y captura de datos
    if (tableinsumo.row(this).child.isShown()) {
        var data = tableinsumo.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
    $("#modal_editar").modal('show');
    $("#txt_idinsumo").val(data.IdItem);
    $("#txt_insumo_actual_editar").val(data.Name);
    $("#txt_insumo_nuevo_editar").val(data.Name);
    $("#txt_stock_editar").val(data.Cant);
    $("#cbm_estatus_editar").val(data.Status).trigger("change");    
    $("#cbm_item_editar").val(data.IdTypeItem).trigger("change");
})

function AbrirModalRegistro() {
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registro").modal('show');
}

function filterGlobal(){
    $('#tabla_insumo').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

function Registrar_Insumo(){
    var insumo = $("#txt_insumo").val();
    var stock = $("#txt_stock").val();
    var estatus = $("#cbm_estatus").val();
    var item=$("#cbm_item").val();
    if(stock<0){
        return Swal.fire("Mensaje de advertencia", "El stock no puede ser vacio","warning");
    }
    if(insumo.length == 0 || stock.length == 0 || estatus.length == 0 || item.length == 0){
        Swal.fire("Mensaje de advertencia", "Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../Controlador/insumo/controlador_insumo_registro.php",
        type:'POST',
        data:{
            in:insumo,
            st:stock,
            es:estatus,
            item:item
        }
    }).done(function(resp){
        console.log(resp);
        if(resp>0){
            if(resp==1){
                $("#modal_registro").modal('hide');
                listar_insumo();
                LimpiarCampos();
               return Swal.fire("Mensaje de confirmacion", "Datos guardados correctamente","success");         
            }
            else{
                LimpiarCampos();
               return Swal.fire("Mensaje de advertencia", "El insumo ya existe!","warning");
            }
        }
        else{
            return Swal.fire("Mensaje de error", "No se pudo completar el registro","error");
        }
    })
}

function LimpiarCampos(){
    $("#txt_insumo").val("");
    $("#txt_stock").val("");
}


function Modificar_Insumo(){
    var id = $("#txt_idinsumo").val();
    var insumoactual = $("#txt_insumo_actual_editar").val();
    var insumonuevo = $("#txt_insumo_nuevo_editar").val();
    var stock = $("#txt_stock_editar").val();    
    var estatus = $("#cbm_estatus_editar").val();
    var item = $("#cbm_item_editar").val();   
    if(stock<0){
         return Swal.fire("Mensaje de advertencia", "El stock no puede ser vacio","warning");
    }
    if(insumoactual.length == 0 || insumonuevo.length == 0 || stock.length == 0 || estatus.length == 0 || item.length == 0){

        Swal.fire("Mensaje de advertencia", "Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../Controlador/insumo/controlador_insumo_modificar.php",
        type:'POST',
        data:{
            id: id,
            inActual:insumoactual,
            inNuevo:insumonuevo,
            st:stock,
            es:estatus,
            item:item
        }
    }).done(function(resp){
        console.log("la rpta es: " + resp);
        if(resp>0){
            if(resp==1){
                $("#modal_editar").modal('hide');
                listar_insumo();
                Swal.fire("Mensaje de confirmacion", "Datos actualizados correctamente","success");         
            }
            else{
                return  Swal.fire("Mensaje de advertencia", "El insumo ya existe!","warning");
            }
        }
        else{
            Swal.fire("Mensaje de error", "No se pudo completar el registro","error");
        }
    })
}

function listar_combo_item() {
    $.ajax({
        "url": "../Controlador/insumo/controlador_combo_item_listar.php",
        "type": 'POST'
    }).done(function (resp) {
        console.log(resp);
        var data = JSON.parse(resp);
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
            }
            $("#cbm_item").html(cadena);
            $("#cbm_item_editar").html(cadena);
        } else {
            cadena += "<option value=''No se Encontraron Registros</option>";
            $("#cbm_item").html(cadena);
            $("#cbm_item_editar").html(cadena);
        }
    })
}