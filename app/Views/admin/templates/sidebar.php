    <?php 
      $uri = service('uri');
      $page = $uri->getSegment(2);
    ?>
    <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block bg-light sidebar collapse fixed-height-100 shadow-sm">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?= ($page == 'home') ? 'text-primary' : 'text-dark' ;?>" aria-current="page" href="<?= site_url()?>admin/home">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($page == 'position') ? 'text-primary' : 'text-dark' ;?>" href="<?= site_url()?>admin/position">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
              Position Management
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($page == 'candidate') ? 'text-primary' : 'text-dark' ;?>" href="<?= site_url()?>admin/candidate">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              Candidate Management
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($page == 'poll') ? 'text-primary' : 'text-dark' ;?>" href="<?= site_url()?>admin/poll">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
              Poll
            </a>
          </li>
        </ul>
      </div>
    </nav>
    