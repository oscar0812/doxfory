<?php

use Base\User as BaseUser;

/**
 * Skeleton subclass for representing a row from the 'user' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class User extends BaseUser
{
    public function getContactInfo()
    {
        return $this->getUserContactInfo();
    }
    
    public function setPassword($password)
    {
        // hash password
        $hash = PHPassLib\Hash\BCrypt::hash($password);
        // store the Hash
        parent::setPassword($hash);
    }
    public function login($password)
    {
        return PHPassLib\Hash\BCrypt::verify($password, $this->getPassword());
    }

    public function getFullName()
    {
        return $this->getFirstName()." ".$this->getLastName();
    }

    public function isConfirmed()
    {
        $key = $this->getConfirmationKey();
        return $key == null || $key == "";
    }

    public function getProfilePicture()
    {
        $pfp = parent::getProfilePicture();
        if ($pfp == null || $pfp == "") {
            $pfp = '../img/blank_pfp.png';
        }
        return $pfp;
    }
}
