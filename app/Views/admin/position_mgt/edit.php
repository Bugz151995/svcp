<a href="#" class="btn btn-sm btn-outline-primary d-none" id="editPositionBtn" data-bs-toggle="modal" data-bs-target="#editPosition"><i class="fas fa-camera-retro fa-fw me-2"></i></a>

<!-- Modal -->
<div class="modal fade" id="editPosition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPositionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPositionLabel">Edit Position</h5>
        <a href="<?= site_url()?>admin/position" role="button" class="btn-close"></a>
      </div>
      <?= form_open('admin/position/update') ?>
      <?= csrf_field() ?>
      <?= form_hidden('p', $position['position_id']) ?>
      <div class="modal-body">        
        <div class="mb-3">
          <label for="post" class="form-label"><span class="text-danger">*</span> Position</label>
          <input type="text" name="post" id="post" value="<?= set_value('post', $position['position'])?>" placeholder="Position here..." class="form-control form-control-sm">
        </div>       
        <div class="mb-3">
          <label for="al_c" class="form-label"><span class="text-danger">*</span> Allowed Candidates</label>
          <input type="number" name="al_c" id="al_c" value="<?= set_value('al_c', $position['allowed_candidate'])?>" placeholder="Number of Candidates here..." class="form-control form-control-sm">
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
    document.getElementById('editPositionBtn').click();
  })
</script>