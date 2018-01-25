<?php

namespace App\Helpers;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    public static function send($type, $email, $user)
    {
        $main_url = "url/";
        if ($type === "confirm_email") {
            confirmEmail($main_url, $user);
        } elseif ($type === "reset_password") {
            resetPasswordEmail($main_url, $email, $user);
        } else {
            return ["success"=>false];
        }
    }

    private static function confirmEmail($main_url, $user)
    {
        $email = $user->getEmail();
        $username = $user->getUsername();

        $url = $main_url;
        $url.="?email=".$email;

        $key = $user->getConfirmationKey();

        $url.="&key=".$key;

        $body = '<p>You\'re almost there ' .$username.
        ', just click <a href="'.$url.
        '">here to confirm your email.</a></p>';

        sendEmail($email, $username, 'Confirm Email', $body);
    }

    public function resetPasswordEmail($main_url, $email, $user)
    {
        $email = $user->getEmail();
        $username = $user->getUsername();

        $url = $main_url;
        $url.="?email=".$email;

        $key = md5(rand(0, 1000));

        $user->setResetKey($key);
        $user->save();

        $key = $key.strrev($username);
        $url.="&key=".password_hash($key, PASSWORD_DEFAULT);

        $body = '<p>You requested a password change, ' .$username.
        ', if that\'s correct click <a href="'.$url.
        '">here to confirm your email.</a></p> If you didn\'t request
        a password change ignore this email.';

        sendEmail($email, $username, 'Reset Password', $body);
    }

    public function sendEmail($email, $username, $subject, $body)
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
            $mail->setFrom('legends.gaming122@gmail.com', 'DoXForY');
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
}
