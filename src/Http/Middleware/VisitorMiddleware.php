<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Visitor\IpAddress\VisitorIpAddressFactory;
use SadekD\LaravelVisitor\Visitor\UserAgent\VisitorUserAgentFactory;
use SadekD\LaravelVisitor\Visitor\UserAgent\VisitorUserAgentHash;
use SadekD\LaravelVisitor\Visitor\Visitor;
use SadekD\LaravelVisitor\Visitor\VisitorFactory;
use SadekD\LaravelVisitor\VisitorSession;

class VisitorMiddleware
{
    private $visitorSession;

    public function __construct(VisitorSession $visitorSession)
    {
        $this->visitorSession = $visitorSession;
    }

    public function handle(Request $request, Closure $next)
    {
        // skip when bot
        if (!config('laravel-visitor.allow_bots')) {
            $agent = new Agent($request->headers->all(), $request->userAgent());
            if ($agent->isRobot()) {
                return $next($request);
            }
        }

        // create new visitor
        $this->createVisitorIfNotExists($request);

        // update visitor if changed ip
        $this->updateIpAddressIfNeeded($request);

        // update visitor if changed agent by hash
        $this->updateUserAgentIfNeeded($request);

        // set-up forever cookie last
        if (!$request->hasCookie(Constant::VISITOR_COOKIE_KEY)) {
            return $next($request)->withCookie(
                cookie()->forever(
                    Constant::VISITOR_COOKIE_KEY,
                    $this->visitorSession->get()->getId()
                )
            );
        }

        return $next($request);
    }

    private function createVisitorIfNotExists(Request $request): void
    {
        if ($this->visitorSession->exists()) {
            return;
        }

        $visitor = VisitorFactory::createFromRequest($request);

        $this->visitorSession->putFromVisitor($visitor);
    }

    private function updateIpAddressIfNeeded(Request $request): void
    {
        if ($this->visitorSession->get()->getIpAddress() === $request->getClientIp()) {
            return;
        }

        $visitor = $this->getVisitor();

        $visitor->ipAddress()->associate(
            VisitorIpAddressFactory::firstOrCreateFromRequest($request)
        );

        $visitor->save();

        $this->visitorSession->putFromVisitor($visitor);
    }

    private function updateUserAgentIfNeeded(Request $request): void
    {
        if ($this->visitorSession->get()->getUserAgentHash() === VisitorUserAgentHash::fromRequest($request)) {
            return;
        }

        $visitor = $this->getVisitor();

        $visitor->userAgent()->associate(
            VisitorUserAgentFactory::firstOrCreateFromRequest($request)
        );

        $visitor->save();

        $this->visitorSession->putFromVisitor($visitor);
    }

    private function getVisitor(): Visitor
    {
        return Visitor::findOrFail($this->visitorSession->get()->getId());
    }

}
