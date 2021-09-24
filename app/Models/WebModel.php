<?php

namespace App\Models;

use CodeIgniter\Model;

class WebModel extends Model
{
    protected $table = 'web';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_situs', 'logo', 'slug', 'deskripsi'];

    public function getDataWeb($id = false)
    {
        if ($id == false){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}