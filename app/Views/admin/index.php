        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Total Anime Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Total Anime</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($anime ?? []); ?> Judul</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-tv fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Episode Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Episode</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($episode ?? []); ?> Episode</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-video fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Halaman Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Total Halaman Statis</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($halaman ?? []); ?> Halaman</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Server Status Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Status Server</div>
                                    <div class="h5 mb-0 font-weight-bold text-success"><i class="fas fa-check-circle mr-1"></i> Aktif (PHP 8)</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-server fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="d-flex align-items-center justify-content-between mb-3">
                <h1 class="h4 mb-0 text-gray-800 font-weight-bold">Daftar Anime Terbaru</h1>
                <a href="/admin/new-anime" class="btn btn-sm btn-danger shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Tambah Anime Baru
                </a>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-list mr-1"></i> Data Anime di Database</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th width="60">Poster</th>
                                    <th>Judul Anime</th>
                                    <th>Musim</th>
                                    <th>Status</th>
                                    <th>Skor</th>
                                    <th width="110">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($anime)) : ?>
                                    <?php foreach($anime as $row) : ?>
                                    <tr>
                                        <td class="text-center p-1">
                                            <img src="<?= $row['img']; ?>" alt="Poster" style="width: 44px; height: 58px; object-fit: cover; border-radius: 4px;">
                                        </td>
                                        <td>
                                            <strong class="text-dark"><?= esc($row['judul']); ?></strong>
                                            <div class="small text-muted"><?= esc($row['genre'] ?? ''); ?></div>
                                        </td>
                                        <td><?= esc($row['musim'] ?? '-'); ?></td>
                                        <td>
                                            <span class="badge badge-pill <?= strtolower($row['status'] ?? '') === 'completed' ? 'badge-primary' : 'badge-success'; ?> px-2 py-1">
                                                <?= esc($row['status'] ?? 'Ongoing'); ?>
                                            </span>
                                        </td>
                                        <td><i class="fas fa-star text-warning mr-1"></i> <?= esc($row['skor'] ?? '-'); ?></td>
                                        <td class="text-center">
                                            <a href="/anime/<?= $row['slug']; ?>" target="_blank" class="btn btn-info btn-sm" title="Pratinjau">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/admin/anime" class="btn btn-primary btn-sm" title="Kelola">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data anime</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
