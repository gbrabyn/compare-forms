<?php

/** Just a test file */

echo 'Checking mysql connection : ';

new PDO('mysql:host=' . getenv('ROOT_DB_HOST') . ';dbname=' . getenv('ROOT_DB_NAME'), getenv('ROOT_DB_USER'), getenv('ROOT_DB_PASSWORD'));
new mysqli(getenv('ROOT_DB_HOST'), getenv('ROOT_DB_USER'), getenv('ROOT_DB_PASSWORD'), getenv('ROOT_DB_NAME'));

echo 'OK';