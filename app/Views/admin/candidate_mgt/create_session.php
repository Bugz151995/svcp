<a href="#" class="btn btn-sm btn-outline-primary d-none" id="addCandidateBtn" data-bs-toggle="modal" data-bs-target="#addCandidate"><i class="fas fa-camera-retro fa-fw me-2"></i></a>

<!-- Modal -->
<div class="modal fade" id="addCandidate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCandidateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCandidateLabel">Add Voting Session</h5>
        <a href="<?= site_url()?>admin/candidate" role="button" class="btn-close"></a>
      </div>
      <?= form_open('admin/voting_session/save') ?>
      <?= csrf_field() ?>
      <div class="modal-body">   
        <div class="row g-3 g-lg-4 mb-3">
          <div class="form-group col-sm-12">
            <label for="scope" class="form-label"><span class="text-danger">*</span> Voting Session Scope</label>
            <input type="text" name="scope" id="scope" value="<?= set_value('scope')?>" placeholder="Enter the scope of the voting session here..." class="form-control form-control-sm">
            <?php if(isset($validation)): ?>
              <?= $validation->showError('scope', 'my_single') ?>
            <?php endif ?>
          </div>

          <div class="form-group col-sm-6">
            <label for="start_date" class="form-label"><span class="text-danger">*</span> Session Start</label>
            <input type="date" name="start_date" id="start_date" value="<?= set_value('start_date')?>" class="form-control form-control-sm">
            <?php if(isset($validation)): ?>
              <?= $validation->showError('start_date', 'my_single') ?>
            <?php endif ?>
          </div>

          <div class="form-group col-sm-6">
            <label for="end_date" class="form-label"><span class="text-danger">*</span> Session End</label>
            <input type="date" name="end_date" id="end_date" value="<?= set_value('end_date')?>" class="form-control form-control-sm">
            <?php if(isset($validation)): ?>
              <?= $validation->showError('end_date', 'my_single') ?>
            <?php endif ?>
          </div>
        </div> 
      </div>
      <div class="modal-footer">
        <a href="<?= site_url()?>admin/candidate" role="button" class="btn btn-secondary">Close</a>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-fw me-2"></i>Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('addCandidateBtn').click();
  })
</script>