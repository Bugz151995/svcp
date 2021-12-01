<a href="#" class="btn btn-sm btn-outline-primary d-none" id="deleteCandidateBtn" data-bs-toggle="modal" data-bs-target="#deleteCandidate"><i class="fas fa-camera-retro fa-fw me-2"></i></a>

<!-- Modal -->
<div class="modal fade" id="deleteCandidate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteCandidateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCandidateLabel">Delete Candidate Confirm</h5>
        <a href="<?= site_url()?>admin/candidate" role="button" class="btn-close"></a>
      </div>
      <?= form_open('admin/candidate/delete') ?>
      <?= csrf_field() ?>
      <?= form_hidden('c', $candidate['candidate_id']) ?>
        <div class="modal-body">        
          <p>Are You sure that you want to delete this candidate?</p>
        </div>
        <div class="modal-footer">
          <a href="<?= site_url()?>admin/candidate" role="button" class="btn btn-secondary">Close</a>
          <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle fa-fw me-2"></i>Confirm</button>
        </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('deleteCandidateBtn').click();
  })
</script>