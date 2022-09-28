<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use SadekD\LaravelVisitor\Services\VisitorService;
use SadekD\LaravelVisitor\Utils\UserAgentRobotDetector;

class VisitorMiddleware
{
    private $visitorService;

    public function __construct(
        VisitorService $visitorService
    )
    {
        $this->visitorService = $visitorService;
    }

    public function handle(Request $request, Closure $next)
    {
        if (!config('laravel-visitor.log_bots') && UserAgentRobotDetector::isRobot($request)) {
            return $next($request);
        }

        $this->visitorService->hit($request);

        return $next($request);
    }
}
