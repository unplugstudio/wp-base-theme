<?php
use theme\Utils;

?>

<li>
  <?php /* Item without children */ ?>
  <?php if (!$item->children): ?>
    <a
      href="<?= $item->url ?>"
      <?php if ($item->is_current): ?>aria-current="page"<?php endif ?>
    >
      <?= $item->title ?>
    </a>

  <?php /* Item with children */ ?>
  <?php else: ?>
    <a href="<?= $item->url ?>">
      <?= $item->title ?>
    </a>
    <ul id="submenu-<?= $item->ID ?>">
      <?php foreach ($item->children as $id => $subitem) : ?>
        <?= Utils::partial('template-parts/site-nav-item', ['item' => $subitem]) ?>
      <?php endforeach ?>
    </ul>
  <?php endif; ?>
</li>
