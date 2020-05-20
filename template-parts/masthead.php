<?php
  $object = get_queried_object();
  $image = get_field('masthead_image', $object->ID);
  $title = get_field('masthead_title', $object->ID);
  $subtext = get_field('masthead_subtext', $object->ID);
  $link_target = get_field('masthead_link_target', $object->ID);
  $link_text = get_field('masthead_link_text', $object->ID);
  $class = is_front_page() ? 'frontpage-masthead' : 'inner-masthead';

  if (is_archive()) {
    $image = get_field('masthead_image', 'category_' . $object->term_id);
    $title = get_field('masthead_title', 'category_' . $object->term_id);
    $subtext = get_field('masthead_subtext', 'category_' . $object->term_id);
    if (!$title) $title = wp_title('', false);
  }
  if (is_search() || is_tax()) $title = 'Search';

  // if (tribe_is_event_query()) $title = strip_tags(tribe_get_events_title());

  if (!$image) $image = get_field('fallback_masthead_image', 'option');
  if (!$title) $title = get_the_title($object->ID);
?>

<section class="<?= $class ?>" style="background-image: url(<?= esc_url($image); ?>)">
  <div class="container">
    <h1 class="tribe-events-page-title _text-caps"><?= esc_html($title); ?></h1>
    <?php if ($subtext) : ?>
      <p class="_text-big"><?= esc_html($subtext); ?></p>
    <?php endif; ?>
    <?php if ($link_target && $link_text) : ?>
      <p><a href="<?= esc_attr($link_target); ?>" class="button -big">
        <?= esc_html($link_text); ?> <i class="fal fa-long-arrow-right"></i>
      </a></p>
    <?php endif; ?>
  </div>
</section>
