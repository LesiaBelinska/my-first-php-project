<?php

class OldAuthController
{
    use Validator;

    public function login(array $data): void
    {
        $email = $data['email'];
        $password = $data['password'];

        $data = [
            'email' => $email,
            'password' => $password,
        ];

        $rules = [
            'email' => 'required|email|max:150',
            'password' => 'required|max:250|min:8',
        ];

        $this->validate($data, $rules);

        if ($this->errors) {
            throw new Exception(implode('-', $this->errors));
        }
    }
}