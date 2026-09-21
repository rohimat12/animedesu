<?php

namespace App\Models;

use CodeIgniter\Model;
use stdClass;

class AdminModel extends Model
{
    /**
     * Mengambil data anime dari Jikan API v4 berdasarkan MAL ID
     *
     * @param string|int|null $jikanId
     * @return object
     */
    public function getJikan($jikanId = null)
    {
        // Default empty object agar view tidak crash jika belum ada ID yang dicari
        $default = new stdClass();
        $default->title          = '';
        $default->title_japanese = '';
        $default->synopsis       = '';
        $default->score          = '';
        $default->producers      = [];
        $default->type           = 'TV';
        $default->status         = '';
        $default->episodes       = '';
        $default->duration       = '';
        $default->studios        = [];
        $default->genres         = [];
        $default->premiered      = '';
        $default->image_url      = '';
        $default->rilis          = '';

        if (empty($jikanId)) {
            return $default;
        }

        $jikanId = trim((string)$jikanId);
        $url = "https://api.jikan.moe/v4/anime/" . urlencode($jikanId);

        $options = [
            'http' => [
                'method' => 'GET',
                'header' => "User-Agent: AnimedesuApp/1.0\r\nAccept: application/json\r\n",
                'timeout' => 10,
                'ignore_errors' => true
            ]
        ];

        $context = stream_context_create($options);
        $response = @file_get_contents($url, false, $context);

        if ($response === false) {
            return $default;
        }

        $json = json_decode($response);
        if (!isset($json->data)) {
            return $default;
        }

        $data = $json->data;
        $result = new stdClass();

        $result->title          = $data->title ?? '';
        $result->title_japanese = $data->title_japanese ?? '';
        $result->synopsis       = $data->synopsis ?? '';
        $result->score          = isset($data->score) ? (string)$data->score : '';
        $result->producers      = is_array($data->producers ?? null) ? $data->producers : [];
        $result->type           = $data->type ?? 'TV';
        $result->status         = $data->status ?? '';
        $result->episodes       = isset($data->episodes) ? (string)$data->episodes : '';
        $result->duration       = $data->duration ?? '';
        $result->studios        = is_array($data->studios ?? null) ? $data->studios : [];
        $result->genres         = is_array($data->genres ?? null) ? $data->genres : [];

        // Musim / Premiered
        if (!empty($data->season)) {
            $result->premiered = ucfirst($data->season) . (!empty($data->year) ? ' ' . $data->year : '');
        } else {
            $result->premiered = $data->premiered ?? '';
        }

        // Image URL (ambil large jika ada, fallback ke standar)
        if (isset($data->images->jpg->large_image_url)) {
            $result->image_url = $data->images->jpg->large_image_url;
        } elseif (isset($data->images->jpg->image_url)) {
            $result->image_url = $data->images->jpg->image_url;
        } else {
            $result->image_url = '';
        }

        // Tanggal rilis (string dari aired)
        $result->rilis = $data->aired->string ?? '';

        return $result;
    }
}