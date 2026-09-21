<div class="container py-4">
    <!-- Breadcrumb -->
    <div class="row mb-3">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 small">
                    <li class="breadcrumb-item"><a href="/" class="text-muted"><i class="fas fa-home mr-1"></i> Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Pencarian</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Search Header -->
    <div class="row align-items-center mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold text-white mb-1">
                Hasil Pencarian: "<span style="color: #e53637;"><?= esc($query); ?></span>"
            </h3>
            <p class="text-muted small m-0">Menemukan <?= $total_found; ?> judul anime</p>
        </div>
        <div class="col-md-4 text-md-right mt-3 mt-md-0">
            <a href="/categories" class="btn btn-outline-secondary btn-sm text-white">
                <i class="fas fa-th-large mr-1"></i> Buka Semua Katalog
            </a>
        </div>
    </div>

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
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h5 class="text-white">Tidak ada anime yang cocok dengan "<?= esc($query); ?>"</h5>
                    <p class="text-muted">Coba gunakan kata kunci yang lebih umum atau cari melalui katalog genre.</p>
                    <a href="/categories" class="primary-btn btn-sm mt-2">Jelajahi Katalog</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
