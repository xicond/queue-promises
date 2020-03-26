<?php

namespace Tochka\Promises\Contracts;

use Tochka\Promises\Core\BaseJob;

interface DefaultTransitions
{
    public function getSuccessCondition(): Condition;

    public function getFailedCondition(): Condition;

    public function getTimeoutCondition(): Condition;

    public function getJobRunningCondition(?BaseJob $previousJob): Condition;
}
