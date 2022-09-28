<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor;

class Constant
{
    // global
    public const ID_COLUMN_NAME = 'id';
    public const UUID_COLUMN_NAME = 'uuid';
    public const CREATED_AT_COLUMN_NAME = 'created_at';

    // app
    public const VISITOR_ID_COLUMN_NAME = 'visitor_id';
    public const IP_ID_COLUMN_NAME = 'ip_id';
    public const IP_ADDRESS_COLUMN_NAME = 'ip_address';
    public const AGENT_ID_COLUMN_NAME = 'agent_id';
    public const USER_AGENT_HASH_COLUMN_NAME = 'user_agent_hash';
    public const USER_AGENT_COLUMN_NAME = 'user_agent';
    public const LOCALE_ID_COLUMN_NAME = 'locale_id';
    public const LOCALE_COLUMN_NAME = 'locale';
}
