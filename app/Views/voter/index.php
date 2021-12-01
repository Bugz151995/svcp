<main>
  <section class="dark-transparent-bg">    
    <div class="container bg-transparent py-3 small">
      <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='white'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#" class="text-decoration-none link-light"><i class="fas fa-home fa-fw me-2"></i>Home</a></li>
        </ol>
      </nav>
    </div>
    <div class="container py-5 text-light">
      <div class="py-5">
        <h1 class="display-1 fw-bold text-center text-lg-start mb-4">Welcome to Sheperdville College Voting Portal</h1>
        <p class="lead">Sheperdville College Voting portal aims to provide students the capability to vote with ease with the use of QR Code technology, as well as facilitate and view the status of election. </p>
        <div class="text-center text-lg-start">
          <a href="<?= site_url()?>vote" class="btn btn-lg btn-outline-warning"><i class="fas fa-chevron-right me-2"></i>Have you not voted yet? Vote Now</a>
        </div>
      </div>      
    </div>
  </section>

  <section class="container py-5 my-5 me-lg-0">
    <div class="row py-5">
      <div class="col-lg-5 d-flex flex-column justify-content-center">
        <h2 class="display-3 fw-bold text-center text-lg-start mb-4">Automated Voting</h2>
        <p class="lead">The Sheperdville College provides you with automated voting with the use of QR Code Technology. A quick response (QR) code is a type of barcode that can be read easily by a digital device and which stores information as a series of pixels in a square-shaped grid.</p>
        <div class="col-auto text-center text-lg-start">
          <a href="#" class="btn btn-lg btn-outline-secondary"><i class="fas fa-chevron-right me-2"></i>Vote Now</a>
        </div>
      </div>
      <div class="col-lg-7 pe-0 m-0 d-none d-lg-block">
        <img src="<?= site_url()?>dist/images/vote.png" class="img-fluid" alt="">
      </div>
    </div>
  </section>

  <section class="container pb-5 pb-lg-0 mt-5 ms-lg-0">
    <div class="row pt-5 pb-5 pb-lg-0">
      <div class="col-lg-7 ps-0 m-0 d-none d-lg-block">
        <img src="<?= site_url()?>dist/images/status.png" class="img-fluid" alt="">
      </div>
      <div class="col-lg-5 d-flex flex-column justify-content-start">
        <h2 class="display-3 fw-bold text-center text-lg-start mb-4">Election Status</h2>
        <p class="lead">The Sheperdville College Portal also provides transparency of data. Voters is able to view the poll and status of the election.</p>
        <div class="col-auto text-center text-lg-start">
          <a href="#" class="btn btn-lg btn-outline-secondary"><i class="fas fa-chevron-right me-2"></i>View Election Status</a>
        </div>
      </div>
    </div>
  </section>
</main>