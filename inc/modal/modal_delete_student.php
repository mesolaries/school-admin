<!-- Modal -->
<div class="modal fade" id="deleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteStudentModalLabel">Delete student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="delete_student_form" class="form-group" method="POST">
          <input type="hidden" name="delete" value="student">
          <label for="std-select-dlt">Select student:</label>
          <select id="std-select-dlt" class="select-student form-control" name="id"></select>
        </form>
        <small class="text-danger pl-1 d-none">Student deleted</small>
      </div>
      <div class="modal-footer">
        <button id="delete-student-button" class="btn btn-danger" type="submit" form="delete_student_form" name="submit">Delete</button>
      </div>
    </div>
  </div>
</div>
