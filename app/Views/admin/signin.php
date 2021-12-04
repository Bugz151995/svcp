<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= site_url()?>dist/css/main.css">
  <title>SVC-Portal</title>
</head>
<body>
  <div class="row m-0">
    <div class="col-lg-6 d-none d-lg-block fixed-height-100 p-0">
      <img src="<?= site_url()?>dist/images/school_bg-2.png" class="sign-in-bg" alt="">
    </div>
    <div class="col-lg-6 fixed-height-100 d-flex align-items-center"> 
      <div class="d-flex flex-column w-100 px-2">   
        <div class="card-img-top d-flex justify-content-center">
          <img src="<?= site_url()?>dist/images/school_logo.png" alt="" class="w-25 p-2">
        </div>
        <div class="h3 display-6 text-center">
          <span class="text-success">Welcome</span> Admin,
        </div>
        <span class="lead text-success text-center">please login to your account.</span>
        <div class="card-body px-0 mt-4">
          <?= form_open('admin/signin');?>
            <?= csrf_field()?>
            
            <?php if(isset($validation)): ?>
            <?= $validation->showError('pass', 'my_single') ?>
            <?php endif ?>
            <div class="row g-2 g-sm-4">
              <div class="col-sm-6 form-group">
                <label for="uname" class="form-label">Username</label>
                <input type="text" name="uname" id="uname" placeholder="Username here..." class="form-control">
              </div>

              <div class="col-sm-6 form-group">
                <label for="pass" class="form-label">Password</label>
                <div class="input-group">
                  <input type="password" name="pass" id="pass" placeholder="Password here..." class="form-control border-0 border-top border-start border-bottom">
                  <div class="input-group-text bg-white border-0 border-top border-end border-bottom">
                    <i class="far fa-eye fa-fw"></i>
                  </div>
                </div>
              </div>
            </div>
            
            <hr class="my-4">

            <div class="row justify-content-end g-2">

              <div class="col-auto order-1 order-sm-2">
                <input type="submit" value="Sign In" class="btn btn-primary float-end">
              </div>
            </div>
          <?= form_close();?>
        </div>
      </div>  
    </div>
  </div>
</body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- font awesome icons -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</html>