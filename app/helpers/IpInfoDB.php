<?php
namespace App\Helpers;

class IpInfoDB
{
    public $key = '';
    public $url = "";
    public $json = [];
    public function __construct($ip)
    {
        $this->url = ("http://api.ipinfodb.com/v3/ip-city/?key=$this->key&ip=$ip&format=json");

        $contents = file_get_contents($this->url);
        $this->json = json_decode($contents, true);
    }

    public function getJSON()
    {
        return $this->json;
    }

    public function getUrl()
    {
        return $this->url;
    }

    // helper methods
    public function getStatusCode()
    {
        return $this->json['statusCode'];
    }

    public function getStatusMessage()
    {
        return $this->json['statusMessage'];
    }

    public function getIpAddress()
    {
        return $this->json['ipAddress'];
    }

    public function getCountryCode()
    {
        return $this->json['countryCode'];
    }

    public function getCountryName()
    {
        return $this->json['countryName'];
    }

    public function getRegionName()
    {
        return $this->json['regionName'];
    }

    public function getCityName()
    {
        return $this->json['cityName'];
    }

    public function getZipCode()
    {
        return $this->json['zipCode'];
    }

    public function getLatitude()
    {
        return $this->json['latitude'];
    }

    public function getLongitude()
    {
        return $this->json['longitude'];
    }

    public function getTimeZone()
    {
        return $this->json['timeZone'];
    }
}
