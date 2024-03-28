<script type="text/javascript" src="../Js/Paciente.js?rev=<?php echo time(); ?>"></script>
<div class="row"></div>

<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Mantenimiento de Dueño</h3>
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
                        <input type="text" class="global_filter_dueno form-control" id="global_filter_dueno"
                            placeholder="Ingresar dato a buscar">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i
                            class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
                </div>
            </div>
            <table id="tabla_Dueno" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Due&ntilde;o</th>
                        <th>Tipo de documento</th>
                        <th>Nro de documento</th>
                        <th>Celular</th>
                        <th>Direcc&oacute;n</th>
                        <th>Correo</th>
                        <th>Acci&oacute;n</th>
                        <!-- <th>Acci&oacute;n mascota</th> -->
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

<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Mantenimiento de Pacientes</h3>
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
                        <input type="text" class="global_filter_paciente form-control" id="global_filter_paciente"
                            placeholder="Ingresar dato a buscar">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
            <table id="tabla_Paciente" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Paciente</th>
                        <th>Tipo de mascota</th>
                        <th>Raza</th>
                        <th>Color</th>
                        <th>Peso</th>
                        <th>Altura</th>
                        <th>Edad</th>
                        <th>Decha de nacimiento</th>
                        <th>Nro de historial clinico</th>
                        <th>Dueño</th>
                        <th>Sexo</th>
                        <th>Esterilazado</th>
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
                <h4 class="modal-title"><b>Registro de Dueño </b></h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="txt_Dueno_nombre"
                            placeholder="Ingrese nombre del Dueño" maxlength="50"
                            onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Apellido</label>
                        <input type="text" class="form-control" id="txt_Dueno_apellido"
                            placeholder="Ingrese apellido(s) del Dueño" maxlength="50"
                            onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Tipo de documento</label>
                        <select class="js-example-basic-single" name="state" id="cbm_documento" style="width:100%;">
                        </select><br><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Nro Documento</label>
                        <input type="text" class="form-control" id="txt_Dueno_nrodoc"
                            placeholder="Ingrese Nro documento" maxlength="10"
                            onkeypress="return soloNumeros(event)"><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Celular</label>
                        <input type="text" class="form-control" id="txt_Dueno_celular" placeholder="Ingrese celular"
                            maxlength="9" onkeypress="return soloNumeros(event)"><br>
                    </div>

                    <div class="col-lg-12">
                        <label for="">Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="txt_Dueno_direccion" placeholder="Ingrese direccion"
                            maxlength="250">
                    </div>

                    <div class="col-lg-12">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" id="txt_Dueno_correo" placeholder="Ingrese Correo">
                        <label for="" id="emailOK" style="color:red;"></label>
                        <input type="text" id="validar_email" hidden>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" onclick="Registrar_Dueno()"><i class="fa fa-check">
                                <b>&nbsp;Registrar Due&nacute;o</b></i></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close">
                                <b>&nbsp;Cerrar</b></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_registrar_paciente" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Editar datos del Paciente</b></h4>
            </div>

            <div class="modal-body">
                <div class="col-lg-12" style="text-align:center">
                    <b>Datos del paciente </b><br>
                </div>

                <div class="col-lg-6">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="txt_Paciente_nombre"
                        placeholder="Ingrese nombre del Paciente" maxlength="50">
                </div>
                <div class="col-lg-6">
                    <label for="">Tipo de mascota</label>
                    <select class="js-example-basic-single" name="state" id="cbm_tipo_mascota" style="width:100%;">
                    </select><br><br>
                </div>
                <div class="col-lg-6">
                    <label for="">Raza</label>
                    <input type="text" class="form-control" id="txt_Paciente_raza"
                        placeholder="Ingrese nombre del Paciente" maxlength="50">
                </div>
                <div class="col-lg-6">
                    <label for="">Color</label>
                    <input type="text" class="form-control" id="txt_Paciente_color"
                        placeholder="Ingrese nombre del Paciente" maxlength="50">
                </div>
                <div class="col-lg-6">
                    <label for="">Peso</label>
                    <input type="text" class="form-control" id="txt_Paciente_peso"
                        placeholder="Ingrese nombre del Paciente" maxlength="50">
                </div>
                <div class="col-lg-6">
                    <label for="">Altura</label>
                    <input type="text" class="form-control" id="txt_Paciente_altura"
                        placeholder="Ingrese nombre del Paciente" maxlength="50">
                </div>
                <div class="col-lg-6">
                    <label for="">Edad</label>
                    <input type="text" class="form-control" id="txt_Paciente_edad">
                </div>
                <div class="col-lg-6">
                    <label for="">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="txt_Paciente_FechaNac"
                        placeholder="Ingrese nombre del Paciente" maxlength="50">
                </div>
                <!-- <div class="col-lg-6">
                        <label for="">N&uacute;mero de historia medica</label>
                        <input type="text" class="form-control" id="txt_Paciente_HisMed"
                            placeholder="Ingrese nombre del Paciente" maxlength="50">                            
                    </div>
                    <div class="col-lg-6">
                        <label for="">DNI dueño</label>
                        <input type="text" class="form-control" id="txt_Paciente_DNIDue"
                            placeholder="Ingrese nombre del Paciente" maxlength="50">                            
                    </div> -->

                <div class="col-lg-6">
                    <label for="">Sexo</label>
                    <select class="js-example-basic-single" name="state" id="cbm_sexo" style="width:100%;">
                        <option value="M">MACHO</option>
                        <option value="H">HEMBRA</option>
                    </select><br><br>
                </div>

                <div class="col-lg-6">
                    <label for="">Esterilizado</label>
                    <select class="js-example-basic-single" name="state" id="cbm_esterilizado" style="width:100%;">
                        <option value="No">NO</option>
                        <option value="Si">SI</option>
                    </select><br><br>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registrar_Paciente()"><i class="fa fa-check">
                        <b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close">
                        <b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Editar datos del Paciente</b></h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" id="txt_idPaciente" hidden></input>
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="txt_Paciente_nombre_editar"
                            placeholder="Ingrese nombre del Paciente" maxlength="50"
                            onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Apellido</label>
                        <input type="text" class="form-control" id="txt_Paciente_apellido_editar"
                            placeholder="Ingrese apellido(s) del Paciente" maxlength="50"
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
                        <input type="text" id="txt_Paciente_nrodoc_editar_actual" hidden><br>
                        <input type="text" class="form-control" id="txt_Paciente_nrodoc_editar_nuevo"
                            placeholder="Ingrese Nro documento" maxlength="10"
                            onkeypress="return soloNumeros(event)"><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Celular</label>
                        <input type="text" class="form-control" id="txt_Paciente_celular_editar"
                            placeholder="Ingrese celular" maxlength="9" onkeypress="return soloNumeros(event)"><br>
                    </div>

                    <div class="col-lg-12">
                        <label for="">Grado</label>
                        <input type="text" class="form-control" id="txt_Paciente_grado_editar"
                            placeholder="Ingrese grado de educacion" maxlength="50"
                            onkeypress="return soloLetras(event)"><br>
                    </div>

                    <div class="col-lg-6">
                        <label for="">Fecha de inicio</label>
                        <input type="date" class="form-control" id="txt_Paciente_fecha_nac_editar"
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
                        <input type="text" class="form-control" id="txt_Paciente_pais_editar" placeholder="Ingrese pais"
                            maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Departamento</label>
                        <input type="text" class="form-control" id="txt_Paciente_depa_editar"
                            placeholder="Ingrese departamento" maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Distrito</label>
                        <input type="text" class="form-control" id="txt_Paciente_distrito_editar"
                            placeholder="Ingrese distrito" maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="txt_Paciente_direccion_editar"
                            placeholder="Ingrese direccion" maxlength="250">
                    </div>

                    <div class="col-lg-12">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" id="txt_Paciente_correo_editar"
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
                        <input type="text" class="form-control" id="txt_Paciente_usu_editar"
                            placeholder="Ingrese Usuario" maxlength="50" disabled>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Rol</label>
                        <select class="js-example-basic-single" name="state" id="cbm_rol_editar" style="width:100%;"
                            disabled>
                        </select><br><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="Modificar_Paciente()"><i class="fa fa-check">
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
        
        listar_Paciente();
        listar_Dueno();
        listar_combo_tipo_paciente();
        listar_combo_documento();
        $('.js-example-basic-single').select2();
        $("#modal_registro").on('shown.bs.modal', function () {
            $("#txt_Dueno_nombre").focus();
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

    document.getElementById('txt_Dueno_correo').addEventListener('input', function () {
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

</script>