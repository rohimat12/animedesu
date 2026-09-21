<?php

namespace App\Controllers;

use App\Models\AnimeModel;
use App\Models\EpisodeModel;
use App\Models\HalamanModel;
use App\Models\AdminModel;
use App\Models\WebModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $animeModel;
    protected $episodeModel;
    protected $halamanModel;
    protected $adminModel;
    protected $webModel;
    protected $userModel;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->animeModel = new AnimeModel();
        $this->episodeModel = new EpisodeModel();
        $this->halamanModel = new HalamanModel();
        $this->adminModel = new AdminModel();
        $this->webModel = new WebModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Dashboard | Admin Panel',
            'anime'     => $this->animeModel->getAnime(),
            'episode'   => $this->episodeModel->getEpisode(),
            'halaman'   => $this->halamanModel->getHalaman()
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('admin/index', $data);
        echo view('template/footer_head');
        echo view('template/footer_table');
        echo view('template/footer_end');
    }

    public function anime()
    {
        $data = [
            'judul'     => 'Data Semua Anime | Admin Panel',
            'anime'     => $this->animeModel->getAnime()
        ];
        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('template/footer_ck');
        echo view('admin/anime', $data);
        echo view('template/footer_head');
        echo view('template/footer_table');
        echo view('template/footer_end');
    }

    public function new_anime()
    {
        $anime_id = $this->request->getVar('anime_id');
        $jikan = $this->adminModel->getJikan($anime_id);

        $data = [
            'judul' => 'Tambah Anime | Admin Panel',
            'jikan' => $jikan,
            'rilis' => $jikan->rilis ?? ''
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('template/footer_ck');
        echo view('admin/new_anime', $data);
        echo view('template/footer_head');
        echo view('template/footer_end');
    }

    public function new_anime2($anime_id = null)
    {
        if (empty($anime_id)) {
            $anime_id = $this->request->getVar('anime_id');
        }

        $jikan = $this->adminModel->getJikan($anime_id);

        $data = [
            'judul' => 'Tambah Anime | Admin Panel',
            'jikan' => $jikan,
            'rilis' => $jikan->rilis ?? ''
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('template/footer_ck');
        echo view('admin/new_anime2', $data);
        echo view('template/footer_head');
        echo view('template/footer_end');
    }

    public function save_anime()
    {
        $judul = $this->request->getVar('judul');
        $slug = url_title($judul, '-', true);
        if (empty($slug)) {
            $slug = 'anime-' . time();
        }

        $img = $this->request->getVar('img');
        $foldersave = $img; // default ke URL asli jika unduh gagal

        if (!empty($img) && filter_var($img, FILTER_VALIDATE_URL)) {
            $targetDir = defined('FCPATH') ? FCPATH . 'assets/img_anime/' : './public/assets/img_anime/';
            if (!is_dir($targetDir)) {
                @mkdir($targetDir, 0777, true);
            }
            if (!is_dir('./assets/img_anime/')) {
                @mkdir('./assets/img_anime/', 0777, true);
            }

            $ext = strtolower(pathinfo(parse_url($img, PHP_URL_PATH), PATHINFO_EXTENSION));
            if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                $ext = 'jpg';
            }

            $filename = $slug . '.' . $ext;
            $filePath = $targetDir . $filename;

            $opts = [
                'http' => [
                    'method' => 'GET',
                    'header' => "User-Agent: Mozilla/5.0\r\n",
                    'timeout' => 10
                ]
            ];
            $imgContent = @file_get_contents($img, false, stream_context_create($opts));
            if ($imgContent !== false && strlen($imgContent) > 0) {
                @file_put_contents($filePath, $imgContent);
                $foldersave = '/assets/img_anime/' . $filename;
            }
        }

        $this->animeModel->save([
            'judul'         => $judul,
            'img'           => $foldersave,
            'slug'          => $slug,
            'japan'         => $this->request->getVar('japan'),
            'skor'          => $this->request->getVar('skor'),
            'produser'      => $this->request->getVar('produser'),
            'tipe'          => $this->request->getVar('tipe'),
            'status'        => $this->request->getVar('status'),
            'total_episode' => $this->request->getVar('total_episode'),
            'durasi'        => $this->request->getVar('durasi'),
            'studio'        => $this->request->getVar('studio'),
            'genre'         => $this->request->getVar('genre'),
            'sinopsis'      => $this->request->getVar('sinopsis'),
            'musim'         => $this->request->getVar('musim'),
            'rilis'         => $this->request->getVar('rilis')
        ]);

        session()->setFlashdata('save_anime', 'Anime berhasil ditambahkan');
        return redirect()->to('/admin/anime');
    }

    public function update_anime($id)
    {
        $judul = $this->request->getVar('judul');
        $slug = $this->request->getVar('slug');
        if (empty($slug)) {
            $slug = url_title($judul, '-', true);
        }

        $this->animeModel->save([
            'id'            => $id,
            'judul'         => $judul,
            'img'           => $this->request->getVar('img'),
            'slug'          => $slug,
            'japan'         => $this->request->getVar('japan'),
            'skor'          => $this->request->getVar('skor'),
            'produser'      => $this->request->getVar('produser'),
            'tipe'          => $this->request->getVar('tipe'),
            'status'        => $this->request->getVar('status'),
            'total_episode' => $this->request->getVar('total_episode'),
            'durasi'        => $this->request->getVar('durasi'),
            'studio'        => $this->request->getVar('studio'),
            'genre'         => $this->request->getVar('genre'),
            'sinopsis'      => $this->request->getVar('sinopsis'),
            'musim'         => $this->request->getVar('musim'),
            'rilis'         => $this->request->getVar('rilis')
        ]);

        session()->setFlashdata('update_anime', 'Anime berhasil diupdate');
        return redirect()->to('/admin/anime');
    }

    public function delete_anime($id)
    {
        $this->animeModel->delete($id);
        // Hapus juga episode terkait
        $this->episodeModel->where('id_anime', $id)->delete();

        session()->setFlashdata('update_anime', 'Anime berhasil dihapus');
        return redirect()->to('/admin/anime');
    }

    public function episode()
    {
        $data = [
            'judul'   => 'Semua Episode | Admin Panel',
            'episode' => $this->episodeModel->getEpisode()
        ];
        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('template/footer_ck');
        echo view('admin/episode', $data);
        echo view('template/footer_head');
        echo view('template/footer_table');
        echo view('template/footer_end');
    }

    public function new_episode()
    {
        $data = [
            'judul' => 'Tambah Episode Baru | Admin Panel',
            'anime' => $this->animeModel->getAnime()
        ];
        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('admin/new_episode', $data);
        echo view('template/footer_head');
        echo view('template/footer_end');
    }

    public function save_episode()
    {
        $judul = $this->request->getVar('judul');
        $slug = url_title($judul, '-', true);
        if (empty($slug)) {
            $slug = 'eps-' . time();
        }

        $use_player   = ($this->request->getVar('use_player') == 'on' || $this->request->getVar('use_player') == '1') ? 1 : 0;
        $use_download = ($this->request->getVar('use_download') == 'on' || $this->request->getVar('use_download') == '1') ? 1 : 0;

        $this->episodeModel->save([
            'id_anime'       => $this->request->getVar('id_anime'),
            'judul'          => $judul,
            'slug'           => $slug,
            'episode_ke'     => $this->request->getVar('episode_ke'),
            'use_player'     => $use_player,
            'embed_player'   => $this->request->getVar('embed_player'),
            'judul_player'   => $this->request->getVar('judul_player'),
            'use_download'   => $use_download,
            'link_download'  => $this->request->getVar('link_download'),
            'judul_download' => $this->request->getVar('judul_download'),
            'kualitas'       => $this->request->getVar('kualitas')
        ]);

        session()->setFlashdata('save_episode', 'Episode berhasil disimpan');
        return redirect()->to('/admin/episode');
    }

    public function update_episode($id)
    {
        $use_player   = ($this->request->getVar('use_player') == 'on' || $this->request->getVar('use_player') == '1') ? 1 : 0;
        $use_download = ($this->request->getVar('use_download') == 'on' || $this->request->getVar('use_download') == '1') ? 1 : 0;

        $judul = $this->request->getVar('judul');
        $slug = $this->request->getVar('slug');
        if (empty($slug)) {
            $slug = url_title($judul, '-', true);
        }

        $this->episodeModel->save([
            'id'             => $id,
            'id_anime'       => $this->request->getVar('id_anime'),
            'judul'          => $judul,
            'slug'           => $slug,
            'episode_ke'     => $this->request->getVar('episode_ke'),
            'use_player'     => $use_player,
            'embed_player'   => $this->request->getVar('embed_player'),
            'judul_player'   => $this->request->getVar('judul_player'),
            'use_download'   => $use_download,
            'link_download'  => $this->request->getVar('link_download'),
            'judul_download' => $this->request->getVar('judul_download'),
            'kualitas'       => $this->request->getVar('kualitas')
        ]);

        session()->setFlashdata('update_episode', 'Episode berhasil diupdate');
        return redirect()->to('/admin/episode');
    }

    public function delete_episode($id)
    {
        $this->episodeModel->delete($id);

        session()->setFlashdata('update_episode', 'Episode berhasil dihapus');
        return redirect()->to('/admin/episode');
    }

    public function page()
    {
        $data = [
            'judul' => 'Semua Halaman | Admin Panel',
            'page'  => $this->halamanModel->getHalaman()
        ];
        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('template/footer_ck');
        echo view('admin/page', $data);
        echo view('template/footer_head');
        echo view('template/footer_table');
        echo view('template/footer_end');
    }

    public function new_page()
    {
        $data = [
            'judul' => 'Tambah Halaman | Admin Panel'
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('template/footer_ck');
        echo view('admin/new_page', $data);
        echo view('template/footer_head');
        echo view('template/footer_end');
    }

    public function save_page()
    {
        $judul = $this->request->getVar('judul');
        $slug = url_title($judul, '-', true);

        $this->halamanModel->save([
            'judul' => $judul,
            'slug'  => $slug,
            'post'  => $this->request->getVar('post'),
        ]);

        session()->setFlashdata('save_page', 'Halaman berhasil disimpan');
        return redirect()->to('/admin/page');
    }

    public function update_page($id)
    {
        $judul = $this->request->getVar('judul');
        $slug = $this->request->getVar('slug');
        if (empty($slug)) {
            $slug = url_title($judul, '-', true);
        }

        $this->halamanModel->save([
            'id'    => $id,
            'judul' => $judul,
            'slug'  => $slug,
            'post'  => $this->request->getVar('post')
        ]);

        session()->setFlashdata('update_page', 'Halaman berhasil diupdate');
        return redirect()->to('/admin/page');
    }

    public function delete_page($id)
    {
        $this->halamanModel->delete($id);

        session()->setFlashdata('update_page', 'Halaman berhasil dihapus');
        return redirect()->to('/admin/page');
    }

    public function statistik()
    {
        $allAnime = $this->animeModel->getAnime();
        $totalAnime = count($allAnime);
        $totalEpisode = count($this->episodeModel->getEpisode());
        $totalHalaman = count($this->halamanModel->getHalaman());

        $ongoingCount = 0;
        $completedCount = 0;
        $genreCounts = [];

        foreach ($allAnime as $a) {
            $status = strtolower($a['status'] ?? '');
            if ($status === 'completed') {
                $completedCount++;
            } else {
                $ongoingCount++;
            }

            if (!empty($a['genre'])) {
                $genres = explode(',', $a['genre']);
                foreach ($genres as $g) {
                    $g = trim($g);
                    if (!empty($g)) {
                        $genreCounts[$g] = ($genreCounts[$g] ?? 0) + 1;
                    }
                }
            }
        }
        arsort($genreCounts);

        // Top 5 anime by score
        $topAnime = $allAnime;
        usort($topAnime, function($a, $b) {
            return (float)($b['skor'] ?? 0) <=> (float)($a['skor'] ?? 0);
        });
        $topAnime = array_slice($topAnime, 0, 5);

        // Server and system environment stats
        $db = \Config\Database::connect();
        $serverInfo = [
            'php_version'   => phpversion(),
            'ci_version'    => \CodeIgniter\CodeIgniter::CI_VERSION,
            'os'            => PHP_OS . ' (' . php_uname('m') . ')',
            'mysql'         => $db->getVersion(),
            'memory_limit'  => ini_get('memory_limit'),
            'upload_max'    => ini_get('upload_max_filesize'),
            'post_max'      => ini_get('post_max_size'),
            'max_execution' => ini_get('max_execution_time') . 's'
        ];

        $data = [
            'judul'          => 'Statistik & Analitik | Admin Panel',
            'totalAnime'     => $totalAnime,
            'totalEpisode'   => $totalEpisode,
            'totalHalaman'   => $totalHalaman,
            'ongoingCount'   => $ongoingCount,
            'completedCount' => $completedCount,
            'genreCounts'    => $genreCounts,
            'topAnime'       => $topAnime,
            'serverInfo'     => $serverInfo
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('admin/statistik', $data);
        echo view('template/footer_head');
        echo view('template/footer_end');
    }

    public function setting()
    {
        $web = $this->webModel->getDataWeb(1);
        $userId = session()->get('user_id') ?? session()->get('id') ?? 1;
        $user = $this->userModel->find($userId);

        $data = [
            'judul' => 'Pengaturan Website & Akun | Admin Panel',
            'web'   => $web,
            'user'  => $user
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('admin/setting', $data);
        echo view('template/footer_head');
        echo view('template/footer_end');
    }

    public function save_setting()
    {
        $id = 1;
        $nama_situs = $this->request->getVar('nama_situs');
        $deskripsi  = $this->request->getVar('deskripsi');
        $logo       = $this->request->getVar('logo');

        $this->webModel->save([
            'id'         => $id,
            'nama_situs' => $nama_situs,
            'deskripsi'  => $deskripsi,
            'logo'       => $logo,
            'slug'       => url_title($nama_situs, '-', true)
        ]);

        session()->setFlashdata('setting_success', 'Pengaturan informasi website berhasil disimpan!');
        return redirect()->to('/admin/setting');
    }

    public function save_account()
    {
        $userId = session()->get('user_id') ?? session()->get('id') ?? 1;
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $password_confirm = $this->request->getVar('password_confirm');

        $updateData = [
            'id'       => $userId,
            'username' => $username,
            'email'    => $email
        ];

        if (!empty($password)) {
            if (strlen($password) < 6) {
                session()->setFlashdata('account_error', 'Password minimal harus 6 karakter!');
                return redirect()->to('/admin/setting');
            }
            if ($password !== $password_confirm) {
                session()->setFlashdata('account_error', 'Konfirmasi password tidak cocok!');
                return redirect()->to('/admin/setting');
            }
            $updateData['password'] = password_hash($password, PASSWORD_BCRYPT);
        }

        $this->userModel->save($updateData);

        // Update active session data
        session()->set([
            'username' => $username,
            'name'     => $username,
            'email'    => $email
        ]);

        session()->setFlashdata('account_success', 'Profil dan kredensial admin berhasil diperbarui!');
        return redirect()->to('/admin/setting');
    }
}
