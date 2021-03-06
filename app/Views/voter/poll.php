<main class="container">
  <div class="bg-transparent py-3 small">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='dark'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url() ?>home" class="text-decoration-none link-dark"><i class="fas fa-home fa-fw me-2"></i>Home</a></li>
        <li class="breadcrumb-item active"><a href="#" class="text-decoration-none link-secondary text-muted">Poll</a></li>
      </ol>
    </nav>
  </div>

  <section>
    <div class="display-6">Summary of Votes</div>
    <p class="lead">This page declares the summary of the votes of each candidate.</p>
  </section>

  <section class="table-responsive pb-5 mb-5">
    <div class="d-none" id="endTime"><?= $limit[0]['time_limit'] ?></div>
    <div class="d-none" id="route">winners</div>
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
    <table class="table table-borderless table-striped mt-5 shadow rounded">
      <thead class="table-warning">
        <tr>
          <th></th>
          <th>Candidate Name</th>
          <th>Position</th>
          <th>Total Votes</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($votes as $key => $c) : ?>
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
              <?= $c['position'] ?>
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?= $c['votes'] ?>"><?= $c['votes'] ?></div>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </section>
</main>
<script src="<?= site_url() ?>dist/js/countdown_timer.js"></script>