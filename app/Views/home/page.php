<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span><?= $halaman['judul'] ?? 'Halaman'; ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="spad" style="min-height: 50vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card bg-dark text-white p-4" style="border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                    <h2 class="mb-4 pb-2 border-bottom border-secondary text-white"><?= $halaman['judul'] ?? 'Halaman'; ?></h2>
                    <div class="page-content" style="line-height: 1.8; color: #b7b7b7;">
                        <?= $halaman['post'] ?? '<p>Konten belum tersedia.</p>'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>