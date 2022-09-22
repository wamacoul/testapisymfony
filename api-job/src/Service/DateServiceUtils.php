<?php

namespace App\Service;

class DateServiceUtils{
    public static function getCurrentDate():?\DateTime
    {
                $date= new \DateTime();
                return $date;
    }
}