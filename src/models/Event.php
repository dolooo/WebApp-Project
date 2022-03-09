<?php
class Event
{
    private $place;
    private $startDate;
    private $endDate;

    public function __construct($place, $date, $timeInDays)
    {
        $this->place = $place;
        $this->startDate = $date;
        $this->endDate = $timeInDays;
    }

    public function getPlace()
    {
        return $this->place;
    }

    public function setPlace($place): void
    {
        $this->place = $place;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setEndDate($endDate): void
    {
        $this->endDate = $endDate;
    }


}