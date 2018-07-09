<div id="view-table-permissions">

  <div class="box-header">
    <i class="fa fa-key"></i>

    <h3 class="box-title">Permissions</h3>
    <!-- tools box -->
    <div class="pull-right box-tools">
      <button id="btn-add-permissions" type="button" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="add Item">
        <i class="fa fa-plus"></i> Adicionar Item</button>
    </div>
    <!-- /. tools -->
  </div>


  <div class="box-body" style="overflow-x:auto;">
    
    <table id="table-permissions" class="table table-bordered">
      <thead>
        <tr>
          <th><?= $S['module'] ?></th>
          <th>C</th>
          <th>R</th>
          <th>U</th>
          <th>D</th>
          <th><?= $S['priority'] ?></th>
          <th id="label-refresh-permissions" style="width: 14px"></th>
          <th id="label-remove-permissions" style="width: 14px"></th>
        </tr>
      </thead>
      <template id="row-permissions">
        <tr>
          <td class="colunm-module-permissions"></td>
          <td class="colunm-c-permissions"></td>
          <td class="colunm-r-permissions"></td>
          <td class="colunm-u-permissions"></td>
          <td class="colunm-d-permissions"></td>
          <td class="colunm-priority-permissions"></td>
          <td class="colunm-refresh-permissions">
            <span class="glyphicon glyphicon-refresh" style="cursor: pointer;"></span>
          </td>
          <td class="colunm-remove-permissions">
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