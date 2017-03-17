#!/bin/sh

cd /var/www/customprojects/ceps/dev/docroot

#D7

#Update site
drush updb -y

#Enable ui modules
drush en features fe_block ftools features_orphans diff -y
drush en field_ui update schema devel feeds_ui views_ui switcheroo dblog glue simpletest -y
#masquerade -y

# Clear caches
drush cc all

#Feature reverts
drush fra -y

#Enable the views development settings
drush php-eval 'views_development_settings()'

#Rebuild content permissions
drush php-eval 'node_access_rebuild()'

# Clear caches
drush cc all

#Reindex content Optional
#drush search-reindex -y
#drush search-index -y
#OR
#Solr
#SOLRACTIVE=`cat ../config/config | grep '^solractive:' | sed 's/^solractive://g'`
#echo 'solractive:'$SOLRACTIVE
#if [ -n "$SOLRACTIVE" ]; then
  #set the solr env
#  drush php-eval 'glue_site_set_solr_settings('apache_solr')'
  #index
#  drush search-api-clear apache_solr_index
#  drush sapi-aq
#  drush queue-run-concurrent search_api_indexing_queue 8
#fi

# Run cron
#drush cron

#Set dev settings
drush vset --yes --always-set preprocess_css 0
drush vset --yes --always-set preprocess_js 0
drush vset --yes --always-set cache 0
drush vset --yes --always-set block_cache 0
drush vset --yes --always-set page_compression 0
drush vset --yes --always-set error_level 2

#Run tests
#drush en simpletest -y
#drush test-run GLUE
