<?php

class AuthController
{
    use Validator;

    public function login()
    {
        $email = "test@test.com";
        $password = '12345';
        $data = [
            'email' => $email,
            'password' => $password,
        ];

        $rules = [
            'email' => 'required|email|max:250',
            'password' => 'required|max:250|min:8',
        ];
            $this->validate($data, $rules);

            if($this->errors){
                throw new Exception(implode('-', $this->errors));
            }
            echo "success";
    }
}