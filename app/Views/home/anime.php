<!-- Anime Details Hero Banner -->
<div class="anime-hero-backdrop py-5 position-relative overflow-hidden" style="background: linear-gradient(180deg, rgba(11, 15, 25, 0.8) 0%, #0b0f19 100%), url('<?= $anime['img']; ?>') center/cover no-repeat;">
    <div class="container position-relative" style="z-index: 2;">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-transparent p-0 small">
                <li class="breadcrumb-item"><a href="/" class="text-muted"><i class="fas fa-home mr-1"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="/categories" class="text-muted">Katalog</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page"><?= esc($anime['judul']); ?></li>
            </ol>
        </nav>

        <div class="row align-items-center">
            <!-- Poster Image -->
            <div class="col-lg-3 col-md-4 text-center text-md-left mb-4 mb-md-0">
                <div class="anime-poster-wrap shadow-lg" style="border-radius: 12px; overflow: hidden; border: 2px solid rgba(255,255,255,0.1); max-width: 280px; margin: 0 auto;">
                    <img src="<?= $anime['img']; ?>" alt="<?= esc($anime['judul']); ?>" class="w-100 d-block">
                </div>
            </div>

            <!-- Details Header Info -->
            <div class="col-lg-9 col-md-8">
                <div class="anime-header-info">
                    <div class="d-flex align-items-center flex-wrap mb-2">
                        <span class="badge <?= (strtolower($anime['status'] ?? '') === 'completed') ? 'badge-completed' : 'badge-ongoing'; ?> mr-2 py-1 px-2">
                            <?= $anime['status'] ?? 'Ongoing'; ?>
                        </span>
                        <span class="badge badge-dark mr-2 py-1 px-2" style="border: 1px solid rgba(255,255,255,0.2);">
                            <?= $anime['tipe'] ?? 'TV'; ?>
                        </span>
                        <span class="text-warning font-weight-bold mr-3">
                            <i class="fas fa-star mr-1"></i> <?= $anime['skor'] ?? 'N/A'; ?>
                        </span>
                        <?php if (!empty($anime['musim'])) : ?>
                            <span class="text-muted small"><i class="fas fa-calendar-alt mr-1"></i> <?= $anime['musim']; ?></span>
                        <?php endif; ?>
                    </div>

                    <h2 class="text-white font-weight-bold mb-1"><?= esc($anime['judul']); ?></h2>
                    <?php if (!empty($anime['japan'])) : ?>
                        <p class="text-muted mb-3 font-italic small"><?= esc($anime['japan']); ?></p>
                    <?php endif; ?>

                    <!-- Genre Badges -->
                    <?php if (!empty($anime['genre'])) : ?>
                        <div class="mb-3">
                            <?php 
                            $genreList = explode(',', $anime['genre']);
                            foreach($genreList as $g) : 
                                $trimmedG = trim($g);
                                if (!empty($trimmedG)) :
                            ?>
                                <a href="/genre/<?= urlencode(strtolower($trimmedG)); ?>" class="badge badge-secondary py-1 px-2 mr-1 mb-1" style="font-size: 12px; background: rgba(255,255,255,0.1);">
                                    <?= esc($trimmedG); ?>
                                </a>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        </div>
                    <?php endif; ?>

                    <!-- Watch CTA Button -->
                    <div class="mt-3">
                        <a href="/episode/<?= $anime['slug']; ?>" class="primary-btn mr-2 mb-2">
                            <i class="fas fa-play mr-2"></i> Tonton Sekarang
                        </a>
                        <a href="#daftarEpisode" class="btn btn-outline-light mb-2 font-weight-bold" style="border-radius: 6px; padding: 10px 20px;">
                            <i class="fas fa-list mr-1"></i> Daftar Episode (<?= count($episode ?? []); ?>)
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Details & Episode Section -->
<section class="spad py-5">
    <div class="container">
        <div class="row">
            <!-- Left Column: Synopsis & Episodes -->
            <div class="col-lg-8 mb-5 mb-lg-0">
                <!-- Synopsis Card -->
                <div class="card p-4 mb-4" style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: 12px;">
                    <h5 class="text-white font-weight-bold mb-3 pb-2 border-bottom border-secondary">
                        <i class="fas fa-align-left text-danger mr-2"></i>Sinopsis
                    </h5>
                    <div class="text-white-50" style="line-height: 1.8;">
                        <?= !empty($anime['sinopsis']) ? $anime['sinopsis'] : '<p class="text-muted">Sinopsis belum tersedia untuk anime ini.</p>'; ?>
                    </div>
                </div>

                <!-- Episode List Grid -->
                <div class="card p-4" id="daftarEpisode" style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: 12px;">
                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-secondary">
                        <h5 class="text-white font-weight-bold m-0">
                            <i class="fas fa-film text-danger mr-2"></i>Daftar Episode
                        </h5>
                        <span class="badge badge-danger"><?= count($episode ?? []); ?> Episode Tersedia</span>
                    </div>

                    <?php if (!empty($episode) && is_array($episode)) : ?>
                        <div class="row">
                            <?php foreach($episode as $eps) : ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-3">
                                <a href="/episode/<?= $anime['slug']; ?>/<?= $eps['episode_ke']; ?>" 
                                   class="btn btn-block text-left p-2 d-flex align-items-center text-white" 
                                   style="background: rgba(255,255,255,0.05); border: 1px solid var(--border-color); border-radius: 8px; transition: all 0.2s;">
                                    <div class="bg-danger text-white rounded text-center mr-2 py-1 px-2" style="min-width: 40px; font-weight: 700; font-size: 13px;">
                                        <?= $eps['episode_ke']; ?>
                                    </div>
                                    <div class="text-truncate small font-weight-bold">
                                        <?= !empty($eps['judul']) ? esc($eps['judul']) : 'Episode ' . $eps['episode_ke']; ?>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <div class="text-center py-4 text-muted">
                            <i class="fas fa-video-slash fa-2x mb-2"></i>
                            <p>Belum ada episode yang diunggah untuk anime ini.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right Column: Metadata Box & Recommendations -->
            <div class="col-lg-4">
                <div class="card p-4 mb-4" style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: 12px;">
                    <h5 class="text-white font-weight-bold mb-3 pb-2 border-bottom border-secondary">
                        <i class="fas fa-info-circle text-danger mr-2"></i>Informasi Anime
                    </h5>

                    <ul class="list-unstyled mb-0" style="font-size: 14px; line-height: 2;">
                        <li class="d-flex justify-content-between border-bottom border-dark py-1">
                            <span class="text-muted">Studio:</span>
                            <span class="text-white font-weight-bold"><?= $anime['studio'] ?? '-'; ?></span>
                        </li>
                        <li class="d-flex justify-content-between border-bottom border-dark py-1">
                            <span class="text-muted">Produser:</span>
                            <span class="text-white text-right font-weight-bold" style="max-width: 60%;"><?= $anime['produser'] ?? '-'; ?></span>
                        </li>
                        <li class="d-flex justify-content-between border-bottom border-dark py-1">
                            <span class="text-muted">Total Episode:</span>
                            <span class="text-white font-weight-bold"><?= $anime['total_episode'] ?? '?'; ?></span>
                        </li>
                        <li class="d-flex justify-content-between border-bottom border-dark py-1">
                            <span class="text-muted">Durasi:</span>
                            <span class="text-white font-weight-bold"><?= $anime['durasi'] ?? '-'; ?></span>
                        </li>
                        <li class="d-flex justify-content-between border-bottom border-dark py-1">
                            <span class="text-muted">Tanggal Rilis:</span>
                            <span class="text-white font-weight-bold"><?= $anime['rilis'] ?? '-'; ?></span>
                        </li>
                        <li class="d-flex justify-content-between py-1">
                            <span class="text-muted">Status:</span>
                            <span class="text-white font-weight-bold"><?= $anime['status'] ?? 'Ongoing'; ?></span>
                        </li>
                    </ul>
                </div>

                <!-- Other Completed Anime -->
                <?php if (!empty($complete)) : ?>
                <div class="card p-4" style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: 12px;">
                    <h5 class="text-white font-weight-bold mb-3 pb-2 border-bottom border-secondary">
                        <i class="fas fa-tv text-danger mr-2"></i>Anime Lainnya
                    </h5>
                    <?php foreach(array_slice($complete, 0, 4) as $item) : ?>
                    <a href="/anime/<?= $item['slug']; ?>" class="d-flex align-items-center mb-3 text-decoration-none text-white">
                        <img src="<?= $item['img']; ?>" alt="<?= esc($item['judul']); ?>" style="width: 50px; height: 70px; object-fit: cover; border-radius: 6px; margin-right: 12px; flex-shrink: 0;">
                        <div class="overflow-hidden">
                            <h6 class="font-weight-bold text-white text-truncate mb-1" style="font-size: 13px;"><?= esc($item['judul']); ?></h6>
                            <span class="badge badge-completed" style="font-size: 10px;"><?= $item['total_episode'] ?? '?'; ?> Eps</span>
                            <span class="text-warning small ml-2"><i class="fa fa-star"></i> <?= $item['skor'] ?? '-'; ?></span>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>