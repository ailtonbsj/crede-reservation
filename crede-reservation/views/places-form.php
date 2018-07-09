<div id="view-form-places" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-plus"></i>

    <h3 id="form-title-places" class="box-title">New Place</h3>
  </div>


  <div class="box-body">
    <!-- form-group -->
    <div class="form-group">
      <label for="form-id-places"><?= $S['id'] ?>:</label>
      <input type="text" class="form-control" id="form-id-places" disabled>
    </div>
    <!-- /.form group -->
    
    <!-- form-group -->
    <div class="form-group">
      <label for="form-name-places"><?= $S['name'] ?>:</label>
      <input type="text" class="form-control" id="form-name-places" placeholder="">
    </div>
    <!-- /.form group -->

    <!-- form-group -->
    <div class="form-group">
      <label for="form-owner-places"><?= $S['owner'] ?>:</label>
      <input type="text" class="form-control" id="form-owner-places" placeholder="">
    </div>
    <!-- /.form group -->

  </div>
  <!-- /.box-body -->

  <div class="box-footer">
    <button id="form-submit-places" type="submit" class="btn btn-primary">Adicionar</button>
  </div>

</div>