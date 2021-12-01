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
      <img src="<?= site_url()?>dist/images/school_bg.jpg" class="sign-in-bg" alt="">
    </div>
    <div class="col-lg-6 fixed-height-100 d-flex align-items-center"> 
      <div class="d-flex flex-column w-100 px-2">   
        <div class="card-img-top d-flex justify-content-center justify-content-lg-start">
          <img src="<?= site_url()?>dist/images/school_logo.png" alt="" class="w-25 p-2">
        </div>
        <div class="h3 display-6 text-center text-lg-start">
          <span class="text-success">Register</span> Now,
        </div>
        <span class="lead text-success">Creating your account only takes a few steps.</span>
                
        <div class="card-body px-0 mt-4">
          <?= form_open('signup/submit');?>
            <?= csrf_field()?>
            
            <?php if (session()->get('signup_success') !== NULL) :?>
              <div class="alert alert-success p-2">
                <?= session()->get('signup_success')?>
              </div>
            <?php endif?>

            <div class="row g-3 g-lg-4 mb-3">
              <div class="form-group col-sm-6">
                <label for="fname" class="form-label"><span class="text-danger">*</span> Firstname</label>
                <input type="text" name="fname" id="fname" value="<?= set_value('fname')?>" placeholder="Firstname here..." class="form-control form-control-sm">
                <?php if(isset($validation)): ?>
                  <?= $validation->showError('fname', 'my_single') ?>
                <?php endif ?>
              </div>

              <div class="form-group col-sm-6">
                <label for="mname" class="form-label"><span class="text-danger">&nbsp;</span> Middlename</label>
                <input type="text" name="mname" id="mname" value="<?= set_value('mname')?>" placeholder="Middlename here..." class="form-control form-control-sm">
                <?php if(isset($validation)): ?>
                  <?= $validation->showError('mname', 'my_single') ?>
                <?php endif ?>
              </div>

              <div class="form-group col-sm-6">
                <label for="lname" class="form-label"><span class="text-danger">*</span> Lastname</label>
                <input type="text" name="lname" id="lname" value="<?= set_value('lname')?>" placeholder="Lastname here..." class="form-control form-control-sm">
                <?php if(isset($validation)): ?>
                  <?= $validation->showError('lname', 'my_single') ?>
                <?php endif ?>
              </div>

              <div class="form-group col-sm-6">
                <label for="suffix" class="form-label"><span class="text-danger">&nbsp;</span> Suffix</label>
                <input type="text" name="suffix" id="suffix" value="<?= set_value('suffix')?>" placeholder="Suffix here..." class="form-control form-control-sm">
                <?php if(isset($validation)): ?>
                  <?= $validation->showError('suffix', 'my_single') ?>
                <?php endif ?>
              </div>
            </div>

            <div class="row g-3 g-lg-4 mb-3">
              <div class="col-6">
                <label for="class" class="form-label"><span class="text-danger">*</span> Class</label>
                <select name="class" id="class" class="form-select form-select-sm">
                  <option value="" selected disabled>Select your Class</option>
                  <?php foreach($class as $key => $c): ?>
                    <option value="<?= $c['class_id']?>" <?= set_select('class', $c['class_id']) ?>><?= $c['grade']?><?= $c['section']?></option>
                  <?php endforeach ?>
                </select>
                <?php if(isset($validation)): ?>
                  <?= $validation->showError('class', 'my_single') ?>
                <?php endif ?>
              </div>
              <div class="col-6">
                <label for="sex" class="form-label"><span class="text-danger">*</span> Gender</label>
                <select name="sex" id="sex" class="form-select form-select-sm">
                  <option value="" selected disabled>Select your Gender</option>
                  <option value="Male" <?= set_select('sex', 'Male') ?>>Male</option>
                  <option value="Female" <?= set_select('sex', 'Female') ?>>Female</option>
                </select>
                <?php if(isset($validation)): ?>
                  <?= $validation->showError('sex', 'my_single') ?>
                <?php endif ?>
              </div>
            </div>
              
            <div class="row g-3 g-lg-4">
              <div class="form-group col-sm-6">
                <label for="uname" class="form-label"><span class="text-danger">*</span> Username</label>
                <input type="text" name="uname" id="uname" value="<?= set_value('uname')?>" placeholder="Username here..." class="form-control form-control-sm">
                <?php if(isset($validation)): ?>
                  <?= $validation->showError('uname', 'my_single') ?>
                <?php endif ?>
              </div>

              <div class="form-group col-sm-6">
                <label for="email" class="form-label"><span class="text-danger">*</span> E-mail address</label>
                <input type="email" name="email" id="email" value="<?= set_value('email')?>" placeholder="Email address here..." class="form-control form-control-sm">
                <?php if(isset($validation)): ?>
                  <?= $validation->showError('email', 'my_single') ?>
                <?php endif ?>
              </div>

              <div class="form-group col-sm-6">
                <label for="pass" class="form-label"><span class="text-danger">*</span> Password</label>
                <input type="password" name="pass" id="pass" value="<?= set_value('pass')?>" placeholder="Password here..." class="form-control form-control-sm border-0 border-top border-start border-bottom">
                <?php if(isset($validation)): ?>
                  <?= $validation->showError('pass', 'my_single') ?>
                <?php endif ?>
              </div>

              <div class="form-group col-sm-6">
                <label for="passconf" class="form-label"><span class="text-danger">*</span> Repeat Password</label>
                <input type="password" name="passconf" id="passconf" value="<?= set_value('passconf')?>" placeholder="Confirm Password here..." class="form-control form-control-sm border-0 border-top border-start border-bottom">
                <?php if(isset($validation)): ?>
                  <?= $validation->showError('passconf', 'my_single') ?>
                <?php endif ?>
              </div>
            </div>

            <hr class="my-4">

            <div class="row justify-content-between g-2">
              <div class="col-auto order-2 order-sm-1">
                <a href="<?= site_url()?>" class="link-primary text-decoration-none">Aldready have an Account? Sign In</a>
              </div>

              <div class="col-auto order-1 order-sm-2">
                <input type="submit" value="Sign Up" class="btn btn-primary float-end">
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