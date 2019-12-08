<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor;

use Illuminate\Contracts\Session\Session;
use SadekD\LaravelVisitor\Models\Visitor;
use SadekD\LaravelVisitor\Visitor\VisitorSessionDTO;

class VisitorSession
{
    private $session;
    private $key;

    public function __construct(Session $session)
    {
        $this->session = $session;
        $this->key = config('laravel-visitor.session_key');
    }

    public function exists(): bool
    {
        return $this->session->exists($this->key);
    }

    public function put(VisitorSessionDTO $visitorSessionDTO): void
    {
        $this->session->put($this->key, $visitorSessionDTO->toArray());
    }

    public function putFromVisitor(Visitor $visitor): void
    {
        $this->put(VisitorSessionDTO::fromVisitor($visitor));
    }

    public function get(): VisitorSessionDTO
    {
        return VisitorSessionDTO::fromArray($this->session->get($this->key));
    }

}
