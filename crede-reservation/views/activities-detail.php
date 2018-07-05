<div id="view-detail-activities" class="box box-primary">

  <div class="box-header with-border">
    <i class="fa fa-list"></i>

    <h3 class="box-title">Activities Details</h3>
    <!-- tools box -->
    <!-- /. tools -->
  </div>


  <div class="box-body" style="overflow-x:auto;">
    
    <table id="detail-activities" class="table table-bordered">
      <tbody>
        <tr>
          <th style="width: 14px;">Description</th><td id="detail-description-activities"></td>
        </tr>
        <tr>
          <th>Initial Time</th><td id="detail-inittime-activities"></td>
        </tr>
        <tr>
          <th>Final Time</th><td id="detail-finaltime-activities"></td>
        </tr>
        <tr>
          <th>Place</th><td id="detail-placename-activities"></td>
        </tr>
        <tr>
          <th>Owner</th><td id="detail-owner-activities"></td>
        </tr>
        <tr>
          <td colspan="2">
<?php

  if($modulePermission->r) include "views/equipmentsactivities-table.html";
  if($modulePermission->r) include "views/equipmentsactivities-form.html";

?>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
  <!-- /.box-body -->

</div>