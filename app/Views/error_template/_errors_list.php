<?php foreach ($errors as $error) : ?>
  <div class="text-danger fst-italic p-2 mt-2 small" role="alert">
    <i class="fas fa-exclamation-circle fa-fw me-2"></i><?= esc($error) ?>
  </div>
<?php endforeach ?>