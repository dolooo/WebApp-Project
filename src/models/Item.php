<?php

class Item
{
    private $category;
    private $file;
    private $brand;
    private $size;
    private $color;
    private $description;
    private $type;

    public function __construct($category, $file ,$brand, $size, $color, $description)
    {
        $this->category = $category;
        $this->file = $file;
        $this->brand = $brand;
        $this->size = $size;
        $this->color = $color;
        $this->description = $description;
        $this->type = $this->setType();
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType()
    {
        if (!(strcmp($this->category, 'Swetry i kardigany')) ||
            !(strcmp($this->category, 'Kurtki i płaszcze')) ||
            !(strcmp($this->category, 'Koszule')) ||
            !(strcmp($this->category, 'Bluzy')) ||
                !(strcmp($this->category, 'Koszulki')) ||
            !(strcmp($this->category, 'Marynarki i garnitury')) ||
            !(strcmp($this->category, 'Inne'))) {
            return "gora";
        } else if (!(strcmp($this->category, 'Spodnie')) ||
            !(strcmp($this->category, 'Dżinsy')) ||
            !(strcmp($this->category, 'Szorty'))) {
            return "dol";
        } else if (!(strcmp($this->category, 'Obuwie'))) {
            return "obuwie";
        } else return "akcesoria";
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }


    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}