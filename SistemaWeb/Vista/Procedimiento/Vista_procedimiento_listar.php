<script type="text/javascript" src="../Js/Procedimiento.js?rev=<?php echo time();?>"></script>
<div class="col-md-12">
  <div class="box box-warning box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Mantenimiento de Procedimientos</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="form-group">
        <div class="col-lg-10">
          <div class="input-group">
            <input type="text"  class="global_filter form-control"
            id="global_filter" placeholder="Ingresar dato a buscar">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
          </div>
        </div>
        <div class="col-lg-2">
          <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
        </div>
      </div>
      <table id="tabla_procedimiento" class="display responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Observacion</th>
            <th>Information</th>
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
    <!-- /.box-body -->
  </div>
</div>

  <div class="modal fade" id="modal_registro" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header"  style="text-align:center;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Registro Nuevo Servicio Medico</b></h4>
          </div>
          <div class="modal-body">
            <div class="col-lg-12">
                <label for="">Nombre</label>
                <input type="text" class="form-control" id="txt_procedimiento" placeholder="Ingrese Servicio Medico"><br>
            </div>
            <div class="col-lg-12">
                <label for="">Observacion</label>
                <input type="text" class="form-control" id="txt_observacion" placeholder="Ingrese Observacion Medica"><br><br>                  
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" onclick="RegistrarProcedimiento()" ><i  class="fa fa-check"><b>&nbsp; Registrar</b></i></button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><i  class="fa fa-close"><b>&nbsp; Cerrar</b></i></button>
          </div>
        </div>
      </div>
  
  <div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header"  style="text-align:center;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Registro Nuevo Servicio Medico</b></h4>
          </div>
          <div class="modal-body">
            <div class="col-lg-12">
                <input type="text" id="txt_idprocedimiento" hidden>
                <label for="">Nombre</label>
                <input type="text" id="txt_procedimiento_actual_editar" placeholder="Ingrese Servicio Medico" hidden>
                <input type="text" class="form-control" id="txt_procedimiento_nuevo_editar" placeholder="Ingrese Servicio Medico"><br>
            </div>
            <div class="col-lg-12">
                <label for="">Observacion</label>
                <input type="text" class="form-control" id="txt_observacion_editar" placeholder="Ingrese Observacion Medica"><br><br>                  
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" onclick="Modificar_Procedimiento()" ><i  class="fa fa-check"><b>&nbsp; Modificar</b></i></button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><i  class="fa fa-close"><b>&nbsp; Cerrar</b></i></button>
          </div>
        </div>
      </div>
    </div>

<script>
$(document).ready(function() {
    listar_procedimiento();
    $('.js-example-basic-single').select2();
    $("#modal_registro").on('shown.bs.modal',function(){
      $("#txt_usu").focus();
    })
});

$('.box').boxWidget({
  animationspeed:500,
  collapseTrigger:'[data-widget="colapse"]',
  removeTrigger:'[data-widget="remove"]',
  collapseIcon:'fa-minus',
  expandIcon:'fa-plus',
  removeIcon:'fa-times'
})

</script>