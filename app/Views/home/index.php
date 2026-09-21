<!-- Product Section Begin -->
<section class="product spad py-4">
    <div class="container">
        <!-- Quick Genre Pills Bar -->
        <?php if (!empty($genres) && is_array($genres)) : ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="p-3" style="background: var(--bg-card); border-radius: 12px; border: 1px solid var(--border-color);">
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="text-white font-weight-bold mr-2 small text-uppercase">
                            <i class="fas fa-fire mr-1 text-danger"></i> Genre Populer:
                        </span>
                        <a href="/categories" class="genre-pill active">Semua</a>
                        <?php foreach(array_slice($genres, 0, 10) as $g) : ?>
                            <a href="/genre/<?= urlencode(strtolower($g)); ?>" class="genre-pill"><?= esc($g); ?></a>
                        <?php endforeach; ?>
                        <a href="/categories" class="genre-pill" style="border-color: rgba(229,54,55,0.4); color: #ff7675;">
                            Semua Genre &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-8">
                <!-- Trending / Ongoing Anime -->
                <div class="trending__product mb-4">
                    <div class="row align-items-center mb-3">
                        <div class="col-8">
                            <div class="section-title m-0">
                                <h4 class="font-weight-bold"><i class="fas fa-play-circle text-danger mr-2"></i>Sedang Tayang (Ongoing)</h4>
                            </div>
                        </div>
                        <div class="col-4 text-right">
                            <a href="/categories?status=Ongoing" class="btn btn-sm btn-outline-danger" style="border-radius: 20px;">
                                Lihat Semua <i class="fa fa-angle-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <?php if (!empty($ongoing)) : ?>
                            <?php foreach($ongoing as $data) : ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="anime-card-modern">
                                    <a href="/anime/<?= $data['slug']; ?>">
                                        <div class="anime-card-poster" style="background-image: url('<?= $data['img']; ?>');">
                                            <div class="anime-badge-top">
                                                <span class="badge badge-ongoing">Eps <?= $data['total_episode']; ?></span>
                                            </div>
                                            <div class="anime-badge-score">
                                                <i class="fa fa-star"></i> <?= $data['skor'] ?? '-'; ?>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="anime-card-body">
                                        <div class="anime-card-title" title="<?= esc($data['judul']); ?>">
                                            <a href="/anime/<?= $data['slug']; ?>"><?= esc($data['judul']); ?></a>
                                        </div>
                                        <div class="anime-card-tags">
                                            <span><?= $data['tipe'] ?? 'TV'; ?></span>
                                            <span class="text-muted"><?= $data['musim'] ?? ''; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        <?php else : ?>
                            <div class="col-12 py-3 text-muted small">Belum ada anime ongoing yang ditambahkan.</div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Completed Shows -->
                <div class="popular__product mb-4">
                    <div class="row align-items-center mb-3">
                        <div class="col-8">
                            <div class="section-title m-0">
                                <h4 class="font-weight-bold"><i class="fas fa-check-circle text-primary mr-2"></i>Tamat (Completed)</h4>
                            </div>
                        </div>
                        <div class="col-4 text-right">
                            <a href="/categories?status=Completed" class="btn btn-sm btn-outline-primary" style="border-radius: 20px;">
                                Lihat Semua <i class="fa fa-angle-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <?php if (!empty($complete)) : ?>
                            <?php foreach($complete as $data) : ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="anime-card-modern">
                                    <a href="/anime/<?= $data['slug']; ?>">
                                        <div class="anime-card-poster" style="background-image: url('<?= $data['img']; ?>');">
                                            <div class="anime-badge-top">
                                                <span class="badge badge-completed"><?= $data['total_episode']; ?> Eps</span>
                                            </div>
                                            <div class="anime-badge-score">
                                                <i class="fa fa-star"></i> <?= $data['skor'] ?? '-'; ?>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="anime-card-body">
                                        <div class="anime-card-title" title="<?= esc($data['judul']); ?>">
                                            <a href="/anime/<?= $data['slug']; ?>"><?= esc($data['judul']); ?></a>
                                        </div>
                                        <div class="anime-card-tags">
                                            <span><?= $data['tipe'] ?? 'TV'; ?></span>
                                            <span class="text-muted"><?= $data['musim'] ?? ''; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="col-12 py-3 text-muted small">Belum ada anime tamat yang ditambahkan.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar p-3 mb-4" style="background: var(--bg-card); border-radius: 12px; border: 1px solid var(--border-color);">
                    <div class="section-title mb-3">
                        <h5 class="font-weight-bold text-white"><i class="fas fa-crown text-warning mr-2"></i>Rekomendasi Terbaik</h5>
                    </div>
                    
                    <?php if (!empty($anime)) : ?>
                        <?php foreach(array_slice($anime, 0, 5) as $top) : ?>
                        <a href="/anime/<?= $top['slug']; ?>" class="text-decoration-none d-flex align-items-center mb-3 p-2" style="background: rgba(255,255,255,0.03); border-radius: 8px; transition: background 0.2s;">
                            <img src="<?= $top['img']; ?>" alt="<?= esc($top['judul']); ?>" style="width: 55px; height: 75px; object-fit: cover; border-radius: 6px; margin-right: 12px; flex-shrink: 0;">
                            <div class="overflow-hidden">
                                <h6 class="text-white font-weight-bold mb-1 text-truncate" style="font-size: 14px;"><?= esc($top['judul']); ?></h6>
                                <div class="small text-muted mb-1">
                                    <span class="text-warning mr-2"><i class="fa fa-star"></i> <?= $top['skor'] ?? '-'; ?></span>
                                    <span><?= $top['total_episode'] ?? '?'; ?> Eps</span>
                                </div>
                                <span class="badge badge-secondary" style="font-size: 10px;"><?= $top['tipe'] ?? 'TV'; ?></span>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-muted small">Belum ada data anime.</p>
                    <?php endif; ?>

                    <div class="mt-4 pt-3 border-top border-secondary">
                        <h6 class="text-white font-weight-bold mb-3"><i class="fas fa-info-circle mr-1 text-danger"></i> Tentang Animedesu</h6>
                        <p class="small text-muted" style="line-height: 1.6;">
                            Animedesu adalah platform streaming dan download anime subtitle Indonesia terlengkap dan terupdate dengan resolusi jernih.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->