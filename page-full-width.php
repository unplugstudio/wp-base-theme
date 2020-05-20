<?php
/*
Template Name: Full Width
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php get_template_part('template-parts/masthead') ?>

<div class="section-wrapper">
  <div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; endif; ?>
  </div>
</div>

<?php get_footer(); ?>
