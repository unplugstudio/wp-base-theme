<li>
  <?php /* Item without children */ ?>
  <?php if(!$item->children): ?>
    <a
      href="<?= $item->url ?>"
      <?php if ($item->is_current): ?>aria-current="page"<?php endif ?>
    >
      <?= $item->title ?>
    </a>

  <?php /* Item with children */ ?>
  <?php else: ?>
    <span>
      <?= $item->title ?>
    </span>
    <ul id="submenu-<?= $item->ID ?>">
      <?php foreach($item->children as $id => $subitem) {
        // Recursively render children
        partial('template-parts/site-nav-item', ['item' => $subitem]);
      } ?>
    </ul>
  <?php endif; ?>
</li>
