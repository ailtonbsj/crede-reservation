<div id="view-form-permissions">

  <div class="box-header">
    <i class="fa fa-plus"></i>

    <h3 id="form-title-permissions" class="box-title">permissions</h3>
  </div>


  <div class="box-body">
    <!-- form-group -->
    <div class="form-group hide">
      <label for="form-username-permissions"><?= $S['PlaceHolderLogin'] ?>:</label>
      <input type="text" class="form-control" id="form-username-permissions">
    </div>
    <!-- /.form group -->

    <!-- form-group -->
    <div class="form-group">
      <label><?= $S['module'] ?>:</label>
      <select id="form-module-permissions" class="form-control" style="width: 100%;">
      </select>
    </div>
    <!-- /.form-group -->

    <!-- form-group -->
    <div class="form-group">
      <label for="form-priority-permissions"><?= $S['priority'] ?>:</label>
      <input type="text" class="form-control" id="form-priority-permissions" placeholder="">
    </div>
    <!-- /.form group -->

        <!-- form-group -->
    <div class="form-group">
      <label class="checkbox-inline">
        <input id="form-c-permissions" type="checkbox" data-toggle="toggle">
        <?= $S['insertData'] ?>
      </label>
    </div>
    <!-- /.form group -->

        <!-- form-group -->
    <div class="form-group">
      <label class="checkbox-inline">
        <input id="form-r-permissions" type="checkbox" data-toggle="toggle">
        <?= $S['showData'] ?>
      </label>
    </div>
    <!-- /.form group -->

        <!-- form-group -->
    <div class="form-group">
      <label class="checkbox-inline">
        <input id="form-u-permissions" type="checkbox" data-toggle="toggle">
        <?= $S['modifyData'] ?>
      </label>
    </div>
    <!-- /.form group -->

        <!-- form-group -->
    <div class="form-group">
      <label class="checkbox-inline">
        <input id="form-d-permissions" type="checkbox" data-toggle="toggle">
        <?= $S['removeData'] ?>
      </label>
    </div>
    <!-- /.form group -->

  </div>
  <!-- /.box-body -->

  <div class="box-footer">
    <button id="form-submit-permissions" type="submit" class="btn btn-primary">Adicionar</button>
  </div>

</div>