<a href="#" class="btn btn-sm btn-outline-primary d-none" id="deletePositionBtn" data-bs-toggle="modal" data-bs-target="#deletePosition"><i class="fas fa-camera-retro fa-fw me-2"></i></a>

<!-- Modal -->
<div class="modal fade" id="deletePosition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletePositionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletePositionLabel">Delete Position Confirm</h5>
        <a href="<?= site_url()?>admin/position" role="button" class="btn-close"></a>
      </div>
      <?= form_open('admin/position/delete') ?>
      <?= csrf_field() ?>
      <?= form_hidden('p', $position['position_id']) ?>
        <div class="modal-body">        
          <p>Are You sure that you want to delete this position?</p>
        </div>
        <div class="modal-footer">
          <a href="<?= site_url()?>admin/position" role="button" class="btn btn-secondary">Close</a>
          <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle fa-fw me-2"></i>Confirm</button>
        </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('deletePositionBtn').click();
  })
</script>