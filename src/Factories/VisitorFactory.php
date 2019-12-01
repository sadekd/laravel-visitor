<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Factories;

use Illuminate\Http\Request;
use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Models\Visitor;

class VisitorFactory
{
    public static function createFromRequest(Request $request): Visitor
    {
        $visitor = new Visitor();

        // old visitor cookie
        if ($request->hasCookie(Constant::VISITOR_COOKIE_KEY)) {
            $visitor->setAttribute(
                Constant::COOKIE_VISITOR_ID_COLUMN_NAME,
                $request->cookie(Constant::VISITOR_COOKIE_KEY)
            );
        }

        // ip address
//        if (!empty($request->getClientIp())) {
        $visitor->ipAddress()->associate(
            VisitorIpAddressFactory::firstOrCreateFromRequest($request)
        );
//        }

        // user agent
//        if (!empty($request->userAgent())) {
        $visitor->userAgent()->associate(
            VisitorUserAgentFactory::firstOrCreateFromRequest($request)
        );
//        }

        // locale
//        if (!empty($request->getPreferredLanguage())) {
        $visitor->locale()->associate(
            VisitorLocaleFactory::firstOrCreateFromRequest($request)
        );
//        }

        $visitor->save();

        return $visitor;
    }
}
