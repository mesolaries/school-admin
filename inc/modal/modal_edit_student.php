<!-- Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="editStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editStudentModalLabel">Edit student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit_student_form" class="form-group" method="POST">
          <input type="hidden" name="edit" value="student">
          <label for="std-select-edit">Select student</label>
          <select id="std-select-edit" class="select-student form-control" name="id"></select>
          <input class="input form-control mt-2" type="text" name="name" placeholder="Enter new name..." required>
        </form>
        <small class="text-success pl-1 d-none">Student edited</small>
      </div>
      <div class="modal-footer">
        <button id="edit-student-button" class="btn btn-warning" type="submit" form="edit_student_form" name="submit">Save changes</button>
      </div>
    </div>
  </div>
</div>
