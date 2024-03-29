<div id="view-table-equipments" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-briefcase"></i>

    <h3 class="box-title">Equipments</h3>
    <!-- tools box -->
    <div class="pull-right box-tools">
      <button id="btn-add-equipments" type="button" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="add Item">
        <i class="fa fa-plus"></i> Adicionar Item</button>
    </div>
    <!-- /. tools -->
  </div>


  <div class="box-body">
    
    <table id="table-equipments" class="table table-bordered">
      <thead>
        <tr>
          <th><?= $S['id'] ?></th>
          <th><?= $S['category'] ?></th>
          <th><?= $S['name'] ?></th>
          <th><?= $S['owner'] ?></th>
          <th id="label-refresh-equipments" style="width: 14px"></th>
          <th id="label-remove-equipments" style="width: 14px"></th>
        </tr>
      </thead>
      <template id="row-equipments">
        <tr>
          <td class="colunm-id-equipments"></td>
          <td class="colunm-category-equipments"></td>
          <td class="colunm-name-equipments"></td>
          <td class="colunm-owner-equipments"></td>
          <td class="colunm-refresh-equipments">
            <span class="glyphicon glyphicon-refresh" style="cursor: pointer;"></span>
          </td>
          <td class="colunm-remove-equipments">
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