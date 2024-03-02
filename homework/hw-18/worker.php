<?php

class worker // Порушення PSR-1: Basic Coding Standard - Class names MUST be declared in StudlyCaps.
{
    private string $name;
    private string $position;

    public function __construct(string $name ,string $position)  // Порушення PSR-12: Extended Coding Style - In the argument list, there MUST NOT be a space before each comma, and there MUST be one space after each comma.
    {
        $this->set_name($name);
        $this->set_position($position);
    }

    /**
     * @param string $name
     */
    public function set_name(string $name): void // Порушення PSR-1: Basic Coding Standard - Method names MUST be declared in camelCase().
    {
        if (strlen($name) < 2) {
            throw new Exception('Invalid name, must be more than 2 symbols' . PHP_EOL);
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function get_name(): string
    {
        return $this->name;
    }

    /**
     * @param string $position
     */
    public function set_position(string $position)
    :void // Порушення PSR-12: Extended Coding Style -
          // When you have a return type declaration present, there MUST be one space after the colon
        // followed by the type declaration. The colon and declaration MUST be on the same line as the argument list
        // closing parenthesis with no spaces between the two characters.
    {
        $this->check_position ($position); // Порушення PSR-12: Extended Coding Style - Method and Function Calls
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function get_position(): string
    {
        return $this->position;
    }

    private function check_position(string $position): void
    {
        $allowedPosition = WorkPositions::values();

        if (!in_array($position, $allowedPosition)) // Порушення PSR-12: Extended Coding Style - wrong if structure
            throw new Exception('Position is invalid! Allowed position: ' . implode(', ', $allowedPosition) . PHP_EOL);
    }
}

$worker = new Worker; // Порушення PSR-12: Extended Coding Style - When instantiating a new class,
                     // parentheses MUST always be present even when there are no arguments passed to the constructor.

?> // Порушення PSR-12: Extended Coding Style - The closing tag ?> MUST be omitted from files containing only PHP.
