<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Utils\Hasher;

class IpAddress extends Model
{
    const CREATED_AT = Constant::CREATED_AT_COLUMN_NAME;
    const UPDATED_AT = NULL;

    protected $fillable = [
        Constant::IP_ADDRESS_COLUMN_NAME,
    ];

    public function getTable(): string
    {
        return config('laravel-visitor.ips_table_name');
    }

    public static function firstOrCreateFromRequest(Request $request): self
    {
        $ip = $request->getClientIp();
        return self::firstOrCreate([
            Constant::IP_ADDRESS_COLUMN_NAME => config('laravel-visitor.hash_ips') ? (new Hasher())->hash($ip) : $ip,
        ]);
    }
}
