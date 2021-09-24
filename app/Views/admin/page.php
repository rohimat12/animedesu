<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
            <div class="col-md-6 mt-3"><h6 class="m-0 font-weight-bold text-primary">Daftar Semua Halaman</h6></div>
            <div class="col-md-6"><a href="/admin/new-page" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus mr-2"></i>Tambah Halaman</a></div>
            </div>
        </div>
        <div class="card-body">
        <?php if (session()->getFlashdata('save_page')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('save_page'); ?>
            </div>        
        <?php endif; ?>
        <?php if (session()->getFlashdata('update_page')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('update_page'); ?>
            </div>        
        <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="form-input-checkbox"></th>
                            <th>Judul Halaman</th>
                            <th>Isi Halaman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($page as $halaman) : ?>
                        <tr>
                            <td><input type="checkbox" class="form-input-checkbox"></td>
                            <td>
                                <?= $halaman['judul']; ?>
                            </td>
                            <td>
                                <?= $halaman['post']; ?>
                            </td>
                            <td>
                                <div class="row ml-1">
                                    <a href="#" class="btn-toolbar btn-success btn-sm btn-circle" data-toggle="modal" data-target="#editHalaman<?= $halaman['id']; ?>">
                                        <i class="fas fa-fw fa-edit"></i></a>
                                    <button class="btn-toolbar btn-danger btn-sm btn-circle">
                                        <i class="fas fa-fw fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php foreach($page as $halaman) : ?>
                <!-- Modal -->
                <form action="/admin/update_page/<?= $halaman['id']; ?>" method="POST">
                <div class="modal fade " id="editHalaman<?= $halaman['id']; ?>" tabindex="-1" aria-labelledby="editAnimeLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-xm">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAnimeLabel">Update Halaman <?= $halaman['judul']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">                    
                                <div class="col-md-12">
                                    <div class="item-edit">
                                    <input type="hidden" name="slug" value="<?= $halaman['slug']; ?>">
                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-3 col-form-label">Judul Halaman</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="judul" class="form-control" id="Judul" value="<?= $halaman['judul']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="editor" class="col-sm-3 col-form-label">Isi Halaman</label>
                                            <div class="col-sm-9">
                                            <textarea name="post" class="form-control" id="editor<?= $halaman['id']; ?>" rows="3"><?= $halaman['post']; ?></textarea>
                                            <script>
                                                CKEDITOR.replace('editor<?= $halaman['id']; ?>');
                                            </script>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>                                
                            </div>
                        </div>                                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Halaman</button>
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