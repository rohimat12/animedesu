<?php

namespace App\Controllers;

use App\Models\AnimeModel;
use App\Models\EpisodeModel;
use App\Models\HalamanModel;
use App\Models\WebModel;

class Home extends BaseController
{
    protected $animeModel;
    protected $episodeModel;
    protected $halamanModel;
    protected $webModel;

    public function __construct()
    {
        helper(['url']);
        $this->animeModel   = new AnimeModel();
        $this->episodeModel = new EpisodeModel();
        $this->halamanModel = new HalamanModel();
        $this->webModel     = new WebModel();
    }

    public function index()
    {
        $web = $this->webModel->getDataWeb('1');
        $judul = ($web['nama_situs'] ?? 'Animedesu') . ' | ' . ($web['deskripsi'] ?? 'Nonton Anime Subtitle Indonesia');

        $data = [
            'judul'    => $judul,
            'anime'    => $this->animeModel->getAnime(),
            'ongoing'  => $this->animeModel->getAnimeOngoing(),
            'complete' => $this->animeModel->getAnimeComplete(),
            'genres'   => $this->animeModel->getGenresList(),
            'halaman'  => $this->halamanModel->getHalaman()
        ];

        echo view('home/theme/header', $data);
        echo view('home/theme/navbar', $data);
        echo view('home/theme/slider', $data);
        echo view('home/index', $data);
        echo view('home/theme/footer', $data);
    }

    public function anime($slug = false)
    {
        if (empty($slug)) {
            return redirect()->to('/');
        }

        $anime = $this->animeModel->getAnime($slug);
        if (!$anime) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Anime tidak ditemukan: " . esc($slug));
        }

        $web = $this->webModel->getDataWeb('1');
        $judul = ($anime['judul'] ?? 'Anime') . ' | ' . ($web['nama_situs'] ?? 'Animedesu');

        $data = [
            'judul'    => $judul,
            'anime'    => $anime,
            'episode'  => $this->episodeModel->getAnimeID($anime['id']),
            'complete' => $this->animeModel->getAnimeComplete(),
            'halaman'  => $this->halamanModel->getHalaman()
        ];

