<main class="col-md-8 ms-sm-auto col-lg-9 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
        This week
      </button>
    </div>
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
              <h1 class="display-1 fw-bold"><?= $total_vote[0]['count']?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</main>