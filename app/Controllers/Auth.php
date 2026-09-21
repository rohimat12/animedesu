<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->userModel = new UserModel();
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $data = [
            'judul' => 'Login Admin | Animedesu'
        ];

        return view('auth/login', $data);
    }

    public function loginProcess()
    {
        $username = trim($this->request->getVar('username') ?? '');
        $password = trim($this->request->getVar('password') ?? '');

        if (empty($username) || empty($password)) {
            session()->setFlashdata('error', 'Username dan Password wajib diisi.');
            return redirect()->to('/login')->withInput();
        }

        $user = $this->userModel->getUserByLogin($username);

        if (!$user) {
            session()->setFlashdata('error', 'Akun tidak ditemukan. Periksa kembali username Anda.');
            return redirect()->to('/login')->withInput();
        }

        if (!password_verify($password, $user['password'])) {
            session()->setFlashdata('error', 'Password yang Anda masukkan salah.');
            return redirect()->to('/login')->withInput();
        }

        // Simpan data session
        session()->set([
            'isLoggedIn' => true,
            'id'         => $user['id'],
            'user_id'    => $user['id'],
            'username'   => $user['username'],
            'name'       => $user['username'],
            'email'      => $user['email'] ?? '',
            'role'       => $user['role'] ?? 'admin',
        ]);

        session()->setFlashdata('success', 'Selamat datang kembali, ' . esc($user['username']) . '!');
        return redirect()->to('/admin');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
