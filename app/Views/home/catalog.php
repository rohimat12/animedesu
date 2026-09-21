<div class="container py-4">
    <!-- Breadcrumb -->
    <div class="row mb-3">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 small">
                    <li class="breadcrumb-item"><a href="/" class="text-muted"><i class="fas fa-home mr-1"></i> Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Katalog Anime</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Title & Filter Section -->
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h3 class="font-weight-bold text-white mb-1">
                <?= !empty($current_genre) ? 'Genre: ' . esc(ucfirst($current_genre)) : 'Katalog Semua Anime'; ?>
            </h3>
            <p class="text-muted small m-0">Menemukan <?= $total_found; ?> anime yang cocok dengan filter</p>
        </div>

        <!-- Filter Controls -->
        <div class="col-md-6 mt-3 mt-md-0">
            <form action="/categories" method="GET" class="form-inline justify-content-md-end">
                <?php if (!empty($current_genre)) : ?>
                    <input type="hidden" name="genre" value="<?= esc($current_genre); ?>">
                <?php endif; ?>

                <div class="form-group mr-2 mb-2">
                    <select name="status" class="form-control form-control-sm bg-dark text-white border-secondary" onchange="this.form.submit()">
                        <option value="all">Semua Status</option>
                        <option value="Ongoing" <?= ($current_status === 'Ongoing') ? 'selected' : ''; ?>>Ongoing</option>
                        <option value="Completed" <?= ($current_status === 'Completed') ? 'selected' : ''; ?>>Completed</option>
                    </select>
                </div>

                <div class="form-group mb-2">
                    <select name="sort" class="form-control form-control-sm bg-dark text-white border-secondary" onchange="this.form.submit()">
                        <option value="latest" <?= ($current_sort === 'latest') ? 'selected' : ''; ?>>Terbaru</option>
                        <option value="score" <?= ($current_sort === 'score') ? 'selected' : ''; ?>>Skor Tertinggi</option>
                        <option value="title" <?= ($current_sort === 'title') ? 'selected' : ''; ?>>Judul A-Z</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <!-- Genre Pills List -->
    <?php if (!empty($genres) && is_array($genres)) : ?>
        <div class="genre-filter-wrapper mb-4 p-3 bg-dark" style="border-radius: 12px; border: 1px solid rgba(255,255,255,0.08);">
            <div class="small font-weight-bold text-muted mb-2 text-uppercase">
                <i class="fas fa-tags mr-1"></i> Filter Berdasarkan Genre:
            </div>
            <div class="d-flex flex-wrap">
                <a href="/categories" class="genre-pill <?= empty($current_genre) ? 'active' : ''; ?>">Semua Genre</a>
                <?php foreach($genres as $g) : ?>
                    <?php $isActive = (strtolower($current_genre ?? '') === strtolower($g)); ?>
                    <a href="/genre/<?= urlencode(strtolower($g)); ?>" class="genre-pill <?= $isActive ? 'active' : ''; ?>">
                        <?= esc($g); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Anime Grid -->
    <div class="row">
        <?php if (!empty($anime) && is_array($anime)) : ?>
            <?php foreach($anime as $item) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="anime-card-modern">
                        <a href="/anime/<?= $item['slug']; ?>" class="text-decoration-none">
                            <div class="anime-card-poster" style="background-image: url('<?= $item['img']; ?>');">
                                <div class="anime-badge-top">
                                    <span class="badge <?= (strtolower($item['status'] ?? '') === 'completed') ? 'badge-completed' : 'badge-ongoing'; ?>">
                                        <?= $item['status'] ?? 'Ongoing'; ?>
                                    </span>
                                </div>
                                <div class="anime-badge-score">
                                    <i class="fas fa-star mr-1"></i><?= $item['skor'] ?? '-'; ?>
                                </div>
                            </div>
                        </a>
                        <div class="anime-card-body">
                            <div class="anime-card-title" title="<?= esc($item['judul']); ?>">
                                <a href="/anime/<?= $item['slug']; ?>"><?= esc($item['judul']); ?></a>
                            </div>
                            <div class="anime-card-tags">
                                <span><i class="fas fa-tv mr-1 text-muted"></i> <?= $item['total_episode'] ?? '?'; ?> Eps</span>
                                <span class="text-muted"><?= $item['tipe'] ?? 'TV'; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12 py-5 text-center">
                <div class="p-5 bg-dark" style="border-radius: 12px; border: 1px dashed rgba(255,255,255,0.15);">
                    <i class="fas fa-film fa-3x text-muted mb-3"></i>
                    <h5 class="text-white">Tidak ada anime yang cocok</h5>
                    <p class="text-muted">Coba ganti filter genre atau status untuk menemukan anime lainnya.</p>
                    <a href="/categories" class="primary-btn btn-sm mt-2">Reset Filter</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
