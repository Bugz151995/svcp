<a href="#" class="btn btn-sm btn-outline-primary d-none" id="addPositionBtn" data-bs-toggle="modal" data-bs-target="#addPosition"><i class="fas fa-camera-retro fa-fw me-2"></i></a>

<!-- Modal -->
<div class="modal fade" id="addPosition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addPositionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPositionLabel">Add Position</h5>
        <a href="<?= site_url()?>admin/position" role="button" class="btn-close"></a>
      </div>
      <?= form_open('admin/position/save') ?>
      <?= csrf_field() ?>
      <div class="modal-body">        
        <div class="mb-3">
          <label for="post" class="form-label"><span class="text-danger">*</span> Position</label>
          <input type="text" name="post" id="post" value="<?= set_value('post')?>" placeholder="Position here..." class="form-control form-control-sm">
        </div>       
        <div class="mb-3">
          <label for="al_c" class="form-label"><span class="text-danger">*</span> Allowed Candidates</label>
          <input type="number" name="al_c" id="al_c" value="<?= set_value('al_c')?>" placeholder="Number of Candidates here..." class="form-control form-control-sm">
        </div>
      </div>
      <div class="modal-footer">
        <a href="<?= site_url()?>admin/position" role="button" class="btn btn-secondary">Close</a>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-fw me-2"></i>Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('addPositionBtn').click();
  })
</script>