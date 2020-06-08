<?php
use theme\Utils;

global $wp_query;
$json_vars = wp_json_encode($wp_query->query_vars);
$blog_page = get_post(get_option('page_for_posts'));

?>

<?php get_header(); ?>

<main id="main" class="section-wrapper">
  <div class="container">
    <?php if (is_home()): ?>
      <h1><?= $blog_page->post_title ?: 'Blog' ?></h1>
      <?= $blog_page->post_content ?>
    <?php else: ?>
      <h1><?= wp_title('', false); ?></h1>
    <?php endif ?>


    <div data-ajax-query-container='<?= esc_attr($json_vars) ?>'>
      <?php Utils::partial('template-parts/post-ajax', ['query' => $wp_query]) ?>
    </div>

    <?php if (paginate_links()): ?>
      <p class="_text-center">
        <button data-ajax-query-more class="button">Load More</button>
      </p>
    <?php endif ?>
  </div>
</main>

<?php get_footer(); ?>
