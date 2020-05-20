<?php get_header(); ?>

<?php get_template_part('template-parts/masthead') ?>

<div class="section-wrapper">
  <div class="container">

    <main id="main" role="main">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </main>

    <?php get_sidebar(); ?>

  </div>
</div>

<?php get_footer(); ?>
