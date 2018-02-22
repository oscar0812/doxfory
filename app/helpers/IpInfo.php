<?php
namespace App\Helpers;

use App\Helpers\IpInfo;

class IpInfo
{
    public $url = "";
    public $success = true;
    public $json = [];
    public $country;
    public $location;

    public static function getUserIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public static function createFromIp($ip = null)
    {
        $object = new IpInfo();
        if ($ip == null) {
            $ip = IpInfo::getUserIp();
        }

        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            // invalid ip
            $object->success = false;
        } else {
            $object->success = true;
            $object->url = "http://geoip.nekudo.com/api/$ip";

            $contents = file_get_contents($object->url);
            $object->json = json_decode($contents, true);

            if ($object->json == null) {
                $object->success = false; // an error occured
            } else {
                $object->country = new Country($object->json['country']);
                $object->location = new Location($object->json['location']);
            }
        }

        return $object;
    }

    public static function createFromJSON($json)
    {
        $object = new IpInfo();

        $object->json = json_decode($json, true);
        if (json_last_error() != JSON_ERROR_NONE) {
            $object->success = false; // error in json
        } else {
            $object->success = true;
            $object->country = new Country($object->json['country']);
            $object->location = new Location($object->json['location']);
        }
        return $object;
    }


    public function success()
    {
        return $this->success;
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
    public function getCity()
    {
        return $this->json['city'];
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getIp()
    {
        return $this->json['ip'];
    }
}

// helper wrapping classes
class Country
{
    public $name = "";
    public $code = "";
    public function __construct($array)
    {
        $this->name = $array['name'];
        $this->code = $array['code'];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCode()
    {
        return $this->code;
    }
}

class Location
{
    public $accuracy_radius = 0;
    public $latitude = 0;
    public $longitude = 0;
    public $time_zone = "";

    public function __construct($array)
    {
        $this->accuracy_radius = $array['accuracy_radius'];
        $this->latitude = $array['latitude'];
        $this->longitude = $array['longitude'];
        $this->time_zone = $array['time_zone'];
    }

    public function getAccuracyRadius()
    {
        return $this->accuracy_radius;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getTimezone()
    {
        return $this->time_zone;
    }

    public function toString()
    {
        return "obj";
    }
}
