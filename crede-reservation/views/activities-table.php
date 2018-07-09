<div id="view-table-activities" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-calendar"></i>

    <h3 class="box-title">Activities</h3>
    <!-- tools box -->
    <div class="pull-right box-tools">
      <button id="btn-add-activities" type="button" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="add Item">
        <i class="fa fa-plus"></i> Adicionar Item</button>
    </div>
    <!-- /. tools -->
  </div>


  <div class="box-body" style="overflow-x:auto;">
    <table id="table-activities" class="table table-bordered">
      <thead>
        <tr>
          <th><?= $S['id'] ?></th>
          <th><?= $S['desc'] ?></th>
          <th><?= $S['init'] ?></th>
          <th><?= $S['final'] ?></th>
          <th><?= $S['place'] ?></th>
          <th><?= $S['owner'] ?></th>
          <th id="label-refresh-activities" style="width: 14px"></th>
          <th id="label-remove-activities" style="width: 14px"></th>
          <th id="label-detail-activities" style="width: 14px"></th>
        </tr>
      </thead>
      <template id="row-activities">
        <tr>
          <td class="colunm-id-activities"></td>
          <td class="colunm-description-activities"></td>
          <td class="colunm-inittime-activities"></td>
          <td class="colunm-finaltime-activities"></td>
          <td><span class="colunm-place-activities"></span>
            - <span class="colunm-placeown-activities"></span></td>
          <td class="colunm-owner-activities"></td>
          <td class="colunm-refresh-activities">
            <span class="glyphicon glyphicon-refresh" style="cursor: pointer;"></span>
          </td>
          <td class="colunm-remove-activities">
            <span class="glyphicon glyphicon-remove" style="cursor: pointer;"></span>
          </td>
          <td class="colunm-detail-activities">
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