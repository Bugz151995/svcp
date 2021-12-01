<main class="container">
  <div class="bg-transparent py-3 small">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='dark'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url()?>home" class="text-decoration-none link-dark"><i class="fas fa-home fa-fw me-2"></i>Home</a></li>
        <li class="breadcrumb-item active"><a href="#" class="text-decoration-none link-secondary text-muted">Account</a></li>
      </ol>
    </nav>
  </div>

  <section class="py-5">
    <?php if(session()->getTempData('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Yey!</strong> <?= session()->getTempData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>
    
    <?php if(session()->getTempData('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oops!</strong> <?= session()->getTempData('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>

    <div class="row g-5">
      <div class="col-lg-5">
        <div class="card p-3">
          <img src="<?= $student['image']?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">
              <i class="fas fa-user-circle fa-fw me-2"></i>
              <?= $student['fname'].' ' ?>
              <?php if($student['mname']): ?>
                <?= substr($student['mname'],0,1).'. ' ?>
              <?php endif ?>
              <?= $student['lname'].' ' ?>
              <?php if($student['suffix']): ?>
                <?= $student['suffix'] ?>
              <?php endif ?>
            </h5>
            <div class="d-flex justify-content-center mt-4">
              <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updatePicture"><i class="fas fa-camera-retro fa-fw me-2"></i>Update Profile Picture</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7 d-flex flex-column align-items-center">
        <div class="card w-100">
          <div class="card-header fw-bold bg-primary text-light">
            About Me
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item list-group-item-action">
              <a href="<?= site_url()?>account/disp_name" class="d-flex justify-content-between">
                <span>
                  <i class="fas fa-signature fa-fw me-2"></i>
                  <?= $student['fname'].' ' ?>
                  <?php if($student['mname']): ?>
                    <?= substr($student['mname'],0,1).'. ' ?>
                  <?php endif ?>
                  <?= $student['lname'].' ' ?>
                  <?php if($student['suffix']): ?>
                    <?= $student['suffix'] ?>
                  <?php endif ?>
                </span>
                <div class="text-primary"><i class="far fa-edit"></i></div>
              </a>
            </li>
            <li class="list-group-item list-group-item-action">
              <a href="<?= site_url()?>account/disp_sex" class="d-flex justify-content-between">
                <span>
                  <i class="fas fa-venus-mars fa-fw me-2"></i>
                  <?= $student['gender'] ?>
                </span>
                <div class="text-primary"><i class="far fa-edit"></i></div>
              </a>
            </li>
            <li class="list-group-item list-group-item-action">
              <a href="<?= site_url()?>account/disp_email" class="d-flex justify-content-between">
                <span>
                  <i class="fas fa-envelope-open fa-fw me-2"></i>
                  <?= $student['email'] ?>
                </span>
                <div class="text-primary"><i class="far fa-edit"></i></div>
              </a>
            </li>
            <li class="list-group-item list-group-item-action">
              <a href="<?= site_url()?>account/disp_class" class="d-flex justify-content-between">
                <span>
                  <i class="fas fa-user-graduate fa-fw me-2"></i>
                  <?= $student['grade'].$student['section'] ?>
                </span>
                <div class="text-primary"><i class="far fa-edit"></i></div>
              </a>
            </li>
            <li class="list-group-item list-group-item-action">
              <a href="<?= site_url()?>account/disp_uname" class="d-flex justify-content-between"><span>
                <i class="fas fa-user fa-fw me-2"></i>
                <?= $student['uname'] ?>
              </span>
              <div class="text-primary"><i class="far fa-edit"></i></div>
              </a>
            </li>
          </ul>
        </div>
        <div class="mt-4">
          <div class="card mb-3 shadow">
            <div class="row g-0">
              <div class="col-md-4">
                <img id="qr_code" src="<?= $QR?>" class="w-100 rounded-start" alt="...">
              </div>
              <div class="col-md-8 d-flex flex-column align-items-center">
                <div class="card-body">
                  <h5 class="card-title">
                    SVC Voting Portal QR Code
                  </h5>
                  <p class="card-text">
                    This QR Code will serve as your id during the voting session.
                  </p>
                  <p class="card-text"><small class="text-muted">Generated @ <?= session()->get('registered_at')?></small></p>            
                </div>
              </div>              
              <div class="card-footer">
                <div class="row g-4 justify-content-end">
                  <div class="col-auto">
                    <a href="<?= site_url()?>" class="btn btn-secondary"><i class="fas fa-vote-yea fa-fw me-2"></i>Vote Now</a>
                  </div>
                  <div class="col-auto">
                    <button onclick="download('<?= session()->get('qr_code')?>')" class="btn btn-danger"><i class="fas fa-download fa-fw me-2"></i>Download</button>
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="updatePicture" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updatePictureLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updatePictureLabel"><i class="fas fa-camera-retro fa-fw me-2"></i>Update Profile Picture</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <?= form_open_multipart('account/update_image') ?>
        <?= csrf_field() ?>
        <div class="modal-body">
          <div class="mb-3">
            <img src="https://dummyimage.com/400x400/8a8a8a/b5b5b5&text=Image+Preview" alt="" id="pr_pic_preview" class="img-fluid" style="width: 100%; height: 400px; object-fit: cover">
          </div>
          <div class="mt-4 mb-3">
            <div class="d-flex justify-content-between align-items-center">
              <div class="col-auto">
                <input type="file" name="pr_pic" id="pr_pic" class="inputfile" />
                <label for="pr_pic" class="btn btn-outline-primary">
                  <i class="fas fa-camera fa fw- me-2"></i>Select an Image...
                </label>
              </div>
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
</main>

<!-- call the preview image function -->
<script>
  document.addEventListener('DOMContentLoaded', ()=> {
    previewImg('pr_pic', 'pr_pic_preview');
  });
</script>