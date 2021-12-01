<?php 
$uri = service('uri');
$page = $uri->getSegment(1);
?>
<header class="p-3 bg-dark text-white sticky-top">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <img src="<?= site_url()?>dist/images/school_logo.png" width="40" height="40">
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="<?= site_url()?>home" class="nav-link px-2 <?= ($page == 'home') ? 'text-secondary' : 'text-white'?>">Home</a></li>
        <li><a href="<?= site_url()?>poll" class="nav-link px-2 <?= ($page == 'poll') ? 'text-secondary' : 'text-white'?>">Poll</a></li>
        <li><a href="<?= site_url()?>vote" class="nav-link px-2 <?= ($page == 'vote') ? 'text-secondary' : 'text-white'?>">Vote</a></li>
        <li><a href="<?= site_url()?>about" class="nav-link px-2 <?= ($page == 'about') ? 'text-secondary' : 'text-white'?>">About</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link px-2 <?= ($page == 'contact') ? 'text-secondary' : 'text-white'?>" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Contact Us</a>          
          <ul class="dropdown-menu dropdown-menu-dark shadow-lg" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="#">
              <i class="fas fa-phone fa-fw me-2"></i> 09123456789
            </a></li>
            <li><a class="dropdown-item" href="#">
              <i class="fas fa-envelope-open fa-fw me-2"></i> shepherdvillecollege1996@gmail.com
            </a></li>
            <li><a class="dropdown-item" href="#">
              <i class="fas fa-map-marker-alt fa-fw me-2"></i> Talonjongon, Tigaon, Camarines Sur
            </a></li>
          </ul>
        </li>
      </ul>

      <div class="text-end">
        <a href="<?= site_url()?>signout" role="button" class="btn btn-warning me-2">Sign-out</a>
        <a href="<?= site_url()?>account" class="btn btn-warning border-0 rounded-circle m-0 p-0">
          <img src="<?= $student['image']?>" width="40" height="40" class="rounded-circle">
        </a>
      </div>
    </div>
  </div>
</header>