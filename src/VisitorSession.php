<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor;

use Illuminate\Contracts\Session\Session;
use SadekD\LaravelVisitor\Models\Visitor;
use SadekD\LaravelVisitor\Visitor\VisitorSessionDTO;

class VisitorSession
{
    private const KEY = Constant::VISITOR_SESSION_KEY;
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function exists(): bool
    {
        return $this->session->exists(self::KEY);
    }

    public function put(VisitorSessionDTO $visitorSessionDTO): void
    {
        $this->session->put(self::KEY, $visitorSessionDTO->toArray());
    }

    public function putFromVisitor(Visitor $visitor): void
    {
        $this->put(VisitorSessionDTO::fromVisitor($visitor));
    }

    public function get(): VisitorSessionDTO
    {
        return VisitorSessionDTO::fromArray($this->session->get(self::KEY));
    }

}
