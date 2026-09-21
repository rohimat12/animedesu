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
        if ($id === false) {
            return $this->findAll();
        }
        $data = $this->where(['id' => $id])->first();
        if (!$data) {
            return [
                'id' => 1,
                'nama_situs' => 'Animedesu',
                'logo' => 'img/logo.png',
                'slug' => 'animedesu',
                'deskripsi' => 'Nonton Anime Subtitle Indonesia'
            ];
        }
        return $data;
    }
}