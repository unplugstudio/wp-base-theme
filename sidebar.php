<aside id="page-sidebar">
  <?php
    if (is_home() || is_single() || is_archive()) {
      get_template_part('template-parts/sidebar-blog');
    } else {
      get_template_part('template-parts/sidebar-pages');
    }
  ?>
</aside>
