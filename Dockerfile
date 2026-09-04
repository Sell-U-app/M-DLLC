FROM php:8.3-apache

# Un solo MPM cargado: a2enmod puede arrastrar mpm_event como dependencia y
# Apache aborta con "More than one MPM loaded". Se deja explicitamente prefork.
RUN a2dismod mpm_event mpm_worker 2>/dev/null || true; \
    a2enmod mpm_prefork rewrite headers expires deflate \
 && sed -ri 's!<Directory /var/www/>!<Directory /var/www/>\n\tAllowOverride All!' /etc/apache2/apache2.conf \
 && echo 'ServerName localhost' > /etc/apache2/conf-available/servername.conf \
 && a2enconf servername \
 && ls /etc/apache2/mods-enabled/ | grep -c '^mpm_.*\.load$' | grep -qx 1

COPY . /var/www/html/

RUN mkdir -p /var/www/html/storage \
 && find /var/www/html -type d -exec chmod 755 {} + \
 && find /var/www/html -type f -exec chmod 644 {} + \
 && chown -R www-data:www-data /var/www/html/storage

# Railway inyecta $PORT en runtime; Apache tiene que escuchar ahi.
CMD sh -c 'P=${PORT:-80}; \
  echo "Listen $P" > /etc/apache2/ports.conf; \
  sed -i "s/:80>/:$P>/" /etc/apache2/sites-available/000-default.conf; \
  exec apache2-foreground'
