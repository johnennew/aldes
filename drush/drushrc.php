<?php

/**
 * @file
 * Drush commands.
 */

$command_specific['config-export']['skip-modules'] = array('devel');
$command_specific['config-import']['skip-modules'] = array('devel');
$command_specific['dl'] = array('destination' => 'modules/contrib');
ini_set('memory_limit', '1024M');

