<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Utils;

use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Visitor\VisitorGeoIpDTO;

trait GeoIpOnCreatingWhenEnabled
{
    public static function bootGeoIpOnCreatingWhenEnabled()
    {
        if (config('laravel-visitor.geoip_enabled')) {
            self::creating(function (self $model) {
                $model->{Constant::GEOIP_COLUMN_NAME} = VisitorGeoIpDTO::fromLocation(
                    geoip($model->{Constant::IP_ADDRESS_COLUMN_NAME})
                )->toArray();
            });
        }
    }
}
