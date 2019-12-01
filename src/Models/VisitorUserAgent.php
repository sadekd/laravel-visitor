<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Models;

use Illuminate\Database\Eloquent\Model;
use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Utils\HashUserAgentOnCreating;

class VisitorUserAgent extends Model
{
    use HashUserAgentOnCreating;

    public const CREATED_AT = Constant::CREATED_AT_COLUMN_NAME;
    public const UPDATED_AT = NULL;

    protected $fillable = [
        Constant::USER_AGENT_HASH_COLUMN_NAME,
        Constant::USER_AGENT_COLUMN_NAME,
    ];

    public function getTable(): string
    {
        return config('laravel-visitor.tables_prefix') . '_agents';
    }
}
