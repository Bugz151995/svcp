<a href="#" class="btn btn-sm btn-outline-primary d-none" id="updateUnameBtn" data-bs-toggle="modal" data-bs-target="#updateUname"><i class="fas fa-camera-retro fa-fw me-2"></i></a>

<!-- Modal -->
<div class="modal fade" id="updateUname" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateUnameLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateUnameLabel"><i class="fas fa-user fa-fw me-2"></i>Update Email</h5>
        <a href="<?= site_url()?>account" role="button" class="btn-close" aria-label="Close"></a>
      </div>
      
      <?= form_open('account/update_uname') ?>
      <?= csrf_field() ?>
      <div class="modal-body">
        <div class="row g-3">
          <div class="form-group col-12">
            <label for="uname" class="form-label"><span class="text-danger">*</span> Username</label>
            <input type="uname" name="uname" id="uname" value="<?= set_value('email', $student['uname'])?>" placeholder="Username here..." class="form-control form-control-sm">
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
    document.getElementById('updateUnameBtn').click();
  })
</script>