<div id="view-form-activities" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-plus"></i>

    <h3 id="form-title-activities" class="box-title">New Activity</h3>
  </div>


  <div class="box-body">
    <!-- form-group -->
    <div class="form-group">
      <label for="form-id-activities"><?= $S['id'] ?>:</label>
      <input type="text" class="form-control" id="form-id-activities" disabled>
    </div>
    <!-- /.form group -->
    
    <!-- form-group -->
    <div class="form-group">
      <label for="form-description-activities"><?= $S['desc'] ?>:</label>
      <input type="text" class="form-control" id="form-description-activities" placeholder="">
    </div>
    <!-- /.form group -->

    <!-- form-group -->
    <div class="form-group">
      <label for="form-inittime-activities"><?= $S['init'] ?>:</label>
      <input type="text" class="form-control" id="form-inittime-activities" placeholder="">
    </div>
    <!-- /.form group -->

    <!-- form-group -->
    <div class="form-group">
      <label for="form-finaltime-activities"><?= $S['final'] ?>:</label>
      <input type="text" class="form-control" id="form-finaltime-activities" placeholder="">
    </div>
    <!-- /.form group -->

        <!-- form-group -->
    <div class="form-group">
      <label><?= $S['place'] ?>:</label>
      <select id="form-place-activities" class="form-control" style="width: 100%;">
      </select>
    </div>
    <!-- /.form-group -->

    <div class="form-group">
      <label><?= $S['owner'] ?>:</label>
      <select id="form-owner-activities" class="form-control" style="width: 100%;">
      </select>
    </div>
    <!-- /.form-group -->

  </div>
  <!-- /.box-body -->

  <div class="box-footer">
    <button id="form-submit-activities" type="submit" class="btn btn-primary">Adicionar</button>
  </div>

</div>