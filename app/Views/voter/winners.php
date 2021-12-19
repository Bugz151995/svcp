<main class="container">
  <div class="bg-transparent py-3 small">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='dark'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url() ?>home" class="text-decoration-none link-dark"><i class="fas fa-home fa-fw me-2"></i>Home</a></li>
        <li class="breadcrumb-item active"><a href="#" class="text-decoration-none link-secondary text-muted">Winners</a></li>
      </ol>
    </nav>
  </div>

  <section>
    <div class="display-6">Winners</div>
    <p class="lead">This page declares the winners of the voting session. Thank you for your participation.</p>
  </section>

  <!-- know how many positions does the voting session have? -->

  <!-- store and segregate all the data in an array by their respective position -->

  <!-- recurse through all the indexes and store back to the filtered array -->

  <!-- determine the highest vote -->
  <!-- if equal then post both meaning there is a draw -->

  <?php
  function findWinner($data, $position)
  {
    $filteredData = array();
    foreach ($data as $key => $item) {
      if ($position === $item['position']){
        array_push($filteredData, $data[$key]);
      }
    }

    return $filteredData;
  }

  $filteredPositions = array();
  foreach ($positions as $key => $position) {
    array_push($filteredPositions, $position['position']);
  }

  $filteredCandidates = array();
  foreach ($filteredPositions as $key => $position) {
    array_push($filteredCandidates, findWinner($votes, $position));
  }
  
  ?>
  <section class="table-responsive mb-5 shadow rounded rounded-3">
    <table class="table table-borderless table-striped mb-0 hadow rounded">
      <thead class="table-warning">
        <tr>
          <th></th>
          <th>Candidate Name</th>
          <th>Position</th>
          <th>Total Votes</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($filteredCandidates as $key => $c) : ?>

          <tr>
            <td><?= $key + 1 ?></td>
            <td>
              <?= $c[0]['fname'] . ' ' ?>
              <?php if ($c[0]['mname']) : ?>
                <?= substr($c[0]['mname'], 0, 1) . '. ' ?>
              <?php endif ?>
              <?= $c[0]['lname'] . ' ' ?>
              <?php if ($c[0]['suffix']) : ?>
                <?= $c[0]['suffix'] ?>
              <?php endif ?>
            </td>
            <td>
              <?= $c[0]['position'] ?>
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?= $c[0]['votes'] ?>"><?= $c[0]['votes'] ?></div>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </section>
</main>