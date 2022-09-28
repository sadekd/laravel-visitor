<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use SadekD\LaravelVisitor\Constant;

class Visitor extends Model
{
    const CREATED_AT = Constant::CREATED_AT_COLUMN_NAME;
    const UPDATED_AT = NULL;

    public function getTable(): string
    {
        return config('laravel-visitor.visitors_table_name');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(VisitorSession::class);
    }
}
