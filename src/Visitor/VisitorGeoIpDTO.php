<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Visitor;

use SadekD\LaravelVisitor\Constant;
use Torann\GeoIP\Location;

class VisitorGeoIpDTO
{
    private $latitude;
    private $longitude;
    private $isoCode;
    private $city;
    private $timezone;
    private $currency;
    private $default;

    public function __construct($latitude, $longitude, $isoCode, $city, $timezone, $currency, $default)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->isoCode = $isoCode;
        $this->city = $city;
        $this->timezone = $timezone;
        $this->currency = $currency;
        $this->default = $default;
    }

    public static function fromLocation(Location $location): self
    {
        return new self(
            $location->getAttribute(Constant::LAT),
            $location->getAttribute(Constant::LON),
            $location->getAttribute(Constant::ISO_CODE),
            $location->getAttribute(Constant::CITY),
            $location->getAttribute(Constant::TIMEZONE),
            $location->getAttribute(Constant::CURRENCY),
            $location->getAttribute(Constant::DEFAULT)
        );
    }

    public function toArray(): array
    {
        return [
            Constant::LAT => $this->latitude,
            Constant::LON => $this->longitude,
            Constant::ISO_CODE => $this->isoCode,
            Constant::CITY => $this->city,
            Constant::TIMEZONE => $this->timezone,
            Constant::CURRENCY => $this->currency,
            Constant::DEFAULT => $this->default,
        ];
    }
}
