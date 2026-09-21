<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!-- new Anime Manual -->
            <div class="card mb-4">
                <div class="card-header font-weight-bold text-primary">
                    Tambah Anime Baru
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <label class="font-weight-bold">Cari Otomatis via MyAnimeList ID</label>
                                    <form action="/admin/new_anime2/" method="GET">
                                        <div class="input-group mb-3">                                        
                                            <input name="anime_id" type="number" class="form-control"
                                                placeholder="Contoh: 1 (Cowboy Bebop), 21 (One Piece)"
                                                aria-label="anime_id" required>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-search fa-sm mr-1"></i> Ambil Data
                                                </button>
                                            </div>
                                        </div>   
                                    </form>  

                                    <form action="/admin/save_anime" method="POST">
                                        <div class="form-group">
                                            <label for="JudulAnime" class="font-weight-bold">Judul Anime</label>
                                            <input type="text" class="form-control" id="JudulAnime" placeholder="Judul Anime"
                                                name="judul" value="<?= esc($jikan->title ?? ''); ?>" required>
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="editor" class="font-weight-bold">Sinopsis</label>
                                            <textarea name="sinopsis" class="form-control editor" placeholder="Tulis sinopsis disini..."
                                                id="editor" style="height: 300px"><?= esc($jikan->synopsis ?? ''); ?></textarea>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <span class="font-weight-bold">Informasi Detail Anime</span>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save mr-1"></i> Simpan Anime</button>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Japan" class="col-sm-3 col-form-label">Japanese</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="japan" class="form-control" id="Japan" value="<?= esc($jikan->title_japanese ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Skor" class="col-sm-3 col-form-label">Skor</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="skor" class="form-control" id="Skor" value="<?= esc($jikan->score ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Produser" class="col-sm-3 col-form-label">Produser</label>
                                        <div class="col-sm-9">
                                            <?php 
                                            $prodStr = '';
                                            if (!empty($jikan->producers) && is_array($jikan->producers)) {
                                                $pNames = array_map(function($p) { return $p->name ?? ''; }, $jikan->producers);
                                                $prodStr = implode(', ', array_filter($pNames));
                                            }
                                            ?>
                                            <input type="text" name="produser" class="form-control" id="Produser" value="<?= esc($prodStr); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Tipe" class="col-sm-3 col-form-label">Tipe</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="tipe" class="form-control" id="Tipe" value="<?= esc($jikan->type ?? 'TV'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Status" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <?php 
                                            $statusVal = 'Ongoing';
                                            if (!empty($jikan->status) && (stripos($jikan->status, 'Finished') !== false || stripos($jikan->status, 'Completed') !== false)) {
                                                $statusVal = 'Completed';
                                            }
                                            ?>
                                            <select name="status" class="form-control" id="Status">
                                                <option value="Ongoing" <?= ($statusVal == 'Ongoing') ? 'selected' : ''; ?>>Ongoing</option>
                                                <option value="Completed" <?= ($statusVal == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="TotalEpisode" class="col-sm-3 col-form-label">Jml Episode</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="total_episode" class="form-control" id="TotalEpisode" value="<?= esc($jikan->episodes ?? '?'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Durasi" class="col-sm-3 col-form-label">Durasi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="durasi" class="form-control" id="Durasi" value="<?= esc($jikan->duration ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Studio" class="col-sm-3 col-form-label">Studio</label>
                                        <div class="col-sm-9">
                                            <?php 
                                            $stdStr = '';
                                            if (!empty($jikan->studios) && is_array($jikan->studios)) {
                                                $sNames = array_map(function($s) { return $s->name ?? ''; }, $jikan->studios);
                                                $stdStr = implode(', ', array_filter($sNames));
                                            }
                                            ?>
                                            <input type="text" name="studio" class="form-control" id="Studio" value="<?= esc($stdStr); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Genre" class="col-sm-3 col-form-label">Genre</label>
                                        <div class="col-sm-9">
                                            <?php 
                                            $gnrStr = '';
                                            if (!empty($jikan->genres) && is_array($jikan->genres)) {
                                                $gNames = array_map(function($g) { return $g->name ?? ''; }, $jikan->genres);
                                                $gnrStr = implode(', ', array_filter($gNames));
                                            }
                                            ?>
                                            <input type="text" name="genre" class="form-control" id="Genre" value="<?= esc($gnrStr); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Musim" class="col-sm-3 col-form-label">Musim</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="musim" class="form-control" id="Musim" value="<?= esc($jikan->premiered ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Rilis" class="col-sm-3 col-form-label">Tanggal Rilis</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="rilis" class="form-control" id="Rilis" value="<?= esc($rilis ?? ($jikan->rilis ?? '')); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Img" class="col-sm-3 col-form-label">URL Gambar</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="img" class="form-control" id="Img" value="<?= esc($jikan->image_url ?? ''); ?>" placeholder="https://...">
                                        </div>                                            
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    if (typeof CKEDITOR !== 'undefined') {
        CKEDITOR.replace('sinopsis');
    }
</script>