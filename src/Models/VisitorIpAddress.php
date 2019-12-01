<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Models;

use Illuminate\Database\Eloquent\Model;
use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Utils\GeoIpOnCreatingWhenEnabled;

class VisitorIpAddress extends Model
{
    use GeoIpOnCreatingWhenEnabled;

    public const CREATED_AT = Constant::CREATED_AT_COLUMN_NAME;
    public const UPDATED_AT = NULL;

    protected $fillable = [
        Constant::IP_ADDRESS_COLUMN_NAME,
        Constant::GEOIP_COLUMN_NAME,
    ];

    protected $casts = [
        Constant::GEOIP_COLUMN_NAME => 'array',
    ];

    public function getTable(): string
    {
        return config('laravel-visitor.tables_prefix') . '_ips';
    }

}
