FROM php:8.3-apache

RUN a2enmod rewrite headers expires deflate \
 && sed -ri 's!<Directory /var/www/>!<Directory /var/www/>\n\tAllowOverride All!' /etc/apache2/apache2.conf \
 && echo 'ServerName localhost' > /etc/apache2/conf-available/servername.conf \
 && a2enconf servername

COPY . /var/www/html/

RUN mkdir -p /var/www/html/storage \
 && find /var/www/html -type d -exec chmod 755 {} + \
 && find /var/www/html -type f -exec chmod 644 {} + \
 && chown -R www-data:www-data /var/www/html/storage

# El arreglo de los MPM tiene que correr en RUNTIME: en Railway la imagen
# php:*-apache arranca con mpm_event y mpm_prefork cargados a la vez y Apache
# aborta con "More than one MPM loaded". Hacerlo solo en build no basta.
# Ademas Railway inyecta $PORT, asi que Apache tiene que escuchar ahi.
CMD sh -c 'a2dismod mpm_event mpm_worker >/dev/null 2>&1 || true; \
  a2enmod mpm_prefork >/dev/null 2>&1 || true; \
  P=${PORT:-80}; \
  echo "Listen $P" > /etc/apache2/ports.conf; \
  sed -i "s/:80>/:$P>/" /etc/apache2/sites-available/000-default.conf; \
  apache2ctl -t; \
  exec apache2-foreground'
