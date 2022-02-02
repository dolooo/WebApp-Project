<?php

class Suitcase
{
    private $items;
    private $event;
    private $stylizations;

    public function __construct($items, $event, $stylizations)
    {
        $this->items = $items;
        $this->event = $event;
        $this->stylizations = $stylizations;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items): void
    {
        $this->items = $items;
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function setEvent($event): void
    {
        $this->event = $event;
    }

    public function getStylizations()
    {
        return $this->stylizations;
    }

    public function setStylizations($stylizations): void
    {
        $this->stylizations = $stylizations;
    }
}