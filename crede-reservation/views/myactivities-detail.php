<div id="view-detail-my_activities" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-list"></i>

    <h3 class="box-title">Activities Details</h3>
    <!-- tools box -->
    <!-- /. tools -->
  </div>


  <div class="box-body" style="overflow-x:auto;">
    
    <table id="detail-my_activities" class="table table-bordered">
      <tbody>
        <tr>
          <th style="width: 14px;">Description</th><td id="detail-description-my_activities"></td>
        </tr>
        <tr>
          <th>Initial Time</th><td id="detail-inittime-my_activities"></td>
        </tr>
        <tr>
          <th>Final Time</th><td id="detail-finaltime-my_activities"></td>
        </tr>
        <tr>
          <th>Place</th><td id="detail-placename-my_activities"></td>
        </tr>
        <tr>
          <th>Owner</th><td id="detail-owner-my_activities"></td>
        </tr>
        <tr>
          <td colspan="2">
<?php

  if($modulePermission->r) include "views/equipmentsmyactivities-table.html";
  if($modulePermission->c) include "views/equipmentsmyactivities-form.html";

?>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
  <!-- /.box-body -->

</div>