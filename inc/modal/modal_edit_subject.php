<!-- Modal -->
<div class="modal fade" id="editSubjectModal" tabindex="-1" role="dialog" aria-labelledby="editSubjectModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSubjectModalLabel">Edit subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit_subject_form" class="form-group" method="POST">
          <input type="hidden" name="edit" value="subject">
          <label for="sbj-select-edit">Select subject:</label>
          <select id="sbj-select-edit" class="select-subject form-control" name="id"></select>
          <input class="input form-control mt-2" type="text" name="name" placeholder="Enter new name..." required>
        </form>
        <small class="success text-success pl-1 d-none">Subject edited</small>
        <small class="error text-danger pl-1 d-none">Subject exists</small>
      </div>
      <div class="modal-footer">
        <button id="edit-subject-button" class="btn btn-warning" type="submit" form="edit_subject_form" name="submit">Save changes</button>
      </div>
    </div>
  </div>
</div>
