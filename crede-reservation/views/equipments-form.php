<div id="view-form-equipments" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-plus"></i>

    <h3 id="form-title-equipments" class="box-title">Equipments</h3>
  </div>


  <div class="box-body">
    <!-- form-group -->
    <div class="form-group">
      <label for="form-id-equipments"><?= $S['id'] ?>:</label>
      <input type="text" class="form-control" id="form-id-equipments" disabled>
    </div>
    <!-- /.form group -->

    <!-- form-group -->
    <div class="form-group">
      <label><?= $S['category'] ?>:</label>
      <select id="form-category-equipments" class="form-control" style="width: 100%;">
      </select>
    </div>
    <!-- /.form-group -->

        <!-- form-group -->
    <div class="form-group">
      <label for="form-name-equipments"><?= $S['name'] ?>:</label>
      <input type="text" class="form-control" id="form-name-equipments" placeholder="">
    </div>
    <!-- /.form group -->

        <!-- form-group -->
    <div class="form-group">
      <label for="form-owner-equipments"><?= $S['owner'] ?>:</label>
      <input type="text" class="form-control" id="form-owner-equipments" placeholder="">
    </div>
    <!-- /.form group -->

  </div>
  <!-- /.box-body -->

  <div class="box-footer">
    <button id="form-submit-equipments" type="submit" class="btn btn-primary">Adicionar</button>
  </div>

</div>