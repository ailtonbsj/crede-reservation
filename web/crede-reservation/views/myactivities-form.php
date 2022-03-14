<div id="view-form-my_activities" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-plus"></i>

    <h3 id="form-title-my_activities" class="box-title">New Activity</h3>
  </div>


  <div class="box-body">
    <!-- form-group -->
    <div class="form-group">
      <label for="form-id-my_activities"><?= $S['id'] ?>:</label>
      <input type="text" class="form-control" id="form-id-my_activities" disabled>
    </div>
    <!-- /.form group -->
    
    <!-- form-group -->
    <div class="form-group">
      <label for="form-description-my_activities"><?= $S['desc'] ?>:</label>
      <input type="text" class="form-control" id="form-description-my_activities" placeholder="">
    </div>
    <!-- /.form group -->

    <!-- form-group -->
    <div class="form-group">
      <label for="form-inittime-my_activities"><?= $S['init'] ?>:</label>
      <input type="text" class="form-control" id="form-inittime-my_activities" placeholder="">
    </div>
    <!-- /.form group -->

    <!-- form-group -->
    <div class="form-group">
      <label for="form-finaltime-my_activities"><?= $S['final'] ?>:</label>
      <input type="text" class="form-control" id="form-finaltime-my_activities" placeholder="">
    </div>
    <!-- /.form group -->

        <!-- form-group -->
    <div class="form-group">
      <label><?= $S['place'] ?>:</label>
      <select id="form-place-my_activities" class="form-control" style="width: 100%;">
      </select>
    </div>
    <!-- /.form-group -->

    <!-- form-group -->
    <div class="form-group hide">
      <label for="form-owner-my_activities"><?= $S['owner'] ?>:</label>
      <input type="text" class="form-control" id="form-owner-my_activities" placeholder="">
    </div>
    <!-- /.form group -->

  </div>
  <!-- /.box-body -->

  <div class="box-footer">
    <button id="form-submit-my_activities" type="submit" class="btn btn-primary">Adicionar</button>
  </div>

</div>