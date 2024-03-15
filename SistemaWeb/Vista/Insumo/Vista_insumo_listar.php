<!-- Fakta cosas por aca que no veo -->

<div class="modal fade" id="modal_registro" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Registro de insumos</b></h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="txt_insumo" placeholder="Ingrese insumos medicos"
                        maxlength="5" onkeypress="return soloLetras(event)"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Stock</label>
                    <input type="text" class="form-control" id="txt_stock" placeholder="Ingrese stock" maxlength="3"
                        onkeypress="return soloNumeros(event)"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Estatus</label>
                    <select class="js-example-basic-single" name="state" id="cbm_estatus" style="width:100%;">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                    </select><br><br>
                </div>
                <!-- falta algo por aca no veo -->
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal_registro" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Registro de insumos</b></h4>
                </div>

                <div class="modal-body">
                    <div class="col-lg-12">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="txt_insumo" placeholder="Ingrese insumos medicos"
                            maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Stock</label>
                        <input type="text" class="form-control" id="txt_stock" placeholder="Ingrese stock" maxlength="5"
                            onkeypress="return soloNumeros(event)"><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Estatus</label>
                        <select class="js-example-basic-single" name="state" id="cbm_estatus" style="width:100%;">
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select><br><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="Registrar_insumo()"><i class="fa fa-check">
                            <b>&nbsp;Registrar</b></i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close">
                            <b>&nbsp;Cerrar</b></i></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            listar_insumo();
            $('.js-example-basic-single').select2();
            $("#modal_registro").on('shown.bs.modal', function () {
                $("#txt_insumo").focus();
            })
        });

        $('.box').boxWiget({
            animationSpeed: 500,
            collapseTrigger: '[data-widget="collapse"]',
            removeTrigger: '[data-widget="remove"]',
            collapseIcon: 'fa-minus',
            expandIcon: 'fa-plus',
            removeIcon: 'fa-times'
        });

    </script>