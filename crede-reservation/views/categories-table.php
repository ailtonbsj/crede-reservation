<div id="view-table-categories" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-tags"></i>

    <h3 class="box-title">Categories</h3>
    <!-- tools box -->
    <div class="pull-right box-tools">
      <button id="btn-add-categories" type="button" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="add Item">
        <i class="fa fa-plus"></i> Adicionar Item</button>
    </div>
    <!-- /. tools -->
  </div>


  <div class="box-body">
    
    <table id="table-categories" class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th id="label-refresh-categories" style="width: 14px"></th>
          <th id="label-remove-categories" style="width: 14px"></th>
        </tr>
      </thead>
      <template id="row-categories">
        <tr>
          <td class="colunm-id-categories"></td>
          <td class="colunm-name-categories"></td>
          <td class="colunm-refresh-categories">
            <span class="glyphicon glyphicon-refresh" style="cursor: pointer;"></span>
          </td>
          <td class="colunm-remove-categories">
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