<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
            <div class="col-md-6 mt-3"><h6 class="m-0 font-weight-bold text-primary">Daftar Semua Anime</h6></div>
            <div class="col-md-6"><a href="/admin/new-anime" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus mr-2"></i>Tambah Anime</a></div>
            </div>
        </div>
        <div class="card-body">
        <?php if (session()->getFlashdata('save_anime')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('save_anime'); ?>
            </div>        
        <?php endif; ?>
        <?php if (session()->getFlashdata('update_anime')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('update_anime'); ?>
            </div>        
        <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="form-input-checkbox"></th>
                            <th>Judul Anime</th>
                            <th>Musim</th>
                            <th>Genre</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($anime as $DataAnime) : ?>
                        <tr>
                            <td><input type="checkbox" class="form-input-checkbox"></td>
                            <td>
                                <?= $DataAnime['judul']; ?>
                            </td>
                            <td>
                                <?= $DataAnime['musim']; ?>
                            </td>
                            <td>
                                <?= $DataAnime['genre']; ?>
                            </td>
                            <td>
                                <div class="row ml-1">
                                    <a href="#" class="btn-toolbar btn-success btn-sm btn-circle" data-toggle="modal" data-target="#editAnime<?= $DataAnime['id']; ?>">
                                        <i class="fas fa-fw fa-edit"></i></a>
                                    <button class="btn-toolbar btn-danger btn-sm btn-circle">
                                        <i class="fas fa-fw fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php foreach($anime as $DataAnime) : ?>
                <!-- Modal -->
                <form action="/admin/update_anime/<?= $DataAnime['id']; ?>" method="POST">
                <div class="modal fade " id="editAnime<?= $DataAnime['id']; ?>" tabindex="-1" aria-labelledby="editAnimeLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAnimeLabel">Update Anime <?= $DataAnime['judul']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="<?= $DataAnime['img']; ?>" alt="<?= $DataAnime['judul']; ?>" width="100%">
                                    <input type="hidden" name="slug" value="<?= $DataAnime['slug']; ?>">
                                </div>
                                <div class="col-md-8">
                                    <div class="item-edit">
                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-3 col-form-label">Judul</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="judul" class="form-control" id="Judul" value="<?= $DataAnime['judul']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="editor" class="col-sm-3 col-form-label">Sinopsis</label>
                                            <div class="col-sm-9">
                                            <textarea name="sinopsis" class="form-control" id="editor<?= $DataAnime['id']; ?>" rows="3"><?= $DataAnime['sinopsis']; ?></textarea>
                                            <script>
                                                CKEDITOR.replace('editor<?= $DataAnime['id']; ?>');
                                            </script>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Japan" class="col-sm-3 col-form-label">Japanese</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="japan" class="form-control" id="Japan" value="<?= $DataAnime['japan']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Skor" class="col-sm-3 col-form-label">Skor</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="skor" class="form-control" id="Skor" value="<?= $DataAnime['skor']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Produser" class="col-sm-3 col-form-label">Produser</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="produser" class="form-control" id="Produser" value="<?= $DataAnime['produser']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Tipe" class="col-sm-3 col-form-label">Tipe</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="tipe" class="form-control" id="Tipe" value="<?= $DataAnime['tipe']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Status" class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="status" class="form-control" id="Status" value="<?= $DataAnime['status']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="TotalEpisode" class="col-sm-3 col-form-label">Jml Episode</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="total_episode" class="form-control" id="TotalEpisode" value="<?= $DataAnime['total_episode']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Durasi" class="col-sm-3 col-form-label">Durasi</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="durasi" class="form-control" id="Durasi" value="<?= $DataAnime['durasi']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Studio" class="col-sm-3 col-form-label">Studio</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="studio" class="form-control" id="Studio" value="<?= $DataAnime['studio'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Genre" class="col-sm-3 col-form-label">Genre</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="genre" class="form-control" id="Genre" value="<?= $DataAnime['genre'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Musim" class="col-sm-3 col-form-label">Musim</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="musim" class="form-control" id="Musim" value="<?= $DataAnime['musim']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Rilis" class="col-sm-3 col-form-label">Tanggal Rilis</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="rilis" class="form-control" id="Rilis" value="<?= $DataAnime['rilis']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Img" class="col-sm-3 col-form-label">Gambar</label>
                                            <div class="col-sm-9 form-inline">
                                            <input type="text" name="img" class="form-control" id="Img" value="<?= $DataAnime['img']; ?>">
                                            <button type="submit" class="btn btn-primary ml-2" >Pilih Gambar</button>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>                                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Anime</button>
                        </div>

                        </div>
                    </div>
                    </form>
                </div>
                <!-- end modal -->    
                <?php endforeach ?> 
            </div>
        </div>
    </div>

</div>

