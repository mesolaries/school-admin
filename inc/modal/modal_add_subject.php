<!-- Modal -->
<div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSubjectModalLabel">Add new subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add_subject_form" class="form-group" method="POST">
          <input type="hidden" name="add" value="subject">
          <input class="input form-control" type="text" name="name" placeholder="Subject name">
        </form>
        <small class="success text-success pl-1 d-none">Subject added</small>
        <small class="error text-danger pl-1 d-none">Subject exists</small>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" form="add_subject_form" name="submit">Add</button>
      </div>
    </div>
  </div>
</div>
