<?php

return [
    'log_bots' => false,
    'hash_ips' => false,

    'cookie_key' => 'visitor',
    'session_key' => 'visitor',

    // TABLES - DON'T CHANGE AFTER MIGRATE
    'visitors_table_name' => 'visitors_visitors',
    'sessions_table_name' => 'visitors_sessions',

    'ips_table_name' => 'visitors_ips',
    'agents_table_name' => 'visitors_agents',
    'locales_table_name' => 'visitors_locales',
];
