<script type="text/javascript" src="../Js/Cita.js?rev=<?php echo time(); ?>"></script>
<form autocomplete="false" onsubmit="return false">
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Mantenimiento de Citas</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-widget="remove"><i
                        class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                <div class="col-lg-10">
                    <div class="input-group">
                        <input type="text" class="global_filter form-control" id="global_filter"
                            placeholder="Ingresar dato a buscar">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i
                            class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
                </div>
            </div>
            <table id="tabla_cita" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nro</th>
                        <th>Paciente</th>
                        <th>Medico</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <!-- <tfoot>
          <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Sexo</th>
            <th>Estado</th>
            <th>Information</th>
          </tr>
        </tfoot> -->
            </table>
        </div>
    </div>
</div>
</form>

<!-- Completo modal -->
<div class="modal lg" id="modal_registro" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Registro de Citas</b></h4>
            </div>

            <div class="modal-body">
            <div class="row">
                    <div class="col-lg-12">
                            <label for="">Paciente</label>
                            <select class="js-example-basic-single" name="state" id="cbm_paciente" style="width:100%;">    
                            </select><br><br>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Doctor</label>
                            <select class="js-example-basic-single" name="state" id="cbm_doctor" style="width:100%;"> 
                            </select><br>
                        </div>
                        <div class="col-lg-12"><br>
                            <label for="">Descripci&oacute;n</label>
                            <textarea name="" id="txt_descripcion"  rows="4" class="form-control" style="resize:none"></textarea>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registrar_Cita()"><i class="fa fa-check">
                        <b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close">
                        <b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
    </div>
</div>
<!-- Hasta acaaa -->

<!-- Esto es mio del video 21 -->
<div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Editar Cita</b></h4>
            </div>

            <div class="modal-body">
                
                <div class="col-lg-12">
                    <!-- Verificar que traiga el id en el input -->
                    <input type="text" id="txt_idinsumo">
                    <label for="">Nombre</label>
                    <input type="text" id="txt_insumo_actual_editar" placeholder="Ingrese insumo medico" maxlength="50"
                        onkeypress="return soloLetras(event)" hidden>
                    <input type="text" class="form-control" id="txt_insumo_nuevo_editar"
                        placeholder="Ingrese insumo medico" maxlength="50" onkeypress="return soloLetras(event)">
                    <br>
                </div>
                <div class="col-lg-12">
                    <label for="">Stock</label>
                    <input type="text" class="form-control" id="txt_stock_editar" placeholder="Ingrese stock"
                        maxlength="5" onkeypress="return soloNumeros(event)"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Estatus</label>
                    <select class="js-example-basic-single" name="state" id="cbm_estatus_editar" style="width:100%;">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                        <option value="AGOTADO">AGOTADO</option>
                    </select><br><br>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Modificar_insumo()"><i class="fa fa-check">
                        <b>&nbsp;MODIFICAR</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close">
                        <b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
    </div>
</div>
<!-- Hasta acaaa -->

<script>
    $(document).ready(function () {
        listar_cita();
        listar_paciente_combo();
        listar_doctor_combo();
        $('.js-example-basic-single').select2();
        $("#modal_registro").on('shown.bs.modal', function () {
            $("#txt_insumo").focus();
        })
    });

    $('.box').boxWidget({
        animationspeed: 500,
        collapseTrigger: '[data-widget="colapse"]',
        removeTrigger: '[data-widget="remove"]',
        collapseIcon: 'fa-minus',
        expandIcon: 'fa-plus',
        removeIcon: 'fa-times'
    })

</script>