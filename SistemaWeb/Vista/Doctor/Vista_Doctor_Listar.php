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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Registro de Doctor</b></h4>
            </div>

            <div class="modal-body">
                <div class="row">
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
                    <div class="col-lg-6">
                        <label for="">Tipo de documento</label>
                        <select class="js-example-basic-single" name="state" id="cbm_documento" style="width:100%;">
                        </select><br><br>
                    </div>
                    <!-- Fin combobox -->
                    <div class="col-lg-6">
                        <label for="">Nro Documento</label>
                        <input type="text" class="form-control" id="txt_doctor_nrodoc"
                            placeholder="Ingrese Nro documento" maxlength="10"
                            onkeypress="return soloNumeros(event)"><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Celular</label>
                        <input type="text" class="form-control" id="txt_doctor_celular" placeholder="Ingrese celular"
                            maxlength="9" onkeypress="return soloNumeros(event)"><br>
                    </div>

                    <div class="col-lg-12">
                        <label for="">Grado</label>
                        <input type="text" class="form-control" id="txt_doctor_grado"
                            placeholder="Ingrese grado de educacion" maxlength="50"
                            onkeypress="return soloLetras(event)"><br>
                    </div>

                    <div class="col-lg-6">
                        <label for="">Fecha de inicio</label>
                        <input type="date" class="form-control" id="txt_doctor_fecha_nac" placeholder="Ingrese fecha">
                    </div>

                    <!-- Inicio combobox -->
                    <div class="col-lg-6">
                        <label for="">Tipo de especialidad</label>
                        <select class="js-example-basic-single" name="state" id="cbm_especialidad" style="width:100%;">
                        </select><br><br>
                    </div>
                    <!-- Fin combobox -->

                    <div class="col-lg-4">
                        <label for="">Pais</label>
                        <input type="text" class="form-control" id="txt_doctor_pais" placeholder="Ingrese pais"
                            maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Departamento</label>
                        <input type="text" class="form-control" id="txt_doctor_depa" placeholder="Ingrese departamento"
                            maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Distrito</label>
                        <input type="text" class="form-control" id="txt_doctor_distrito" placeholder="Ingrese distrito"
                            maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="txt_doctor_direccion"
                            placeholder="Ingrese direccion" maxlength="250">
                    </div>

                    <div class="col-lg-12">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" id="txt_doctor_correo" placeholder="Ingrese Correo">
                        <label for="" id="emailOK" style="color:red;"></label>
                        <input type="text" id="validar_email" hidden>
                    </div>

                    <div class="col-lg-12"><label for=""></label></div>

                    <div class="col-lg-12" style="text-align:center">
                        <b>Datos del usuario </b><br>
                    </div>

                    <div class="col-lg-6">
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" id="txt_doctor_usu" placeholder="Ingrese Usuario"
                            maxlength="50">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Contrase&ntilde;a</label>
                        <input type="password" class="form-control" id="txt_doctor_pass"
                            placeholder="Ingrese Contraseña" maxlength="50">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Sexo</label>
                        <select class="js-example-basic-single" name="state" id="cbm_sexo" style="width:100%;">
                            <option value="M">MASCULINO</option>
                            <option value="F">FEMENINO</option>
                        </select><br><br>
                    </div>

                    <div class="col-lg-6">
                        <label for="">Rol</label>
                        <select class="js-example-basic-single" name="state" id="cbm_rol" style="width:100%;">
                        </select><br><br>
                    </div>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Editar datos del Doctor</b></h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" id="txt_idDoctor" hidden></input>
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="txt_doctor_nombre_editar"
                            placeholder="Ingrese nombre del doctor" maxlength="50"
                            onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Apellido</label>
                        <input type="text" class="form-control" id="txt_doctor_apellido_editar"
                            placeholder="Ingrese apellido(s) del doctor" maxlength="50"
                            onkeypress="return soloLetras(event)"><br>
                    </div>
                    <!-- Inicio combobox -->
                    <div class="col-lg-6">
                        <label for="">Tipo de documento</label>
                        <select class="js-example-basic-single" name="state" id="cbm_documento_editar"
                            style="width:100%;">
                        </select><br><br>
                    </div>
                    <!-- Fin combobox -->
                    <div class="col-lg-6">
                        <label for="">Nro Documento</label>
                        <input type="text" id="txt_doctor_nrodoc_editar_actual" hidden><br>
                        <input type="text" class="form-control" id="txt_doctor_nrodoc_editar_nuevo"
                            placeholder="Ingrese Nro documento" maxlength="10"
                            onkeypress="return soloNumeros(event)"><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Celular</label>
                        <input type="text" class="form-control" id="txt_doctor_celular_editar"
                            placeholder="Ingrese celular" maxlength="9" onkeypress="return soloNumeros(event)"><br>
                    </div>

                    <div class="col-lg-12">
                        <label for="">Grado</label>
                        <input type="text" class="form-control" id="txt_doctor_grado_editar"
                            placeholder="Ingrese grado de educacion" maxlength="50"
                            onkeypress="return soloLetras(event)"><br>
                    </div>

                    <div class="col-lg-6">
                        <label for="">Fecha de inicio</label>
                        <input type="date" class="form-control" id="txt_doctor_fecha_nac_editar"
                            placeholder="Ingrese fecha">
                    </div>

                    <!-- Inicio combobox -->
                    <div class="col-lg-6">
                        <label for="">Tipo de especialidad</label>
                        <select class="js-example-basic-single" name="state" id="cbm_especialidad_editar"
                            style="width:100%;">
                        </select><br><br>
                    </div>
                    <!-- Fin combobox -->

                    <div class="col-lg-4">
                        <label for="">Pais</label>
                        <input type="text" class="form-control" id="txt_doctor_pais_editar" placeholder="Ingrese pais"
                            maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Departamento</label>
                        <input type="text" class="form-control" id="txt_doctor_depa_editar"
                            placeholder="Ingrese departamento" maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Distrito</label>
                        <input type="text" class="form-control" id="txt_doctor_distrito_editar"
                            placeholder="Ingrese distrito" maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="txt_doctor_direccion_editar"
                            placeholder="Ingrese direccion" maxlength="250">
                    </div>

                    <div class="col-lg-12">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" id="txt_doctor_correo_editar"
                            placeholder="Ingrese Correo">
                        <label for="" id="emailOK_editar" style="color:red;"></label>
                        <input type="text" id="validar_email_editar" hidden>
                    </div>

                    <div class="col-lg-12"><label for=""></label></div>

                    <div class="col-lg-12" style="text-align:center">
                        <b>Datos del usuario </b><br>
                    </div>

                    <div class="col-lg-4">
                        <input type="text" id="txt_id_usuario" hidden>
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" id="txt_doctor_usu_editar" placeholder="Ingrese Usuario"
                            maxlength="50" disabled>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Rol</label>
                        <select class="js-example-basic-single" name="state" id="cbm_rol_editar" style="width:100%;"
                            disabled>
                        </select><br><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="Modificar_Doctor()"><i class="fa fa-check">
                            <b>&nbsp;Modificar</b></i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close">
                            <b>&nbsp;Cerrar</b></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        listar_Doctor();
        listar_combo_rol();
        listar_combo_documento();
        listar_combo_especialidad();
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

    document.getElementById('txt_doctor_correo').addEventListener('input', function () {
        campo = event.target;
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if (emailRegex.test(campo.value)) {
            $(this).css("border", "");
            $("#emailOK").html("");
            $("#validar_email").val("correcto");
        } else {
            $(this).css("border", "1px solid red");
            $("#emailOK").html("Email Incorrecto");
            $("#validar_email").val("incorrecto");
        }
    });

    document.getElementById('txt_doctor_correo_editar').addEventListener('input', function () {
        campo = event.target;
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if (emailRegex.test(campo.value)) {
            $(this).css("border", "");
            $("#emailOK_editar").html("");
            $("#validar_email_editar").val("correcto");
        } else {
            $(this).css("border", "1px solid red");
            $("#emailOK_editar").html("Email Incorrecto");
            $("#validar_email_editar").val("incorrecto");
        }
    });

</script>