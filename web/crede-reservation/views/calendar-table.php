<div id="view-table-calendar" class="box box-primary" style="margin-bottom: 0;">

  <div class="box-header with-border">
    <i class="fa fa-sliders"></i>

    <h3 class="box-title">Calendar</h3>
    <!-- tools box -->
    <div class="pull-right box-tools">
      <button id="btn-add-calendar" type="button" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="add Item">
        <i class="fa fa-plus"></i> Adicionar Item</button>
    </div>
    <!-- /. tools -->
  </div>

  <div id="calendar" class="box-body" style="display: flex; align-items: stretch; height: 71vh;">
  
  <iframe id="google-calendar" src="https://calendar.google.com/calendar/embed?src=<?= urlencode(getenv('GCALENDAR_ID')) ?>&ctz=<?= urlencode(getenv('TIMEZONE')) ?>"
    style="border: 0; flex: 1 1 auto;" frameborder="0" scrolling="no"></iframe>

  </div>
  <!-- /.box-body -->

</div>