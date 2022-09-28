<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use SadekD\LaravelVisitor\Models\VisitorSession;
use SadekD\LaravelVisitor\Models\Visitor;

class VisitorService
{
    private $sessionKey;
    private $cookieKey;

    public function __construct()
    {
        $this->sessionKey = config('laravel-visitor.session_key');
        $this->cookieKey = config('laravel-visitor.cookie_key');
    }

    public function hit(Request $request): void
    {
        $session = $request->session();

        // if visitor session not found
        if (!$session->has($this->sessionKey)) {
            /** @var Visitor $visitor */
            $visitor = Visitor::findOrCreate($request->cookie($this->cookieKey));

            $visitorSession = VisitorSession::makeFromRequest($request);
            $visitorSession->visitor()->associate($visitor);
            $visitorSession->save();

            // session
            $session->put($this->sessionKey, $visitorSession->getKey());

            // cookie
            Cookie::queue(Cookie::forever($this->cookieKey, $visitor->getKey()));
        }
    }
}
