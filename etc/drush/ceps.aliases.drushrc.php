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

    $aliases[$project.'.dev'] = array(
      'root' => '/var/www/customprojects/ceps/dev/docroot',
      'path-aliases' => array(
        '%dump' => '/tmp/sql-sync-dev-'.$project.'-local.sql',
      )
    );
    $aliases[$project.'.staging'] = array(
      'root' => '/var/www/customprojects/ceps/staging/docroot',
      'path-aliases' => array(
        '%dump' => '/tmp/sql-sync-staging-'.$project.'-local.sql',
      )
    );

    $aliases[$project.'.testbot1'] = array(
      'root' => '/var/www/customprojects/ceps/testbot1/docroot',
      'path-aliases' => array(
        '%dump' => '/tmp/sql-sync-testbot1-'.$project.'-local.sql',
      )

    );
    $aliases[$project.'.production'] = array(
      'root' => '/var/www/customprojects/ceps/production/docroot',
      'path-aliases' => array(
        '%dump' => '/tmp/sql-sync-production-'.$project.'-local.sql',
      )
    );

    $aliases[$project.'.live'] = array(
      'root' => '/var/www/www.ceps.eu/docroot/',
      'remote-host' => 'web06.dropsolid.com',
      'remote-user' => 'ceps',
      'path-aliases' => array(
        '%dump' => '/tmp/sql-sync-production-live-ceps.sql',
      )
    );
