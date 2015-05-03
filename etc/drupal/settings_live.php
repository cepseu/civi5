<?php
      $db_name = 'db_drupal_ceps';
      $db_user = 'u_dru_ceps';
      $db_pass = 'NyOn33dhUYvZEHeh';
      $db_host = 'localhost';

      $databases = array (
        'default' =>
        array (
          'default' =>
          array (
            'database' => $db_name,
            'username' => $db_user,
            'password' => $db_pass,
            'host' => $db_host,
            'port' => '',
            'driver' => 'mysql',
            'prefix' => '',
          ),
        ),
      );

      $update_free_access = FALSE;
      $drupal_hash_salt = 'Wuc3CPLHTfTHGXLIzmW7Hn8iS-ErWaJlJOL2nhed2xI';

      $base_url = 'http://www.ceps.eu';  // NO trailing slash!

      ini_set('session.gc_probability', 1);
      ini_set('session.gc_divisor', 100);
      ini_set('session.gc_maxlifetime', 200000);
      ini_set('session.cookie_lifetime', 2000000);

      $conf['404_fast_paths_exclude'] = '/\/(?:styles)\//';
      $conf['404_fast_paths'] = '/\.(?:txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/i';
      $conf['404_fast_html'] = '<html xmlns=http://www.w3.org/1999/xhtml><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL @path was not found on this server.</p></body></html>';
      $conf['dropsolid_env'] = 'live';

      /**
       * Varnish
       */
      $conf['varnish_flush_cron'] = 0;
      $conf['varnish_version'] = '3';
      $conf['varnish_control_terminal'] = '127.0.0.1:6082';
      $conf['varnish_control_key'] = 'c98ecdbc-a33b-421d-bba1-6e0d3f5c708c';
      $conf['varnish_socket_timeout'] = '250';
      $conf['varnish_cache_clear'] = 1;//Drupal default will clear all page caches on node updates and cache flush events. None will allow pages to persist for their full max-age
      $conf['varnish_bantype'] = 0;
      $conf['cache_backends'][] = 'sites/all/modules/contrib/varnish/varnish.cache.inc';
      $conf['cache_class_cache_page'] = 'VarnishCache';
      // Drupal 7 does not cache pages when we invoke hooks during bootstrap. This needs
      // to be disabled.
      $conf['page_cache_invoke_hooks'] = FALSE;

     /**
      * Memcache
      */
     $conf['cache_backends'][] = './sites/all/modules/contrib/memcache/memcache.inc';
     $conf['cache_default_class'] = 'MemCacheDrupal';
     $conf['cache_class_cache_form'] = 'DrupalDatabaseCache';
     $conf['memcache_key_prefix'] = 'ceps';
