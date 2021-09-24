<?php

namespace App\Models;

use CodeIgniter\Model;

class HalamanModel extends Model
{
    protected $table = 'halaman';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'post'];

    public function getHalaman($slug = false)
    {
        if ($slug == false){
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}