<?php

class AuthController
{
    use Validator;

    public function login()
    {
        return view('login.php');
    }

    public function auth()
    {
        echo "auth process";
    }

    public function register()
    {
        return view('register.php');
    }

    public function registerProccess()
    {
    $this->validate([], [
            'name' => 'required|max:100',
            'age' => 'int',
            'gender' => 'enum:male,female',
            'password' => 'required|min:8|max:100',
            'email' => 'required|min:8|max:200|email'
        ]);
    }
}
