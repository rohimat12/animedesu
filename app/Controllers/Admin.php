<?php

namespace App\Controllers;

use App\Models\AnimeModel;
use App\Models\EpisodeModel;
use App\Models\HalamanModel;
use App\Models\AdminModel;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->animeModel = new AnimeModel();
        $this->episodeModel = new EpisodeModel();
        $this->halamanModel = new HalamanModel();
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Dasboard | Admin Panel',
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
            'anime' => $this->animeModel->getAnime()
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

    public function new_anime(){
        $anime_id = $this->request->getVar('anime_id');
        $anime_id =$this->adminModel->getJikan($anime_id);  

        $data = [
            'judul' => 'Tambah Anime | Admin Panel',
            'judul_anime' => $anime_id['judul_anime'],
            'img' => $anime_id['img'],
            'sinopsis' => $anime_id['sinopsis'],
            'japan' => $anime_id['japan'],
            'skor' => $anime_id['skor'],
            'produser' => $anime_id['produser'],
            'tipe' => $anime_id['tipe'],
            'status' => $anime_id['status'],
            'episode' => $anime_id['episode'],
            'durasi' => $anime_id['durasi'],
            'studio' => $anime_id['studio'],
            'genre' => $anime_id['genre'],
            'musim' => $anime_id['musim'],
            'rilis' => $anime_id['rilis']            
        ];
        // dd($data);
        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('template/footer_ck');
        echo view('admin/new_anime', $data);
        echo view('template/footer_head');
        // echo view('template/footer_table');
        echo view('template/footer_end');
    }  
    
    public function save_anime(){
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $img = $this->request->getVar('img');
        $infopath = pathinfo($img);
        $folder = "./assets/img_anime/".$slug.".".$infopath['extension'];
        $foldersave = "/assets/img_anime/".$slug.".".$infopath['extension'];
        file_put_contents($folder, file_get_contents($img));

        $this->animeModel->save([
            'judul'         => $this->request->getVar('judul'),
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

        $data = [
            'judul'=> 'Tambah Anime | Admin Panel',
            'slug' => $slug,
            'anime'  => $this->animeModel->getAnime()
        ];

        session()->setFlashdata('save_anime', 'Anime berhasil ditambahkan');

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('template/footer_ck');
        echo view('admin/anime', $data);
        echo view('template/footer_head');
        echo view('template/footer_table');
        echo view('template/footer_end');
    }

    public function update_anime($id)
    {
        $this->animeModel->save([
            'id'         => $id,
            'judul'         => $this->request->getVar('judul'),
            'img'           => $this->request->getVar('img'),
            'slug'          => $this->request->getVar('slug'),
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

        $data = [
            'judul'=> 'Tambah Anime | Admin Panel',
            'anime'  => $this->animeModel->getAnime()
        ];

        session()->setFlashdata('update_anime', 'Anime berhasil diupdate');

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('template/footer_ck');
        echo view('admin/anime', $data);
        echo view('template/footer_head');
        echo view('template/footer_table');
        echo view('template/footer_end');
    }

    public function episode()
    {
        $data = [
            'judul'     => 'Semua Episode | Admin Panel',
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

    public function update_episode($id)
    {
        $use_player     = $this->request->getVar('use_player');
        $use_download   = $this->request->getVar('use_download');

        if($use_player == 'on'){
            $use_player = 1;
        }else{
            $use_player = 0;
        }

        if($use_download == 'on'){
            $use_download = 1;
        }else{
            $use_download = 0;
        }

        $this->episodeModel->save([
            'id'            => $id,
            'id_anime'      => $this->request->getVar('id_anime'),
            'judul'         => $this->request->getVar('judul'),
            'slug'          => $this->request->getVar('slug'),
            'episode_ke'    => $this->request->getVar('episode_ke'),
            'use_player'    => $use_player,
            'embed_player'  => $this->request->getVar('embed_player'),
            'judul_player'  => $this->request->getVar('judul_player'),
            'use_download'  => $use_download,
            'iink_download' => $this->request->getVar('iink_download'),
            'judul_download'=> $this->request->getVar('judul_download'),
            'kualitas'      => $this->request->getVar('kualitas')
        ]);

        $data = [
            'judul'=> 'Data Episode | Admin Panel',
            'episode'  => $this->episodeModel->getEpisode()
        ];

        session()->setFlashdata('update_episode', 'Episode berhasil diupdate');

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
            'judul'=> 'Tambah Episode Baru | Admin Panel',
            'anime'  => $this->animeModel->getAnime()
        ];
        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('admin/new_episode', $data);
        echo view('template/footer_head');
        echo view('template/footer_head');
        echo view('template/footer_end');
    }

    public function save_episode()
    {
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $use_player     = $this->request->getVar('use_player');
        $use_download   = $this->request->getVar('use_download');

        if($use_player == 'on'){
            $use_player = 1;
        }else{
            $use_player = 0;
        }

        if($use_download == 'on'){
            $use_download = 1;
        }else{
            $use_download = 0;
        }

        $this->episodeModel->save([
            'id_anime'      => $this->request->getVar('id_anime'),
            'judul'         => $this->request->getVar('judul'),
            'slug'          => $slug,
            'episode_ke'    => $this->request->getVar('episode_ke'),
            'use_player'    => $use_player,
            'embed_player'  => $this->request->getVar('embed_player'),
            'judul_player'  => $this->request->getVar('judul_player'),
            'use_download'  => $use_download,
            'iink_download' => $this->request->getVar('iink_download'),
            'judul_download'=> $this->request->getVar('judul_download'),
            'kualitas'      => $this->request->getVar('kualitas')
        ]);

        $data = [
            'judul'=> 'Data Episode | Admin Panel',
            'episode'  => $this->episodeModel->getEpisode()
        ];

        session()->setFlashdata('save_episode', 'Episode berhasil disimpan');

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('template/footer_ck');
        echo view('admin/episode', $data);
        echo view('template/footer_head');
        echo view('template/footer_table');
        echo view('template/footer_end');
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

    public function update_page($id)
    {
        $this->halamanModel->save([
            'id'    => $id,
            'judul' => $this->request->getVar('judul'),
            'slug'  => $this->request->getVar('slug'),
            'post'  => $this->request->getVar('post')
        ]);

        $data = [
            'judul' => 'Semua Halaman | Admin Panel',
            'page'  => $this->halamanModel->getHalaman()
        ];

        session()->setFlashdata('update_page', 'Halaman berhasil diupdate');

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
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->halamanModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'post' => $this->request->getVar('post'),
        ]);

        session()->setFlashdata('save_page', 'Halaman berhasil disimpan');

        $data = [
            'judul' => 'Tambah Halaman | Admin Panel',
            'page'  => $this->halamanModel->getHalaman()
        ]; 

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/nav');
        echo view('template/footer_ck');
        echo view('admin/page', $data);
        echo view('template/footer_head');
        echo view('template/footer_end');
    }

    public function statistik()
    {
        return view('admin/statistik');
    }

    public function setting()
    {
        return view('admin/setting');
    }
}
