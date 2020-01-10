<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Visitor\IpAddress;

use Illuminate\Http\Request;
use SadekD\LaravelVisitor\Constant;

class VisitorIpAddressFactory
{
    public static function firstOrCreateFromRequest(Request $request): VisitorIpAddress
    {
        return VisitorIpAddress::firstOrCreate([
            Constant::IP_ADDRESS_COLUMN_NAME => $request->getClientIp(),
        ]);
    }
}
