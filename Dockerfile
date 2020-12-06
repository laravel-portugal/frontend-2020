FROM php:7.4-fpm
ADD . /var/www/html
RUN php artisan key:generate
EXPOSE 80
CMD php artisan serve --port=80 --host=0.0.0.0
