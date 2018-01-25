<?php

namespace App\Controllers;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require_once("../snippets/imports.php");

function mainUrl()
{
    return "http://localhost/lion/src/public/home/";
}

function confirmEmail()
{
    // check  if sending to already confirmed email
    $player = currentPlayer();
    if ($player == null) {
        $json = ["success"=>false, "msg"=>"Couldn't find player"];
        echo json_encode($json);
        die();
    }

    if ($player->isConfirmed()) {
        $json = ["success"=>false, "msg"=>"Email is already confirmed"];
        echo json_encode($json);
        die();
    }

    $email = $player->getEmail();
    $username = $player->getUsername();

    $url = mainUrl()."confirmation.php";
    $url.="?email=".$email;

    $key = $player->getConfirmationKey();

    $url.="&key=".$key;

    $body = '<p>You\'re almost there ' .$username.
        ', just click <a href="'.$url.
        '">here to confirm your email.</a></p>';

    sendEmail($email, $username, 'Confirm Email', $body);
}

function resetPasswordEmail($email)
{
    $player = PlayerQuery::create()->findOneByEmail($email);

    $email = $player->getEmail();
    $username = $player->getUsername();

    $url = mainUrl()."resetPassword.php";
    $url.="?email=".$email;

    $key = md5(rand(0, 1000));

    $player->setResetKey($key);
    $player->save();

    $key = $key.strrev($username);
    $url.="&key=".password_hash($key, PASSWORD_DEFAULT);

    $body = '<p>You requested a password change, ' .$username.
        ', if that\'s correct click <a href="'.$url.
        '">here to confirm your email.</a></p> If you didn\'t request
        a password change ignore this email.';

    sendEmail($email, $username, 'Reset Password', $body);
}

function sendEmail($email, $username, $subject, $body)
{
    try {
        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'legends.gaming122@gmail.com';      // SMTP username
        $mail->Password = 'legend825_';                       // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('legends.gaming122@gmail.com', 'Legends Gaming');
        $mail->addAddress($email, $username);     // Add a recipient

        // Passing `true` enables exceptions
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;

        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        $json = ["success"=>true, "msg"=>"Email has been sent"];
        echo json_encode($json);
        die();
    } catch (Exception $e) {
        $json = ["success"=>false, "msg"=>"Mailer Error: " . $mail->ErrorInfo];
        echo json_encode($json);
        die();
    }
}

if ($_POST) {
    $type = $_POST["type"];
    if ($type === "confirm_email") {
        confirmEmail();
    } elseif ($type === "reset_password" && isset($_POST["email"])) {
        resetPasswordEmail($_POST["email"]);
    } else {
        $json = ["success"=>false];
        echo json_encode($json);
        die();
    }
} else {
    $json = ["success"=>false];
    echo json_encode($json);
    die();
}
