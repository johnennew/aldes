#! /bin/bash
cd "${OPENSHIFT_REPO_DIR}"
vendor/bin/drush @prod cron
