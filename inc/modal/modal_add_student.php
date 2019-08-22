<!-- Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentModalLabel">Add new student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add_student_form" class="form-group" method="POST">
          <input type="hidden" name="add" value="student">
          <input class="input form-control" type="text" name="name" placeholder="Student name">
        </form>
        <small class="text-success pl-1 d-none">Student added</small>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" form="add_student_form" name="submit">Add</button>
      </div>
    </div>
  </div>
</div>
