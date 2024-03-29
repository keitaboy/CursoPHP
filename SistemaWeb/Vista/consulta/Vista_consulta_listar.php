<script type="text/javascript" src="../Js/Consulta.js?rev=<?php echo time(); ?>"></script>
<form autocomplete="false" onsubmit="return false">
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Mantenimiento de Consulta Medica</h3>
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
                <div class="col-lg-4">
                        <label for="">Fecha Inicio</label>
                        <input type="date" id="txt_fechainicio" class="form-control"><br>
                </div>
                <div class="col-lg-4">
                        <label for="">Fecha Fin</label>
                        <input type="date" id="txt_fechafin" class="form-control"><br>
                </div>
                <div class="col-lg-2">
                    <label for="">&nbsp;</label><br>
                    <button class="btn btn-success" style="width:100%" onclick="listar_consulta()"><i
                            class="glyphicon glyphicon-search"></i>Buscar</button><br><br>
                </div>
                <div class="col-lg-2">
                    <label for="">&nbsp;</label><br>
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i
                            class="glyphicon glyphicon-plus"></i>Nuevo Registro</button><br><br>
                </div>
            </div>
            <table id="tabla_consulta_medica" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nro Doc. Propietario</th>
                        <th>Paciente</th>
                        <th>Fecha</th>
                        <th>Doctor</th>
                        <th>Servicio</th>
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
                <h4 class="modal-title"><b>Registro de Consulta Medica</b></h4>
            </div>

            <div class="modal-body">
            <div class="row">
                        <div class="col-lg-12">
                            <label for="">Cita</label>
                            <select class="js-example-basic-single" name="state" id="cbm_paciente_consulta" style="width:100%;">    
                            </select><br>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Insumo utilizado</label>
                            <select class="js-example-basic-single" name="state" id="cbm_insumo_consulta" style="width:100%;"> 
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Cant. Insumo utilizado</label>
                            <input type="text" class="form-control" id="txt_cantinsumo_consulta" placeholder="Ingrese Cantidad"><br>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Servicio anexado</label>
                            <select class="js-example-basic-single" name="state" id="cbm_servicio_consulta" style="width:100%;"> 
                            </select><br>
                        </div>
                        <div class="col-lg-6"><br>
                            <label for="">Descripci&oacute;n</label>
                            <textarea name="" id="txt_descripcion_consulta"  rows="4" class="form-control" style="resize:none"></textarea>
                        </div>
                        <div class="col-lg-6"><br>
                            <label for="">Observaci&oacute;n</label>
                            <textarea name="" id="txt_observacion_consulta"  rows="4" class="form-control" style="resize:none"></textarea>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registrar_Consulta()"><i class="fa fa-check">
                        <b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close">
                        <b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
    </div>
</div>
<!-- Hasta acaaa -->

<div class="modal lg" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Edici&oacute;n de Citas</b></h4>
            </div>

            <div class="modal-body">
            <div class="row">
                    <div class="col-lg-4">
                            <input type="text"id="txt_cita_id" hidden>
                            <label for="">Paciente</label>
                            <select class="js-example-basic-single" name="state" id="cbm_paciente_editar" style="width:100%;">    
                            </select><br><br>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Doctor</label>
                            <select class="js-example-basic-single" name="state" id="cbm_doctor_editar" style="width:100%;"> 
                            </select><br>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Estatus</label>
                            <select class="js-example-basic-single" name="state" id="cbm_estatus" style="width:100%;"> 
                            <option value="PENDIENTE">PENDIENTE</option>
                            <option value="CANCELADA">CANCELADA</option>
                            </select><br>
                        </div>
                        <div class="col-lg-12"><br>
                            <label for="">Descripci&oacute;n</label>
                            <textarea name="" id="txt_descripcion_editar"  rows="4" class="form-control" style="resize:none"></textarea>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Editar_Cita()"><i class="fa fa-check">
                        <b>&nbsp;Editar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close">
                        <b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
        var n=new Date();
        var y=n.getFullYear();
        var m=n.getMonth()+1;
        var d=n.getDate();
        if(d<10){
            d='0'+d;
        }
        if(m<10){
            m='0'+m;
        }
        document.getElementById('txt_fechainicio').value=y+"-"+m+"-"+d;
        document.getElementById('txt_fechafin').value=y+"-"+m+"-"+d;
        $("#modal_registro").on('shown.bs.modal', function () {
            $("#txt_insumo").focus();
        });
        listar_consulta();
        listar_paciente_combo_consulta();
        listar_insumo_combo();
        listar_servicio_combo();
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