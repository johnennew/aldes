ENVIRONMENT=
ROOT_DIR=$(realpath .)
DRUSH_EXEC=$(ROOT_DIR)/vendor/drush/drush/drush
DRUSH_ARGS= -y --nocolor

# Need to check if the user specified the ENVIRONMENT arg where appropriate.
check-env:
	@if test "$(ENVIRONMENT)" = "" ; then \
	    echo "ENVIRONMENT is undefined. Usage: make [command] ENVIRONMENT=[vddp|vddm]"; \
	    exit 1; \
	fi

check-targetdir:
	ifndef TARGETDIR
	    $(error TARGETDIR is undefined)
	endif

# Download and compile all the project's assets.
build: build-drupal

clean:
	# Remove everything that's re-buildable. Running make build will reverse this.
	rm -rf vendor bin html

# Testing

test: check-env
	cd docroot && \
	  $(DRUSH_EXEC) @$(ENVIRONMENT) behat

# Drupal

build-drupal:
	curl https://getcomposer.org/composer.phar > composer.phar && \
	chmod +x composer.phar && \
	./composer.phar clear-cache && \
	./composer.phar update && \
	chmod u+w docroot/sites/* docroot/sites/*/settings.php && \
  ln -s html docroot

drupal-update: check-env
	cd docroot && \
	  $(DRUSH_EXEC) @$(ENVIRONMENT) $(DRUSH_ARGS) cc drush && \
	  $(DRUSH_EXEC) @$(ENVIRONMENT) $(DRUSH_ARGS) updb && \
	  $(DRUSH_EXEC) @$(ENVIRONMENT) $(DRUSH_ARGS) cr

install: check-env check-targetdir
	echo "Target dir: ${TARGETDIR}" && \
		echo "Workspace: ${WORKSPACE}"
