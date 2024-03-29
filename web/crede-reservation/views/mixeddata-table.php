<div id="view-table-mixed_data" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-info"></i>

    <h3 class="box-title">Mixed Data</h3>
    <!-- tools box -->
    <div class="pull-right box-tools">
      <button id="btn-add-mixed_data" type="button" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="add Item">
        <i class="fa fa-plus"></i> Adicionar Item</button>
    </div>
    <!-- /. tools -->
  </div>

<!-- style="overflow-x:auto;" -->
  <div class="box-body" style="overflow-x:auto;">

    <table id="table-mixed_data" class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>Idade</th>
          <th>Data Completa</th>
          <th>Nascimento</th>
          <th>Hora Atual</th>
          <th>Empregado</th>
          <th>Salário</th>
          <th>Lucro</th>
          <th id="label-refresh-mixed_data" style="width: 14px"></th>
          <th id="label-remove-mixed_data" style="width: 14px"></th>
        </tr>
      </thead>
      <template id="row-mixed_data">
        <tr>
          <td class="colunm-id-mixed_data"></td>
          <td class="colunm-fullname-mixed_data"></td>
          <td class="colunm-age-mixed_data"></td>
          <td class="colunm-datetime_in-mixed_data"></td>
          <td class="colunm-born_date-mixed_data"></td>
          <td class="colunm-born_hour-mixed_data"></td>
          <td class="colunm-has_work-mixed_data"></td>
          <td class="colunm-salary-mixed_data"></td>
          <td class="colunm-yield_in-mixed_data"></td>
          <td class="colunm-refresh-mixed_data">
            <span class="glyphicon glyphicon-refresh" style="cursor: pointer;"></span>
          </td>
          <td class="colunm-remove-mixed_data">
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