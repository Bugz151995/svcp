<a href="#" class="btn btn-sm btn-outline-primary d-none" id="updateNameBtn" data-bs-toggle="modal" data-bs-target="#updateName"><i class="fas fa-camera-retro fa-fw me-2"></i></a>

<!-- Modal -->
<div class="modal fade" id="updateName" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateNameLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateNameLabel"><i class="fas fa-signature fa-fw me-2"></i>Update Name</h5>
        <a href="<?= site_url()?>account" role="button" class="btn-close" aria-label="Close"></a>
      </div>
      
      <?= form_open('account/update_name') ?>
      <?= csrf_field() ?>
      <div class="modal-body">
        <div class="row g-3">
          <div class="form-group col-sm-6">
            <label for="fname" class="form-label"><span class="text-danger">*</span> Firstname</label>
            <input type="text" name="fname" id="fname" value="<?= set_value('fname', $student['fname'])?>" placeholder="Firstname here..." class="form-control form-control-sm">
            <?php if(isset($validation)): ?>
              <?= $validation->showError('fname', 'my_single') ?>
            <?php endif ?>
          </div>

          <div class="form-group col-sm-6">
            <label for="mname" class="form-label"><span class="text-danger">&nbsp;</span> Middlename</label>
            <input type="text" name="mname" id="mname" value="<?= set_value('mname', $student['mname'])?>" placeholder="Middlename here..." class="form-control form-control-sm">
          </div>

          <div class="form-group col-sm-6">
            <label for="lname" class="form-label"><span class="text-danger">*</span> Lastname</label>
            <input type="text" name="lname" id="lname" value="<?= set_value('lname', $student['lname'])?>" placeholder="Lastname here..." class="form-control form-control-sm">
            <?php if(isset($validation)): ?>
              <?= $validation->showError('lname', 'my_single') ?>
            <?php endif ?>
          </div>

          <div class="form-group col-sm-6">
            <label for="suffix" class="form-label"><span class="text-danger">&nbsp;</span> Suffix</label>
            <input type="text" name="suffix" id="suffix" value="<?= set_value('suffix', $student['suffix'])?>" placeholder="Suffix here..." class="form-control form-control-sm">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-fw me-2"></i>Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('updateNameBtn').click();
  })
</script>