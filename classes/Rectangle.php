<?php

class Rectangle extends Figure
{
    private int|float $length;
    private int|float $width;

    public function __construct(int|float $length, int|float $width)
    {
        if ($length <= 0 || $width <= 0) {
            throw new InvalidArgumentException("Length and width must be more than 0." . PHP_EOL);
        }

        $this->length = $length;
        $this->width = $width;
    }

    public function getArea(): int|float
    {
        return $this->area();
    }

    public function getPerimeter(): int|float
    {
        return $this->perimeter();
    }

    public function area(): int|float
    {
        return round($this->length * $this->width, 1);
    }

    public function perimeter(): int|float
    {
        return round(2 * ($this->length + $this->width), 1);
    }

}