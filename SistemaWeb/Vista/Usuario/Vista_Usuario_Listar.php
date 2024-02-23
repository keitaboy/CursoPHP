<script type="text/javascript" src="../../Js/Usuario.js?<?php echo time();?>"></script>
<div class="col-md-12">
  <div class="box box-warning box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Pantalla Principal de Vista de Usuario</h3>
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
          <button class="btn btn-danger" style="width:100%"><i class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
        </div>
      </div>
      <table id="tabla_usuario" class="display responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>IdUsuario</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>IdUsuario</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
          </tr>
        </tfoot>
      </table>

    </div>
    <!-- /.box-body -->
  </div>
</div>
<script>
  // new DataTable(Listar_Usuario());
  $(document).ready(function()) {
    Listar_Usuario();
  })
</script>