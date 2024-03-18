<script type="text/javascript" src="../Js/Medicamento.js?rev=<?php echo time();?>"></script>
<div class="row"></div>
<div class="col-md-12">
  <div class="box box-warning box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Mantenimiento de medicamento</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-widget="remove"><i class="fa fa-minus"></i>
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
      <table id="tabla_medicamento" class="display responsive nowrap" style="width:100%">
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
  </div>
</div>