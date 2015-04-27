#!/bin/sh

cd ../../docroot

#D7

#Update site
drush updb -y

#Enable ui modules
drush en features fe_block -y
drush dis field_ui update schema devel feeds_ui views_ui switcheroo dblog ds_ui -y
drush dis ftools features_orphans diff -y

# Clear caches
drush cc all

#Feature reverts
drush fra -y

#Rebuild content permissions
drush php-eval 'node_access_rebuild()'

# Clear caches
drush cc all

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

#Set dev settings
drush vset --yes --always-set preprocess_css 1
drush vset --yes --always-set preprocess_js 1
drush vset --yes --always-set cache 1
drush vset --yes --always-set block_cache 1
drush vset --yes --always-set page_compression 1
drush vset --yes --always-set error_level 0

#Run tests
drush en simpletest -y
drush test-run GLUE
