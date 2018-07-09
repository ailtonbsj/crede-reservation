<div id="view-form-categories" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-plus"></i>

    <h3 id="form-title-categories" class="box-title">New Category</h3>
  </div>


  <div class="box-body">
    <!-- form-group -->
    <div class="form-group">
      <label for="form-id-categories"><?= $S['id'] ?>:</label>
      <input type="text" class="form-control" id="form-id-categories" disabled>
    </div>
    <!-- /.form group -->
    
    <!-- form-group -->
    <div class="form-group">
      <label for="form-name-categories"><?= $S['name'] ?>:</label>
      <input type="text" class="form-control" id="form-name-categories" placeholder="">
    </div>
    <!-- /.form group -->

  </div>
  <!-- /.box-body -->

  <div class="box-footer">
    <button id="form-submit-categories" type="submit" class="btn btn-primary">Adicionar</button>
  </div>

</div>