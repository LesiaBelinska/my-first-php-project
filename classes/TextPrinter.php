<?php

class TextPrinter
{
    protected string $text;

    public function __construct(string $text = "some text")
    {
        if (empty($text)) {
            throw new InvalidArgumentException('Text cannot be empty');
        }
        $this->text = $text;
    }

    public function print(): string
    {
        return ucfirst($this->text);
    }

}