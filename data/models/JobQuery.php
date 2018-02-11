<?php

use Base\JobQuery as BaseJobQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'job' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class JobQuery extends BaseJobQuery
{
    public function completed()
    {
        return $this->filterByIsCompleted('yes');
    }
}
