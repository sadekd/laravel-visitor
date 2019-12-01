<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Utils;

use Illuminate\Http\Request;

final class VisitorUserAgentHash
{
    public static function fromRequest(Request $request): string
    {
        return self::calculate($request->userAgent());
    }

    public static function calculate(string $value): string
    {
        return md5($value);
    }
}
