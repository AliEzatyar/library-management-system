<?php
return array(

    'default' => 'pgsql',

    'connections' => array(

        'pgsql' => array(
            'driver'   => 'pgsql',
            'host'     => 'sushi.cofsei4ow3ep.us-east-1.rds.amazonaws.com',
            'port'     => '5432',
            'database' => 'sushi',
            'username' => 'sushi',
            'password' => 'Allah123!',
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
        ),

    ),

    'migrations' => 'migrations', // ✅ add this
);

