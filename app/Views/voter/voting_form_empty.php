<main class="container">
  <div class="bg-transparent py-3 small">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='dark'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url()?>home" class="text-decoration-none link-dark"><i class="fas fa-home fa-fw me-2"></i>Home</a></li>
        <li class="breadcrumb-item active"><a href="#" class="text-decoration-none link-dark">Vote</a></li>
        <li class="breadcrumb-item active"><a href="#" class="text-decoration-none link-secondary text-muted">Voting Form</a></li>
      </ol>
    </nav>
  </div>

  <section class="pb-5 my-5">
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

    <?= form_open('vote/form/select') ?>       
    <?= form_hidden('vs', esc($candidates[0]['voting_session_id'])) ?>  
      <div class="mb-3">
        <label for="sesh" class="form-label"><span class="text-danger">*</span> Voting Session</label>
        <div class="d-flex gap-3">
          <select name="sesh" id="sesh" class="form-select form-select-sm">
            <option value="" selected disabled>Select a Voting Session</option>
            <?php foreach($v_sesh as $key => $v): ?>
              <option value="<?= $v['voting_session_id']?>" <?= set_select('sesh', $v['voting_session_id']) ?>><?= $v['scope']?></option>
            <?php endforeach ?>
          </select>
          <input type="submit" value="Select" class="btn btn-primary">
        </div>
      </div>    
    <?= form_close() ?>
    
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <strong>Notice!</strong> Please select a voting session and click the "Select" button to start voting.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

  </section>
</main> 