<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Factories;

use Illuminate\Http\Request;
use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Models\VisitorLocale;

class VisitorLocaleFactory
{
    public static function firstOrCreateFromRequest(Request $request): VisitorLocale
    {
        return VisitorLocale::firstOrCreate([
            Constant::VISITOR_LOCALE_COLUMN_NAME => $request->getPreferredLanguage(),
        ]);
    }
}
