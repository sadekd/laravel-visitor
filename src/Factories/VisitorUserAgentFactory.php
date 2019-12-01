<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Factories;

use Illuminate\Http\Request;
use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Models\VisitorUserAgent;
use SadekD\LaravelVisitor\Utils\VisitorUserAgentHash;

class VisitorUserAgentFactory
{
    public static function firstOrCreateFromRequest(Request $request): VisitorUserAgent
    {
        return VisitorUserAgent::firstOrCreate([
            Constant::USER_AGENT_HASH_COLUMN_NAME => VisitorUserAgentHash::fromRequest($request),
        ], [
            Constant::USER_AGENT_COLUMN_NAME => $request->userAgent(),
        ]);
    }
}