        echo view('home/theme/header', $data);
        echo view('home/theme/navbar', $data);
        echo view('home/anime', $data);
        echo view('home/theme/footer', $data);
    }

    public function episode($slug = null, $eps = null)
    {
        if (empty($slug)) {
            return redirect()->to('/');
        }

        $anime = $this->animeModel->getAnime($slug);
        $currentEpisode = null;
        $episodes = [];

        if ($anime) {
            $episodes = $this->episodeModel->getAnimeID($anime['id']);
            if ($eps !== null) {
                foreach ($episodes as $item) {
                    if ($item['episode_ke'] == $eps) {
                        $currentEpisode = $item;
                        break;
                    }
                }
                if (!$currentEpisode) {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Episode " . esc($eps) . " tidak ditemukan untuk anime " . esc($anime['judul']));
                }
            } elseif (!empty($episodes)) {
                $currentEpisode = $episodes[0];
            }
        } else {
            // Coba periksa jika $slug adalah slug episode langsung
            $currentEpisode = $this->episodeModel->getEpisode($slug);
            if ($currentEpisode) {
                $anime = $this->animeModel->find($currentEpisode['id_anime']);
                $episodes = $this->episodeModel->getAnimeID($currentEpisode['id_anime']);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Episode tidak ditemukan: " . esc($slug));
            }
        }

        $web = $this->webModel->getDataWeb('1');
        $epsNum = $currentEpisode['episode_ke'] ?? '1';
        $judul = ($anime['judul'] ?? 'Anime') . ' Episode ' . $epsNum . ' | ' . ($web['nama_situs'] ?? 'Animedesu');

        $data = [
            'judul'           => $judul,
            'anime'           => $anime,
            'episode'         => $episodes,
            'current_episode' => $currentEpisode,
            'halaman'         => $this->halamanModel->getHalaman()
        ];

        echo view('home/theme/header', $data);
        echo view('home/theme/navbar', $data);
        echo view('home/episode', $data);
        echo view('home/theme/footer', $data);
    }

    public function page($slug = null)
    {
        if (empty($slug)) {
            return redirect()->to('/');
        }

        $halaman = $this->halamanModel->getHalaman($slug);
        if (!$halaman) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Halaman tidak ditemukan: " . esc($slug));
        }

        $web = $this->webModel->getDataWeb('1');
        $judul = ($halaman['judul'] ?? 'Halaman') . ' | ' . ($web['nama_situs'] ?? 'Animedesu');

        $data = [
            'judul'   => $judul,
            'halaman' => $halaman
        ];

        echo view('home/theme/header', $data);
        echo view('home/theme/navbar', $data);
        echo view('home/page', $data);
        echo view('home/theme/footer', $data);
    }

    /**
     * Halaman Katalog & Filter Genre
     */
    public function categories($genreParam = null)
    {
        $genre = $genreParam ?? $this->request->getGet('genre');
        $status = $this->request->getGet('status');
        $sort = $this->request->getGet('sort') ?? 'latest';

        $animeList = $this->animeModel->getFilteredAnime($genre, $status, $sort);
        $genresList = $this->animeModel->getGenresList();

        $web = $this->webModel->getDataWeb('1');
        $genreTitle = !empty($genre) ? 'Genre ' . ucfirst($genre) : 'Daftar Semua Anime';
        $judul = $genreTitle . ' | ' . ($web['nama_situs'] ?? 'Animedesu');

        $data = [
            'judul'          => $judul,
            'anime'          => $animeList,
            'genres'         => $genresList,
            'current_genre'  => $genre,
            'current_status' => $status,
            'current_sort'   => $sort,
            'total_found'    => count($animeList),
            'halaman'        => $this->halamanModel->getHalaman()
        ];

        echo view('home/theme/header', $data);
        echo view('home/theme/navbar', $data);
        echo view('home/catalog', $data);
        echo view('home/theme/footer', $data);
    }

    /**
     * Halaman Pencarian Lengkap
     */
    public function search()
    {
        $q = trim($this->request->getVar('q') ?? '');
        $animeList = !empty($q) ? $this->animeModel->getFilteredAnime(null, null, 'latest', $q) : [];

        $web = $this->webModel->getDataWeb('1');
        $judul = 'Hasil Pencarian: ' . esc($q) . ' | ' . ($web['nama_situs'] ?? 'Animedesu');

        $data = [
            'judul'       => $judul,
            'query'       => $q,
            'anime'       => $animeList,
            'genres'      => $this->animeModel->getGenresList(),
            'total_found' => count($animeList),
            'halaman'     => $this->halamanModel->getHalaman()
        ];

        echo view('home/theme/header', $data);
        echo view('home/theme/navbar', $data);
        echo view('home/search', $data);
        echo view('home/theme/footer', $data);
    }

    /**
     * API JSON Live Search untuk autocomplete di navbar
     */
    public function liveSearch()
    {
        $q = trim($this->request->getVar('q') ?? '');
        if (strlen($q) < 2) {
            return $this->response->setJSON([]);
        }

        $results = $this->animeModel->searchAnime($q, 6);
        $formatted = [];

        foreach ($results as $item) {
            $formatted[] = [
                'id'            => $item['id'],
                'judul'         => $item['judul'],
                'slug'          => $item['slug'],
                'img'           => $item['img'],
                'skor'          => $item['skor'] ?? '-',
                'status'        => $item['status'] ?? 'Ongoing',
                'tipe'          => $item['tipe'] ?? 'TV',
                'genre'         => $item['genre'] ?? '',
                'url'           => '/anime/' . $item['slug']
            ];
        }

        return $this->response->setJSON($formatted);
    }
}
