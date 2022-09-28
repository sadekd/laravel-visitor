<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Utils\UserAgentHash;

class UserAgent extends Model
{
    const CREATED_AT = Constant::CREATED_AT_COLUMN_NAME;
    const UPDATED_AT = NULL;

    protected $fillable = [
        Constant::USER_AGENT_HASH_COLUMN_NAME,
        Constant::USER_AGENT_COLUMN_NAME,
    ];

    public static function boot(): void
    {
        parent::boot();

        self::creating(function (self $model): void {
            $model->{Constant::USER_AGENT_HASH_COLUMN_NAME} = UserAgentHash::fromString($model->{Constant::USER_AGENT_COLUMN_NAME});
        });
    }

    public function getTable(): string
    {
        return config('laravel-visitor.agents_table_name');
    }

    public static function firstOrCreateFromRequest(Request $request): self
    {
        return self::firstOrCreate([
            Constant::USER_AGENT_HASH_COLUMN_NAME => UserAgentHash::fromRequest($request),
        ], [
            Constant::USER_AGENT_COLUMN_NAME => $request->userAgent(),
        ]);
    }
}
