<main class="col-md-8 ms-sm-auto col-lg-9 px-md-4">
  <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Candidate Management</h1>
  </div>

  <section class="py-5">
    <div class="d-flex justify-content-between">
      <!-- Button trigger modal -->
      <div class="d-flex gap-3">
        <a href="<?= site_url() ?>admin/candidate/new" role="button" class="btn btn-outline-primary rounded-pill">
          Add Candidate
        </a>
      </div>
      <?= $pager->links(); ?>
    </div>
  </section>

  <?php if (session()->getTempData('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Yey!</strong> <?= session()->getTempData('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>

  <?php if (session()->getTempData('error')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Oops!</strong> <?= session()->getTempData('error') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>

  <div class="table-responsive rounded rounded-3 shadow mb-5">
    <table class="table table-bordered table-striped mb-0">
      <thead>
        <tr>
          <th></th>
          <th>Candidate Name</th>
          <th>Position</th>
          <th>Date Registered</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($candidates as $key => $c) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td>
              <?= $c['fname'] . ' ' ?>
              <?php if ($c['mname']) : ?>
                <?= substr($c['mname'], 0, 1) . '. ' ?>
              <?php endif ?>
              <?= $c['lname'] . ' ' ?>
              <?php if ($c['suffix']) : ?>
                <?= $c['suffix'] ?>
              <?php endif ?>
            </td>
            <td>
              <div class="d-flex">
                <span class="pe-5">
                  <?= $c['position'] ?>
                </span>
                <span class="ms-auto small">
                  <span class="badge bg-primary small shadow-sm"><?= $c['allowed_candidate'] ?> allowed</span>
                </span>
              </div>
            </td>
            <td><?= date('M d, Y @ h:i:s a', strtotime($c['registered_at'])) ?></td>
            <td>
              <div class="row justify-content-center g-3">
                <div class="col-auto">
                  <?= form_open('admin/candidate/edit') ?>
                  <?= csrf_field() ?>
                  <?= form_hidden('c', $c['candidate_id']) ?>
                  <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit fa-fw"></i></button>
                  <?= form_close() ?>
                </div>

                <div class="col-auto">
                  <?= form_open('admin/candidate/confirm_delete') ?>
                  <?= csrf_field() ?>
                  <?= form_hidden('c', $c['candidate_id']) ?>
                  <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt fa-fw"></i></button>
                  <?= form_close() ?>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <div class="row justify-content-between">
    <?= form_open('admin/candidate/time_limit', ['class' => 'col-auto d-flex gap-3']) ?>
    <div class="form-floating">
      <input type="datetime-local" name="time_limit" id="time_limit" class="form-control">
      <label for="time_limit">Set Time Limit</label>
    </div>
    <button class="btn btn-primary">
      <i class="fas fa-save"></i> Save
    </button>
    <?= form_close() ?>
    <div class="col text-end">
      
      <div class="d-none" id="endTime"><?= $limit[0]['time_limit']?></div>
      <div class="d-none" id="route">#</div>
      <div id="countdown" class="d-flex justify-content-end">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a href="#" class="nav-link"><strong>Voting Expires In:</strong></a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"><span id="days"></span> days</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"><span id="hours"></span> Hours</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"><span id="minutes"></span> Minutes</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"><span id="seconds"></span> Seconds</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</main>
<script src="<?= site_url() ?>dist/js/countdown_timer.js"></script>