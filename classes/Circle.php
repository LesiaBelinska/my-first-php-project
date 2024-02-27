<?php

class Circle extends Figure
{
    private int|float $radius;

    public function __construct(int|float $radius)
    {
        if ($radius <= 0) {
            throw new InvalidArgumentException("Radius must be more than 0." . PHP_EOL);
        }

        $this->radius = $radius;
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
        return round(pi() * pow($this->radius, 2), 1);
    }

    public function perimeter(): int|float
    {
        return round(2 * pi() * $this->radius, 1);
    }
}