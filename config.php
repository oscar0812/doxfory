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
