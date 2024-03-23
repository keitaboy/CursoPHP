<script type="text/javascript" src="../Js/Doctor.js?rev=<?php echo time(); ?>"></script>
<div class="row"></div>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Mantenimiento de Doctores</h3>
            <div class="box-tools pull-right">s
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
            <table id="tabla_Doctor" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Doctor</th>
                        <th>Tipo de Documento</th>
                        <th>Nro Documento</th>
                        <th>Celular</th>
                        <th>Fecha de ingreso</th>
                        <th>Grado</th>
                        <th>Especialidad</th>
                        <th>Pais</th>
                        <th>Departamento</th>
                        <th>Ciudad</th>
                        <th>Direccion</th>
                        <th>Correo</th>
                        <th>Usuario</th>
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

<div class="modal fade" id="modal_registro" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Registro de Doctor</b></h4>
            </div>

            <div class="modal-body">
                <div class="col-lg-6">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="txt_doctor_nombre"
                        placeholder="Ingrese nombre del doctor" maxlength="50"
                        onkeypress="return soloLetras(event)"><br>
                </div>
                <div class="col-lg-6">
                    <label for="">Apellido</label>
                    <input type="text" class="form-control" id="txt_doctor_apellido"
                        placeholder="Ingrese apellido(s) del doctor" maxlength="50"
                        onkeypress="return soloLetras(event)"><br>
                </div>
                <!-- Inicio combobox -->
                <<div class="col-lg-12">
                    <label for="">Tipo de documento</label>
                    <select class="js-example-basic-single" name="state" id="cbm_documento" style="width:100%;">
                    </select><br><br>
            </div>
            <!-- Fin combobox -->
            <div class="col-lg-6">
                <label for="">Nro Documento</label>
                <input type="text" class="form-control" id="txt_doctor_apellido"
                    placeholder="Ingrese apellido(s) del doctor" maxlength="10"
                    onkeypress="return soloNumeros(event)"><br>
            </div>
            <div class="col-lg-6">
                <label for="">Celular</label>
                <input type="text" class="form-control" id="txt_doctor_apellido"
                    placeholder="Ingrese apellido(s) del doctor" maxlength="9"
                    onkeypress="return soloNumeros(event)"><br>
            </div>
            <!-- ver -->
            <div class="col-lg-12">
                <label for="">Fecha de ininio</label>
                <input type="text" class="form-control" id="txt_doctor" placeholder="Ingrese direccion">
            </div>
            <!-- Fin ver -->
            
            <div class="col-lg-6">
                <label for="">Grado</label>
                <input type="text" class="form-control" id="txt_doctor_apellido"
                    placeholder="Ingrese apellido(s) del doctor" maxlength="50"
                    onkeypress="return soloLetras(event)"><br>
            </div>
            <!-- Inicio combobox -->
            <<div class="col-lg-12">
                    <label for="">Tipo de especialidad</label>
                    <select class="js-example-basic-single" name="state" id="cbm_documento" style="width:100%;">
                    </select><br><br>
            </div>
            <!-- Fin combobox -->

            <div class="col-lg-4">
                <label for="">Pais</label>
                <input type="text" class="form-control" id="txt_doctor_apellido"
                    placeholder="Ingrese apellido(s) del doctor" maxlength="50"
                    onkeypress="return soloLetras(event)"><br>
            </div>
            <div class="col-lg-4">
                <label for="">Departamento</label>
                <input type="text" class="form-control" id="txt_doctor_apellido"
                    placeholder="Ingrese apellido(s) del doctor" maxlength="50"
                    onkeypress="return soloLetras(event)"><br>
            </div>
            <div class="col-lg-4">
                <label for="">Distrito</label>
                <input type="text" class="form-control" id="txt_doctor_apellido"
                    placeholder="Ingrese apellido(s) del doctor" maxlength="50"
                    onkeypress="return soloLetras(event)"><br>
            </div>      
            <div class="col-lg-12">
                <label for="">Direcci&oacute;n</label>
                <input type="text" class="form-control" id="txt_doctor" placeholder="Ingrese direccion">
            </div>
            <div class="col-lg-12">
                <label for="">Correo</label>
                <input type="text" class="form-control" id="txt_doctor" placeholder="Ingrese direccion">
            </div>
        
        <div class="modal-footer">
            <button class="btn btn-primary" onclick="Registrar_Doctor()"><i class="fa fa-check">
                    <b>&nbsp;Registrar</b></i></button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close">
                    <b>&nbsp;Cerrar</b></i></button>
        </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Editar de Doctor</b></h4>
            </div>

            <div class="modal-body">
                <div class="col-lg-12">
                    <input type="text" id="txt_idDoctor" hidden>
                    <label for="">Nombre</label>
                    <input type="text" id="txt_doctor_actual_editar" placeholder="Ingrese Doctor" maxlength="50"
                        onkeypress="return soloLetras(event)" hidden>
                    <input type="text" class="form-control" id="txt_doctor_nuevo_editar" placeholder="Ingrese Doctor"
                        maxlength="50" onkeypress="return soloLetras(event)">
                    <br>
                </div>
                <div class="col-lg-12">
                    <label for="">Estatus</label>
                    <select class="js-example-basic-single" name="state" id="cbm_estatus_editar" style="width:100%;">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                    </select><br><br>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Modificar_Doctor()"><i class="fa fa-check">
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
        listar_Doctor();
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