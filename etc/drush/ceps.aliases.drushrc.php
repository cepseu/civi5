<?php
    $project = 'ceps';

    $ip_dev = '92.243.15.236';
    $remote_user_dev = 'admin';

    $ip_staging = '92.243.15.236';
    $remote_user_staging = 'admin';

    $ip_testbot1 = '92.243.15.236';
    $remote_user_testbot1 = 'admin';

    $ip_production = '92.243.15.236';
    $remote_user_production = 'admin';

    if (file_exists('/etc/drush/' . $project . '.local.php')) {
      require '/etc/drush/' . $project . '.local.php';
    }

    $aliases[$project.'.dev'] = array(
      'root' => '/var/www/customprojects/ceps/dev/docroot',
      'remote-host' => $ip_dev,
      'remote-user' => $remote_user_dev,
      'path-aliases' => array(
        '%dump' => '/tmp/sql-sync-dev-'.$project.'-local.sql',
      )
    );

    $aliases[$project.'.staging'] = array(
      'root' => '/var/www/customprojects/ceps/staging/docroot',
      'remote-host' => $ip_staging,
      'remote-user' => $remote_user_staging,
      'path-aliases' => array(
        '%dump' => '/tmp/sql-sync-staging-'.$project.'-local.sql',
      )
    );

    $aliases[$project.'.testbot1'] = array(
      'root' => '/var/www/customprojects/ceps/testbot1/docroot',
      'remote-host' => $ip_testbot1,
      'remote-user' => $remote_user_testbot1,
      'path-aliases' => array(
        '%dump' => '/tmp/sql-sync-testbot1-'.$project.'-local.sql',
      )

    );

    $aliases[$project.'.production'] = array(
      'root' => '/var/www/customprojects/ceps/production/docroot',
      'remote-host' => $ip_production,
      'remote-user' => $remote_user_production,
      'path-aliases' => array(
        '%dump' => '/tmp/sql-sync-production-'.$project.'-local.sql',
      )
    );
