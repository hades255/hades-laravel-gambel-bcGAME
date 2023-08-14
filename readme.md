![img](public/img/logo_simple.png)

-------- Global install --------

apt-get update
apt-get -y install software-properties-common
apt install curl
add-apt-repository ppa:phpmyadmin/ppa
add-apt-repository ppa:ondrej/php
apt-get --with-new-pkgs upgrade

apt-get install -y php7.4 php7.4-bcmath php7.4-ctype php7.4-fileinfo php7.4-json php7.4-mbstring php7.4-pdo php7.4-xml php7.4-tokenizer
sudo apt-get install curl libcurl3 libcurl3-dev php7.4-curl
sudo apt-get install php7.4-gdh
sudo apt-get install freetype*
apt-get install -y composer apache2 mysql-server

sudo mysql_secure_installation

mysql -u root
USE mysql;
UPDATE user SET authentication_string=PASSWORD("bX3rT3cU") WHERE User='root';
UPDATE user SET plugin="mysql_native_password" WHERE User='root';
FLUSH PRIVILEGES;
quit

apt-get install -y phpmyadmin
(Select Apache)

curl -sL https://deb.nodesource.com/setup_10.x | sudo -E bash -
sudo apt-get install -y nodejs
npm i -g pm2

sudo apt-get install unzip
sudo apt-get install zip

upload source code;

cd /var/www/html
unzip archive_name.zip
chmod -R 777 /var/www/html/storage
chmod -R 777 /var/www/html/bootstrap
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

-------- Ssl install --------

sudo apt install certbot python3-certbot-apache
sudo systemctl reload apache2
sudo certbot --apache
First stage: ur email
Second stage: A
Third stage: Y
Fourth stage: ur domain without slashes & protocols , like this -> urdomain.com
sudo systemctl status certbot.timer

-------- Apache configurate --------

Open /etc/apache2/sites-available/000-default.conf and 000-default-le-ssl.conf

Remove this:

DocumentRoot /var/www/html

Paste this:

	DocumentRoot /var/www/html/public
	<Directory /var/www/html/public>
          Options Indexes FollowSymLinks
            AllowOverride All
            Require all granted
    </Directory>

a2enmod rewrite
sudo service apache2 restart

-------- Node & npm configure --------

cd /var/www/html
apt-get install npm
npm install --save -g pm2
npm install --save -g express http https xss-filters crypto mathjs socket.io
npm install --save -g fs

Change domen in app.js file;
domain = __LOCALHOST ? 'http://localhost' : 'http://your_domen.com';

pm2 start app.js

-------- Startup project --------

in folder with sys files open .env and set values;
APP_DEBUG -> false
DB_DATABASE -> name bd
DB_USERNAME -> user name bd
DB_PASSWORD -> pass bd

Open file app.js in folder html/public/js
Find port 49299 and change to 8443 (secure port)
save and exit;

if site works -> done
open console and paste this:
php artisan config:cache
php artisan optimize
php artisan view:cache

open ur site, and set all default settings in admin page settings;

Enjoy work)

![Alt text](image.png)