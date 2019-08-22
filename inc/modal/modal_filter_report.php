<!-- Modal -->
<div class="modal fade" id="filterReportModal" tabindex="-1" role="dialog" aria-labelledby="filterReportModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterReportModalLabel">Filter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="filter-report-form" class="form-group" action="/" method="GET">
          <label for="student-filter">By student:</label>
          <select id="student-filter" class="select-student form-control mb-2" name="students[]" multiple="multiple"></select>
          <label for="subject-filter">By subject:</label>
          <select id="subject-filter" class="select-subject form-control mb-2" name="subjects[]" multiple="multiple"></select>
          <label for="date-filter">By date range:</label>
          <div id="date-filter" class="input-group">
            <?php $two_months_ago = date("Y-m-d", time() - 60**3*24); ?>
            <input id="from-filter" type="date" class="form-control from" name="start_date" value="<?php echo $two_months_ago ?>">
            <div class="input-group-addon"><span class="input-group-text">to</span></div>
            <input id="to-filter" type="date" class="form-control to" name="end_date" value="<?php echo date("Y-m-d"); ?>">
        </div>
        <small id="date-valid-filter" class="text-danger d-none">Enter valid date range (Not more than 60 days)</small>
        </form>
      </div>
      <div class="modal-footer">
        <button id="submit-rate-filter" type="submit" class="btn btn-primary" form="filter-report-form">Ok</button>
      </div>
    </div>
  </div>
</div>
