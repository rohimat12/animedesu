<?php

namespace App\Controllers;

use App\Models\AnimeModel;
use App\Models\EpisodeModel;
use App\Models\HalamanModel;
use App\Models\WebModel;
class Home extends BaseController
{

    public function __construct()
    {
        $this->animeModel = new AnimeModel();
        $this->episodeModel = new EpisodeModel();
        $this->halamanModel = new HalamanModel();
        $this->webModel = new WebModel();
    }

    public function index()
    {
        // dd($this->animeModel->where('status','ongoing')->findAll());
        // $url='https://desustream.me/otakuplay/v2/?id=ekpKdGpISUZVVU5aY3UvWE9TYm5md0JpR2FweURBbnlLd2l6dk1xcll1ST0=';
        // preg_match_all('/file\':\'(.*?)\'/', file_get_contents($url), $match);
        // dd($match[1][0]);
      
        $judul = $this->webModel->getDataWeb('1');
        $judul = $judul['nama_situs'].'|'.$judul['deskripsi'];

        $data = [
            'judul' => $judul,
            'anime' => $this->animeModel->getAnime(),
            'ongoing' => $this->animeModel->getAnimeOngoing(),
            'complete'=> $this->animeModel->getAnimeComplete(),
            'halaman' => $this->halamanModel->getHalaman()
        ];
        echo view('home/theme/header', $data);
        echo view('home/theme/navbar', $data);
        echo view('home/theme/slider', $data);
        echo view('home/index', $data);
        echo view('home/theme/footer', $data);
    }

    public function anime($slug = false)
    {
        $judul = $this->webModel->getDataWeb('1');
        $judul = $judul['nama_situs'].'|'.$judul['deskripsi'];

        $data = [
            'judul' => $judul,
            'anime'     => $this->animeModel->getAnime($slug),
            'episode'   => $this->episodeModel->getEpisode(),
            'complete'=> $this->animeModel->getAnimeComplete(),
        ];

        echo view('home/inc/header', $data);
        echo view('home/inc/navbar');
        echo view('home/anime', $data);
        echo view('template/footer_head');
        echo view('template/footer_end');
    }

    public function episode($slug)
    {   
        $id = $this->animeModel->getAnime($slug);
        $id = $id['id'];
        $id_anime = $this->episodeModel->getAnimeID($id);
        // $episode = $this->episodeModel->getEpisode($id_anime['episode_ke']);
        // dd($episode);

        

        $judul = $this->webModel->getDataWeb('1');
        $judul = $judul['nama_situs'].'|'.$judul['deskripsi'];
        $data = [
            'judul'   => $judul,    
            'anime'   => $this->animeModel->getAnime($slug),
            'episode' => $id_anime
        ];
        
        // echo view('home/inc/header', $data);
        // echo view('home/inc/navbar');
        echo view('home/episode', $data);
        // echo view('template/footer_head');
        // echo view('home/inc/footer_player');
        // echo view('template/footer_end');
    }

    public function page($slug)
    {
        $data = [
            'halaman' => $this->halamanModel->getHalaman($slug)
        ];
        return view('home/page', $data);
    }
}
