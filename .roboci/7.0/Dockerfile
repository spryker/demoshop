FROM davert/roboci-php
WORKDIR /home/travis/builds
USER root
RUN phpenv global 7.0
RUN ["/bin/bash", "-l", "-c", "eval \"$(phpenv init -)\""]
ENV TRAVIS_PHP_VERSION 7.0
ENV TRAVIS true
ENV CONTINUOUS_INTEGRATION true
ENV TRAVIS_BUILD_DIR /home/travis/builds/current
ENV TRAVIS_BUILD_NUMBER 0
ENV TRAVIS_OS_NAME linux
RUN ["/bin/bash", "-l", "-c", "composer self-update && composer --version"]
RUN ["/bin/bash", "-l", "-c", "composer install --no-interaction"]
ADD . /home/travis/builds
USER root
RUN chown -R travis /home/travis/builds
USER travis
ENV HOME /home/travis
ENV PATH $PATH:/home/travis/.phpenv/bin
