<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Utils;

use SadekD\LaravelVisitor\Constant;

trait HashUserAgentOnCreating
{
    public static function bootHashUserAgentOnCreating()
    {
        self::creating(function (self $model) {
            $model->{Constant::USER_AGENT_HASH_COLUMN_NAME} = VisitorUserAgentHash::calculate(
                $model->{Constant::USER_AGENT_COLUMN_NAME}
            );
        });
    }
}
