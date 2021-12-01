<main class="col-md-8 ms-sm-auto col-lg-9 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Poll</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
        This week
      </button>
    </div>
  </div>
  
  <section class="pt-5 d-flex justify-content-end">
    <?= $pager->links(); ?>
  </section>
  <table class="table table-bordered table-striped mt-5">
    <thead>
      <tr>
        <th></th>
        <th>Candidate Name</th>
        <th>Position</th>
        <th>Total Votes</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($votes as $key => $c) :?>
      <tr>
        <td><?= $key + 1 ?></td>
        <td>
          <?= $c['fname'].' ' ?>
          <?php if($c['mname']): ?>
            <?= substr($c['mname'],0,1).'. ' ?>
          <?php endif ?>
          <?= $c['lname'].' ' ?>
          <?php if($c['suffix']): ?>
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
</main>