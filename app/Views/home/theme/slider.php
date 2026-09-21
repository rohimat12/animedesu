<!-- Hero Section Begin -->
<?php if (!empty($ongoing) && is_array($ongoing)) : ?>
<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            <?php foreach(array_slice($ongoing, 0, 3) as $item) : ?>
            <div class="hero__items set-bg" data-setbg="<?= $item['img'] ?? ''; ?>" style="background-image: url('<?= $item['img'] ?? ''; ?>'); background-size: cover; background-position: center; border-radius: 8px; overflow: hidden;">
                <div class="row">
                    <div class="col-lg-7 col-md-8">
                        <div class="hero__text p-4 m-4" style="background: rgba(11, 15, 25, 0.85); border-radius: 8px;">
                            <div class="label" style="background: #e53637; color: #fff; display: inline-block; padding: 3px 12px; border-radius: 4px; font-size: 12px; margin-bottom: 10px; font-weight: 600;">
                                <?= $item['genre'] ?? 'Anime'; ?>
                            </div>
                            <h2 class="text-white font-weight-bold mb-2"><?= $item['judul'] ?? ''; ?></h2>
                            <p class="text-white-50 mb-3" style="line-height: 1.5;">
                                <?= substr(strip_tags($item['sinopsis'] ?? ''), 0, 140); ?>...
                            </p>
                            <a href="/anime/<?= $item['slug'] ?? ''; ?>" class="primary-btn" style="background: #e53637; color: #fff; padding: 10px 20px; border-radius: 4px; font-weight: 600;">
                                <span>Lihat Anime</span> <i class="fa fa-angle-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- Hero Section End -->