## Aplicación para ver el tiempo en Chipiona

Creado por Raúl Caro Pastorino

## Instalación

git clone https://gitlab.com/desde-chipiona/wheater-station-web.git www
.eltiempo.desdechipiona.es

- Editar .env
- Crear Base de datos (postgresql)

cd /var/www/web/www.eltiempo.desdechipiona.es
sudo -u postgres createdb -O web -T template1 desdechipiona_eltiempo
cp .env.example .env
nano .env

composer install --no-dev
php artisan migrate
php artisan db:seed
php artisan key:generate

#ln -s $PWD/storage/app/public $PWD/public/storage
php artisan storage:link

npm install --production

sudo chown -R www-data:www-data /var/www/web/www.eltiempo.desdechipiona.es
sudo find /var/www/web/www.eltiempo.desdechipiona.es/ -type f -exec chmod 644 {} \;
sudo find /var/www/web/www.eltiempo.desdechipiona.es/ -type d -exec chmod 775 {} \;

sudo mkdir /var/log/apache2/www.eltiempo.desdechipiona.es
sudo cp /var/www/web/api-fryntiz/www.eltiempo.desdechipiona.es.conf /etc/apache2/sites-available/
sudo a2ensite www.eltiempo.desdechipiona.es.conf

echo '127.0.0.1       eltiempo.desdechipiona.es' | sudo tee -a /etc/hosts
echo '127.0.0.1       www.eltiempo.desdechipiona.es' | sudo tee -a /etc/hosts

sudo systemctl reload apache2

sudo certbot --authenticator webroot --installer apache \
    -w /var/www/web/www.eltiempo.desdechipiona.es/public \
    -d www.eltiempo.desdechipiona.es -d eltiempo.desdechipiona.es


sudo certbot certonly --webroot -w /var/www/web/www.eltiempo.desdechipiona.es/public \
    -d www.eltiempo.desdechipiona.es -d eltiempo.desdechipiona.es
