<div id="view-detail-users" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-list"></i>

    <h3 class="box-title">User Details</h3>
    <!-- tools box -->
    <!-- /. tools -->
  </div>


  <div class="box-body" style="overflow-x:auto;">
    
    <table id="detail-users" class="table table-bordered">
      <tbody>
        <tr>
          <th style="width: 14px;"><?= $S['name'] ?></th><td id="detail-name-users"></td>
        </tr>
        <tr>
          <th><?= $S['PlaceHolderPass'] ?></th><td id="detail-pass-users"></td>
        </tr>
        <tr>
          <th><?= $S['fullname'] ?></th><td id="detail-fullname-users"></td>
        </tr>
        <tr>
          <th>Group</th><td id="detail-gid-users"></td>
        </tr>
        <tr>
          <td colspan="2">
<?php

  if($modulePermission->r) include "views/permissions-table.php";
  if($modulePermission->r) include "views/permissions-form.php";

?>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
  <!-- /.box-body -->

</div>