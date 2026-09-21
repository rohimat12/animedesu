<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800 font-weight-bold">Pengaturan</h1>
            <p class="text-muted small mb-0">Kelola identitas website Animedesu dan kredensial login akun administrator.</p>
        </div>
        <a href="/admin" class="btn btn-sm btn-outline-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm mr-1"></i> Kembali ke Dashboard
        </a>
    </div>

    <!-- Feedback Alerts -->
    <?php if (session()->getFlashdata('setting_success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i><?= session()->getFlashdata('setting_success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('account_success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i><?= session()->getFlashdata('account_success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('account_error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle mr-2"></i><?= session()->getFlashdata('account_error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="row">

        <!-- Website Identity Settings -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-white d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger">
                        <i class="fas fa-globe mr-1"></i> Identitas Website
                    </h6>
                    <span class="badge badge-light border">Informasi Umum</span>
                </div>
                <div class="card-body">
                    <form action="/admin/save_setting" method="POST">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark" for="nama_situs">Nama Website</label>
                            <input type="text" class="form-control" id="nama_situs" name="nama_situs" 
                                   value="<?= esc($web['nama_situs'] ?? 'Animedesu'); ?>" required>
                            <small class="form-text text-muted">Ditampilkan pada judul halaman dan navbar.</small>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-dark" for="deskripsi">Deskripsi Website</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= esc($web['deskripsi'] ?? ''); ?></textarea>
                            <small class="form-text text-muted">Deskripsi meta untuk pencarian dan SEO.</small>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-dark" for="logo">Path / URL Logo</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="logo" name="logo" 
                                       value="<?= esc($web['logo'] ?? 'img/logo.png'); ?>">
                            </div>
                            <small class="form-text text-muted">Contoh: <code>/img/logo.png</code> atau link URL gambar logo.</small>
                        </div>

                        <div class="p-3 mb-4 rounded bg-light border">
                            <span class="small font-weight-bold text-muted d-block mb-2">Pratinjau Branding:</span>
                            <div class="d-flex align-items-center">
                                <h4 class="font-weight-bold m-0 text-dark">
                                    Anime<span style="color: #e53637;">desu</span>
                                </h4>
                                <span class="badge badge-danger ml-2">v2.0</span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger font-weight-bold shadow-sm">
                            <i class="fas fa-save mr-1"></i> Simpan Informasi Website
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Admin Account & Security Settings -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-white d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger">
                        <i class="fas fa-user-shield mr-1"></i> Akun Administrator & Keamanan
                    </h6>
                    <span class="badge badge-success">Bcrypt Protected</span>
                </div>
                <div class="card-body">
                    <form action="/admin/save_account" method="POST">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark" for="username">Username Admin</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="username" name="username" 
                                       value="<?= esc($user['username'] ?? 'admin'); ?>" required>
                            </div>
                            <small class="form-text text-muted">Digunakan saat login ke Admin Panel.</small>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-dark" for="email">Alamat Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="<?= esc($user['email'] ?? 'admin@animedesu.com'); ?>" required>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="font-weight-bold text-dark mb-2"><i class="fas fa-key mr-1 text-warning"></i> Ganti Password</h6>
                        <p class="text-muted small mb-3">Kosongkan kolom password di bawah jika tidak ingin mengubah password saat ini.</p>

                        <div class="form-group">
                            <label class="font-weight-bold text-dark" for="password">Password Baru</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" 
                                       placeholder="Minimal 6 karakter" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-dark" for="password_confirm">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-check-double"></i></span>
                                </div>
                                <input type="password" class="form-control" id="password_confirm" name="password_confirm" 
                                       placeholder="Ketik ulang password baru">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary font-weight-bold shadow-sm">
                            <i class="fas fa-user-check mr-1"></i> Perbarui Akun Admin
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->