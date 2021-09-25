<?php

namespace App\Models;

use CodeIgniter\Model;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class AdminModel extends Model
{
    public function getJikan($jikan)
    {
        if(isset($jikan)){
            $jikan = $jikan;
            $url = "https://api.jikan.moe/v3/anime/$jikan";
            $url = file_get_contents($url);
            $jikan = json_decode($url);
            // return $jikan;

            preg_match_all('/"aired":.*string".*?"(.*?)"/', $url, $rilis);
            $rilis = $rilis[1][0];

            $int = 0;


            if(isset($jikan->image_url)){
                $img = $jikan->image_url;
            } else {
                $img = '';
            }            

            if(isset($jikan->title)){
                $judul = $jikan->title;
            } else {
                $judul = '';
            }

            if(isset($jikan->synopsis)){
                $sinopsis = $jikan->synopsis;
            } else {
                $sinopsis = '';
            }

            if(isset($jikan->title_japanese)){
                $japan = $jikan->title_japanese;
            }else{
                $japan = '';
            }

            if(isset($jikan->score)){
                $skor = $jikan->score;
            }else{
                $skor = '';
            }

            if(isset($jikan->producers)){
                foreach($jikan->producers as $data){
                    $produser[] = $data->name;  
                }
            }else{
                $produser = '';
            }

            if(isset($jikan->type)){
                $tipe = $jikan->type;
            }else{
                $tipe = '';
            }

            if(isset($jikan->status)){
                if($jikan->status = 'Finished Airing'){
                    $status = 'Completed';
                } else {
                    $status = 'Ongoing';
                }
            }else{
                $status = '';
            }

            if(isset($jikan->episodes)){
                $episode = $jikan->episodes;
            }else{
                $episode = '';
            }

            if(isset($jikan->duration)){
                $durasi = $jikan->duration;
            }else{
                $durasi = '';
            }

            if(isset($jikan->studios)){
                foreach($jikan->studios as $data){
                    $studio[] = $data->name;
                }                
            }else{
                $studio = '';
            }

            if(isset($jikan->genres)){
                foreach($jikan->genres as $data){
                    $genre[] = $data->name;
                }
            }else{
                $genre = '';
            }

            if(isset($jikan->premiered)){
                $musim = $jikan->premiered;
            }else{
                $musim = '';
            }

            if(isset($rilis)){
                $rilis = $rilis;
            }else{
                $rilis = '';
            }

            $data = [
                'judul_anime' => $judul,
                'img' => $img,
                'sinopsis' => $sinopsis,
                'japan' => $japan,
                'skor' => $skor,
                'produser' => $produser,
                'tipe' => $tipe,
                'status' => $status,
                'episode' => $episode,
                'durasi' => $durasi,
                'studio' => $studio,
                'genre' => $genre,
                'musim' => $musim,
                'rilis' => $rilis
                
            ];
            return $data;               
        }
    }
}