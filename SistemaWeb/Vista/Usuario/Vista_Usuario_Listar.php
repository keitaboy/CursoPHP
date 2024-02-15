<div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Pantalla  Principal de Vista de Usuario</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="Tabla_Usuario" class="display responsive nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>IdUsuario</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Rol</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>IdUsuario</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Rol</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            
            <!-- /.box-body -->
          </div>
          <script>
            $(document).ready(function()){
              $('example').DataTable();
            }
          </script>