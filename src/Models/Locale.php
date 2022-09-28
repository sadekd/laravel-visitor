<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use SadekD\LaravelVisitor\Constant;

class Locale extends Model
{
    const CREATED_AT = Constant::CREATED_AT_COLUMN_NAME;
    const UPDATED_AT = NULL;

    protected $fillable = [
        Constant::LOCALE_COLUMN_NAME,
    ];

    public function getTable(): string
    {
        return config('laravel-visitor.locales_table_name');
    }

    public static function firstOrCreateFromRequest(Request $request): self
    {
        return self::firstOrCreate([
            Constant::LOCALE_COLUMN_NAME => $request->getPreferredLanguage(),
        ]);
    }
}
