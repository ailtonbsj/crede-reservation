<div id="view-form-users" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-plus"></i>

    <h3 id="form-title-users" class="box-title"></h3>
  </div>


  <div class="box-body">
    
    <!-- form-group -->
    <div class="form-group">
      <label for="form-name-users"><?= $S['name'] ?>:</label>
      <input type="text" class="form-control" id="form-name-users" placeholder="">
    </div>
    <!-- /.form group -->

        <!-- form-group -->
    <div class="form-group">
      <label for="form-pass-users"><?= $S['PlaceHolderPass'] ?>:</label>
      <input type="text" class="form-control" id="form-pass-users" placeholder="">
    </div>
    <!-- /.form group -->

    <!-- form-group -->
    <div class="form-group">
      <label for="form-fullname-users"><?= $S['fullname'] ?>:</label>
      <input type="text" class="form-control" id="form-fullname-users" placeholder="">
    </div>
    <!-- /.form group -->

        <!-- form-group -->
    <div class="form-group">
      <label for="form-gid-users">GID:</label>
      <input type="text" class="form-control" id="form-gid-users" readonly>
    </div>
    <!-- /.form group -->

    <!-- form-group -->
    <template id="users-form-groups-temp">
      <div class="form-group">
        <label>Group:</label>
        <select class="form-control" style="width: 100%;">
        </select>
      </div>
      <div class="children"></div>
    </template>
    <!-- /.form group -->

    <div id="users-form-groups-panel">
      
    </div>

    <!-- form-group -->
    <div class="form-group">
        <label for="form-role-users">Função:</label>
        <select class="form-control" id="form-role-users" style="width: 100%;">
        </select>
    </div>
    <!-- /.form group -->

  </div>
  <!-- /.box-body -->

  <div class="box-footer">
    <button id="form-submit-users" type="submit" class="btn btn-primary">Adicionar</button>
  </div>

</div>