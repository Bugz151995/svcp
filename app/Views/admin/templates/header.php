<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= site_url()?>dist/css/main.css">
  <link rel="stylesheet" href="<?= site_url()?>dist/css/footer.css">
  <title>Document</title>
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap py-3 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-4 ms-5 ms-md-0" href="#">
    <img src="<?= site_url()?>dist/images/school_logo.png" width="40" height="40">
    SVC-PORTAL
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="<?= site_url()?>admin/logout">Sign out</a>
    </div>
  </div>
</header>
<div class="container-fluid">
  <div class="row">