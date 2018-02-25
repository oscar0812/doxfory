<?php
$config['displayErrorDetails'] = true;

function websiteName()
{
    return "Do X for Y";
}

function copyright()
{
    return "Copyright © 2018. All Rights Reserved.";
}

function jobTagColor()
{
    $arr = array("warning", "danger", "info", "success");
    return $arr[array_rand($arr)];
}

function session_start_safe()
{
    if (!isset($_SESSION)) {
        session_start();
    }
}

function currentUser()
{
    session_start_safe();
    if (isset($_SESSION['user_id'])) {
        return UserQuery::create()->findPk($_SESSION['user_id']);
    }
    return null;
}

function logUserIn($id)
{
    session_start_safe();
    $_SESSION['user_id'] = $id;
}

function logUserOut()
{
    session_start_safe();
    unset($_SESSION['user_id']);
}

// for sending email, to send with whole url and not just a path
function url()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    } else {
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}


function startsWith($original, $substr)
{
    $length = strlen($substr);
    return (substr($original, 0, $length) === $substr);
}

function endsWith($original, $substr)
{
    $length = strlen($substr);

    return $length === 0 ||
    (substr($original, -$length) === $substr);
}

function modifyUrl($mod = array(), $url = false)
{
    // If $url wasn't passed in, use the current url
    if ($url == false) {
        $url = url();
    }

    // Parse the url into pieces
    $url_array = parse_url($url);

    // The original URL had a query string, modify it.
    if (!empty($url_array['query'])) {
        parse_str($url_array['query'], $query_array);
        foreach ($mod as $key => $value) {
            $query_array[$key] = $value;
        }
    }

    // The original URL didn't have a query string, add it.
    else {
        $query_array = $mod;
    }

    return $url_array['scheme'].'://'.$url_array['host'].$url_array['path'].'?'.http_build_query($query_array);
}

// date functions
function getCurrentDateTime()
{
    $dt = new DateTime();
    $dt->setTimezone(new DateTimeZone("Canada/Saskatchewan"));
    return $dt;
}

function getCurrentDate()
{
    $today = getCurrentDateTime();
    $today->setTime(0, 0);
    return $today;
}

function getCurrentTime()
{
    return getCurrentDateTime()->getTimestamp();
}

function timestampToDate($time)
{
    $dt = getCurrentDateTime();
    $dt->setTimestamp($time);
    return $dt;
}

// get the difference between 2 dates in minutes
function dateMinuteDifference($date1, $date2)
{
    if (is_int($date1)) {
        $date1 = timestampToDate($date1);
    }
    if (is_int($date2)) {
        $date2 = timestampToDate($date2);
    }
    $interval = new DateInterval("PT1M");
    $periods = new DatePeriod($date1, $interval, $date2);
    return ((int)iterator_count($periods));
}

// the functions below take strings such as "1/30/2017"
// for parameters
function firstSecondOfDayString($date_str)
{
    $date = DateTime::createFromFormat(
        'Y-m-d',
        $date_str,
    new DateTimeZone("Canada/Saskatchewan")
    );

    $date->setTime(0, 0);
    return $date;
}

function lastSecondOfDayString($date_str)
{
    $date = firstSecondOfDayString($date_str);
    // add 1 day, then subtract a second
    $date->add(new DateInterval("P1D"));
    $date->sub(new DateInterval("PT1S"));
    return $date;
}
