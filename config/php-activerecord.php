<?php

require_once LIB_DIR.'/activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
    $config = Fram\Config::getConfig();

    $cfg->set_model_directory(APP_DIR.'/models');
    $cfg->set_connections(
        array(
            'development' => $config->db->driver.'://'.$config->db->user.':'.$config->db->password.'@'.$config->db->host.'/'.$config->db->name,
            'test' => $config->db->driver.'://'.$config->db->user.':'.$config->db->password.'@'.$config->db->host.'/'.$config->db->name,
            'production' => $config->db->driver.'://'.$config->db->user.':'.$config->db->password.'@'.$config->db->host.'/'.$config->db->name,
        )
    );
});
