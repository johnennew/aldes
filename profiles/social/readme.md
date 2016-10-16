# Open Social #
Check [drupal.org](https://www.drupal.org/project/social) for more information.
For day to day technical documentation use the [Github Wiki](https://github.com/goalgorilla/drupal_social/wiki).

Useful links for developers:
- [Roadmap](https://drupalsocial.storiesonboard.com/m/open-social)
- [Lo-fi prototype](http://prototype.goalgorilla.com/drupalsocial/current/)
- [Hifi styleguide and prototype](http://goalgorilla.github.io/drupal_social/)
- [Travis CI](https://travis-ci.org/goalgorilla/drupal_social/builds)
- [Docker Hub](https://hub.docker.com/r/goalgorilla/drupal_social/builds/)

# Installation #

## Install from project page on drupal.org ##

Installing with our make file? Please use the following commands to make sure you get all the composer dependencies
from the contributed modules untill composer is supported for distributions on drupal.org. 
See https://www.drupal.org/node/2718229.

1. Download Install profile (either tarball, via drush make or drush dl)
2. Go to the installation folder and download dependencies with composer:
    ```    
    php modules/contrib/composer_manager/scripts/init.php
    composer drupal-rebuild
    composer update -n --lock --verbose
    ```

3. Install the site via UI or Drush and select install profile 'social'.
4. Optionally generate demo content by following these [instructions](https://github.com/goalgorilla/drupal_social/wiki/Demo-content)

## Install in Docker containers ##
Download and install the [toolbox](https://www.docker.com/docker-toolbox).

Note that the docker projects have to be somewhere in your /Users/ directory in order to work (limitation for Mac and Windows). Note that /Users/<name>/Sites/Docker is fine.


### Steps ###

1. Start a docker machine (docker quickstart icon).

2. Clone this repository to the directory of your choice (e.g. ~/Sites/social).

3. Go inside the folder in which you cloned this repository (where the docker-compose.yml file is).

4. Build and start the docker containers.
    ```
    docker-compose up -d
    ```

    This will build multiple containers (see the Dockerfile in docker_build/drupal8) and all the dependencies.

5. Add social.dev and mailcatcher.social.dev to your /etc/hosts file based on the ip of the docker machine.

    If necessary you can find the IP with this command on your host machine:
    ```
    docker-machine ls
    ```

6. Run the install script on the docker web container, the name could be slightly different on your machine, in the example below the name is social_web_1.
    ```
    docker exec -it social_web_1 bash /root/dev-scripts/install/install_script.sh
    ```

7. Add the proxy container.
    ```
    docker run -d -p 80:80 --name=proxy -v /var/run/docker.sock:/tmp/docker.sock:ro jwilder/nginx-proxy
    ```

# Contribute #
Do you want to join us in this effort? We are welcoming your [feedback](http://goalgorilla.github.io/drupal_social/prototype.html), (development) time and/or financial support. For feedback we will use [Drupal.org](https://www.drupal.org/project/social) for other questions or suggestions please contact taco@goalgorilla.com.

Source-code and installation instructions are currently only available on [Github.com](https://github.com/goalgorilla/drupal_social). You are welcome to try the installation profile yourself although it is still work-in-progress. The coming months we will continue to work on the theme to match the [prototype](http://goalgorilla.github.io/drupal_social/prototype.html). If you find any issues feel free to file a bug report in the issue queue.

[![Build Status](https://travis-ci.org/goalgorilla/drupal_social.svg?branch=master)](https://travis-ci.org/goalgorilla/drupal_social)
