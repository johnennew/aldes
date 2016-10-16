<?php

/**
 * @file
 * Drush aliases.
 */

$aliases['vdd'] = array(
  'env' => 'vdd',
  'uri' => 'aldes.dev',
  'root' => '/var/www/vhosts/aldes.dev/docroot',
  'path-aliases' => array(
    '%drush-script' => 'drush8',
  ),
);

if (!file_exists('/var/www/vhosts/aldes.dev/docroot')) {
  $aliases['vdd']['remote-host'] = 'dev.local';
  $aliases['vdd']['remote-user'] = 'vagrant';
}

// ssh 57db0aa27628e17c0a0001b9@aldes-johnennew.rhcloud.com
$aliases['prod'] = array(
  'parent' => '@parent',
  'uri' => 'aldes-johnennew.rhcloud.com',
  'root' => '/var/lib/openshift/57db0aa27628e17c0a0001b9/app-root/runtime/repo',
  'path-aliases' => array(
    '%drush-script' => '/var/lib/openshift/57db0aa27628e17c0a0001b9/app-root/runtime/repo/vendor/bin/drush',
    '%files' => '/var/lib/openshift/57db0aa27628e17c0a0001b9/app-root/data/public',
  ),
);

if (!file_exists('/var/lib/openshift/57db0aa27628e17c0a0001b9')) {
  $aliases['prod']['remote-host'] = 'aldes-johnennew.rhcloud.com';
}
