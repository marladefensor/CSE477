<?php
/**
 * Function to localize our site
 * @param $site The Site object
 */
return function(Felis\Site $site) {
    // Set the time zone
    date_default_timezone_set('America/Detroit');

    $site->setEmail('defenso2@cse.msu.edu');
    $site->setRoot('/~defenso2/step7');
    $site->dbConfigure('mysql:host=mysql-user.cse.msu.edu;dbname=defenso2',
        'defenso2',       // Database user
        '*Nov221997',     // Database password
        'test_');            // Table prefix

};

