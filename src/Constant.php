<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor;

class Constant
{
    public const VISITOR_SESSION_KEY = 'visitor';
    public const VISITOR_COOKIE_KEY = self::VISITOR_SESSION_KEY;
    public const VISITOR_ID_COOKIE_KEY = 'visitor_id';
    public const VISITOR_ID_SESSION_KEY = 'visitor_id';
    public const VISITOR_IP_SESSION_KEY = 'visitor_ip';
    public const VISITOR_AGENT_HASH_SESSION_KEY = 'visitor_user_agent_hash';
    public const VISITOR_HASH_SESSION_KEY = 'visitor_hash';

    public const ID_COLUMN_NAME = 'id';
    public const UUID_COLUMN_NAME = 'uuid';
    public const SESSION_ID_COLUMN_NAME = 'session_id';
    public const USER_ID_COLUMN_NAME = 'user_id';
//    public const COOKIE_ID_COLUMN_NAME = 'cookie_id';
    public const VISITOR_IP_ID_COLUMN_NAME = 'visitor_ip_id';
    public const VISITOR_AGENT_ID_COLUMN_NAME = 'visitor_agent_id';
    public const COOKIE_VISITOR_ID_COLUMN_NAME = 'cookie_visitor_id';
    public const VISITOR_LOCALE_ID_COLUMN_NAME = 'locale_id';
    public const VISITOR_LOCALE_COLUMN_NAME = 'locale';
    public const USER_AGENT_HASH_COLUMN_NAME = 'user_agent_hash';
    public const IP_ADDRESS_COLUMN_NAME = 'ip_address';
    public const GEOIP_COLUMN_NAME = 'geoip';
    public const USER_AGENT_COLUMN_NAME = 'user_agent';
    public const CREATED_AT_COLUMN_NAME = 'created_at';

    // GeoIp
    public const LAT = 'lat';
    public const LON = 'lon';
    public const ISO_CODE = 'iso_code';
    public const CITY = 'city';
    public const TIMEZONE = 'timezone';
    public const CURRENCY = 'currency';
    public const DEFAULT = 'default';

//    public const UPDATED_AT_COLUMN_NAME = 'updated_at';
}
