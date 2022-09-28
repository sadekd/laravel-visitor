<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Utils;

use Illuminate\Http\Request;

class UserAgentHash
{
    public static function fromRequest(Request $request): string
    {
        return self::fromString($request->userAgent());
    }

    public static function fromString(string $userAgent): string
    {
        return md5($userAgent);
    }
}
