#!/bin/sh

npm install --only=dev
composer install
bower install
read -p "Please update phinx.yaml and database.php with your database details.  Then press [ENTER] to initalise the database."
./vendor/bin/phinx migrate