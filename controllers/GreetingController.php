<?php

class GreetingController
{
    public function greeting(): bool
    {
        return view('greeting.php');
    }
}