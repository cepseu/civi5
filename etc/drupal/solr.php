<?php

$conf['dropsolid_solr'] = 1;

function get_dropsolid_solr() {
  return array(
    'dev' => array(
      'host' => '92.243.15.236',
      'port' => 8983,
      'url' => '/solr/ceps_dev',
    ),
    'staging' => array(
      'host' => '92.243.15.236',
      'port' => 8983,
      'url' => '/solr/ceps_staging',
    ),
    'local' => array(
      'host' => '127.0.0.1',
      'port' => 8983,
      'url' => '/solr/ceps_local',
    ),

  );
}
