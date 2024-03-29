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
          <th style="width: 14px;"><?= $S['desc'] ?></th>
          <td id="detail-description-my_activities"></td>
        </tr>
        <tr>
          <th><?= $S['init'] ?></th>
          <td id="detail-inittime-my_activities"></td>
        </tr>
        <tr>
          <th><?= $S['final'] ?></th>
          <td id="detail-finaltime-my_activities"></td>
        </tr>
        <tr>
          <th><?= $S['place'] ?></th>
          <td id="detail-placename-my_activities"></td>
        </tr>
        <tr>
          <th><?= $S['owner'] ?></th>
          <td id="detail-owner-my_activities"></td>
        </tr>
        <tr>
          <td colspan="2">
            <?php

            if ($modulePermission->r) include "views/equipmentsmyactivities-table.php";
            if ($modulePermission->r) include "views/equipmentsmyactivities-form.php";

            ?>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <button id="add-gcalendar" type="button" class="btn btn-success" data-toggle="tooltip">
              <i class="fa fa-calendar"></i> Adicionar ao Google Agenda</button>
            <a id="show-gcalendar" class="btn btn-primary" target="_blank" rel="noopener noreferrer">
            <i class="fa fa-calendar"></i> Ver Evento no Google Agenda</a>
            <a id="update-gcalendar" class="btn btn-success" target="_blank" rel="noopener noreferrer">
            <i class="fa fa-calendar"></i> Atualizar Google Agenda</a>
            <a id="send-whatsapp" class="btn btn-warning" target="_blank" rel="noopener noreferrer">
            <i class="fa fa-whatsapp"></i> Enviar via WhatsApp</a>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
  <!-- /.box-body -->

</div>