<main class="container">
  <div class="bg-transparent py-3 small">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='dark'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url()?>home" class="text-decoration-none link-dark"><i class="fas fa-home fa-fw me-2"></i>Home</a></li>
        <li class="breadcrumb-item active"><a href="#" class="text-decoration-none link-secondary text-muted">Vote</a></li>
      </ol>
    </nav>
  </div>

  <section class="pb-5 my-5 d-flex flex-column align-items-center">
    <?php if(session()->getTempData('success')): ?>
      <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
        <strong>Yey!</strong> <?= session()->getTempData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>
    <?php if(session()->getTempData('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
        <strong>Oops!</strong> <?= session()->getTempData('error') ?>
        <button type="button" class="btn-close" aria-label="Close"></button>
      </div>
    <?php endif ?>

    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="<?= site_url()?>dist/images/5228739.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold lh-1 mb-3">Welcome Dear Voter.</h1>
          <p class="lead">Voting requires each student to scan their QR code. In order to vote, click the "Scan QR Code" Button below. This will display the scanner from your screen. Once the popup modal is up just click "Start Scanning" and allow the browser to access your camera and point your camera to the QR Code. That's all there is to know. Good Day and Please vote wisely!</p>
          <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Scan QR Code</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModal"  data-bs-backdrop="static"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Scan QR Code</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-0 ">
            <div id="qr-reader" class="bg-light" style="width: 100%;" data-bs-dismiss=""></div>
            <div id="qr-reader-results"></div>
          </div>
        </div>
      </div>
    </div>    
    
  </section>
</main>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript">
</script>
<script>
    // function setFullScreen(e)
    // {
    //   e.style.height = "100vh";
    //   e.style.position = "fixed";
    //   e.style.zIndex = '1050';
    //   e.style.top = '0';
    //   e.style.left = '0';
    // }

    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                // Handle on success condition with the decoded message.
                console.log(decodedText);
                window.location.href = "<?= site_url()?>vote/form/" + decodedText;
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250, aspectRatio: 1.333334 });
        html5QrcodeScanner.render(onScanSuccess);
    });
</script>
