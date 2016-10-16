<?php

/**
 * @file
 * Drupal site-specific configuration file.
 */

if (!empty($_SERVER['OPENSHIFT_APP_NAME'])) {
  if ($_SERVER['OPENSHIFT_APP_NAME'] === 'aldes') {
    // Lets make sure production requests are always using this domain.
    $_SERVER['HTTP_HOST'] = 'aldes-johnennew.rhcloud.com';
  }
}

$base_domains = array(
  'aldes.dev' => 'local',
  'aldes-johnennew.rhcloud.com' => 'prod',
);

$instance = $_SERVER['HTTP_HOST'];
$env = array_key_exists($instance, $base_domains) ? $base_domains[$instance] : '';
$platform = '';

if (file_exists('/var/lib/openshift')) {
  $platform = 'openshift';
}
elseif (file_exists('/var/www/settings/mps/settings.inc')) {
  require_once '/var/www/settings/mps/settings.inc';
  $platform = 'vdd';
}

if (!empty($env)) {
  define('SETTINGS_ENVIRONMENT', $env);
  define('SETTINGS_INSTANCE', $instance);
  define('SETTINGS_PLATFORM', $platform);

  foreach (glob('sites/default/settings/*.settings.inc') as $file) {
    require_once $file;
  }
}
elseif (php_sapi_name() !== 'cli') {
  // Only redirect if we're not on the command line.
  //header('HTTP/1.0 301 Moved Permanently');
  //header("Location: http://...");
  //exit();
}
