<!-- Modal -->
<div class="modal fade" id="rateStudentModal" tabindex="-1" role="dialog" aria-labelledby="rateStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rateStudentModalLabel">Rate student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="rate_student_form" class="form-group" action="/views/rate_student.php" method="GET">
          <input type="hidden" name="rate_student" value="1">
          <label for="std-select-rate">Student:</label>
          <select id="std-select-rate" class="select-subject form-control mb-2" name="subject_id"></select>
          <label for="sbj-select-rate">Subject:</label>
          <select id="sbj-select-rate" class="select-student form-control mb-2" name="student_id"></select>
          <label for="date-range-rate">Date range:</label>
          <div id="date-range-rate" class="input-group">
            <?php $two_months_ago = date("Y-m-d", time() - 60**3*24); ?>
            <input id="from-rate" type="date" class="form-control from" name="start_date" value="<?php echo $two_months_ago ?>">
            <div class="input-group-addon"><span class="input-group-text">to</span></div>
            <input id="to-rate" type="date" class="form-control to" name="end_date" value="<?php echo date("Y-m-d"); ?>">
        </div>
        <small id="date-valid-rate-st" class="text-danger d-none">Enter valid date range (Not more than 60 days)</small>
        </form>
      </div>
      <div class="modal-footer">
        <button id="rate-student-button" class="btn btn-primary" type="submit" form="rate_student_form">Go</button>
      </div>
    </div>
  </div>
</div>
