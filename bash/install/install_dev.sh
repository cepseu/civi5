#!/bin/sh

#$1 should be mysql://database_user:database_pass@localhost:3306/database_name

#Install site
cd ../../docroot
drush site-install dropsolid_profile --developer=1 --env=dev --db-url=$1 -y -v

#Migrate content
drush glue-migrate -v

# Clear caches (http://drupal.org/node/1477440)
drush cc "module list"
drush cc all

#Post-install
drush glue-post-install -v

#Set password
drush upwd admin --password="admin"

#Reindex content Optional
#drush search-reindex -y
#drush search-index -y
#OR
#Solr
SOLRACTIVE=`cat ../config/config | grep '^solractive:' | sed 's/^solractive://g'`
echo 'solractive:'$SOLRACTIVE
if [ -n "$SOLRACTIVE" ]; then
  #set the solr env
  drush php-eval 'glue_site_set_solr_settings('apache_solr')'
  #index
  drush search-api-clear apache_solr_index
  drush sapi-aq
  drush queue-run-concurrent search_api_indexing_queue 8
fi

# Run cron
drush cron

#Run tests
drush en simpletest -y
drush test-run GLUE

#Set dev settings
drush vset --yes --always-set preprocess_css 0
drush vset --yes --always-set preprocess_js 0
drush vset --yes --always-set cache 0
drush vset --yes --always-set block_cache 0
drush vset --yes --always-set page_compression 0
drush vset --yes --always-set error_level 2