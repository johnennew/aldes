<?php

/**
 * @file
 */

/**
 * Implements of hook_drush_command().
 */
function play_drush_command() {
  $items = array();

  $items['play'] = array(
    'description' => 'A test command for testing.',
    'aliases' => array('ps'),
    'options' => array(
      'threads' => 'The number of threads to use',
    ),
  );

  return $items;
}

/**
 * Test bed.
 */
function drush_play() {
  echo 'nothing to see here';
}
