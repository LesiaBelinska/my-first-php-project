<?php

class CalculateController
{
    use NumberValidator;
    public function calculate(): bool
    {
        return view('calculateForm.php');
    }

    public function calculateResult(): bool
    {
        $firstNumber = isset($_POST['first-number']) ? intval($_POST['first-number']) : 0;
        $secondNumber = isset($_POST['second-number']) ? intval($_POST['second-number']) : 0;

        if(!$this->validateNumber($firstNumber) || !$this->validateNumber($secondNumber)){
            throw new Exception('Invalid input data');
        }

        $sum = $firstNumber + $secondNumber;
        return view('calculateResult.php', ['sum' => $sum]);
    }

}