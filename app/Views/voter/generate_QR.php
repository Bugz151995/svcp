<main class="flex-shrink-0 container py-5 my-5">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="card mb-3 shadow">
        <div class="row g-0">
          <div class="col-md-4">
            <img id="qr_code" src="<?= $QR?>" class="w-100 rounded-start" alt="...">
          </div>
          <div class="col-md-8 d-flex align-items-center">
            <div class="card-body">
              <h5 class="card-title">
                <?= $voter[0]->fname.' '?>
                <?php if($voter[0]->fname): ?>
                  <?= substr($voter[0]->mname, 0, 1).'. '?>
                <?php endif ?>
                <?= $voter[0]->lname.' '?>
                <?php if($voter[0]->suffix): ?>
                  <?= $voter[0]->suffix?>
                <?php endif ?>
              </h5>
              <p class="card-text">
                Congratulations! You have generated your QR Code. You can download this file to place your vote in the system. Thank you for your participation.
              </p>
              <p class="card-text"><small class="text-muted">Generated @ <?= $voter[0]->registered_at?></small></p>
              <div class="row g-4 mt-3">
                <div class="col-auto">
                  <button onclick="download('<?= $voter[0]->qr_code?>')" class="btn btn-danger"><i class="fas fa-download fa-fw me-2"></i>Download</button>
                </div>
                <div class="col-auto">
                  <a href="<?= site_url()?>" class="btn btn-secondary"><i class="fas fa-vote-yea fa-fw me-2"></i>Vote Now</a>
                </div>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script src="<?= site_url()?>dist/js/download.js"></script>