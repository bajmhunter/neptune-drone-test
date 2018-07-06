@echo off
npm install --only=dev
composer install
bower install
echo "Please update phinx.yaml and database.php with your database details.  Then press [ENTER] to initalise the database."
pause
./vendor/bin/phinx migrate