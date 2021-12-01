<a href="#" class="btn btn-sm btn-outline-primary d-none" id="addCandidateBtn" data-bs-toggle="modal" data-bs-target="#addCandidate"><i class="fas fa-camera-retro fa-fw me-2"></i></a>

<!-- Modal -->
<div class="modal fade" id="addCandidate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCandidateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCandidateLabel">Add Candidate</h5>
        <a href="<?= site_url()?>admin/candidate" role="button" class="btn-close"></a>
      </div>
      <?= form_open('admin/candidate/save') ?>
      <?= csrf_field() ?>
      <div class="modal-body">   
        <div class="row g-3 g-lg-4 mb-3">
          <div class="form-group col-sm-6">
            <label for="fname" class="form-label"><span class="text-danger">*</span> Firstname</label>
            <input type="text" name="fname" id="fname" value="<?= set_value('fname')?>" placeholder="Firstname here..." class="form-control form-control-sm">
            <?php if(isset($validation)): ?>
              <?= $validation->showError('fname', 'my_single') ?>
            <?php endif ?>
          </div>

          <div class="form-group col-sm-6">
            <label for="mname" class="form-label"><span class="text-danger">&nbsp;</span> Middlename</label>
            <input type="text" name="mname" id="mname" value="<?= set_value('mname')?>" placeholder="Middlename here..." class="form-control form-control-sm">
            <?php if(isset($validation)): ?>
              <?= $validation->showError('mname', 'my_single') ?>
            <?php endif ?>
          </div>

          <div class="form-group col-sm-6">
            <label for="lname" class="form-label"><span class="text-danger">*</span> Lastname</label>
            <input type="text" name="lname" id="lname" value="<?= set_value('lname')?>" placeholder="Lastname here..." class="form-control form-control-sm">
            <?php if(isset($validation)): ?>
              <?= $validation->showError('lname', 'my_single') ?>
            <?php endif ?>
          </div>

          <div class="form-group col-sm-6">
            <label for="suffix" class="form-label"><span class="text-danger">&nbsp;</span> Suffix</label>
            <input type="text" name="suffix" id="suffix" value="<?= set_value('suffix')?>" placeholder="Suffix here..." class="form-control form-control-sm">
            <?php if(isset($validation)): ?>
              <?= $validation->showError('suffix', 'my_single') ?>
            <?php endif ?>
          </div>
        </div>     
        <div class="mb-3">
          <label for="post" class="form-label"><span class="text-danger">*</span> Position</label>
          <select name="post" id="post" class="form-select form-select-sm">
            <option value="" selected disabled>Select a Position</option>
            <?php foreach($positions as $key => $p): ?>
              <option value="<?= $p['position_id']?>" <?= set_select('post', $p['position']) ?>><?= $p['position']?></option>
            <?php endforeach ?>
          </select>
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