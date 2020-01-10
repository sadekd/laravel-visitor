<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Visitor\Locale;

use Illuminate\Database\Eloquent\Model;
use SadekD\LaravelVisitor\Constant;

class VisitorLocale extends Model
{
    public const CREATED_AT = Constant::CREATED_AT_COLUMN_NAME;
    public const UPDATED_AT = NULL;

    protected $fillable = [
        Constant::VISITOR_LOCALE_COLUMN_NAME,
    ];

    public function getTable(): string
    {
        return config('laravel-visitor.tables_prefix') . '_locales';
    }
}
