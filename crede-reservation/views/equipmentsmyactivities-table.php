<div id="view-table-equipments_my_activities">

  <div class="box-header">
    <i class="fa fa-briefcase"></i>
    <h3 class="box-title">Equipments</h3>
    <!-- tools box -->
    <div class="pull-right box-tools">
      <button id="btn-add-equipments_my_activities" type="button" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="add Item">
        <i class="fa fa-plus"></i> Adicionar Item</button>
    </div>
    <!-- /. tools -->
  </div>


  <div class="box-body">
    
    <table id="table-equipments_my_activities" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 14px"><?= $S['id'] ?></th>
          <th><?= $S['equipment'] ?></th>
          <th id="label-refresh-equipments_my_activities" style="width: 14px"></th>
          <th id="label-remove-equipments_my_activities" style="width: 14px"></th>
        </tr>
      </thead>
      <template id="row-equipments_my_activities">
        <tr>
          <td class="colunm-equipment-equipments_my_activities"></td>
          <td class="colunm-equipmentname-equipments_my_activities"></td>
          <td class="colunm-refresh-equipments_my_activities">
            <span class="glyphicon glyphicon-refresh" style="cursor: pointer;"></span>
          </td>
          <td class="colunm-remove-equipments_my_activities">
            <span class="glyphicon glyphicon-remove" style="cursor: pointer;"></span>
          </td>
        </tr>
      </template>
      <tbody>
      </tbody>
    </table>

  </div>
  <!-- /.box-body -->

</div>