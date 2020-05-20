<h2>Latest on the blog</h2>
<ul>
  <?php $recent_posts = wp_get_recent_posts(array(
    'numberposts' => 5,
    'post_status' => 'publish'
  )); ?>
  <?php foreach ($recent_posts as $recent) : $id = $recent['ID']; ?>
    <li>
      <?= get_the_date('m.d.y', $id) ?><br>
      <a href="<?= get_the_permalink($id) ?>">
        <?= get_the_title($id) ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>

<h2>Tags</h2>
<ul>
  <li><a href="<?= get_permalink(get_option('page_for_posts')); ?>">
    <em>All</em>
  </a></li>
  <?php foreach (get_tags() as $tag) : ?>
    <li><a href="<?= get_tag_link($tag->term_id) ?>">
      <em><?= esc_html($tag->name) ?></em>
    </a></li>
  <?php endforeach; ?>
</ul>
