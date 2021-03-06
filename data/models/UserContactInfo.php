<?php

use Base\UserContactInfo as BaseUserContactInfo;

/**
 * Skeleton subclass for representing a row from the 'user_contact_info' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class UserContactInfo extends BaseUserContactInfo
{
    public function hasPhoneNumber()
    {
        $x = $this->getPhoneNumber();
        return $x != null && $x != "";
    }

    public function hasFacebook()
    {
        $x = $this->getFacebook();
        return $x != null && $x != "";
    }

    public function hasTwitter()
    {
        $x = $this->getTwitter();
        return $x != null && $x != "";
    }

    public function hasInstagram()
    {
        $x = $this->getInstagram();
        return $x != null && $x != "";
    }
}
