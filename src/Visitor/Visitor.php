<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Visitor;

use Illuminate\Database\Eloquent\Model;
use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Visitor\IpAddress\VisitorIpAddress;
use SadekD\LaravelVisitor\Visitor\Locale\VisitorLocale;
use SadekD\LaravelVisitor\Visitor\UserAgent\VisitorUserAgent;

class Visitor extends Model
{
    public function ipAddress()
    {
        return $this->belongsTo(VisitorIpAddress::class, Constant::VISITOR_IP_ID_COLUMN_NAME);
    }

    public function userAgent()
    {
        return $this->belongsTo(VisitorUserAgent::class, Constant::VISITOR_AGENT_ID_COLUMN_NAME);
    }

    public function locale()
    {
        return $this->belongsTo(VisitorLocale::class, Constant::VISITOR_LOCALE_ID_COLUMN_NAME);
    }

    public function getTable(): string
    {
        return config('laravel-visitor.tables_prefix');
    }
}
