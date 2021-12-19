<main class="col-md-8 ms-sm-auto col-lg-9 px-md-4">
  <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>

  <div class="row justify-content-around g-5 mt-5">
    <div class="col-9 col-lg-5">
      <div class="card bg-dark text-white shadow">
        <img src="<?= site_url()?>dist/images/3421709.jpg" class="card-img" alt="...">
        <div class="card-img-overlay">
          <h5 class="card-title">Registered Voter</h5>
          <p class="card-text">
            &nbsp;
          </p>
          <div class="row align-items-center justify-content-between">
            <div class="col-4">
              <i class="fas fa-user-check fa-5x"></i>
            </div>
            <div class="col-8 text-end">
              <h1 class="display-1 fw-bold"><?= $registered[0]['count']?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-9 col-lg-5">
      <div class="card bg-dark text-white shadow">
        <img src="<?= site_url()?>dist/images/3421709.jpg" class="card-img" alt="...">
        <div class="card-img-overlay">
          <h5 class="card-title">Total Votes</h5>
          <p class="card-text">
            &nbsp;
          </p>
          <div class="row align-items-center justify-content-between">
            <div class="col-4">
              <i class="fas fa-vote-yea fa-5x"></i>
            </div>
            <div class="col-8 text-end">
              <h1 class="display-1 fw-bold"><?= count($total_vote)?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</main>