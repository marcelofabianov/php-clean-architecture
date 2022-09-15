<?php

namespace App\Module\User\Observer;

use App\Core\Base\Observer\Observer;
use App\Core\Exception\ActivitiesLogException;
use App\Core\Interfaces\Database\IDataStruct;
use App\Core\Interfaces\Observer\IObserver;
use App\Core\Log\ActivitiesLogData;
use ErrorException;
use stdClass;

class UserObserver extends Observer implements IObserver
{
    /**
     * @return void
     */
    public function creating(): void
    {
        //
    }

    /**
     * @return void
     */
    public function updating(): void
    {
        //
    }

    /**
     * @return void
     */
    public function deleting(): void
    {
        //
    }

    /**
     * @param IDataStruct $after
     * @return void
     * @throws ActivitiesLogException
     */
    public function created(IDataStruct $after): void
    {
        try {
            $data = new ActivitiesLogData($this->targetSubject, $after);
        } catch (ErrorException $error) {
            throw new ActivitiesLogException('Created user');
        }
    }

    /**
     * @param IDataStruct $before
     * @param stdClass $after
     * @return void
     * @throws ActivitiesLogException
     */
    public function updated(IDataStruct $before, stdClass $after): void
    {
        try {
            $data = new ActivitiesLogData($this->targetSubject, $after, $before);
        } catch (ErrorException $error) {
            throw new ActivitiesLogException('Updated user');
        }
    }

    /**
     * @param stdClass $before
     * @return void
     * @throws ActivitiesLogException
     */
    public function deleted(stdClass $before): void
    {
        try {
            $data = new ActivitiesLogData($this->targetSubject, null, $before);
        } catch (ErrorException $error) {
            throw new ActivitiesLogException('Updated user');
        }
    }
}