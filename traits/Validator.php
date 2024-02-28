<?php

trait Validator
{

    public array $data;
    public array $errors = [];

    private function validate(array $data, array $rules)
    {
        $this->data = $data;

        if ($rules === []) {
            return;
        }
        foreach ($rules as $keyData => $ruleString) {
            $ruleArray = $this->parseRule($ruleString);
            foreach ($ruleArray as $rule) {
                if($rule === 'required'){
                    if(!$this->required($keyData)){
                        $this->errors[$keyData] = $this->getErrorMessage('required', $keyData);
                    }
                }
            }
        }
    }

    private function parseRule(string $ruleString): array
    {
        return explode('|', $ruleString);
    }

    private function required(string $fieldName): bool
    {
        $value = $this->data[$fieldName] ?? false;
        if(!$value) {
            return false;
        }
        return true;
    }

    private function errorMessages(): array
    {
        return [
            'required' => "The %s field is required \n"
        ] ;
    }

    private function getErrorMessage(string $key, string $fieldName): string
    {
        $messages = $this->errorMessages();
        if(!isset($messages[$key])) {
            throw new Exception('Invalid error message');
        }
        return sprintf($messages[$key], $fieldName);
    }
}