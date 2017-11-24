FROM ubuntu:14.04

ENV DEBIAN_FRONTEND noninteractive

# RUN echo 'deb http://download.videolan.org/pub/debian/stable/ /' >> /etc/apt/sources.list
# RUN echo 'deb-src http://download.videolan.org/pub/debian/stable/ /' >> /etc/apt/sources.list
# RUN echo 'deb http://archive.ubuntu.com/ubuntu trusty main multiverse' >> /etc/apt/sources.list

RUN apt-get update && \
    apt-get install -y \
        curl \
        inotify-tools \
        wget && \
    wget -O - https://download.videolan.org/pub/debian/videolan-apt.asc | \
        apt-key add - && \
    rm -rf /var/lib/apt/lists/*

RUN apt-get update && \
    apt-get install -y \
        apache2 \
        flac \
        lame \
        libav-tools git \
        libavcodec-extra* \
        libfaac-dev \
        libmp3lame-dev \
        libtheora-dev \
        libvorbis-dev \
        libvpx-dev \
        php5 \
        php5-curl \
        php5-json \
        php5-mysqlnd \
        pwgen \
        vorbis-tools && \
    rm -rf /var/lib/apt/lists/*

RUN php -r "readfile('https://getcomposer.org/installer');" | php && \
    mv composer.phar /usr/local/bin/composer

COPY ampache.cfg.php.dist /var/temp/ampache.cfg.php.dist

RUN rm -rf /var/www/* && \
    curl https://codeload.github.com/ampache/ampache/tar.gz/3.8.3 | \
        tar xz -C /var/www/ --strip-components=1 && \
    cd /var/www && \
    composer update --prefer-source --no-interaction && \
    chown -R www-data /var/www

COPY 001-ampache.conf /etc/apache2/sites-available/

RUN rm -rf /etc/apache2/sites-enabled/* && \
    ln -s /etc/apache2/sites-available/001-ampache.conf \
        /etc/apache2/sites-enabled/ && \
    a2enmod rewrite

RUN echo '30 7 * * *  www-data php /var/www/bin/catalog_update.inc' >> \
        /etc/crontab

# VOLUME ["/media"]
# VOLUME ["/var/www/config"]
# VOLUME ["/var/www/themes"]

COPY run.sh /

EXPOSE 80

CMD ["/run.sh"]
