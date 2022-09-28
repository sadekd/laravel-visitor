<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use SadekD\LaravelVisitor\Constant;

class VisitorSession extends Model
{
    const CREATED_AT = Constant::CREATED_AT_COLUMN_NAME;
    const UPDATED_AT = NULL;

    public function getTable(): string
    {
        return config('laravel-visitor.sessions_table_name');
    }

    public function visitor(): BelongsTo
    {
        return $this->belongsTo(Visitor::class, Constant::VISITOR_ID_COLUMN_NAME);
    }

    public function ip(): BelongsTo
    {
        return $this->belongsTo(IpAddress::class, Constant::IP_ID_COLUMN_NAME);
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(UserAgent::class, Constant::AGENT_ID_COLUMN_NAME);
    }

    public function locale(): BelongsTo
    {
        return $this->belongsTo(Locale::class, Constant::LOCALE_ID_COLUMN_NAME);
    }

    public static function makeFromRequest(Request $request): self
    {
        $session = new self();
        $session->ip()->associate(IpAddress::firstOrCreateFromRequest($request));
        $session->agent()->associate(UserAgent::firstOrCreateFromRequest($request));
        $session->locale()->associate(Locale::firstOrCreateFromRequest($request));

        return $session;
    }
}
