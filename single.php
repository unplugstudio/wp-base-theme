<?php get_header(); ?>

<?php get_template_part('template-parts/masthead') ?>

<div class="section-wrapper">
  <div class="container">

    <main id="main" role="main">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>

          <header>
            <strong><?php the_time('d M') ?></strong>
            <h2><?php the_title() ?></h2>
          </header>

          <?php the_content(); ?>

        </article>
      <?php endwhile; endif; ?>
    </main>

    <?php get_sidebar() ?>

  </div>
</div>

<?php get_footer(); ?>
