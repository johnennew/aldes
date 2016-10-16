<?php

/**
 * @file
 * Drupal core settings.
 */

$base_modules = array(
  'automated_cron' => 0,
  'block' => 0,
  'block_content' => 0,
  'breakpoint' => 0,
  'ckeditor' => 0,
  'color' => 0,
  'comment' => 0,
  'config' => 0,
  'contact' => 0,
  'contextual' => 0,
  'datetime' => 0,
  'dblog' => 0,
  'editor' => 0,
  'entity_reference' => 0,
  'field' => 0,
  'file' => 0,
  'filter' => 0,
  'help' => 0,
  'history' => 0,
  'image' => 0,
  'link' => 0,
  'node' => 0,
  'options' => 0,
  'page_cache' => 0,
  'path' => 0,
  'quickedit' => 0,
  'rdf' => 0,
  'rest' => 0,
  'search' => 0,
  'serialization' => 0,
  'shortcut' => 0,
  'system' => 0,
  'taxonomy' => 0,
  'text' => 0,
  'toolbar' => 0,
  'tour' => 0,
  'user' => 0,
  'views_alias_filter' => 0,
  'warden' => 0,
  'menu_link_content' => 1,
  'views' => 10,
);

if (SETTINGS_ENVIRONMENT === 'local') {
  $base_modules['devel'] = 0;
  $base_modules['devel_generate'] = 0;
  $base_modules['drupalmoduleupgrader'] = 0;
  $base_modules['field_ui'] = 0;
  $base_modules['menu_ui'] = 0;
  $base_modules['simpletest'] = 0;
  $base_modules['views_ui'] = 0;
}

$config['core.extension']['module'] = $base_modules;