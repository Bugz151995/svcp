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

  <section class="py-5 my-5">
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
    <?= form_open('vote/register_vote') ?>
    <?= csrf_field() ?>
    <?= form_hidden('v', esc($student['voter_id'])) ?>
      <?php foreach($positions as $i => $post): ?>
      <table class="table table-bordered table-striped mb-5">
        <thead class="table-primary">
          <tr>
            <th>
              <div class="row">
                <div class="col-4 text-uppercase">
                  <?= $post['position'] ?>
                </div>
                <div class="col-8 text-end">
                  Allowed Candidates <span class="badge bg-danger"><?= $post['allowed_candidate'] ?></span>
                </div>
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($candidates as $j => $c): ?>
          <?php if($c['position_id'] == $post['position_id']): ?>
          <tr>
            <td>
              <div class="row">
                <div class="col-6">
                  <?= $c['fname'].' ' ?>
                  <?php if($c['mname']): ?>
                    <?= substr($c['mname'],0,1).'. ' ?>
                  <?php endif ?>
                  <?= $c['lname'].' ' ?>
                  <?php if($c['suffix']): ?>
                    <?= $c['suffix'] ?>
                  <?php endif ?>
                </div>
                <div class="col-6 d-flex justify-content-end">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?= $post['position']?>" value="<?= $c['candidate_id']?>" id="<?= $post['position'].$j?>">
                    <label class="form-check-label" for="<?= $post['position'].$j?>">
                      Vote for this Candidate
                    </label>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <?php endif ?>
          <?php endforeach ?>
        </tbody>
      </table>
      <?php endforeach ?>
      <button type="submit" class="btn btn-primary"><i class="fas fa-vote-yea fa-fw me-2"></i>Submit Vote</button>
    <?= form_close() ?>
  </section>
</main> 