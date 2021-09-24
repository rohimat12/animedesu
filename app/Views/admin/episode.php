<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="row">
            <div class="col-md-6 mt-3"><h6 class="m-0 font-weight-bold text-primary">Daftar Semua Episode</h6></div>
            <div class="col-md-6"><a href="/admin/new-episode" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus mr-2"></i>Tambah Episode</a></div>
            </div>
    </div>
    <div class="card-body">
        <?php if (session()->getFlashdata('save_episode')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('save_episode'); ?>
            </div>        
        <?php endif; ?>
        <?php if (session()->getFlashdata('update_episode')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('update_episode'); ?>
            </div>        
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="form-input-checkbox"></th>
                        <th>Judul Anime</th>
                        <th>Episode ke-</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($episode as $row) : ?>
                    <tr>
                        <td><input type="checkbox" class="form-input-checkbox"></td>
                        <td><?= $row['judul']; ?></td>
                        <td><?= $row['episode_ke']; ?></td>
                        <td>
                            <div class="row ml-1">
                            <a href="/episode/edit_episode/<?= $row['slug']; ?>" class="btn-toolbar btn-success btn-sm btn-circle" data-toggle="modal" data-target="#editEpisode<?= $row['id']; ?>">
                            <i class="fas fa-fw fa-edit"></i></a><a href="/episode/delete" class="btn-toolbar btn-danger btn-sm btn-circle">
                            <i class="fas fa-fw fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <?php foreach($episode as $DataAnime) : ?>
                <!-- Modal -->
                <form action="/admin/update_episode/<?= $DataAnime['id']; ?>" method="POST">
                <div class="modal fade " id="editEpisode<?= $DataAnime['id']; ?>" tabindex="-1" aria-labelledby="editAnimeLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAnimeLabel">Update Episode <?= $DataAnime['judul']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <input type="hidden" name="id_anime" value="<?= $DataAnime['id_anime']; ?>">
                                <input type="hidden" name="slug" value="<?= $DataAnime['slug']; ?>">
                                <div class="col-md-12">
                                    <div class="item-edit">
                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-4 col-form-label">Judul</label>
                                            <div class="col-sm-8">
                                            <input type="text" name="judul" class="form-control" id="Judul" value="<?= $DataAnime['judul']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Episode Ke" class="col-sm-4 col-form-label">Episode Ke-</label>
                                            <div class="col-sm-8">
                                            <input type="text" name="episode_ke" class="form-control" id="EpisodeKe" value="<?= $DataAnime['episode_ke']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Embed Player" class="col-sm-4 col-form-label">Embed Player</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                        <input name="use_player" type="checkbox" aria-label="Checkbox for following text input" <?php if($DataAnime['use_player'] == 1) : echo 'checked'; endif;?>>
                                                        </div>
                                                    </div>
                                                    <input name="embed_player" type="text" class="form-control" aria-label="Text input with checkbox" value="<?= $DataAnime['embed_player']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Nama Player" class="col-sm-4 col-form-label">Nama Player</label>
                                            <div class="col-sm-8">
                                            <input type="text" name="judul_player" class="form-control" id="NamaPlayer" value="<?= $DataAnime['judul_player']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Embed Player" class="col-sm-4 col-form-label">Link Download</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                        <input name="use_download" type="checkbox" aria-label="Checkbox for following text input" <?php if($DataAnime['use_download'] == 1) : echo 'checked'; endif;?>>
                                                        </div>
                                                    </div>
                                                    <input name="link_download" type="text" class="form-control" aria-label="Text input with checkbox" value="<?= $DataAnime['link_download']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Nama Link" class="col-sm-4 col-form-label">Nama Link</label>
                                            <div class="col-sm-8">
                                            <input type="text" name="judul_download" class="form-control" id="NamaLink" value="<?= $DataAnime['judul_download']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Kualitas" class="col-sm-4 col-form-label">Kualitas</label>
                                            <div class="col-sm-8">
                                            <input type="text" name="kualitas" class="form-control" id="Kualitas" value="<?= $DataAnime['kualitas']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>                                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Episode</button>
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