<main class="col-md-8 ms-sm-auto col-lg-9 px-md-4">
  <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Position Management</h1>
  </div>
  
  <section class="py-5">
    <div class="d-flex justify-content-between">
      <!-- Button trigger modal -->
      <a href="<?= site_url()?>admin/position/new" role="button" class="btn btn-outline-primary rounded-pill">
        Add Position
      </a>
      <?= $pager->links(); ?>
    </div>
  </section>

  <?php if(session()->getTempData('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Yey!</strong> <?= session()->getTempData('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>
  
  <?php if(session()->getTempData('error')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Oops!</strong> <?= session()->getTempData('error') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>

  <div class="table table-responsive shadow rounded rounded-3">
    <table class="table table-bordered table-striped mb-0">
      <thead>
        <tr>
          <th></th>
          <th>Position</th>
          <th>Allowed Candidates</th>
          <th>Date Added</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($positions as $key => $post) :?>
        <tr>
          <td><?= $key + 1 ?></td>
          <td><?= $post['position'] ?></td>
          <td><?= $post['allowed_candidate'] ?></td>
          <td><?= date('M d, Y @ h:i:s a', strtotime($post['added_at'])) ?></td>
          <td>
            <div class="row justify-content-center g-3">
              <div class="col-auto">
                <?= form_open('admin/position/edit') ?>
                <?= csrf_field() ?>
                <?= form_hidden('p', $post['position_id']) ?>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit fa-fw"></i></button>
                <?= form_close() ?>
              </div>
              <div class="col-auto">
                <?= form_open('admin/position/confirm_delete') ?>
                <?= csrf_field() ?>
                <?= form_hidden('p', $post['position_id']) ?>
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
</main>