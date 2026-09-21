    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="/anime/<?= $anime['slug'] ?? ''; ?>"><?= $anime['judul'] ?? 'Anime'; ?></a>
                        <span>Episode <?= $current_episode['episode_ke'] ?? '1'; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h4><?= $anime['judul'] ?? ''; ?> - Episode <?= $current_episode['episode_ke'] ?? '1'; ?></h4>
                    </div>

                    <div class="anime__video__player mb-4">
                        <?php if (!empty($current_episode['use_player']) && !empty($current_episode['embed_player'])) : ?>
                            <div class="embed-responsive embed-responsive-16by9 bg-dark text-center" style="min-height: 480px; border-radius: 8px; overflow: hidden;">
                                <?php if (strpos($current_episode['embed_player'], '<iframe') !== false) : ?>
                                    <?= $current_episode['embed_player']; ?>
                                <?php else : ?>
                                    <iframe class="embed-responsive-item w-100 h-100" src="<?= $current_episode['embed_player']; ?>" frameborder="0" allowfullscreen style="min-height: 480px;"></iframe>
                                <?php endif; ?>
                            </div>
                        <?php else : ?>
                            <div class="alert alert-secondary text-center p-5" style="border-radius: 8px;">
                                <i class="fa fa-play-circle fa-4x mb-3 text-muted"></i>
                                <h5>Pemutar video belum tersedia atau sedang diproses.</h5>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($current_episode['use_download']) && !empty($current_episode['link_download'])) : ?>
                    <div class="card bg-dark text-white p-3 mb-4">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <span class="font-weight-bold"><i class="fa fa-download mr-2"></i>Link Unduhan:</span>
                            <a href="<?= $current_episode['link_download']; ?>" target="_blank" rel="noopener noreferrer" class="primary-btn btn-sm">
                                <?= !empty($current_episode['judul_download']) ? $current_episode['judul_download'] : 'Download Episode Ini'; ?> 
                                (<?= !empty($current_episode['kualitas']) ? $current_episode['kualitas'] : '720p'; ?>)
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>Daftar Episode</h5>
                        </div>
                        <?php if (!empty($episode)) : ?>
                            <?php foreach($episode as $eps) : ?>
                                <?php $isActive = (isset($current_episode['id']) && $current_episode['id'] == $eps['id']); ?>
                                <a href="/episode/<?= $anime['slug'] ?? ''; ?>/<?= $eps['episode_ke']; ?>" style="<?= $isActive ? 'background: #e53637; color: #fff;' : ''; ?>">
                                    Ep <?= $eps['episode_ke']; ?>
                                </a>
                            <?php endforeach ?>
                        <?php else : ?>
                            <p class="text-muted">Belum ada episode yang diunggah untuk anime ini.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>