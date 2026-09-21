<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'email', 'password', 'role'];

    /**
     * Cari user berdasarkan username atau email
     *
     * @param string $usernameOrEmail
     * @return array|null
     */
    public function getUserByLogin($usernameOrEmail)
    {
        return $this->where('username', $usernameOrEmail)
                    ->orWhere('email', $usernameOrEmail)
                    ->first();
    }
}
