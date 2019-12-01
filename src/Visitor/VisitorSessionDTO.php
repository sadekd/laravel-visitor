<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Visitor;

use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Models\Visitor;

class VisitorSessionDTO
{
    private $id;
    private $ipAddress;
    private $userAgentHash;
    private $locale;

    public function __construct($id, ?string $ipAddress, ?string $userAgentHash, ?string $locale)
    {
        $this->id = $id;
        $this->ipAddress = $ipAddress;
        $this->userAgentHash = $userAgentHash;
        $this->locale = $locale;
    }

    public static function fromVisitor(Visitor $visitor): self
    {
        return new self(
            $visitor->getKey(),
            $visitor->ipAddress->{Constant::IP_ADDRESS_COLUMN_NAME},
            $visitor->userAgent->{Constant::USER_AGENT_HASH_COLUMN_NAME},
            $visitor->locale->{Constant::VISITOR_LOCALE_COLUMN_NAME}
        );
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data[Constant::ID_COLUMN_NAME],
            $data[Constant::IP_ADDRESS_COLUMN_NAME],
            $data[Constant::USER_AGENT_HASH_COLUMN_NAME],
            $data[Constant::VISITOR_LOCALE_COLUMN_NAME]
        );
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function getUserAgentHash(): ?string
    {
        return $this->userAgentHash;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function toArray(): array
    {
        return [
            Constant::ID_COLUMN_NAME => $this->id,
            Constant::IP_ADDRESS_COLUMN_NAME => $this->ipAddress,
            Constant::USER_AGENT_HASH_COLUMN_NAME => $this->userAgentHash,
            Constant::VISITOR_LOCALE_COLUMN_NAME => $this->locale,
        ];
    }
}
