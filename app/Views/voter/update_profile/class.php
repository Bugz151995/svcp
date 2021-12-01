<a href="#" class="btn btn-sm btn-outline-primary d-none" id="updateClassBtn" data-bs-toggle="modal" data-bs-target="#updateClass"><i class="fas fa-camera-retro fa-fw me-2"></i></a>

<!-- Modal -->
<div class="modal fade" id="updateClass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateClassLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateClassLabel"><i class="fas fa-user-graduate fa-fw me-2"></i>Update Class</h5>
        <a href="<?= site_url()?>account" role="button" class="btn-close" aria-label="Close"></a>
      </div>
      
      <?= form_open('account/update_class') ?>
      <?= csrf_field() ?>
      <div class="modal-body">
        <div class="row g-3">
          <div class="form-group col-12">
            <label for="class" class="form-label"><span class="text-danger">*</span> Class</label>
            <select name="class" id="class" class="form-select form-select-sm">
              <option value="" selected disabled>Select your Class</option>
              <?php foreach($class as $key => $c): ?>
                <option value="<?= $c['class_id']?>" <?= ($student['class_id'] == $c['class_id']) ? set_select('class', $student['class_id'], TRUE) : '' ?>><?= $c['grade']?><?= $c['section']?></option>
              <?php endforeach ?>
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
    document.getElementById('updateClassBtn').click();
  })
</script>