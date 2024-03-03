<?php

abstract class Figure
{
    abstract public function area(): int|float;

    abstract public function perimeter(): int|float;
}