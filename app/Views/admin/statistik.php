<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800 font-weight-bold">Statistik & Analitik</h1>
            <p class="text-muted small mb-0">Ringkasan performa konten anime, genre populer, dan kondisi server sistem.</p>
        </div>
        <a href="/admin" class="btn btn-sm btn-outline-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm mr-1"></i> Kembali ke Dashboard
        </a>
    </div>

    <!-- Quick Stats Cards Row -->
    <div class="row">

        <!-- Total Anime -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Judul Anime</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalAnime; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tv fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Episode -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Episode Tayang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalEpisode; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-video fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ongoing Shows -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Anime Sedang Tayang (Ongoing)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ongoingCount; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-play-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Completed Shows -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Anime Tamat (Completed)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $completedCount; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">

        <!-- Status Distribution Chart (Doughnut) -->
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-white d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger">
                        <i class="fas fa-chart-pie mr-1"></i> Rasio Status Anime
                    </h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-2 pb-2" style="position: relative; height: 230px;">
                        <canvas id="statusPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-3">
                            <i class="fas fa-circle text-warning"></i> Ongoing (<?= $ongoingCount; ?>)
                        </span>
                        <span class="mr-3">
                            <i class="fas fa-circle text-primary"></i> Tamat (<?= $completedCount; ?>)
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Genre Breakdown Chart (Bar) -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-white d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger">
                        <i class="fas fa-chart-bar mr-1"></i> Distribusi Genre Terbanyak
                    </h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar" style="position: relative; height: 270px;">
                        <canvas id="genreBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Details Table & Server Info Row -->
    <div class="row">

        <!-- Top Rated Anime Table -->
        <div class="col-xl-7 col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-danger">
                        <i class="fas fa-trophy text-warning mr-1"></i> Top 5 Anime Berdasarkan Skor
                    </h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th width="40">#</th>
                                    <th>Anime</th>
                                    <th>Status</th>
                                    <th class="text-right">Skor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($topAnime)) : ?>
                                    <?php $rank = 1; foreach($topAnime as $item) : ?>
                                    <tr>
                                        <td class="align-middle font-weight-bold"><?= $rank++; ?></td>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                                <img src="<?= $item['img']; ?>" alt="Cover" class="rounded mr-2" style="width: 32px; height: 42px; object-fit: cover;">
                                                <div>
                                                    <a href="/anime/<?= $item['slug']; ?>" target="_blank" class="font-weight-bold text-dark text-decoration-none">
                                                        <?= esc($item['judul']); ?>
                                                    </a>
                                                    <div class="small text-muted"><?= esc($item['tipe'] ?? 'TV'); ?> &bull; <?= esc($item['musim'] ?? '-'); ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge badge-pill <?= strtolower($item['status'] ?? '') === 'completed' ? 'badge-primary' : 'badge-warning'; ?> px-2 py-1">
                                                <?= esc($item['status'] ?? 'Ongoing'); ?>
                                            </span>
                                        </td>
                                        <td class="align-middle text-right font-weight-bold text-warning">
                                            <i class="fas fa-star mr-1"></i><?= esc($item['skor'] ?? '0'); ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr><td colspan="4" class="text-center py-3 text-muted">Belum ada data anime</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Server & System Environment -->
        <div class="col-xl-5 col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-danger">
                        <i class="fas fa-server mr-1"></i> Lingkungan Server & Sistem
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                            <span class="text-muted"><i class="fab fa-php mr-2 text-primary"></i>Versi PHP:</span>
                            <span class="badge badge-success px-2 py-1 font-weight-bold"><?= $serverInfo['php_version']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                            <span class="text-muted"><i class="fas fa-fire mr-2 text-danger"></i>Versi CodeIgniter:</span>
                            <span class="font-weight-bold"><?= $serverInfo['ci_version']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                            <span class="text-muted"><i class="fas fa-database mr-2 text-info"></i>Versi Database:</span>
                            <span class="font-weight-bold"><?= $serverInfo['mysql']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                            <span class="text-muted"><i class="fas fa-laptop mr-2 text-secondary"></i>Sistem Operasi:</span>
                            <span class="font-weight-bold"><?= $serverInfo['os']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                            <span class="text-muted"><i class="fas fa-memory mr-2 text-warning"></i>Batas Memori:</span>
                            <span class="font-weight-bold"><?= $serverInfo['memory_limit']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                            <span class="text-muted"><i class="fas fa-cloud-upload-alt mr-2 text-primary"></i>Batas Upload:</span>
                            <span class="font-weight-bold"><?= $serverInfo['upload_max']; ?> (POST <?= $serverInfo['post_max']; ?>)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                            <span class="text-muted"><i class="fas fa-clock mr-2 text-dark"></i>Max Execution Time:</span>
                            <span class="font-weight-bold"><?= $serverInfo['max_execution']; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Status Pie/Doughnut Chart
    const statusCtx = document.getElementById('statusPieChart');
    if (statusCtx) {
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Ongoing', 'Tamat (Completed)'],
                datasets: [{
                    data: [<?= $ongoingCount; ?>, <?= $completedCount; ?>],
                    backgroundColor: ['#f6c23e', '#4e73df'],
                    hoverBackgroundColor: ['#dfa824', '#2e59d9'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                cutout: '70%',
            },
        });
    }

    // 2. Top Genres Bar Chart
    const genreCtx = document.getElementById('genreBarChart');
    <?php
    $topGenres = array_slice($genreCounts, 0, 8, true);
    $genreLabels = array_keys($topGenres);
    $genreValues = array_values($topGenres);
    ?>
    if (genreCtx) {
        new Chart(genreCtx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($genreLabels); ?>,
                datasets: [{
                    label: 'Jumlah Anime',
                    backgroundColor: '#e53637',
                    hoverBackgroundColor: '#c82333',
                    borderColor: '#e53637',
                    borderRadius: 6,
                    data: <?= json_encode($genreValues); ?>,
                }],
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    },
                    x: {
                        grid: { display: false }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    }
});
</script>
