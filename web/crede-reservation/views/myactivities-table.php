<div id="view-table-my_activities" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-calendar-plus-o"></i>

    <h3 class="box-title">My Activities</h3>
    <!-- tools box -->
    <div class="pull-right box-tools">
      <button id="btn-add-my_activities" type="button" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="add Item">
        <i class="fa fa-plus"></i> Adicionar Item</button>
    </div>
    <!-- /. tools -->
  </div>


  <div class="box-body" style="overflow-x:auto;">
    
    <table id="table-my_activities" class="table table-bordered">
      <thead>
        <tr>
          <th><?= $S['id'] ?></th>
          <th><?= $S['desc'] ?></th>
          <th><?= $S['init'] ?></th>
          <th><?= $S['final'] ?></th>
          <th><?= $S['place'] ?></th>
          <th><?= $S['owner'] ?></th>
          <th id="label-refresh-my_activities" style="width: 14px"></th>
          <th id="label-remove-my_activities" style="width: 14px"></th>
          <th id="label-detail-my_activities" style="width: 14px"></th>
        </tr>
      </thead>
      <template id="row-my_activities">
        <tr>
          <td class="colunm-id-my_activities"></td>
          <td class="colunm-description-my_activities"></td>
          <td class="colunm-inittime-my_activities"></td>
          <td class="colunm-finaltime-my_activities"></td>
          <td><span class="colunm-place-my_activities"></span>
            - <span class="colunm-placeown-my_activities"></span></td>
          <td class="colunm-owner-my_activities"></td>
          <td class="colunm-refresh-my_activities">
            <span class="glyphicon glyphicon-refresh" style="cursor: pointer;"></span>
          </td>
          <td class="colunm-remove-my_activities">
            <span class="glyphicon glyphicon-remove" style="cursor: pointer;"></span>
          </td>
          <td class="colunm-detail-my_activities">
            <span class="glyphicon glyphicon-list" style="cursor: pointer;"></span>
          </td>
        </tr>
      </template>
      <tbody>
      </tbody>
    </table>

  </div>
  <!-- /.box-body -->

</div>