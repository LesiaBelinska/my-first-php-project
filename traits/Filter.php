<?php

trait Filter
{
    private function removeTags(string $string): string
    {
        return strip_tags($string);
    }

    private function removeSymbol(string $string, string $symbol): string
    {
      return str_replace($symbol, '', $string);
    }
}