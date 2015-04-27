<?php
      $db_name = 'ceps_local';
      $db_user = 'ceps';
      $db_pass = 'ceps794658';
      $db_host = 'db01.dropsolid.com';
      $db_port = '3306';
      $db_driver = 'mysql';
      $db_prefix = '';

      $databases = array (
        'default' =>
        array (
          'default' =>
          array (
            'database' => $db_name,
            'username' => $db_user,
            'password' => $db_pass,
            'host' => $db_host,
            'port' => $db_port,
            'driver' => $db_driver,
            'prefix' => $db_prefix,
          ),
        ),
      );

      $update_free_access = FALSE;

      $drupal_hash_salt = 'Wuc3CPLHTfTHGXLIzmW7Hn8iS-ErWaJlJOL2nhed2xI';

      $base_url = 'http://ceps.local';  // NO trailing slash!

      ini_set('session.gc_probability', 1);
      ini_set('session.gc_divisor', 100);
      ini_set('session.gc_maxlifetime', 200000);
      ini_set('session.cookie_lifetime', 2000000);

      $conf['404_fast_paths_exclude'] = '/\/(?:styles)\//';
      $conf['404_fast_paths'] = '/\.(?:txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/i';
      $conf['404_fast_html'] = '<html xmlns=http://www.w3.org/1999/xhtml><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL @path was not found on this server.</p></body></html>';
      $conf['dropsolid_env'] = 'local';


      $path = str_replace('docroot', '', DRUPAL_ROOT);
      if (file_exists($path . 'etc/drupal/solr.php')) {
        include_once $path . 'etc/drupal/solr.php';
        if ($conf['dropsolid_solr'] == 1) {
          $envs = get_dropsolid_solr();
          /**
           * Solr
           */
          $conf['dropsolid_host_solr'] = $envs[$conf['dropsolid_env']]['host'];
          $conf['dropsolid_port_solr'] = $envs[$conf['dropsolid_env']]['port'];
          $conf['dropsolid_path_solr'] = $envs[$conf['dropsolid_env']]['url'];
        }
      }

      $project='ceps';
      //Gets the local overrides
      $dropsolid_root = str_replace('/docroot', '', DRUPAL_ROOT);
      if (file_exists($dropsolid_root . '/etc/drupal/' . $project . '.local.php')) {
        require $dropsolid_root . '/etc/drupal/' . $project . '.local.php';
      }
