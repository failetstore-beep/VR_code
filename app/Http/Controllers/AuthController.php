<?php
namespace App\Http\Controllers;

class AuthController
{
    public function showLogin()
    {
        return 'Login Form';
    }

    public function login()
    {
        return 'Process Login';
    }

    public function showSignup()
    {
        return 'Signup Form';
    }

    public function signup()
    {
        return 'Process Signup';
    }

    public function logout()
    {
        return 'Logout';
    }
}
