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

$databases['default']['default']['prefix']= array(
  'default' => '',
  'civicrm_acl'                              => '`ceps_civi`.',
  'civicrm_acl_cache'                        => '`ceps_civi`.',
  'civicrm_acl_contact_cache'                => '`ceps_civi`.',
  'civicrm_acl_entity_role'                  => '`ceps_civi`.',
  'civicrm_action_log'                       => '`ceps_civi`.',
  'civicrm_action_mapping'                   => '`ceps_civi`.',
  'civicrm_action_schedule'                  => '`ceps_civi`.',
  'civicrm_activity'                         => '`ceps_civi`.',
  'civicrm_activity_contact'                 => '`ceps_civi`.',
  'civicrm_address'                          => '`ceps_civi`.',
  'civicrm_address_format'                   => '`ceps_civi`.',
  'civicrm_batch'                            => '`ceps_civi`.',
  'civicrm_cache'                            => '`ceps_civi`.',
  'civicrm_campaign'                         => '`ceps_civi`.',
  'civicrm_campaign_group'                   => '`ceps_civi`.',
  'civicrm_case'                             => '`ceps_civi`.',
  'civicrm_case_activity'                    => '`ceps_civi`.',
  'civicrm_case_contact'                     => '`ceps_civi`.',
  'civicrm_component'                        => '`ceps_civi`.',
  'civicrm_contact'                          => '`ceps_civi`.',
  'civicrm_contact_type'                     => '`ceps_civi`.',
  'civicrm_contribution'                     => '`ceps_civi`.',
  'civicrm_contribution_page'                => '`ceps_civi`.',
  'civicrm_contribution_product'             => '`ceps_civi`.',
  'civicrm_contribution_recur'               => '`ceps_civi`.',
  'civicrm_contribution_soft'                => '`ceps_civi`.',
  'civicrm_contribution_widget'              => '`ceps_civi`.',
  'civicrm_country'                          => '`ceps_civi`.',
  'civicrm_county'                           => '`ceps_civi`.',
  'civicrm_currency'                         => '`ceps_civi`.',
  'civicrm_custom_field'                     => '`ceps_civi`.',
  'civicrm_custom_group'                     => '`ceps_civi`.',
  'civicrm_dashboard'                        => '`ceps_civi`.',
  'civicrm_dashboard_contact'                => '`ceps_civi`.',
  'civicrm_dedupe_exception'                 => '`ceps_civi`.',
  'civicrm_dedupe_rule'                      => '`ceps_civi`.',
  'civicrm_dedupe_rule_group'                => '`ceps_civi`.',
  'civicrm_discount'                         => '`ceps_civi`.',
  'civicrm_domain'                           => '`ceps_civi`.',
  'civicrm_email'                            => '`ceps_civi`.',
  'civicrm_entity_batch'                     => '`ceps_civi`.',
  'civicrm_entity_file'                      => '`ceps_civi`.',
  'civicrm_entity_financial_account'         => '`ceps_civi`.',
  'civicrm_entity_financial_trxn'            => '`ceps_civi`.',
  'civicrm_entity_tag'                       => '`ceps_civi`.',
  'civicrm_event'                            => '`ceps_civi`.',
  'civicrm_event_carts'                      => '`ceps_civi`.',
  'civicrm_events_in_carts'                  => '`ceps_civi`.',
  'civicrm_extension'                        => '`ceps_civi`.',
  'civicrm_file'                             => '`ceps_civi`.',
  'civicrm_financial_account'                => '`ceps_civi`.',
  'civicrm_financial_item'                   => '`ceps_civi`.',
  'civicrm_financial_trxn'                   => '`ceps_civi`.',
  'civicrm_financial_type'                   => '`ceps_civi`.',
  'civicrm_grant'                            => '`ceps_civi`.',
  'civicrm_group'                            => '`ceps_civi`.',
  'civicrm_group_contact'                    => '`ceps_civi`.',
  'civicrm_group_contact_cache'              => '`ceps_civi`.',
  'civicrm_group_nesting'                    => '`ceps_civi`.',
  'civicrm_group_organization'               => '`ceps_civi`.',
  'civicrm_im'                               => '`ceps_civi`.',
  'civicrm_job'                              => '`ceps_civi`.',
  'civicrm_job_log'                          => '`ceps_civi`.',
  'civicrm_line_item'                        => '`ceps_civi`.',
  'civicrm_loc_block'                        => '`ceps_civi`.',
  'civicrm_location_type'                    => '`ceps_civi`.',
  'civicrm_log'                              => '`ceps_civi`.',
  'civicrm_mail_settings'                    => '`ceps_civi`.',
  'civicrm_mailing'                          => '`ceps_civi`.',
  'civicrm_mailing_bounce_pattern'           => '`ceps_civi`.',
  'civicrm_mailing_bounce_type'              => '`ceps_civi`.',
  'civicrm_mailing_component'                => '`ceps_civi`.',
  'civicrm_mailing_event_bounce'             => '`ceps_civi`.',
  'civicrm_mailing_event_confirm'            => '`ceps_civi`.',
  'civicrm_mailing_event_delivered'          => '`ceps_civi`.',
  'civicrm_mailing_event_forward'            => '`ceps_civi`.',
  'civicrm_mailing_event_opened'             => '`ceps_civi`.',
  'civicrm_mailing_event_queue'              => '`ceps_civi`.',
  'civicrm_mailing_event_reply'              => '`ceps_civi`.',
  'civicrm_mailing_event_subscribe'          => '`ceps_civi`.',
  'civicrm_mailing_event_trackable_url_open' => '`ceps_civi`.',
  'civicrm_mailing_event_unsubscribe'        => '`ceps_civi`.',
  'civicrm_mailing_group'                    => '`ceps_civi`.',
  'civicrm_mailing_job'                      => '`ceps_civi`.',
  'civicrm_mailing_recipients'               => '`ceps_civi`.',
  'civicrm_mailing_spool'                    => '`ceps_civi`.',
  'civicrm_mailing_trackable_url'            => '`ceps_civi`.',
  'civicrm_managed'                          => '`ceps_civi`.',
  'civicrm_mandrill_activity'                => '`ceps_civi`.',
  'civicrm_mapping'                          => '`ceps_civi`.',
  'civicrm_mapping_field'                    => '`ceps_civi`.',
  'civicrm_membership'                       => '`ceps_civi`.',
  'civicrm_membership_block'                 => '`ceps_civi`.',
  'civicrm_membership_log'                   => '`ceps_civi`.',
  'civicrm_membership_payment'               => '`ceps_civi`.',
  'civicrm_membership_status'                => '`ceps_civi`.',
  'civicrm_membership_type'                  => '`ceps_civi`.',
  'civicrm_menu'                             => '`ceps_civi`.',
  'civicrm_navigation'                       => '`ceps_civi`.',
  'civicrm_note'                             => '`ceps_civi`.',
  'civicrm_openid'                           => '`ceps_civi`.',
  'civicrm_option_group'                     => '`ceps_civi`.',
  'civicrm_option_value'                     => '`ceps_civi`.',
  'civicrm_participant'                      => '`ceps_civi`.',
  'civicrm_participant_payment'              => '`ceps_civi`.',
  'civicrm_participant_status_type'          => '`ceps_civi`.',
  'civicrm_payment_processor'                => '`ceps_civi`.',
  'civicrm_payment_processor_type'           => '`ceps_civi`.',
  'civicrm_pcp'                              => '`ceps_civi`.',
  'civicrm_pcp_block'                        => '`ceps_civi`.',
  'civicrm_persistent'                       => '`ceps_civi`.',
  'civicrm_phone'                            => '`ceps_civi`.',
  'civicrm_pledge'                           => '`ceps_civi`.',
  'civicrm_pledge_block'                     => '`ceps_civi`.',
  'civicrm_pledge_payment'                   => '`ceps_civi`.',
  'civicrm_preferences_date'                 => '`ceps_civi`.',
  'civicrm_premiums'                         => '`ceps_civi`.',
  'civicrm_premiums_product'                 => '`ceps_civi`.',
  'civicrm_prevnext_cache'                   => '`ceps_civi`.',
  'civicrm_price_field'                      => '`ceps_civi`.',
  'civicrm_price_field_value'                => '`ceps_civi`.',
  'civicrm_price_set'                        => '`ceps_civi`.',
  'civicrm_price_set_entity'                 => '`ceps_civi`.',
  'civicrm_print_label'                      => '`ceps_civi`.',
  'civicrm_product'                          => '`ceps_civi`.',
  'civicrm_queue_item'                       => '`ceps_civi`.',
  'civicrm_relationship'                     => '`ceps_civi`.',
  'civicrm_relationship_type'                => '`ceps_civi`.',
  'civicrm_report_instance'                  => '`ceps_civi`.',
  'civicrm_saved_search'                     => '`ceps_civi`.',
  'civicrm_setting'                          => '`ceps_civi`.',
  'civicrm_sms_provider'                     => '`ceps_civi`.',
  'civicrm_state_province'                   => '`ceps_civi`.',
  'civicrm_subscription_history'             => '`ceps_civi`.',
  'civicrm_survey'                           => '`ceps_civi`.',
  'civicrm_tag'                              => '`ceps_civi`.',
  'civicrm_tell_friend'                      => '`ceps_civi`.',
  'civicrm_timezone'                         => '`ceps_civi`.',
  'civicrm_uf_field'                         => '`ceps_civi`.',
  'civicrm_uf_group'                         => '`ceps_civi`.',
  'civicrm_uf_join'                          => '`ceps_civi`.',
  'civicrm_uf_match'                         => '`ceps_civi`.',
  'civicrm_value_ac2014_8'                   => '`ceps_civi`.',
  'civicrm_value_ac2015_14'                  => '`ceps_civi`.',
  'civicrm_value_company_info_4'             => '`ceps_civi`.',
  'civicrm_value_dietary_preferences_9'      => '`ceps_civi`.',
  'civicrm_value_event_info_5'               => '`ceps_civi`.',
  'civicrm_value_individual_info_2'          => '`ceps_civi`.',
  'civicrm_value_neujobs_final_conference3_13' => '`ceps_civi`.',
  'civicrm_value_newsletters_15'             => '`ceps_civi`.',
  'civicrm_value_other_1'                    => '`ceps_civi`.',
  'civicrm_value_publications_3'             => '`ceps_civi`.',
  'civicrm_value_research_areas_6'           => '`ceps_civi`.',
  'civicrm_value_ubercart_purchases_7'       => '`ceps_civi`.',
  'civicrm_website'                          => '`ceps_civi`.',
  'civicrm_word_replacement'                 => '`ceps_civi`.',
  'civicrm_worldregion'                      => '`ceps_civi`.',
);


      $update_free_access = FALSE;
      $drupal_hash_salt = 'Wuc3CPLHTfTHGXLIzmW7Hn8iS-ErWaJlJOL2nhed2xI';

//      $base_url = 'http://www.ceps.eu';  // NO trailing slash!
// Temp base url to ip for testing
      $base_url = 'http://185.26.125.173';
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
      // Jan added params - Varnish sits idle if params not set here ....
      $conf['cache'] = 1;
      $conf['cache_lifetime'] = 0;
      $conf['page_cache_maximum_age'] = 600;

      // Drupal 7 does not cache pages when we invoke hooks during bootstrap. This needs
      // to be disabled.
      $conf['page_cache_invoke_hooks'] = FALSE;

     /**
      * Memcache
     $conf['cache_backends'][] = './sites/all/modules/contrib/memcache/memcache.inc';
     $conf['cache_default_class'] = 'MemCacheDrupal';
     $conf['cache_class_cache_form'] = 'DrupalDatabaseCache';
     $conf['memcache_key_prefix'] = 'ceps';
      */

     /**
      * Solr
      */
     $conf['dropsolid_host_solr'] = '127.0.0.1';
     $conf['dropsolid_port_solr'] = '8983';
     $conf['dropsolid_path_solr'] = '/solr/ceps';
