<!doctype html>

<html <?php language_attributes(); ?> class="no-js">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <?php wp_head(); ?>
  </head>

  <body id="top" <?php body_class(); ?>>

    <!-- Main navigation -->
    <div class="container">
      <nav>
        <ul class="site-nav">
          <?php foreach (menu_tree('Main Menu') as $id => $item) {
  partial('template-parts/site-nav-item', ['item' => $item]);
} ?>
        </ul>
      </nav>
    </div>
