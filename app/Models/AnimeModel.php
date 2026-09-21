<?php

namespace App\Models;

use CodeIgniter\Model;

class AnimeModel extends Model
{
    protected $table = 'anime';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'judul', 'img', 'slug', 'japan', 'skor', 'produser', 
        'tipe', 'status', 'total_episode', 'durasi', 'studio', 
        'genre', 'sinopsis', 'musim', 'rilis'
    ];

    public function getAnime($slug = false)
    {
        if ($slug === false) {
            return $this->orderBy('id', 'DESC')->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function getAnimeOngoing()
    {
        return $this->groupStart()
                    ->where('status', 'ongoing')
                    ->orWhere('status', 'Ongoing')
                    ->groupEnd()
                    ->orderBy('id', 'DESC')
                    ->findAll();
    }

    public function getAnimeComplete()
    {
        return $this->groupStart()
                    ->where('status', 'completed')
                    ->orWhere('status', 'Completed')
                    ->groupEnd()
                    ->orderBy('id', 'DESC')
                    ->findAll();
    }

    /**
     * Live search untuk API autocompletion
     *
     * @param string $query
     * @param int $limit
     * @return array
     */
    public function searchAnime($query, $limit = 8)
    {
        if (empty($query)) {
            return [];
        }

        return $this->groupStart()
                    ->like('judul', $query)
                    ->orLike('japan', $query)
                    ->orLike('genre', $query)
                    ->groupEnd()
                    ->orderBy('skor', 'DESC')
                    ->findAll($limit);
    }

    /**
     * Mengambil daftar genre unik dari semua anime di database
     *
     * @return array
     */
    public function getGenresList()
    {
        $all = $this->select('genre')->findAll();
        $genres = [];

        foreach ($all as $item) {
            if (!empty($item['genre'])) {
                $parts = explode(',', $item['genre']);
                foreach ($parts as $p) {
                    $trimmed = trim($p);
                    if (!empty($trimmed) && !in_array($trimmed, $genres)) {
                        $genres[] = $trimmed;
                    }
                }
            }
        }

        sort($genres);
        return $genres;
    }

    /**
     * Filter anime berdasarkan genre, status, dan sorting
     *
     * @param string|null $genre
     * @param string|null $status
     * @param string $sortBy
     * @param string|null $search
     * @return array
     */
    public function getFilteredAnime($genre = null, $status = null, $sortBy = 'latest', $search = null)
    {
        $builder = $this;

        if (!empty($search)) {
            $builder = $builder->groupStart()
                               ->like('judul', $search)
                               ->orLike('japan', $search)
                               ->groupEnd();
        }

        if (!empty($genre) && $genre !== 'all') {
            $builder = $builder->like('genre', $genre);
        }

        if (!empty($status) && $status !== 'all') {
            $builder = $builder->like('status', trim($status));
        }

        if ($sortBy === 'score') {
            $builder = $builder->orderBy('skor', 'DESC');
        } elseif ($sortBy === 'title') {
            $builder = $builder->orderBy('judul', 'ASC');
        } else {
            $builder = $builder->orderBy('id', 'DESC');
        }

        return $builder->findAll();
    }
}