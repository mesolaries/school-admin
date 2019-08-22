<!-- Modal -->
<div class="modal fade" id="deleteSubjectModal" tabindex="-1" role="dialog" aria-labelledby="deleteSubjectModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteSubjectModalLabel">Delete subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="delete_subject_form" class="form-group" method="POST">
          <input type="hidden" name="delete" value="subject">
          <label for="sbj-select-dlt">Select subject:</label>
          <select id="sbj-select-dlt" class="select-subject form-control" name="id"></select>
        </form>
        <small class="text-danger pl-1 d-none">Subject deleted</small>
      </div>
      <div class="modal-footer">
        <button id="delete-subject-button" class="btn btn-danger" type="submit" form="delete_subject_form" name="submit">Delete</button>
      </div>
    </div>
  </div>
</div>
