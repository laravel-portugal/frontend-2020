FROM hub.sidecar.laravel.pt/frontbase:1
ADD . /var/www/html
RUN composer install
EXPOSE 80
CMD php artisan serve --port=80 --host=0.0.0.0
