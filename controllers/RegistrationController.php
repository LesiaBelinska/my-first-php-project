<?php

class RegistrationController
{
    use Validator;

    public function register(array $data): void
    {
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ];

        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|email|max:250',
            'password' => 'required|max:250|min:8',
        ];

        $this->validate($data, $rules);

        if ($this->errors) {
            throw new Exception(implode('-', $this->errors));
        }
    }
}