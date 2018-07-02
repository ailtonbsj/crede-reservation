<div id="view-detail-users" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-list"></i>

    <h3 class="box-title">User detail</h3>
    <!-- tools box -->
    <!-- /. tools -->
  </div>


  <div class="box-body" style="overflow-x:auto;">
    
    <table id="detail-users" class="table table-bordered">
      <tbody>
        <tr>
          <th style="width: 14px;">Name</th><td id="detail-name-users"></td>
        </tr>
        <tr>
          <th>Pass</th><td id="detail-pass-users"></td>
        </tr>
        <tr>
          <th>Fullname</th><td id="detail-fullname-users"></td>
        </tr>
        <tr>
          <td colspan="2">
<?php

  if($modulePermission->r) include "views/permissions-table.html";
  if($modulePermission->c) include "views/permissions-form.html";

?>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
  <!-- /.box-body -->

</div>