<?php

namespace App\Models;

use CodeIgniter\Model;

class AnimeModel extends Model
{
    protected $table = 'anime';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'img', 'slug', 'japan', 'skor', 'produser', 'tipe', 'status', 'total_episode', 'durasi', 'studio', 'genre', 'sinopsis', 'musim', 'rilis'];

    public function getAnime($slug = false)
    {
        if ($slug == false){
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function getAnimeOngoing()
    {
        return $this->where('status', 'ongoing')->findAll();
    }

    public function getAnimeComplete()
    {
        return $this->where('status', 'completed')->findAll();
    }
}