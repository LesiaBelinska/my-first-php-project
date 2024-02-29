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

                $ruleParts = explode(':', $rule);
                $ruleName = $ruleParts[0];
                $ruleValue = isset($ruleParts[1]) ? (int)$ruleParts[1] : null;

                match ($ruleName) {
                    'required' => !$this->required($keyData) && $this->errors[$keyData] = $this->getErrorMessage('required', $keyData),
                    'max' => !$this->maxLength($keyData, $ruleValue) && $this->errors[$keyData] = $this->getErrorMessage('max', $keyData, $ruleValue),
                    'min' => !$this->minLength($keyData, $ruleValue) && $this->errors[$keyData] = $this->getErrorMessage('min', $keyData, $ruleValue),
                    'email' => !$this->isValidEmail($keyData) && $this->errors[$keyData] = $this->getErrorMessage('email', $keyData),
                    default => throw new Exception("Unsupported validation rule: $ruleName"),
                };
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

    private function maxLength(string $fieldName, int $length): bool
    {
        $value = $this->data[$fieldName] ?? '';
        return strlen($value) <= $length;
    }

    private function minLength(string $fieldName, int $length): bool
    {
        $value = $this->data[$fieldName] ?? '';
        return strlen($value) >= $length;
    }

    private function isValidEmail(string $fieldName): bool
    {
        $value = $this->data[$fieldName] ?? '';
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function errorMessages(): array
    {
        return [
            'required' => "The %s field is required",
            'max' => "The %s field must not be greater than %d characters",
            'min' => "The %s field must be at least %d characters long",
            'email' => "The %s field must be a valid email address"
        ] ;
    }

    private function getErrorMessage(string $key, string $fieldName): string
    {
        $messages = $this->errorMessages();
        if(!isset($messages[$key])) {
            throw new Exception('Invalid error message');
        }
        return sprintf($messages[$key], $fieldName, $length ?? '');
    }
}


//trait Validator
//{
//
//    public array $data;
//    public array $errors = [];
//
//    private function validate(array $data, array $rules)
//    {
//        $this->data = $data;
//
//        if ($rules === []) {
//            return;
//        }
//
//        foreach ($rules as $keyData => $ruleString) {
//            $ruleArray = $this->parseRule($ruleString);
//
//            foreach ($ruleArray as $rule) {
//                if ($rule === 'required') {
//                    if (!$this->required($keyData)) {
//                        $this->errors[$keyData] = $this->getErrorMessage('required', $keyData);
//                    }
//                }
//            }
//        }
//    }
//
//    private function parseRule(string $ruleString): array
//    {
//        return explode('|', $ruleString);
//    }
//
//    private function required(string $fieldName): bool
//    {
//        $value = $this->data[$fieldName] ?? false;
//        if (!$value) {
//            return false;
//        }
//        return true;
//    }
//
//    private function errorMessages(): array
//    {
//        return [
//            'required' => "The %s field is required \n"
//        ];
//    }
//
//    private function getErrorMessage(string $key, string $fieldName): string
//    {
//        $messages = $this->errorMessages();
//        if (!isset($messages[$key])) {
//            throw new Exception('Invalid error message');
//        }
//        return sprintf($messages[$key], $fieldName);
//    }
//}