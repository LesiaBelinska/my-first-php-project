<?php

class Worker
{
    private string $name;
    private string $position;

    public function __construct(string $name, string $position)   //magic method ;)
    {
        $this->setName($name);
        $this->setPosition($position);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        if (strlen($name) < 2) {
            throw new Exception('Invalid name, must be more than 2 symbols');
        }
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @param string $position
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }
}