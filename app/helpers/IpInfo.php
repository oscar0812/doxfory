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

            $object->json = file_get_contents($object->url);

            if ($object->json == null || $object->json == "") {
                $object->success = false; // an error occured
            } else {
                $arr = json_decode($object->json, true);
                $object->country = new Country($arr['country']);
                $object->location = Location::createFromArr($arr['location']);
            }
        }

        return $object;
    }

    public function success()
    {
        return $this->success;
    }

    public function getJSON()
    {
        return json_encode($this->json);
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
    public $json;
    public $success = true;
    public $latitude = 0;
    public $longitude = 0;

    public function __construct($array, $success = true)
    {
        $this->json = $array;
        $this->latitude = $array['latitude'];
        $this->longitude = $array['longitude'];
        $this->success = $success;
    }

    public function success()
    {
        return $this->success;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getJSON()
    {
        return json_encode(['latitude'=>$this->latitude, 'longitude'=>$this->longitude]);
    }

    public static function createFromJSON($json)
    {
        $arr = json_decode($json, true);
        $success = (json_last_error() != JSON_ERROR_NONE);
        return self::createFromArr($arr, $success);
    }

    public static function createFromArr($arr, $success = true)
    {
        return new Location($arr, $success);
    }
}
