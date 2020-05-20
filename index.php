<?php get_header(); ?>

<?php get_template_part('template-parts/masthead') ?>

<div class="section-wrapper">
  <div class="container">

    <main id="main" role="main">
      <?php if (have_posts()) :
        while (have_posts()) : the_post();
          the_content();
        endwhile;
      endif; ?>
    </main>

    <?php get_sidebar() ?>

  </div>
</div>

<?php the_posts_pagination(); ?>

<?php get_footer(); ?>
