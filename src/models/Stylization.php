<?php

class Stylization
{
    private $up;
    private $bottom;
    private $footwear;
    private $accessories;
    private $collection;

    public function __construct($up, $bottom, $footwear, $accessories, $collection)
    {
        $this->up = $up;
        $this->bottom = $bottom;
        $this->footwear = $footwear;
        $this->accessories = $accessories;
        $this->collection = $collection;
    }

    public function getUp()
    {
        return $this->up;
    }

    public function setUp($up): void
    {
        $this->up = $up;
    }

    public function getBottom()
    {
        return $this->bottom;
    }

    public function setBottom($bottom): void
    {
        $this->bottom = $bottom;
    }

    public function getFootwear()
    {
        return $this->footwear;
    }

    public function setFootwear($footwear): void
    {
        $this->footwear = $footwear;
    }

    public function getAccessories()
    {
        return $this->accessories;
    }

    public function setAccessories($accessories): void
    {
        $this->accessories = $accessories;
    }

    public function getCollection()
    {
        return $this->collection;
    }

    public function setCollection($collection): void
    {
        $this->collection = $collection;
    }


}