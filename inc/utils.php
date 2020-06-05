<?php

// Render an inline SVG
function svg($icon, $class='inline-svg')
{
  if (strpos($icon, 'http') !== false) {
    $path = $icon;
  } else {
    $path = get_template_directory() . "/assets/svg/$icon.svg";
  }
  $content = @file_get_contents($path);
  if (!$content) {
    return '';
  }
  return str_replace('<svg ', "<svg class='$class' ", $content);
}

// Extract social platform name from a URL
function get_service_from_url($url)
{
  $names = [
    'facebook' => 'facebook',
    'twitter' => 'twitter',
    'instagram' => 'instagram',
    'youtube' => 'youtube',
    'linkedin' => 'linkedin',
    'mailto:' => 'envelope',
  ];
  foreach ($names as $key => $platform) {
    if (strpos($url, $key) !== false) {
      return $platform;
    }
  }
  return null;
}

/*
Render a template with variables injected via an array
$path: file path to the file to render (relative to the theme)
$args: array of variables that will be made available when rendering the file
*/
function partial($path, $args=[])
{
  $path = rtrim($path, '.php');
  $path = get_template_directory() . "/$path.php";
  if (!file_exists($path)) {
    return;
  } // File not found, bail

  foreach ($args as $key => $value) {
    ${$key} = $value;
  }
  ob_start();
  require($path);
  echo ob_get_clean();
}

/*
Create a nested array of posts representing a WP navigation menu
$location_name: Name of the menu to render
*/
function menu_tree($location_name)
{
  function build_tree($items, $parent=0, $branch=[])
  {
    foreach ($items as $item) {
      if ($item->menu_item_parent == $parent) {
        // Add attributes to indicate if the item is currently active
        $item->is_ancestor = in_array('current-menu-ancestor', $item->classes);
        $item->is_current = in_array('current-menu-item', $item->classes);

        // Append children
        $children = build_tree($items, $item->ID);
        $item->children = $children ?: [];

        // Append current item to the branch, keyed by its ID
        $branch[$item->ID] = $item;
        unset($item);
      }
    }
    return $branch;
  }
  $menu = wp_get_nav_menu_items($location_name);
  if (!$menu) {
    return [];
  } // Menu not found, bail
  _wp_menu_item_classes_by_context($menu); // Apply current and current ancestor classes
  return build_tree($menu);
}
