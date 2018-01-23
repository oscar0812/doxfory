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
