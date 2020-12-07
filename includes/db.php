<?php 

    // Makes an array out of vars needed to connect to db
    $db['db_host'] = 'localhost';
    $db['db_user'] = 'root';
    $db['db_pass'] = '';
    $db['db_name'] = 'cms';

    // Loops through the db array and makes the keys as uppercase constants with their values
    foreach($db as $key => $value) {
        define(strtoupper($key), $value);
    }


    //  Uses the constants to establish the db connection 
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

?>