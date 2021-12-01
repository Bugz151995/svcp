<a href="#" class="btn btn-sm btn-outline-primary d-none" id="updateSexBtn" data-bs-toggle="modal" data-bs-target="#updateSex"><i class="fas fa-camera-retro fa-fw me-2"></i></a>

<!-- Modal -->
<div class="modal fade" id="updateSex" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateSexLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateSexLabel"><i class="fas fa-venus-mars fa-fw me-2"></i>Update Gender</h5>
        <a href="<?= site_url()?>account" role="button" class="btn-close" aria-label="Close"></a>
      </div>
      
      <?= form_open('account/update_sex') ?>
      <?= csrf_field() ?>
      <div class="modal-body">
        <div class="row g-3">
          <div class="form-group col-12">
            <label for="sex" class="form-label"><span class="text-danger">*</span> Gender</label>
            <select name="sex" id="sex" class="form-select form-select-sm">
              <option value="" selected disabled>Select your Gender</option>
              <option value="Male" <?= ($student['gender'] == 'Male') ? set_select('sex', 'Male', TRUE) : '' ?>>Male</option>
              <option value="Female" <?= ($student['gender'] == 'Female') ? set_select('sex', 'Female', TRUE) : '' ?>>Female</option>
            </select>
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
    document.getElementById('updateSexBtn').click();
  })
</script>