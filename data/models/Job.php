<?php

use Base\Job as BaseJob;

/**
 * Skeleton subclass for representing a row from the 'job' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Job extends BaseJob
{
    public function getPaymentString()
    {
        // returns either the amount or barter item
        $str = "";
        $p = $this->getPayment();
        if ($p->isBarter()) {
            $str = $p->getBarterItem();
        } else {
            $str = "$".$p->getMoneyAmount();
        }
        return $str;
    }
    public function getPayment()
    {
        return $this->getJobPayment();
    }

    public function getDatePosted()
    {
        return (new DateTime())->setTimestamp($this->getTimePosted());
    }
}
