<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form']);

        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }

        return view('auth/login');
    }

    public function attemptLogin()
    {
        helper(['form']);

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();

        $user = $userModel
            ->where('username', $username)
            ->first();

        if ($user && password_verify($password, $user['password'])) {

            session()->set([
                'user_id'   => $user['id'],
                'username'  => $user['username'],
                'full_name' => $user['full_name'],
                'logged_in' => true
            ]);

            return redirect()->to('/');
        }

        return redirect()->back()
            ->withInput()
            ->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}