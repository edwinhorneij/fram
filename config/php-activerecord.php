<?php

require_once LIB_DIR.'/activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory(APP_DIR.'/models');
    $cfg->set_connections(
        array(
            'development' => 'mysql://root:root@localhost/test',
            'test' => 'mysql://username:password@localhost/test_database_name',
            'production' => 'mysql://username:password@localhost/production_database_name'
        )
    );
});
