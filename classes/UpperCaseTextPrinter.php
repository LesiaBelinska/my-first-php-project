<?php

class UpperCaseTextPrinter extends TextPrinter
{
    public function print(): string
    {
        return strtoupper($this->text);
    }
}