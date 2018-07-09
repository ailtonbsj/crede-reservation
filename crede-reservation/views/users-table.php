<div id="view-table-users" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-users"></i>

    <h3 class="box-title">Users</h3>
    <!-- tools box -->
    <div class="pull-right box-tools">
      <button id="btn-add-users" type="button" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="add Item">
        <i class="fa fa-plus"></i> Adicionar Item</button>
    </div>
    <!-- /. tools -->
  </div>


  <div class="box-body">
    
    <table id="table-users" class="table table-bordered">
      <thead>
        <tr>
          <th><?= $S['name'] ?></th>
          <th><?= $S['PlaceHolderPass'] ?></th>
          <th><?= $S['fullname'] ?></th>
          <th id="label-refresh-users" style="width: 14px"></th>
          <th id="label-remove-users" style="width: 14px"></th>
          <th id="label-detail-users" style="width: 14px"></th>
        </tr>
      </thead>
      <template id="row-users">
        <tr>
          <td class="colunm-name-users"></td>
          <td class="colunm-pass-users"></td>
          <td class="colunm-fullname-users"></td>
          <td class="colunm-refresh-users">
            <span class="glyphicon glyphicon-refresh" style="cursor: pointer;"></span>
          </td>
          <td class="colunm-remove-users">
            <span class="glyphicon glyphicon-remove" style="cursor: pointer;"></span>
          </td>
          <td class="colunm-detail-users">
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