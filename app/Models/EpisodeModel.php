<?php

namespace App\Models;

use CodeIgniter\Model;

class EpisodeModel extends Model
{
    protected $table = 'episode';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_anime', 'judul', 'slug', 'episode_ke', 'use_player', 'embed_player', 'judul_player', 'use_download', 'link_download', 'judul_download', 'kualitas'];

    public function getEpisode($slug = false)
    {
        if ($slug == false){
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function getAnimeID($id = false)
    {
        if ($id == false){
            return $this->findAll();
        }
        return $this->where('id_anime', $id)->findAll();
    }

    public function getAllEpisode($eps = false)
    {
        if ($eps == false){
            return $this->findAll();
        }
        return $this->where('episode_ke', $eps)->findAll();
    }
}