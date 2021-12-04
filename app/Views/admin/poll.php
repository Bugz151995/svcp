<main class="col-md-8 ms-sm-auto col-lg-9 px-md-4">
  <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Poll</h1>
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