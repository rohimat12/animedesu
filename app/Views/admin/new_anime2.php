<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">

            <!-- new Anime Manual -->
            <div class="card mb-4">
                <div class="card-header">
                    Tambah Anime Baru    
                                 
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                <form action="/admin/new_anime2/" method="GET">
                                    <div class="input-group mb-3">                                        
                                        <input name="anime_id" type="text" class="form-control"
                                            placeholder="id myanimelist contoh: 1 untuk onepiece"
                                            aria-label="anime_id" aria-describedby="button-addon2">
                                            
                                        <button type="submit" class="btn btn-primary" type="button" id="button-addon2"><i
                                                class="fas fa-search fa-sm"></i></button>                                        
                                    </div>   
                                </form>  

                                <form action="/admin/save_anime/" method="POST">
                                    <input type="text" class="form-control" placeholder="Judul Anime"
                                        aria-label="Judul Anime" aria-describedby="basic-addon1" name="judul" value="<?= $jikan->title; ?>">
                                    <small><div id="Judul_anime" class="form-text mb-3">alamat Situs</div></small>

                                    <div class="form-floating mt-3">
                                        <label for="textarea">Sinopsis</label>
                                        <textarea name="sinopsis" class="form-control editor" placeholder="Tulis Sinopsis disini"
                                            id="editor" style="height: 375px"><?= $jikan->synopsis; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-9">Info Anime</div>
                                        <div class="col-md-3 float-left"><button type="submit" class="btn btn-primary" >Simpan</button>  </div>
                                    </div>  
                                </div>
                                <div class="card-body align-bottom">
                                        <div class="form-group row">
                                            <label for="Japan" class="col-sm-3 col-form-label">Japanese</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="japan" class="form-control" id="Japan" value="<?= $jikan->title_japanese; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Skor" class="col-sm-3 col-form-label">Skor</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="skor" class="form-control" id="Skor" value="<?= $jikan->score; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Produser" class="col-sm-3 col-form-label">Produser</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="produser" class="form-control" id="Produser" value="<?php
                                            foreach ($jikan->producers as $produser) :
                                                echo $produser->name.", "; 
                                            endforeach                                            
                                            ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Tipe" class="col-sm-3 col-form-label">Tipe</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="tipe" class="form-control" id="Tipe" value="<?= $jikan->type; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Status" class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="status" class="form-control" id="Status"
                                            <?php if($jikan->status == 'Finished Airing') :  ?>
                                                value="Completed"
                                            <?php elseif($jikan->status == 'Currently Airing') :?>
                                            value="Ongoing"
                                            <?php endif ?>>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="TotalEpisode" class="col-sm-3 col-form-label">Jml Episode</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="total_episode" class="form-control" id="TotalEpisode" value="<?= $jikan->episodes; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Durasi" class="col-sm-3 col-form-label">Durasi</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="durasi" class="form-control" id="Durasi" value="<?= $jikan->duration; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Studio" class="col-sm-3 col-form-label">Studio</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="studio" class="form-control" id="Studio" value="<?php
                                            foreach ($jikan->studios as $studio) :
                                               echo $studio->name; 
                                            endforeach                                            
                                            ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Genre" class="col-sm-3 col-form-label">Genre</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="genre" class="form-control" id="Genre" value="<?php
                                            foreach ($jikan->genres as $genre) :
                                               echo $genre->name.", "; 
                                            endforeach                                            
                                            ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Musim" class="col-sm-3 col-form-label">Musim</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="musim" class="form-control" id="Musim" value="<?= $jikan->premiered; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Rilis" class="col-sm-3 col-form-label">Tanggal Rilis</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="rilis" class="form-control" id="Rilis" value="<?= $rilis; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Img" class="col-sm-3 col-form-label">Gambar</label>
                                            <div class="col-sm-9 form-inline">
                                            <input type="text" name="img" class="form-control" id="Img" value="<?= $jikan->image_url; ?>">
                                            <button type="submit" class="btn btn-primary ml-2" >Pilih Gambar</button>
                                            </div>                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End New Anime Manual -->

            </div>
        </div>
    </div>
</div>