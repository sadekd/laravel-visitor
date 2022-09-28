<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Utils;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class UserAgentRobotDetector
{
    public static function isRobot(Request $request): bool
    {
        $agent = new Agent($request->headers->all(), $request->userAgent());
        return $agent->isRobot();
    }
}
